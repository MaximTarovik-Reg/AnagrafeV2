<!DOCTYPE html>
<html lang="it">

<?php
    session_start();

    if(!isset($_SESSION['username'])) { // Se non è presente la sessione "username", reindirizzo alla pagina di login.

        header("location:login.php");
    }

    $username = $_SESSION['username']; // Inserico la sessione in una variabile.

    $connection = mysqli_connect("localhost", "root", "", "negozio");

    // Query per estrarre nome e cognome dell'operatore.
    $queryOperatore = "SELECT nome, cognome FROM operatori WHERE username = '$username'";

    $resultOperatore = mysqli_query($connection, $queryOperatore);

    $rowOperatore = mysqli_fetch_assoc($resultOperatore);

    $nomeOperatore = $rowOperatore['nome'];
    $cognomeOperatore = $rowOperatore['cognome'];
?>

<html>
    <head>
        <title>
            Anagrafe clienti
        </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <script src="https:///f12e05228f.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>

    <body>

        <!-- Inizio navbar -->

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <i class="bi bi-person-lines-fill"></i>
                    Anagrafe Clienti
                </a>                 
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">  
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php

                                echo $nomeOperatore . " " . $cognomeOperatore;
                            ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>                                
                        </ul>
                    </li>
                </ul>                
            </div>
        </nav>

        <!-- Fine navbar -->

        <?php

            $_SESSION['controllo'] = true;  //Controllo utilizzato su insertCliente.php per scegliere se aggiungere o modificare i dati.                  
        ?>

        <!-- Inizio titolo -->

        <div class="container my-5 text-center fs-3 fw-bold justify-content-center">
            <h2 class="fw-bold fs-1">
                Aggiungi cliente
            </h2>                
        </div>
        
        <!-- Fine titolo -->
        
        <!-- Inizio form -->

        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-6">

                    <form action="insertCliente.php" method="GET">
                                
                        <input class = "form-control" placeholder="Email" type="text" name="mail">
                        <br>
                        
                        <input class = "form-control" placeholder="Nome" type="text" name="nome">
                        <br>
                        
                        <input class = "form-control" placeholder="Cognome" type="text" name="cognome">
                        <br>

                        Data di Nascita
                        <br>
                        <input class = "form-control" placeholder="Data di nascita" type="date" name="data_n">
                        <br>

                        Data di Iscrizione <!-- Viene automaticamente inserito il valore della data corrente attraverso php, può comunque essere modificata. -->
                        <br>
                        <input class = "form-control" placeholder="Data di Iscrizione" type="date" name="data_isc" value="<?php echo date('Y-m-d'); ?>" />
                        <br>
                        
                        <input class = "form-control" placeholder="Codice fiscale" type="text" name="cf">
                        <br>
                        
                        <input class = "form-control" placeholder="Città" type="text" name="citta">
                        <br>
                        
                        <input class = "form-control" placeholder="Provincia" type="text" name="provincia">
                        <br>
                        
                        <input class = "form-control" placeholder="Via" type="text" name="via">
                        <br>
                        
                        <input class = "form-control" placeholder="N°Civ." type="text" name="n_civ">
                        <br>
                        
                        <input class = "form-control" placeholder="CAP" type="text" name="cap">
                        <br>
                        
                        <button style="width:100%" type="submit" class="btn btn-outline-primary">Inserisci</button>
                    </form>
                </div>
            </div>            
        </div>

        <!-- Fine form -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>
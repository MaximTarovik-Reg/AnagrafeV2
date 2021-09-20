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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="addCliente.php">
                            <i class="bi bi-person-plus-fill"></i>
                            Aggiungi cliente
                        </a>                        
                    </ul>                
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
            </div>
        </nav>

        <!-- Fine navbar -->

        <?php

            
            $_SESSION['controllo'] = false; //Controllo utilizzato su insertCliente.php per scegliere se aggiungere o modificare i dati.

            // Variabili per riempire il form con i dati già esistenti del cliente, potranno poi essere modificati.

            $mail = $_SESSION['email'];
            $nome = $_SESSION['nome'];
            $cognome = $_SESSION['cognome'];
            $data_n = $_SESSION['data_nascita'];
            $data_isc = $_SESSION['data_iscrizione'];
            $cf = $_SESSION['cf'];
            $citta = $_SESSION['città'];
            $provincia = $_SESSION['provincia'];
            $via = $_SESSION['via'];
            $n_civ = $_SESSION['n_civ'];
            $cap = $_SESSION['CAP'];                          
        ?>

        <!-- Inizio titolo -->

        <div class="container my-5 text-center fs-3 fw-bold justify-content-center">
            <h2 class="fw-bold fs-1">
                Modifica cliente
            </h2>                                    
        </div>

        <!-- Fine titolo -->
        
        <!-- Inizio form -->

        <div class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-6">

                    <form action="insertCliente.php" method="GET"> <!-- Input value inseriti da variabili sopracitate -->
                        
                        <!-- Input di email impostato su readonly perchè non si può modificare una PK -->

                        <input class = "form-control" placeholder="Email" type="text" name="mail" value="<?php echo $mail; ?>" readonly>
                        <br>
                        
                        <input class = "form-control" placeholder="Nome" type="text" name="nome" value="<?php echo $nome; ?>">
                        <br>
                        
                        <input class = "form-control" placeholder="Cognome" type="text" name="cognome" value="<?php echo $cognome; ?>">
                        <br>

                        Data di Nascita
                        <br>
                        <input class = "form-control" placeholder="Data di nascita" type="date" name="data_n" value="<?php echo $data_n; ?>">
                        <br>
                        
                        Data di Iscrizione
                        <br>
                        <input class = "form-control" placeholder="Data di Iscrizione" type="date" name="data_isc" value="<?php echo $data_isc; ?>">
                        <br>
                        
                        <input class = "form-control" placeholder="Codice fiscale" type="text" name="cf" value="<?php echo $cf; ?>">
                        <br>
                        
                        <input class = "form-control" placeholder="Città" type="text" name="citta" value="<?php echo $citta; ?>">
                        <br>
                        
                        <input class = "form-control" placeholder="Provincia" type="text" name="provincia" value="<?php echo $provincia; ?>">
                        <br>
                        
                        <input class = "form-control" placeholder="Via" type="text" name="via" value="<?php echo $via; ?>">
                        <br>
                        
                        <input class = "form-control" placeholder="N°Civ." type="text" name="n_civ" value="<?php echo $n_civ; ?>">
                        <br>
                        
                        <input class = "form-control" placeholder="CAP" type="text" name="cap" value="<?php echo $cap; ?>">
                        <br>

                        <button style="width:100%" type="submit" class="btn btn-outline-primary">Modifica</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Fine form -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>
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

        <div class="container mt-5 text-center fs-3 fw-bold justify-content-center">
                    
            <?php

                $connection = mysqli_connect("localhost", "root", "", "negozio");
                
                $check = $_SESSION['controllo']; // Variabile boolean, controlla se aggiungere o modificare un cliente.

                // Ottengo i dati dal form.

                $mail = $_GET["mail"];
                $nome = $_GET["nome"];
                $cognome = $_GET["cognome"];
                $data_n = $_GET["data_n"];
                $data_isc = $_GET["data_isc"];
                $cf = $_GET["cf"];
                $citta = $_GET["citta"];
                $provincia = $_GET["provincia"];
                $via = $_GET["via"];
                $n_civ = $_GET["n_civ"];
                $cap = $_GET["cap"];

                $query = "SELECT email FROM clienti WHERE email = '$mail'";
                $result = mysqli_query($connection, $query);

                if ($check){ // Se vera inserisco un nuovo cliente

                    if (mysqli_num_rows($result) != 0) {

                        echo "L'email $mail &egrave; gi&agrave; presente nel database!";
                    }else {

                        $query = "INSERT INTO `clienti` (`email`, `nome`, `cognome`, `cf`, `data_nascita`, `città`, `provincia`, `via`, `n_civ`, `CAP`, `data_iscrizione`)
                                VALUES ('$mail', '$nome', '$cognome', '$cf', '$data_n', '$citta', '$provincia', '$via', $n_civ, $cap, '$data_isc');";

                        $result = mysqli_query($connection, $query);

                        echo "$nome $cognome, con l'email $mail &egrave; stato aggiunto al database!";
                    }
                }else { // Se falsa modifico un cliente.

                    $query = "UPDATE clienti
                                SET nome = '$nome', cognome = '$cognome', data_nascita = '$data_n', data_iscrizione = '$data_isc', cf = '$cf', città = '$citta', provincia = '$provincia', via = '$via', n_civ = '$n_civ', CAP = '$cap'
                                WHERE email = '$mail'";

                    $result = mysqli_query($connection, $query);

                    echo "$nome $cognome, con l'email $mail &egrave; stato modificato!";
                }

                mysqli_close($connection);  
            ?>
            
            <button onclick="location.href='index.php'" style="width:100%" type="button" class="btn btn-outline-primary mt-5"><i class="bi bi-house"></i></button>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>    
</html>
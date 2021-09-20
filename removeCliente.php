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

        <!-- Rimuovo il cliente dal DB e stampo risultato -->

        <div class="container mt-5 text-center fs-3 fw-bold justify-content-center">

            <?php

                $mail = $_SESSION['email'];

                $connection = mysqli_connect("localhost", "root", "", "negozio");

                $query = "DELETE FROM clienti WHERE email = '$mail'";
                $result = mysqli_query($connection, $query);

                echo "L'utente &egrave; stato eliminato dal database.";

                mysqli_close($connection);
            ?>

            <button onclick="location.href='index.php'" style="width:100%" type="button" class="btn btn-outline-primary mt-5"><i class="bi bi-house"></i></button>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>
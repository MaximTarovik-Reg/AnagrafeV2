<!DOCTYPE html>
<html lang="it">

    <?php
        
        session_start();

        if(!isset($_SESSION['username'])) { // Se non è presente la sessione "username", reindirizzo alla pagina di login.

            header("location:login.php");
        }

        $username = $_SESSION['username']; // Inserico la sessione in una variabile.

        $connection = mysqli_connect("localhost", "root", "", "negozio");

        // Query per contare numero di utenti.
        $query = "SELECT COUNT(email) AS utenti
                    FROM clienti";

        // Query per estrarre nome e cognome dell'operatore.
        $queryOperatore = "SELECT nome, cognome FROM operatori WHERE username = '$username'";

        $result = mysqli_query($connection, $query);
        $resultOperatore = mysqli_query($connection, $queryOperatore);

        $row = mysqli_fetch_assoc($result);
        $rowOperatore = mysqli_fetch_assoc($resultOperatore);

        $utenti = $row['utenti']; // Variabile numero di utenti.
        $nomeOperatore = $rowOperatore['nome'];
        $cognomeOperatore = $rowOperatore['cognome'];

        // Estraggo la somma del guadagno odierno.
        
        $data = date('Y-m-d');

        $query = "SELECT SUM(somma) AS somma
                    FROM acquisti
                    WHERE DATE(data) = '$data'";

        $result = mysqli_query($connection, $query);

        $row = mysqli_fetch_assoc($result);

        $somma = $row['somma'];

        if(empty($somma)) { //Se il guadagno è nullo pongo la variabile = 0.

            $somma = 0;
        }

        mysqli_close($connection);
    ?>

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
                        </li>
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
        
        <!-- Inizio dati utenti e guadagno -->

        <div class="container">
            <div class="row justify-content-center mt-5 mb-3 p-2">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-2">Utenti registrati:</h5>
                            <p class="card-text fw-bold fs-3">
                                <i class="bi bi-people-fill"></i>
                                <?php echo $utenti; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fs-2">Guadagno di oggi:</h5>
                            <p class="card-text fw-bold fs-3">
                                € <?php echo $somma; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Fine dati utenti e guadagno -->

        <!-- Inizio script filtro -->

        <script>

            $(document).ready(function() {

                $("#search").keyup(function() {

                    $.ajax({

                        url: 'filtro.php',
                        type: 'post',
                        data: {search: $(this).val()},
                        success: function(result) {

                            $("#result").html(result);
                        }
                    });
                });
            });

            $(document).ready(function(){
    
                var name ="";
            
                $.ajax({

                    url:"filtro.php",
                    type: 'post',
                    data: {search: $(this).val()},
                    success: function(result){

                        $("#result").html(result);
                    }
                });
            });
        </script>

        <!-- Fine script filtro -->

        <!-- Inizio titolo e filtro -->

        <div class="container">
            <div class="row">
                <div class="col-3 mb-3">
                    <h2 class="fw-bold">
                        Lista utenti
                    </h2>
                    <div class="input-group mb-3 mt-3">
            
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                        <input type="text" id = "search" class="form-control" placeholder="Filtra..." aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
        </div>

        <!-- Fine titolo e filtro -->                        

        <div id = "result">

            <!-- Qui viene stampata la tabella -->
            
        </div>                

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>
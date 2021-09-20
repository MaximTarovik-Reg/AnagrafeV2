<!DOCTYPE html>
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

        <!-- Inizio titolo -->

        <div class="container mt-5">
            <div class="row">
                <div class="col-6 offset-3">
                    <h3 class = "fw-bold fs-3 text-center">
                        <i class="bi bi-person-lines-fill"></i>
                        Anagrafe Clienti
                    </h3>
                </div>
            </div>
        </div>

        <!-- Fine titolo -->

        <!-- Inizio login -->

        <div class="container">
            <div class="row">
                <div class="col-6 m-auto">
                    <div class="card bg-dark p-2 mt-5" style="--bs-bg-opacity: .8;">
                        <div class="card-title text-white text-center">
                            <h3>Autenticazione</h3> 
                        </div>

                        <?php

                            if(@$_GET['empty'] == true) { // Variabile arriva da process.php, se esiste allora almeno un campo è vuoto.

                                ?>

                                <div class="alert-light text-danger text-center py-3 rounded">

                                    <?php echo $_GET['empty']; ?> <!-- Stampo messaggio di errore -->
                                </div>                                

                                <?php
                            }                        

                            if(@$_GET['errore'] == true) { // Variabile arriva da process.php, se esiste allora username o password sono errati.

                                ?>

                                <div class="alert-light text-danger text-center py-3 rounded">

                                    <?php echo $_GET['errore']; ?> <!-- Stampo messaggio di errore -->
                                </div>                                

                                <?php
                            }
                        ?>

                        <!-- Inizio form -->

                        <div class="card-body">

                            <form action = "process.php" method = "post">

                                <input class = "form-control mb-3" type = "text" name = "username" placeholder = "Username">
                                <input class = "form-control mb-3" type = "password" name = "password" placeholder = "Password">

                                <button name = "login" style="width:100%" type="submit" class="btn btn-outline-primary">Login</button>
                            </form>
                        </div>

                        <!-- Fine form -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Fine login -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>
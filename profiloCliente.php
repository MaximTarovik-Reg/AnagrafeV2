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

        <?php

            
            $mail = $_GET["pln"]; // Ottengo la variabile mail dalla pagnia index.php

            $connection = mysqli_connect("localhost", "root", "", "negozio");

            // Eseguo una query sulla base della variabile mail

            $query = "SELECT email, nome, cognome, data_nascita, data_iscrizione, cf, città, provincia, via, n_civ, CAP
                        FROM clienti
                        WHERE email = '$mail'";

            $result = mysqli_query($connection, $query);
            $resultNome = mysqli_query($connection, $query);
            
            while($row = mysqli_fetch_assoc($resultNome)){

                $nome = $row['nome'];
                $cognome = $row['cognome'];
            }

            if(mysqli_num_rows($result) > 0):                
        ?>                

        <!-- Inizio titolo -->

        <div class="container my-5 text-center fs-3 fw-bold justify-content-center">            
            <h2 class="fw-bold fs-1">
                <?php echo $nome . " " . $cognome; ?>
            </h2>                                    
        </div>

        <!-- Fine titolo -->

        <!-- Stampo la tabella con i dati del cliente -->
                
        <div class="container">
            <table class="table border border-secondary border-4 table-striped">
                <thead>
                    <tr>    
                    <th>email</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Data Nascita</th>
                    <th>Data Iscrizione</th>
                    <th>CF</th>
                    <th>Città</th>
                    <th>Provincia</th>
                    <th>Via</th>
                    <th>N°Civ.</th>
                    <th>CAP</th>                      
                    </tr>
                </thead>

                <tbody>
            
                    <?php

                        while($row = mysqli_fetch_assoc($result)):

                        $mail = $row['email'];

                        $_SESSION['email'] = $row['email'];
                        $_SESSION['nome'] = $row['nome'];
                        $_SESSION['cognome'] = $row['cognome'];
                        $_SESSION['data_nascita'] = $row['data_nascita'];
                        $_SESSION['data_iscrizione'] = $row['data_iscrizione'];
                        $_SESSION['cf'] = $row['cf'];
                        $_SESSION['città'] = $row['città'];
                        $_SESSION['provincia'] = $row['provincia'];
                        $_SESSION['via'] = $row['via'];
                        $_SESSION['n_civ'] = $row['n_civ'];
                        $_SESSION['CAP'] = $row['CAP'];
                    ?>

                    <tr>                  
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['nome']; ?></td>
                        <td><?php echo $row['cognome']; ?></td>
                        <td><?php echo $row['data_nascita']; ?></td>
                        <td><?php echo $row['data_iscrizione']; ?></td>
                        <td><?php echo $row['cf']; ?></td>
                        <td><?php echo $row['città']; ?></td>
                        <td><?php echo $row['provincia']; ?></td>
                        <td><?php echo $row['via']; ?></td>
                        <td><?php echo $row['n_civ']; ?></td>
                        <td><?php echo $row['CAP']; ?></td>
                    </tr>
              
                    <?php endwhile; ?>
                  
                    <?php endif; ?>
                </tbody>
            </table>                
        </div>

        <!-- Bottoni di modifica e rimozione -->

        <div class="container mb-5">
            <div class="row">
                <div class="col-6">
                    <button onclick="location.href='modifyCliente.php'" style="width:100%" type="button" class="btn btn-outline-primary">Modifica cliente</button>
                </div>
                <div class="col-6">
                    <button onclick="location.href='removeCliente.php'" style="width:100%" type="button" class="btn btn-outline-danger">Elimina cliente</button>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    </body>
</html>
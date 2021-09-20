<?php

    session_start();

    $connection = mysqli_connect("localhost", "root", "", "negozio");

    if(isset($_POST['login'])) {

        if(empty($_POST['username']) || empty($_POST['password'])) { // Controllo se i campi sono inseriti.

            header("location:login.php?empty=Inserire tutti i campi."); // Reinderizzo a login perchè mancanti.
        }else {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $query = "SELECT * FROM operatori WHERE username = '$username' AND password = MD5('$password')"; // Controllo la tabella per match.

            $result = mysqli_query($connection, $query);

            if(mysqli_fetch_assoc($result)) { // Se esiste un match inizio la sessione e reindirizzo a index.php

                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;

                header("location:index.php");
            }else { // Altrimenti reindirizzo a login.php con un messaggio di errore.

                header("location:login.php?errore=Username o password invalidi.");
            }
        }
    }
?>
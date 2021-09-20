<?php

    // PDO, viene utilizzato in filtro.php per effettuare la connessione al DB.

    try{

        $db = new pdo('mysql:host=localhost;dbname=negozio;charset=utf8', 'root', '');
    }catch(PDOException $e) {
        
        die($e -> getMessage());
    }
?>
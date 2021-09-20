<?php

    // Elimino la sessione e reindirizzo a login.php

    session_start();
    session_destroy();

    header("location:login.php");
?>
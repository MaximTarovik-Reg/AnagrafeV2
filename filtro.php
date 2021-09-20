<?php

    include 'dbconn.php'; // Connessione al DB.

    if(isset($_POST['search'])) { // Controllo che sia inserito qualcosa nell'input di ricerca.

        $search = $_POST['search'];
        $search = "%$search%";

        if(strlen($search) > 0) {

            $sql = "SELECT * FROM clienti WHERE email LIKE :s || nome LIKE :s || cognome LIKE :s || data_nascita LIKE :s || data_iscrizione LIKE :s || cf LIKE :s || città LIKE :s || provincia LIKE :s || via LIKE :s || n_civ LIKE :s || CAP LIKE :s";

            $stmt = $db -> prepare($sql);
            $stmt -> bindParam('s', $search);

            $stmt -> execute();

            // Stampo la tabella
            
            echo "<div class='container mb-5'>";
            echo "<table class='table border border-secondary border-4 table-striped'>";
            echo "<thead>";
            echo "<tr>";
                echo "<th>Profilo</th>";
                echo "<th>email</th>";
                echo "<th>Nome</th>";
                echo "<th>Cognome</th>";
                echo "<th>Data Nascita</th>";
                echo "<th>Data Iscrizione</th>";
                echo "<th>CF</th>";
                echo "<th>Città</th>";
                echo "<th>Provincia</th>";
                echo "<th>Via</th>";
                echo "<th>N°Civ.</th>";
                echo "<th>CAP</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            while($row = $stmt -> fetch()) {

                $mail = $row['email'];

                $email = $row['email'];
                $nome =  $row['nome'];
                $cognome = $row['cognome'];
                $data_n = $row['data_nascita'];
                $data_isc = $row['data_iscrizione'];
                $cf = $row['cf'];
                $citta = $row['città'];
                $provincia = $row['provincia'];
                $via = $row['via'];
                $n_civ = $row['n_civ'];
                $cap = $row['CAP'];

                echo "<tr>";
                echo "<td><button type='button' class='btn btn-outline-primary' onClick=getPlanner('".$mail."');><i class='bi bi-folder-symlink'></i></button></td>";
                echo "<td>" . $email . "</td>";
                echo "<td>" . $nome . "</td>";
                echo "<td>" . $cognome . "</td>";
                echo "<td>" . $data_n . "</td>";
                echo "<td>" . $data_isc . "</td>";
                echo "<td>" . $cf . "</td>";
                echo "<td>" . $citta . "</td>";
                echo "<td>" . $provincia . "</td>";
                echo "<td>" . $via . "</td>";
                echo "<td>" . $n_civ . "</td>";
                echo "<td>" . $cap . "</td>";
                echo "</tr>";
            }

            echo "</tbody";
            echo "</table>";
            echo "</div>";
        }
    }
?>

<!-- Script per passare il parametro "email" alla pagina profiloCliente.php -->

<script>

    var mail = <?php echo json_encode($mail); ?>;

    function getPlanner(mail) {

        var plan = window.open("profiloCliente.php?pln=" + mail);
    }
</script>
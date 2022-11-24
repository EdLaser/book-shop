<?php
    echo htmlspecialchars($_GET['detailID']);
    $id_of_book = $_GET['detailID'];
    $db_con = new mysqli("localhost", "g04", "ed67ford", "g04")
    or die("Keine Verbindung zur Datenbank moeglich: ");
    echo "<span> Verbindung erfolgreich. </span>";

    $query = "Select * FROM buecher WHERE id =" . $id_of_book . ";";
    $result = $db_con-> query($query) or die("Anfrage fehlgeschlagen");

    if($result -> num_rows > 0) {
        echo "<table>";
        while($line = $result-> fetch_assoc()) {
            echo "\t<tr>\n";
            foreach($line as $col_val) {
                echo "<td>$col_val</td>";
            }
            echo "\t</tr>\n";
        }
    }
?>
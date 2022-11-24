<?php
    // host, user, password, database
    $db_con = new mysqli("localhost", "root", "ed67ford", "g04")
    or die("Keine Verbindung zur Datenbank moeglich: ");
    echo "<span> Verbindung erfolgreich. </span>";

    $query = "Select * FROM buecher;";
    $result = $db_con-> query($query) or die("Anfrage fehlgeschlagen");
    if($result -> num_rows > 0) {
        echo "<table>\n";
        while($line = $result->fetch_assoc()) {
            echo "\t<a href='katalog.php?detailID=" . $line['ID']> "<tr>\n";
            echo "\t\t<td>" . $line['Produkttitel'] . "</td>\n";
            echo "\t\t<td>" . $line['Autorenname'] . "</td>\n";
            echo "\t</tr></a>\n";
        }
        echo "</table>\n";
    }
    $db_con->close();
?>
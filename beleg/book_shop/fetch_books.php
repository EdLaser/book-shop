<?php

$db_con = new mysqli("localhost", "g04", "ed67ford", "g04")
    or die("Keine Verbindung zur Datenbank moeglich: ");

$db_con->set_charset("utf8");

$result = $db_con->query("SELECT * FROM buecher;") or die("Anfrage fehlgeschlagen");

if ($result->num_rows > 0) {
    $result_array = [];
    while ($line = $result->fetch_assoc()) {
        array_push($result_array, $line);
    }
    $db_con->close();

    $json = json_encode(($result_array));
    
    echo $json;
}
?>
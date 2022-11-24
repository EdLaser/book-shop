<!DOCTYPE html>
<html lang="de">

<?php include './components/head.php' ?>

<body>
    <?php include './components/header.php' ?>
    <main class="bg-dark vh-100">
        <div class="d-flex flex-row">
            <?php include './components/sidebar.php' ?>
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark fixed-right" style="width: 55%;">
                <?php
                $id_of_book = $_GET['detailID'];
                $db_con = new mysqli("localhost", "g04", "ed67ford", "g04")
                    or die("Keine Verbindung zur Datenbank moeglich: ");

                $query = "Select * FROM buecher WHERE id =" . $id_of_book . ";";
                $result = $db_con->query($query) or die("Anfrage fehlgeschlagen");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "\t<table class='table table-dark table-borderless'>\n";
                        echo "\t\t<thead><tr><th>Details zum Buch</th></tr></thead>\n";
                        
                        echo "\t\t\t<tr>\n";
                        echo "\t\t\t<td><strong>Buchtitel</strong></td>\n";
                        echo "\t\t\t<td>" . $row['Produkttitel'] . "</td>\n";
                        echo "\t\t</tr>";

                        echo "<tr>\n";
                        echo "<td><strong>Buchcode</strong></td>\n";
                        echo "<td>" . $row['Produktcode'] . "</td>\n";
                        echo "</tr>\n";

                        echo "<tr>\n";
                        echo "<td><strong>Autorenname</strong></td>\n";
                        echo "<td>" . $row['Autorenname'] . "</td>\n";
                        echo "</tr>\n";

                        echo "<tr>";
                        echo "<td><strong>Verlagsname</strong></td>\n";
                        echo "<td>" . $row['Verlagsname'] . "</td>\n";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<td><strong>Preis (netto)</strong></td>";
                        echo "<td>" . $row['PreisNetto'] . "</td>";
                        echo "</tr>";

                        echo "<tr>\n";
                        echo "<td><strong>Preis (brutto)</strong></td>\n";
                        echo "<td>" . $row['PreisBrutto'] . "</td>\n";
                        echo "</tr>\n";

                        echo "<tr>\n";
                        echo "<td><strong>Mehrwertsteuer</strong></td>\n";
                        echo "<td>" . $row['Mwstsatz'] . "%</td>\n";
                        echo "</tr>\n";

                        echo "<tr>\n";
                        echo "<td><strong>Kurzinhalt</strong></td>\n";
                        echo "<td>" . $row['Kurzinhalt'] . "</td>\n";
                        echo "</tr>\n";

                        echo "<tr>\n";
                        echo "<td><strong>Lagerbestand</strong></td>\n";
                        echo "<td>\n" . $row['Lagerbestand'] . "</td>\n";
                        echo "</tr>\n";

                        echo "<tr>\n";
                        echo "<td><strong>Gewicht</strong></td>\n";
                        echo "<td>\n" . $row['Gewicht'] . "</td>\n";
                        echo "</tr>\n";

                        echo "</table>";
                    }
                }
                ?>
            </div>
            <?php include './components/aside.php' ?>
        </div>
    </main>
    <?php include './components/footer.php' ?>
</body>

</html>
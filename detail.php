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
                        echo "<h5>Buchtitel</h5>";
                        echo "<span>". $row['Produkttitel'] . "</span>";
                        
                        echo "<h5>Buchcode</h5>";
                        echo "<span>". $row['Produktcode'] . "</span>";

                        echo "<h5>Autorenname</h5>";
                        echo "<span>". $row['Autorenname'] . "</span>";

                        echo "<h5>Verlagsname</h5>";
                        echo "<span>". $row['Verlagsname'] . "</span>";

                        echo "<h5>Preis (netto)</h5>";
                        echo "<span>". $row['PreisNetto'] . "</span>";

                        echo "<h5>Preis (brutto)</h5>";
                        echo "<span>". $row['PreisBrutto'] . "</span>";

                        echo "<h5>Mehrwertsteuer</h5>";
                        echo "<span>". $row['Mwstsatz'] . "%</span>";

                        echo "<h5>Kurzinhalt</h5>";
                        echo "<span>". $row['Kurzinhalt'] . "</span>";

                        echo "<h5>Lagerbestand</h5>";
                        echo "<span>". $row['Lagerbestand'] . "</span>";

                        echo "<h5>Gewicht</h5>";
                        echo "<span>". $row['Gewicht'] . "</span>";
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
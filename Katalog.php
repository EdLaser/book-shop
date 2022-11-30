<!DOCTYPE html>
<html lang="en">

<?php include './components/head.php' ?>

<body>
    <?php include './components/header.php' ?>
    <main class="bg-dark vh-100">
        <div class="d-flex flex-row">
            <?php include './components/sidebar.php' ?>
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark fixed-right" style="width: 55%;">
                <?php
                function displayOutput($result)
                {
                    if ($result->num_rows > 0) {
                        echo "<table class='table table-dark table-striped'>\n";
                        echo "\t<thead class='table-dark'>\n";
                        echo "\t\t<th scope='col'>Produkttitel</th>\n";
                        echo "\t\t<th scope='col'>Autorenname</th>\n";
                        echo "\t</thead>\n";
                        while ($line = $result->fetch_assoc()) {
                            echo "\t<tbody>\n";
                            echo "\t<tr>\n";
                            echo "\t\t<td>" . "<a href='detail.php?detailID=" . $line['ID'] . "'>" . $line['Produkttitel'] . "</a></td>\n";
                            echo "\t\t<td>" . $line['Autorenname'] . "</td>\n";
                            echo "\t</tr>\n";
                            echo "\t</tbody>\n";
                        }
                        echo "</table>\n";
                    }
                }
                
                // host, user, password, database
                $db_con = new mysqli("localhost", "g04", "ed67ford", "g04")
                    or die("Keine Verbindung zur Datenbank moeglich: ");

                $query = "Select * FROM buecher;";
                $result = $db_con->query($query) or die("Anfrage fehlgeschlagen");
                
                displayOutput($result);
                
                
                
                $db_con->close();
                ?>
            </div>
            <?php include './components/aside.php' ?>
        </div>
    </main>
    <?php include './components/footer.php' ?>
</body>

</html>
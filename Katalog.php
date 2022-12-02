<!DOCTYPE html>
<html lang="en">

<?php include './components/head.php' ?>

<body>
    <?php include './components/header.php' ?>
    <main class="bg-dark vh-100">
        <div class="d-flex flex-row">
            <?php include './components/sidebar.php' ?>
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark fixed-right" style="width: 55%;">
                <div class="navbar">
                    <div class="container-fluid">
                        <form action="katalog.php" class="d-flex" role="search" method="GET">
                            <input class="form-control me-2" type="search" placeholder="Titel" aria-label="Titel" name="titel">
                            <input class="form-control me-2" type="searchs" placeholder="Autor" aria-label="Autor" name="autor">
                            <button class="btn btn-outline-primary" type="submit">Suchen</button>
                        </form>
                    </div>
                </div>

                <?php
                function search()
                {
                    $search_query = "SELECT * FROM buecher WHERE ";
                    // $_GET = array_filter($_GET);

                    if (!empty($_GET['titel']) and !empty($_GET['autor'])) {
                        // Both set
                        $search_query .= "Produkttitel = '" . $_GET['titel'] ."'" . " AND Autorenname = '" . $_GET['autor'] ."'";
                    } elseif (empty($_GET['titel']) and !empty($_GET['autor'])) {
                        // No Title
                        $search_query .= "Autorenname = '" . $_GET['autor'] ."'";
                    } elseif (empty($_GET['autor']) and !empty($_GET['titel'])) {
                        // No Author but Title
                        $search_query .= "Produkttitel = '" . $_GET['titel'] ."'";
                    }

                    $search_query .= ";";
                    return $search_query;
                }

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

                (isset($_GET['autor']) or isset($_GET['titel'])) ? $query = search() : $query = "Select * FROM buecher;";
                echo $query;
                
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body>
    <header class="d-flex p-3 bg-dark text-white justify-content-center">
        <ul class="nav nav-pills">
            <li>
                <h1>
                    Buchgeschäfft der Gruppe MR
                </h1>
            </li>
        </ul>
    </header>
    <main class="bg-dark">
        <div class="d-flex flex-row">
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark fixed-right" style="width: 22.5%;">
                <span class="fs-4">
                    Sidebar
                </span>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-white">
                            EwA Gruppe G04
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="accordion" id="bookShopNavList">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="bookShopHeader">
                                    <button class="accordion-button collapsed text-white bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#linkList" aria-expanded="false" aria-controls="linkList">
                                        Buchshop
                                    </button>
                                </h2>
                            </div>
                            <div id="linkList" class="accordion-collapse collapse" aria-labelledby="bookShopHeader" data-bs-parent="#bookShopNavList">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                                            First item
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                                            Second item
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                                            Third item
                                        </a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link text-white">
                            Verwaltung
                        </a>
                    </li>
                </ul>
                <hr>
            </div>
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark fixed-right" style="width: 55%;">
                <?php
                // host, user, password, database
                $db_con = new mysqli("localhost", "g04", "ed67ford", "g04")
                    or die("Keine Verbindung zur Datenbank moeglich: ");
                echo '<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <img src="..." class="rounded me-2" alt="...">
                        <strong class="me-auto">Datenbank</strong>
                        <small>1 second ago.</small>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Verbindung erfolgreich
                    </div>
                    </div>
                </div>
                ';
                $query = "Select * FROM buecher;";
                $result = $db_con->query($query) or die("Anfrage fehlgeschlagen");
                if ($result->num_rows > 0) {
                    echo "<table class='table table-dark table-striped'>\n";
                    echo "\t<thead class='table-dark'>\n";
                    echo "\t\t<th scope='col'>Produkttitel</th>\n";
                    echo "\t\t<th scope='col>Autorenname</th>\n";
                    echo "\t</thead>\n";
                    while ($line = $result->fetch_assoc()) {
                        echo "\t<a href='detail.php?detailID=" . $line['ID'] > "<tr>\n";
                        echo "\t\t<td>" . $line['Produkttitel'] . "</td>\n";
                        echo "\t\t<td>" . $line['Autorenname'] . "</td>\n";
                        echo "\t</tr></a>\n";
                    }
                    echo "</table>\n";
                }
                $db_con->close();
                ?>
            </div>
            <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark fixed-right" style="width: 22.5%;">
                <span class="fs-4">
                    Aside
                </span>
                <hr>
                Test content on the side
                <hr>
            </div>
        </div>
    </main>
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item px-2 text-muted">
                s80350
            </li>
            <li class="nav-item px-2 text-muted">
                s80485
            </li>
            <li class="nav-item px-2 text-muted">
                <a class="text-muted" href="file:///Users/ruben/dev/ewa/book-shop/contact.html">Kontakt</a>
            </li>
        </ul>
        <p class="text-center text-muted">
            © HTW-Dresden
        </p>
    </footer>
</body>

</html>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abbruch</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <header class="d-flex p-3 bg-dark text-white justify-content-center">
        <ul class="nav nav-pills">
            <li>
                <h1>Buchgeschäfft der Gruppe G04</h1>
            </li>
        </ul>
    </header>
    <main class="bg-dark vh-100 text-white">
        <div class="container">
            <div class="d-flex flex-row justify-content-center">
                <div class="d-flex flex-column">
                    <h1>Bezahlung abgebrochen</h1>
                    <hr>
                    <p>Auf ihren Wunsch wurde die Bezahlung abgebrochen, bin zum nächsten mal.</p>
                    <p>
                        <?php
                        echo "Für Rückfragen, hier ihre Stripe-SessionID: " . $_GET['session_id'];
                        ?>
                    </p>
                    <hr>
                    <a href="ewa/g04/beleg" class="link-success">Zurück zum Shop</a>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>
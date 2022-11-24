<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
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
                                <button class="accordion-button collapsed text-white bg-dark" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#linkList" aria-expanded="false" aria-controls="linkList">
                                    Buchshop
                                </button>
                            </h2>
                        </div>
                        <div id="linkList" class="accordion-collapse collapse" aria-labelledby="bookShopHeader"
                            data-bs-parent="#bookShopNavList">
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
        <div class="flex-shrink-0 p-3 text-bg-dark fixed-right" style="width: 55%;">
            <h1 role="lead">
                Kontaktieren sie uns!
            </h1>
            <form>
                <div class="mb-3">
                    <label for="firstName" class="form-label">Vorname</label>
                    <input type="text" class="form-control" id="firstName" aria-describedby="firstNameHelp" min="2"
                        required>
                    <div id="firstNameHelp" class="form-text">Vornamen eingeben.</div>
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Nachname</label>
                    <input type="text" class="form-control" id="lastName" aria-describedby="lastNameHelp" min="2"
                        required>
                    <div id="lastNameHelp" class="form-text">Nachnamen eingeben.</div>
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label">Alter</label>
                    <input type="number" class="form-control" id="age" min="3" max="120">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-Mail</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">E-Mail damit wir Sie erreichen können.</div>
                </div>
                <div class="mb-3">
                    <label for="street" class="form-label">Straße</label>
                    <input type="text" class="form-control" id="street" max="50">
                </div>
                <div class="mb-3">
                    <label for="street" class="form-label">Ort</label>
                    <input type="text" class="form-control" id="street" max="50">
                </div>
                <div class="mb-3">
                    <label for="postCode" class="form-label">Postleitzahl</label>
                    <input type="text" class="form-control" id="postCode" max="50">
                </div>
                <div class="mb-3">
                    <label for="yourRequest" class="form-label">Anfrage</label>
                    <input type="text" class="form-control" id="yourRequest" max="100" spellcheck="true"
                        placeholder="Bitte geben sie hier ihre Anfrage an uns ein.">
                </div>
                <div class="mb-3">
                    <label for="userUrl" class="form-label">Nutzer-Url</label>
                    <input type="url" class="form-control" id="userUrl">
                </div>
                <div class="mb-3">
                    <label for="interestRange" class="form-label">Interesse an andere Produkten (0: kein Interesse, 10:
                        Größtes Interesse)</label>
                    <input type="range" class="form-control" id="interestRange" min="0" max="10" step="1" value="5">
                </div>
                <button type="submit" class="btn btn-primary">Absenden</button>
            </form>
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
    <footer class="py-3 my-4">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item px-2 text-muted">
                s80350
            </li>
            <li class="nav-item px-2 text-muted">
                s80485
            </li>
            <li class="nav-item px-2 text-muted">
                <a class="text-muted" href="#">Kontakt</a>
            </li>
        </ul>
        <p class="text-center text-muted">
            © HTW-Dresden
        </p>
    </footer>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<?php include './../components/head.php' ?>

<body>
    <?php include './../components/header.php' ?>
    <main>

        <div class="d-flex flex-row">
            <?php include './../components/sidebar.php' ?>
            <div class="flex-shrink-0 p-3 text-bg-dark fixed-right" style="width: 55%;">
                <h1 role="lead">
                    Kontaktieren sie uns!
                </h1>
                <form id="contact_form" method="POST">
                    <div class="mb-3">
                        <label for="firstName" class="form-label">Vorname</label>
                        <input type="text" class="form-control" id="firstName" aria-describedby="firstNameHelp" min="2" required>
                        <div id="firstNameHelp" class="form-text">Vornamen eingeben.</div>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Nachname</label>
                        <input type="text" class="form-control" id="lastName" aria-describedby="lastNameHelp" min="2" required>
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
                        <label for="ort" class="form-label">Ort</label>
                        <input type="text" class="form-control" id="ort" max="50">
                    </div>
                    <div class="mb-3">
                        <label for="postCode" class="form-label">Postleitzahl</label>
                        <input type="text" class="form-control" id="postCode" max="50" name="postCode" onkeyup="validatePostCode()">
                        <div class="alert alert-danger" hidden=True id="postCodeAlert">
                            Bitte eine korrekte Postleitzahl eingeben.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="yourRequest" class="form-label">Anfrage</label>
                        <input type="text" class="form-control" id="yourRequest" max="100" spellcheck="true" placeholder="Bitte geben sie hier ihre Anfrage an uns ein.">
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
            <div id="msg">

            </div>
            <?php include './../components/aside.php' ?>
        </div>
    </main>
    <?php include './../components/footer.php' ?>
</body>
<script>
    function isDEPostCode(code) {
        return (/^\d{5}$/.test(code) && (parseInt(code) >= 01001 && parseInt(code) <= 99998)) ? true : false;
    }

    function validatePostCode() {
        console.log("validateInput");
        let postCode = document.getElementById("postCode").value;
        let message = "";
        if (isDEPostCode(postCode)) {
            document.getElementById("postCodeAlert").hidden = true;
        } else {
            document.getElementById("postCodeAlert").hidden = false;
        }
    }
</script>

</html>
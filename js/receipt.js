function checkInputs() {
    let amount = document.getElementById('amount').value;
    let netto = document.getElementById('netto').value;
    let mwst = document.getElementById('mwst').value;

    if (validate(amount) && validate(netto) && validate(mwst)) {
        document.getElementById('warning').innerHTML = ""
    } else {
        document.getElementById('warning').innerHTML = "Negative Werte nicht erlaubt!"
    }
}

function calculateReceipt(amount, netto, mwst) {
    const wholeNetto = amount * netto;
    const wholeBrutto = wholeNetto * mwst;

    document.getElementById('receipt').innerHTML = "<hr>\n<div class='row'>Preis Netto " + wholeNetto + "€</div>\n<div class='row'> Preis Brutto " + wholeBrutto + "€</div>"
}

function validate(value) {
    return value > 0 ? true : false;
}
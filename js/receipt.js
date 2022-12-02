function checkInputs() {
    let amount = document.getElementById('amount').value;
    let netto = document.getElementById('netto').value;
    let mwst = document.getElementById('mwst').value;

    if (validate(amount) && validate(netto) && validate(mwst)) {
        document.getElementById('warning').innerHTML = ""
        calculateReceipt(amount, netto, mwst);
    } else {
        document.getElementById('warning').innerHTML = "Negative Werte nicht erlaubt!"
        document.getElementById('nettoResult').innerHTML = ""
        document.getElementById('bruttoResult').innerHTML = ""
    }
}

function calculateReceipt(amount, netto, mwst) {
    const formatter = new Intl.NumberFormat('de-DE', {
        style: 'currency',
        currency: 'EUR'
    });
    const wholeNetto = amount * netto;
    const wholeBrutto = (wholeNetto * (1 + mwst * 0.01)).toFixed(2);

    document.getElementById('nettoResult').innerHTML = "Netto: " + formatter.format(wholeNetto)
    document.getElementById('bruttoResult').innerHTML = "Brutto: " + formatter.format(wholeBrutto) + " mit " + mwst + "% MwSt"
}

function validate(value) {
    return value > 0 ? true : false;
}
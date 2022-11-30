const mouseover = document.getElementById('mouseoverElem');
mouseover.onmouseover = function () {
    mouseover.innerHTML = "MOUSE over";
}
mouseover.onmouseout = function () {
    mouseover.innerHTML = "Mouse over test";
}
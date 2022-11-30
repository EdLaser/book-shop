addEventListener("DOMContentLoaded", function () {

    document.addEventListener('resize', messen);
    messen();

    function messen() {
        document.getElementById('innerW').textContent = window.innerWidth + " px width";
        document.getElementById('innerH').textContent = window.innerHeight + " px hight";
        document.getElementById('outerW').textContent = window.outerWidth + " px width";
        document.getElementById('outerH').textContent = window.outerHeight + " px hight";
    }
});
function setTime() {
    let currentTime = new Date(),
        h = currentTime.getHours(),
        m = currentTime.getMinutes(),
        s = currentTime.getSeconds();
    m = setLeadingZero(m);
    s = setLeadingZero(s);
    document.getElementById('clock').innerHTML = h + ':' + m + ':' + s;
    setTimeout(setTime, 1000);
}
function setLeadingZero(time) {
    time = (time < 10 ? '0' : '') + time;
    return time;
}

export { setTime }
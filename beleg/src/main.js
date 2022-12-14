function setTime() {
    let currentTime = new Date(),
        h = currentTime.getHours(),
        m = currentTime.getMinutes(),
        s = currentTime.getSeconds();
    m = setLeadingZero(m);
    s = setLeadingZero(s);
    document.getElementById('time').innerHTML = h + ':' + m + ':' + s;
    setTimeout(setTime, 1000);
}
function setLeadingZero(time) {
    time = (time < 10 ? '0' : '') + time;
    return time;
}

new Vue({
    el: '#app',
    methods: {
        setTime
    }
});
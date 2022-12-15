<template>
    <h2 id="time">Time: {{ time }}</h2>
</template>

<script>
export default {
    data() {
        return {
            time: ""
        }
    },
    methods: {
        setTime() {
            setInterval(() => {
                this.calculateTime();
            }, 1000);
        },
        calculateTime() {
            let currentTime = new Date(),
                h = currentTime.getHours(),
                m = currentTime.getMinutes(),
                s = currentTime.getSeconds();
            m = this.setLeadingZero(m);
            s = this.setLeadingZero(s);
            let time = h + ':' + m + ':' + s;
            this.time = time
        },
        setLeadingZero(time) {
            time = (time < 10 ? '0' : '') + time;
            return time;
        }
    },
    mounted() {
        this.setTime();
    }
}
</script>
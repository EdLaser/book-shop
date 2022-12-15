<template>
    <h2 id="date" class="mx-2">Date: {{ date }}</h2>
</template>

<script>
export default {
    data() {
        return {
            date: ""
        }
    },
    methods: {
        setDate() {
            const date = new Date()
            let day = date.getDate();
            let month = date.getMonth();
            let year = date.getFullYear();

            this.date = `${day}.${month}.${year}`
        }
    },
    mounted() {
        this.setDate();
    }
}
</script>
<script setup>
import Date from './Date.vue';
import Time from './Time.vue';
</script>
<template>
    <div class="d-flex flex-row">
        <div class="d-flex flex-column text-bg-dark">
            <Date />
        </div>
        <div class="d-flex flex-column text-bg-dark">
            <Time />
        </div>
    </div>
</template>
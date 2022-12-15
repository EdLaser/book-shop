<script>
import Date from './Date.vue';
import Time from './Time.vue';
import BookGrid from './BookGrid.vue';

export default {
    components: {
    Date,
    Time,
    BookGrid
}
}
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
    <div class="d-flex flex-row">
        <div class="d-flex flex-column">
            <BookGrid />
        </div>
    </div>
</template>
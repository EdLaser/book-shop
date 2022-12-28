<script>
import BookShop from '../components/BookShop.vue';
import OrderOverViewComponent from '../components/OrderOverViewComponent.vue';
import Date from '../components/Date.vue';
import Time from '../components/Time.vue';

export default {
    components: {
        BookShop,
        OrderOverViewComponent,
        Date,
        Time
    }
}
</script>

<template>
    <main class="bg-dark vh-100">
        <div class="container">
            <div class="d-flex flex-row">
                <div class="d-flex flex-row">
                    <div class="d-flex flex-column text-bg-dark">
                        <Date />
                    </div>
                    <div class="d-flex flex-column text-bg-dark">
                        <Time />
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between">
                <div class="d-flex flex-column">
                    <BookShop />
                </div>
                <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark fixed-right" style="width: 40%">
                    <OrderOverViewComponent />
                </div>
            </div>
        </div>
    </main>
</template>
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
<style>
.sidenav {
    height: 100%;
    /* Full-height: remove this if you want "auto" height */
    width: 400px;
    /* Set the width of the sidebar */
    position: fixed;
    /* Fixed Sidebar (stay in place on scroll) */
    z-index: 1;
    /* Stay on top */
    top: 0;
    /* Stay at the top */
    right: 0;
    background-color: #212529;
    /* Black */
    overflow-x: hidden;
    /* Disable horizontal scroll */
    padding-top: 60px;
}
</style>
<template>
    <main class="bg-dark w-100">
        <div class="container bg-dark">
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
            <div class="d-flex flex-row justify-content-between w-75">
                <div class="d-flex flex-column">
                    <BookShop />
                </div>
                <div class="sidenav">
                    <OrderOverViewComponent />
                </div>
            </div>
        </div>
    </main>
</template>
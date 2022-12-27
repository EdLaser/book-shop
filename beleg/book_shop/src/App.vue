<script>
import { RouterLink, RouterView } from 'vue-router'
import BookShopView from './views/BookShopView.vue';
import OrderOverViewComponent from './components/OrderOverViewComponent.vue';

export default {
    components: {
    BookShopView,
    OrderOverViewComponent
}
}
</script>

<template>
    <header class="d-flex p-3 bg-dark text-white justify-content-center">
        <ul class="nav nav-pills">
            <li>
                <h1>Buchgeschäfft der Gruppe G04</h1>
            </li>
        </ul>
    </header>
    <main class="bg-dark vh-100">
        <div class="container">
            <div class="d-flex flex-row justify-content-between">
                <div class="d-flex flex-column">
                    <BookShopView />
                </div>
                <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark fixed-right" style="width: 40%">
                    <OrderOverViewComponent />
                </div>
            </div>
        </div>
    </main>

</template>
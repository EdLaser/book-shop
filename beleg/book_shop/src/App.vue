<script>
import { RouterLink, RouterView } from 'vue-router'
import BookShopView from './views/BookShopView.vue';

</script>

<template>
    <header class="d-flex p-3 bg-dark text-white justify-content-center">
        <ul class="nav nav-pills">
            <li>
                <h1>Buchgeschäfft der Gruppe G04</h1>
            </li>
        </ul>
    </header>
    <BookShopView />
</template>
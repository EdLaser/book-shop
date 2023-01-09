<script setup>
import BookItem from './BookItem.vue';
import { store } from './store';

</script>

<template>
    <div class="d-flex flex-row">
        <div class="d-flex flex-column">
            <form role="search" method="">
                <div class="row">
                    <div class="col">
                        <input class="form-control me-2" type="search" placeholder="Suche..." aria-label="Suche"
                            v-model="search">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="d-flex flex-row">
        <div class="row row-cols-2 bg-dark">
            <template v-for="book in filteredBooks">
                <div class="col">
                    <BookItem>
                        <template v-slot:image><img :src="book.LinkGrafikdatei" class="card-img-top"
                                :alt="book.Produkttitel + ' Cover'"></template>
                        <template v-slot:bookName>{{ book.Produkttitel }}</template>
                        <template v-slot:stock>{{ book.Lagerbestand }}</template>
                        <template v-slot:price>{{ book.PreisNetto }}</template>
                        <template v-slot:description>{{ book.Kurzinhalt }}</template>
                        <template v-slot:button>
                            <button @click="addToOrder(book)" class="btn btn-success">Bestellen</button>
                        </template>
                        <template v-slot:warning v-if="book.Lagerbestand === 0">Sold out!</template>
                    </BookItem>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
// import data from '../assets/books.json'
// import axios from 'axios';

export default {
    data() {
        return {
            books: [],
            search: "",
            store
        }
    },
    methods: {
        addToOrder(book) {
            let item = store.order.find(item => item.title === book.Produkttitel);
            if (item) {
                item.count += 1;
                store.bookAmount += item.count
            } else {
                store.order.push({ "title": book.Produkttitel, "count": 1, "price": parseFloat(book.PreisNetto) });
                store.bookAmount += 1
            }
        },
        async fetchBooks() {
            await fetch('./helpers/fetch-books.php')
                .then((response) => response.json())
                .then((data) => {
                    this.books = data;
                })

        }
    },
    computed: {
        filteredBooks() {
            return this.books.filter(book => {
                return book.Produkttitel.toLowerCase().indexOf(this.search.toLowerCase()) != -1;
            })
        }
    },
    mounted() {
        this.fetchBooks();
    }
}
</script>
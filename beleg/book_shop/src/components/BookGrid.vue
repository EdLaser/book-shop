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
        <div class="d-flex flex-column">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Produktname</th>
                        <th scope="col">Lagerbestand</th>
                        <th scope="col">Preis</th>
                    </tr>
                </thead>
                <tbody>
                    <template v-for="book in filteredBooks">
                        <BookItem>
                            <template v-slot:bookName>{{ book.Produkttitel }}</template>
                            <template v-slot:stock>{{ book.Lagerbestand }}</template>
                            <template v-slot:price>{{ book.PreisNetto }}</template>
                            <template v-slot:buttons>
                                <div class="btn-group">
                                    <button @click="addToOrder(book)" class="btn btn-success">Bestellen</button>
                                </div>
                            </template>
                            <template v-slot:warning v-if="book.Lagerbestand === 0">Sold out!</template>
                        </BookItem>
                    </template>
                </tbody>
            </table>
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
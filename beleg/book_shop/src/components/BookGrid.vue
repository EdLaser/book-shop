<script setup>
import BookItem from './BookItem.vue';
import { store } from './store';

</script>

<template>
    <div class="d-flex flex-row">
        <div class="d-flex flex-column">
            <form role="search" method="">
                <div class="row mb-2">
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
                <div class="col my-3">
                    <BookItem>
                        <template v-slot:image><img :src="book.LinkGrafikdatei" style="width: 50%; height: 50%;" class="card-img-top"
                                :alt="book.Produkttitel + ' Cover'"></template>
                        <template v-slot:bookName>{{ book.Produkttitel }}</template>
                        <template v-slot:stock>{{ book.Lagerbestand }}</template>
                        <template v-slot:price>{{ book.PreisNetto }}</template>
                        <template v-slot:description>{{ book.Kurzinhalt }}</template>
                        <template v-slot:button>
                            <button @click="addToOrder(book)" class="btn btn-success">Bestellen</button>
                        </template>
                        <template v-slot:warning v-if="book.Lagerbestand === 0"><p class="text-danger">Ausverkauft!</p></template>
                    </BookItem>
                </div>
            </template>
        </div>
    </div>
</template>

<script>
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
            if (book.Lagerbestand > 0) {
                let item = store.order.find(item => item.title === book.Produkttitel);
                if (item) {
                    item.count += 1;
                    store.bookAmount += item.count
                    book.Lagerbestand--
                } else {
                    store.order.push({ "title": book.Produkttitel, "count": 1, "price": parseFloat(book.PreisNetto) });
                    store.bookAmount += 1
                    book.Lagerbestand--
                }
            }
        },
        async fetchBooks() {
            await fetch('./helpers/fetch-books.php')
                .then((response) => response.json())
                .then((data) => {
                    this.books = data;
                    store.books = data
                })

        }
    },
    computed: {
        filteredBooks() {
            return store.books.filter(book => {
                return book.Produkttitel.toLowerCase().indexOf(this.search.toLowerCase()) != -1;
            })
        }
    },
    mounted() {
        this.fetchBooks();
    }
}
</script>
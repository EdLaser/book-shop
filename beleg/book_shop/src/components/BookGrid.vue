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
                        <th scope="col">Anzahl</th>
                    </tr>
                </thead>
                <tbody>
                    <template v-for="book in filteredBooks">
                        <BookItem>
                            <template v-slot:bookName>{{ book.Produkttitel }}</template>
                            <template v-slot:amount>{{ book.Lagerbestand }}</template>
                            <template v-slot:buttons>
                                <div class="btn-group">
                                    <button @click="addToOrder(book)" class="btn btn-success">Bestellen</button>
                                    <button @click="decrease(book)" class="btn btn-danger">-</button>
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
// let xmlhttp = new XMLHttpRequest();
// xmlhttp.open("GET", "../../fetch_books.php");
// xmlhttp.addEventListener('load', function() {
//     console.log(xmlhttp.responseText);
// });
// xmlhttp.send();
import data from '../../books.json'

export default {
    data() {
        return {
            books: data,
            search: ""
        }
    },
    methods: {
        addToOrder(book) {
            let item = store.order.find(item => item.title === book.Produkttitel);
            item ? item.count += 1 : store.order.push({ "title": book.Produkttitel, "count": 1, "price": parseFloat(book.PreisNetto) });
        },
        decrease(book) {
            book.Lagerbestand > 0 ? book.Lagerbestand -= 1 : book.Lagerbestand = 0;
        }
    },
    computed: {
        filteredBooks() {
            return this.books.filter(book => {
                return book.Produkttitel.toLowerCase().indexOf(this.search.toLowerCase()) != -1;
            })
        }
    }
}
</script>
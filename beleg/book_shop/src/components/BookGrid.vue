<script setup>
import BookItem from './BookItem.vue';
</script>

<template>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Produktname</th>
                <th scope="col">Anzahl</th>
            </tr>
        </thead>
        <tbody>
            <template v-for="book in books">
                <BookItem>
                    <template v-slot:bookName>{{ book.Produkttitel }}</template>
                    <template v-slot:amount>{{ book.Lagerbestand }}</template>
                    <template v-slot:buttons>
                        <div class="btn-group">
                            <button @click="increase(book)" class="btn btn-success">+</button>
                            <button @click="decrease(book)" class="btn btn-danger">-</button>
                        </div>
                    </template>
                    <template v-slot:warning v-if="book.amount === 0">Sold out!</template>
                </BookItem>
            </template>
        </tbody>
    </table>
</template>

<script>
// let xmlhttp = new XMLHttpRequest();
// xmlhttp.open("GET", "../../fetch_books.php");
// xmlhttp.addEventListener('load', function() {
//     console.log(xmlhttp.responseText);
// });
// xmlhttp.send();
import data from '../../books.json'
console.log(data)
export default {
    data() {
        return {
            books: data
        }
    },
    methods: {
        increase(book) {
            book.amount += 1;
        },
        decrease(book) {
            book.amount > 0 ? book.amount -= 1 : book.amount = 0;
        }
    }
}
</script>
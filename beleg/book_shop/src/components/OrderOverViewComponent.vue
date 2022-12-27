<script>
import { store } from './store';

export default {
    data() {
        return {
            amountOfBooks: 0,
            price: 0
        }
    },
    computed: {
        order() {
            return store.order;
        },
        orderItems() {
            return store.order.length
        }
    },
    methods: {
        showOrder() {
            return store.order;
        },
        calcAmountOfBooks() {
            let amountOfBooks = 0;
            for (item in this.showOrder) {
                amountOfBooks += item.count;
            }
            console.log(amountOfBooks)
            this.amountOfBooks = amount;
        },
        sumPrice() {
            let price = 0;
            for (item in this.showOrder) {
                price += item.price;
            }
            this.price = price
            console.log(this.price)
        }
    },
    watch: {
        order() {
            this.sumPrice();
            this.calcAmountOfBooks();
        },
    }
}
</script>

<template>
    <span class="fs-4">
        Betsellübersicht
    </span>
    <hr>
    <table class="table table-dark table-hover">
        <thead>
            <th scope="col">
            <td>#</td>
            </th>
            <th scope="col">
            <td>Titel</td>
            </th>
            <th scope="col">
            <td>Anzahl</td>
            </th>
        </thead>
        <tbody v-if="orderItems > 0">
            <tr v-for="(orderItem, index) in order">
                <td>
                    {{ index + 1 }}
                </td>
                <td>
                    {{ orderItem.title }}
                </td>
                <td>
                    {{ orderItem.count }}
                </td>
            </tr>
        </tbody>
    </table>
    <div class="row">
        <div class="col"><span>Anzahl Bücher: {{ this.amountOfBooks }}</span></div>
        <div class="col"><span>Preis: {{ this.price }}</span></div>
    </div>
    <hr>
</template>
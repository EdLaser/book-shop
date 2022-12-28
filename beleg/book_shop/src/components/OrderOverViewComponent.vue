<script>
import { store } from './store';

export default {
    data() {
        return {
            price: ""
        }
    },
    computed: {
        order() {
            return store.order;
        },
        orderItems() {
            return store.order.length
        },
        bookAmount() {
            return store.bookAmount;
        }
    },
    methods: {
        showOrder() {
            return store.order;
        },
        sumPrice() {
            let price = 0;
            for (let item of this.order) {
                price += item.price * item.count, 2;
            }
            this.price = price.toFixed(2)
        }
    },
    watch: {
        bookAmount() {
            this.sumPrice();
        },
    }
}
</script>

<template>
    <span class="fs-4">
        Bestellübersicht
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
        <div class="col"><span>Anzahl Bücher: {{ this.bookAmount }}</span></div>
        <div class="col"><span>Preis: {{ this.price }} €</span></div>
    </div>
    <hr>
</template>
<script>
import { store } from './store';

export default {
    computed: {
        order() {
            return store.order;
        },
        orderItems() {
            return store.order.length
        },
        amountOfBooks() {
            let amountOfBooks = 0;
            console.log(this.order)
            // for (orderItem in this.order) {
            //     amountOfBooks += orderItem.count;
            // }
            return amountOfBooks;
        }
    },
    watch: {
        order() { console.log(store.order) },
        orderItems() { console.log(store.order.length) }
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
            <th scope="col"><td>#</td></th>
            
            <th scope="col"><td>Titel</td></th>
            <th scope="col"><td>Anzahl</td></th>
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
        <div class="col"><span>Anzahl Bücher: {{ amountOfBooks }}</span></div>
        <div class="col"><span>Preis: </span></div>
    </div>
    <hr>
</template>
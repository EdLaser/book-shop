<script>
import { store } from './store';

export default {
    data() {
        return {
            domain: "http://localhost:5173",
            store
        }
    },
    computed: {
        bookAmount() {
            let amount = 0;
            for (let book of store.order) {
                amount += book.count;
            }
            return amount
        },
        sumPrice() {
            let price = 0;
            for (let item of store.order) {
                item.count < 1 ? store.order = this.removeByTitle(item.title) : null;
                price += item.price * item.count;
            }
            return price.toFixed(2)
        }
    }
}
// res.redirect(303, session.url);
</script>
<template>
    <main class="bg-dark vh-100">
        <div class="container">
            <div class="d-flex flex-row">
                <span class="fs-4">
                    Bestellübersicht
                </span>
                <hr>
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titel</th>
                            <th scope="col">Anzahl</th>
                            <th scope="col">Preis</th>
                        </tr>
                    </thead>
                    <tbody v-if="store.order.length > 0">
                        <tr v-for="(orderItem, index) in store.order">
                            <td>
                                {{ index + 1 }}
                            </td>
                            <td>
                                {{ orderItem.title }}
                            </td>
                            <td>
                                {{ orderItem.count }}
                            </td>
                            <td>
                                {{ orderItem.price }} €
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col"><span>Anzahl Bücher: {{ this.bookAmount }}</span></div>
                    <div class="col"><span>Preis: {{ this.sumPrice }} €</span></div>
                </div>
                <hr>
            </div>
            <div class="d-flex flex-row">
                <div>Wir testen das Checkout</div>
                <form action="">
                    <button type="button" class="btn btn-success" @click="console.log(store.order)">Test
                        Checkout</button>
                </form>
            </div>
        </div>
    </main>
</template>
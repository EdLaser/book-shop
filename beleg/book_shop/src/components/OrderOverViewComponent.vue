<template>
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
                <th scope="col"></th>
                <th scope="col">Preis</th>
            </tr>
        </thead>
        <template v-if="orderLength > 0">
            <tbody>
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
                        <div class="btn-group-vertical btn-group-sm" role="group">
                            <button @click="addToOrder(orderItem.title)" class="btn btn-success">+</button>
                            <button @click="decrease(orderItem.title)" type="button" class="btn btn-danger">-</button>
                        </div>
                    </td>
                    <td>
                        {{ orderItem.price }} €
                    </td>
                    <td>
                        <button type="button" class="btn btn-secondary" @click="removeByTitle(orderItem.title)"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash" viewBox="0 0 16 16">
                                <path
                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd"
                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg></button>
                    </td>
                </tr>
            </tbody>
        </template>
    </table>
    <div class="row">
        <div class="col"><span>Anzahl Bücher: {{ this.bookAmount }}</span></div>
        <div class="col"><span>Preis: {{ this.sumPrice }} €</span></div>
    </div>
    <hr>
    <template v-if="orderLength > 0">
        <button type="button" class="btn btn-success" @click="this.doCheckout()">Bestellung abschließen</button>
    </template>
    <hr>
    <div>{{ this.sessionID }}</div>
</template>
<script>
import { store } from './store';

export default {
    data() {
        return {
            price: "",
            store,
            sessionID: ""
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
            if (this.orderLength > 0) {
                for (let item of store.order) {
                    item.count < 1 ? 0 : price += item.price * item.count;;
                    price += item.price * item.count;
                }
                return price.toFixed(2)
            }
        },
        orderLength() {
            let length = 0;
            typeof store.order === "undefined" ? length = 0 : length = store.order.length
            return length
        }
    },
    methods: {
        decrease(title) {
            let item = store.order.find(item => item.title === title);
            item.count > 1 ? item.count-- : store.order = this.removeByTitle(title);
        },
        addToOrder(title) {
            let item = store.order.find(item => item.title === title);
            if (item) {
                item.count += 1;
                store.bookAmount += item.count
            } else {
                store.order.push({ "title": book.Produkttitel, "count": 1, "price": parseFloat(book.PreisNetto) });
                store.bookAmount += 1
            }
        },
        removeByTitle(title) {
            if (typeof store.order === 'undefined') {
                store.order = new Array(0)
            } else {
                return store.order.filter(item => item.title !== title)
            }
        },
        doCheckout() {
            var stripe = Stripe('pk_test_51MJx9SKHP5yCVcwpXnsPxNDUzEwIRyrd9h4NKwOXEbsKPG9mho3yI40mAT8A9e4h0AtB6u4RY9EnhfUBBCyY3CZ300Uy1xtSF8');
            let booksInOrder = []
            for (let book of store.order) {
                booksInOrder.push({ 'title': book.title, 'amount': book.count })
            }
            fetch('./helpers/create-checkout.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(booksInOrder)
            }).catch((error) => {
                console.error(error)
            }).then(response => response.text()).then(data => {
                stripe.redirectToCheckout({
                    sessionId: data
                }).then(function (result) { })
            })

        }
    }
}
</script>
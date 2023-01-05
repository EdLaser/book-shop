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
                    <input class="form-control" type="number" v-model="orderItem.count">
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
    </table>
    <div class="row">
        <div class="col"><span>Anzahl Bücher: {{ this.bookAmount }}</span></div>
        <div class="col"><span>Preis: {{ this.sumPrice }} €</span></div>
    </div>
    <hr>
    <template v-if="store.order.length > 0">
        <form :action=this.checkOutString>
            <button type="submit" class="btn btn-success">Bestellung abschließen</button>
        </form>
    </template>
    <hr>
</template>
<script>
import { store } from './store';

export default {
    data() {
        return {
            price: "",
            store
        }
    },
    computed: {
        checkOutString() {
            // ?
            const whiteAsReg = /\s/g
            const base = "create-checkout.php";
            return `${base}?${store.order[0].title}=${store.order[0].count}`.replace(whiteAsReg, "%20")
        },
        bookAmount() {
            let amount = 0;
            for (let book of store.order) {
                amount += book.count;
            }
            return amount
        },
        sumPrice() {
            let price = 0;
            if(store.order.length > 0) {
                for (let item of store.order) {
                    item.count < 1 ? store.order = this.removeByTitle(item.title) : store.order;
                    price += item.price * item.count;
                }
                return price.toFixed(2)
            }
        }
    },
    methods: {
        removeByTitle(title) {
            store.order = store.order.filter(item => item.title !== title)
            console.log(store)
        }
    }
}
</script>
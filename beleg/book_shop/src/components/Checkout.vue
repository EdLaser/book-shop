<script>
import axios from 'axios';

export default {
    data() {
        return {
            domain: "http://localhost:5173"
        }
    },
    methods: {
        async doCheckout() {
            const stripe = require('stripe')('sk_test_51MJx9SKHP5yCVcwp7iFbuCxnTb8cuyDxV7fCEeOC1eEb4ApA4D68ARdxevWIps2jKhtQ0lDpk38D8ZMWMnUbQDyc00zfn8DSjt');
            const session = await stripe.checkout.sessions.create({
                line_items: [
                    {
                        // Provide the exact Price ID (for example, pr_1234) of the product you want to sell
                        price: '{{PRICE_ID}}',
                        quantity: 1,
                    },
                ],
                mode: 'payment',
                success_url: `${this.domain}/success.html`,
                cancel_url: `${this.domain}/cancel.html`,
            });
            console.log(session);
        }
    }
}
// res.redirect(303, session.url);
</script>
<template>
    <div>Wir testen das Checkout</div>
    <button type="button" @click="this.doCheckout()">Test Checkout</button>
</template>
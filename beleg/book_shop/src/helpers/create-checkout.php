<?php

require '../helpers/stripe-php-10.3.0/init.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51MJx9SKHP5yCVcwp7iFbuCxnTb8cuyDxV7fCEeOC1eEb4ApA4D68ARdxevWIps2jKhtQ0lDpk38D8ZMWMnUbQDyc00zfn8DSjt');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost:5137/';

echo "$_GET";

$checkout_session = \Stripe\Checkout\Session::create([
    'line_items' => [
        ['price' => 1000, 'quantity' => 1, ]
    ],
    'mode' => 'payment',
    'success_url' => $YOUR_DOMAIN . '/success',
    'cancel_url' => $YOUR_DOMAIN . '/cancel',
]);
return $checkout_session
?>


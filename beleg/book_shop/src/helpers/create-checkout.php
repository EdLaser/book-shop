<?php


$BOOK_MAPPING = [
    'Das Schweigen der Manus' => 'price_1MN0eIKHP5yCVcwpTJNwpFHF', 
    'PHP für Dumme' => 'price_1MMuIlKHP5yCVcwpTr3uP2qV', 
    'Docker ist auch nur ein Wal' => 'price_1MMuJJKHP5yCVcwpYEDJQ0DR'
];

require '../helpers/stripe-php-10.3.0/init.php';
// This is your test secret API key.
\Stripe\Stripe::setApiKey('sk_test_51MJx9SKHP5yCVcwp7iFbuCxnTb8cuyDxV7fCEeOC1eEb4ApA4D68ARdxevWIps2jKhtQ0lDpk38D8ZMWMnUbQDyc00zfn8DSjt');

$YOUR_DOMAIN = 'https://ivm108.informatik.htw-dresden.de/ewa/g04/beleg/';

$data = file_get_contents('php://input');
$order = [];
$json_data = json_decode($data, true);

foreach($json_data as $val) {
    if(array_key_exists($val['title'], $BOOK_MAPPING)) {
        array_push($order, ['price' => $BOOK_MAPPING[$val['title']], 'quantity' => $val['amount']]);
    }
}

$checkout_session = \Stripe\Checkout\Session::create([
    'line_items' => [
        [$order]
    ],
    'mode' => 'payment',
    'success_url' => $YOUR_DOMAIN . 'success.php?session_id={CHECKOUT_SESSION_ID}',
    'cancel_url' => $YOUR_DOMAIN . 'cancel.php?session_id={CHECKOUT_SESSION_ID}'
]);
$checkout_session_id = $checkout_session->id;
echo $checkout_session_id;
?>
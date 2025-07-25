<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../config');
$dotenv->load();

$sk = $_ENV['SK'];

$stripe = new \Stripe\StripeClient($_ENV['SK']);
\Stripe\Stripe::setApiKey($_ENV['SK']);

function calculateOrderAmount(int $amount): int {
    // Replace this constant with a calculation of the order's amount
    // Calculate the order total on the server to prevent
    // people from directly manipulating the amount on the client
    $safeAmount = htmlspecialchars($amount);
    $safeAmount = $safeAmount*100;
    return $safeAmount;
}

header('Content-Type: application/json');

try {
    // retrieve JSON from POST body
    $jsonStr = file_get_contents('php://input');
    $jsonObj = json_decode($jsonStr);

    // TODO : Create a PaymentIntent with amount and currency in '$paymentIntent'
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => calculateOrderAmount($jsonObj->amount),
        'currency' => 'eur'
        ]);

    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];

    echo json_encode($output);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}


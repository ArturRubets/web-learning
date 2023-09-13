<?php
require_once '../../vendor/autoload.php';
require_once '../../config/secrets.php';

session_start();

\Stripe\Stripe::setApiKey($stripeSecretKey);

// Calculation of the order amount
function calculateOrderAmount(array $items): int
{
    $total = 0;

    foreach ($items as $item) {
        $price = $item->price;
        $quantity = $item->quantity;
        $subtotal = $price * $quantity;
        $total += $subtotal;
    }

    return $total;
}

header('Content-Type: application/json');

try {
    // Retrieve JSON from POST body
    $jsonStr = file_get_contents('php://input');
    $jsonObj = json_decode($jsonStr);

    // Create a PaymentIntent with amount and currency
    $paymentIntent = \Stripe\PaymentIntent::create([
        'amount' => calculateOrderAmount($jsonObj->items),
        'currency' => 'usd',
        "description" => "Intro To React Course",
        'automatic_payment_methods' => [
            'enabled' => true,
        ],
    ]);

    $stripe = new \Stripe\StripeClient($stripeSecretKey);
    $customer = $stripe->customers->create(
        [
            'email' => 'jenny.rosen@example.com',
            'payment_method' => 'pm_card_visa',
            'invoice_settings' => ['default_payment_method' => 'pm_card_visa'],
        ]
    );

    $_SESSION['customer'] = $customer;

    $_SESSION['paymentIntent'] = $paymentIntent;

    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];

    echo json_encode($output);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}

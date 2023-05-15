<?php

require_once '../../vendor/autoload.php';
require_once '../../config/secrets.php';

require_once('../../config/db.php');
require_once('../../lib/pdo_db.php');
require_once('../models/Transaction.php');

\Stripe\Stripe::setApiKey($stripeSecretKey);

session_start();

$paymentIntent = $_SESSION['paymentIntent'];
$customer = $_SESSION['customer'];
$paymentIntentId = $paymentIntent->id;
$customerId = $customer->id;
$description = $paymentIntent->description;
$amount = $paymentIntent->amount;
$currency = $paymentIntent->currency;
$status = $paymentIntent->status;

// Transaction Data
$transactionData = [
    'id' => $paymentIntentId,
    'customer_id' => $customerId,
    'product' => $description,
    'amount' => $amount,
    'currency' => $currency,
    'status' => $status,
];

// Instantiate Transaction
$transaction = new Transaction();

// Add Transaction To DB
$transaction->addTransaction($transactionData);

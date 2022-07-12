<?php

session_start();

require_once __DIR__.'/../functions/alerts.php';
require_once __DIR__.'/../functions/products.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    set_alert('alert alert-danger', 'Method Not Allowed.');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

if (!$_POST['customer_name'] || !$_POST['customer_phone'] || !$_POST['customer_email']) {
    set_alert('alert alert-danger', 'Customer Name, Phone, Email are required!');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

$customerName = trim($_POST['customer_name']);
$customerPhone = trim($_POST['customer_phone']);
$customerEmail = trim($_POST['customer_email']);
$sessionProductIds = $_SESSION['product_ids'];


if (!filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
    set_alert('alert alert-danger', 'Invalid e-mail address!');
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}

if (!$sessionProductIds) {
    set_alert('alert alert-danger', 'Your cart is empty!');
    header('Location: ../index.php');
    exit;
}

$order_message = create_order($sessionProductIds, $customerName, $customerPhone, $customerEmail);

if ($order_message != 'success') {
    set_alert('alert alert-danger', 'Something went wrong. Error: ' . $order_message);
    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit;
}

unset($_SESSION['product_ids']);

header('Location: ../checkout-success.php');

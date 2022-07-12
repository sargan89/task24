<?php

session_start();

require_once __DIR__.'/../functions/alerts.php';
require_once __DIR__.'/../functions/products.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    exit('Method Not Allowed.');
}

if (!$_POST['product_id']) {
    set_alert('alert alert-danger', 'Product Id is required.');
    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit;
}

$productId = trim($_POST['product_id']);

$product = get_product($productId);

$productName = $product['name'];
$productImage = $product['image'];
$productPrice = $product['price'];

$sessionProductId = $_SESSION['product_ids'][$productId];

if (!$sessionProductId) {
    $_SESSION['product_ids'][$productId] = [
        'name' => $productName,
        'image' => $productImage,
        'price' => $productPrice,
        'qty' => 1,
    ];
} else {
    $oldQty = $_SESSION['product_ids'][$productId]['qty'];

    $_SESSION['product_ids'][$productId] = [
        'name' => $productName,
        'image' => $productImage,
        'price' => $productPrice,
        'qty' => $oldQty + 1,
    ];
}

$message = 'You have added the product "' . $productName . '" to your cart.';

set_alert('alert alert-success', $message);

header('Location: '.$_SERVER['HTTP_REFERER']);

exit();

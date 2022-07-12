<?php

session_start();

require_once __DIR__.'/../functions/products.php';

/**
 * @var string $_title
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $_title; ?></title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<div class="main mt-3">
    <div class="container mb-5">
        <div class="row">
            <div class="col-12 col-sm-5">
                <a class="logo" href="index.php">
                    <img src="images/logo.jpeg" alt="Logo" width=200>
                </a>
            </div>
            <div class="col-12 col-sm-3 site-name mt-5">
                <span>Notebook store</span>
            </div>
            <?php if (isset($_SESSION['product_ids'])): ?>
                <?php $productCount = get_count_cart_products($_SESSION['product_ids']); ?>
                <div class="col-12 col-sm-4  minicart text-sm-end mt-5">
                    <p class="text-secondary">You have <?php echo $productCount ?> products in your cart</p>
                    <p><a href="checkout.php" class="btn btn-success text-right">Go to Checkout</a></p>
                </div>
            <?php else: ?>
                <div class="col-12 col-sm-4 minicart text-sm-end mt-5">
                    <p class="text-secondary">Your cart is empty.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php require __DIR__.'/alerts.php'; ?>

<?php

session_start();

require_once __DIR__.'/../functions/alerts.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    set_alert('alert alert-danger', 'Method not allowed!');
    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit;
}

unset($_SESSION['product_ids']);

set_alert('alert alert-success', 'Your cart is empty.');

header('Location: ../index.php');

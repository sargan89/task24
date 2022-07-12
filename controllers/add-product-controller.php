<?php

session_start();

require_once __DIR__.'/../functions/database.php';
require_once __DIR__ . '/../functions/alerts.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    set_alert('alert alert-danger', 'Method Not Allowed.');
    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit;
}

if (!$_POST['name'] || !$_FILES['image'] || !$_POST['price']) {
    set_alert('alert alert-danger', 'Name, image and price are required!');
    header('Location: '.$_SERVER['HTTP_REFERER']);
    exit;
}

$name = trim($_POST['name']);
$image = $_FILES['image'];
$price = trim($_POST['price']);

$uploadFilePath = $_FILES['image']['name'];

$uploadFileLocalPath = dirname(__DIR__).'/storage/'.$_FILES['image']['name'];

move_uploaded_file($_FILES['image']['tmp_name'], $uploadFileLocalPath);

$connection = get_database_connection();

$statement = $connection->prepare(
    'INSERT INTO `products` (`name`, `image`, `price`) VALUES (:name, :image, :price)'
);

$statement->execute([
    'name' => $name,
    'image' => $uploadFilePath,
    'price' => $price
]);

$message = 'You have created the product "' . $name . '"';

set_alert('alert alert-success', $message);

header('Location: '.$_SERVER['HTTP_REFERER']);

exit();

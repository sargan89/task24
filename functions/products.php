<?php

require_once __DIR__.'/database.php';

function get_products(int $limit, int $offset = 0): array
{
    $connection = get_database_connection();

    $statement = $connection->prepare(
        'SELECT * FROM `products` ORDER BY `id` DESC LIMIT :offset, :limit'
    );

    $statement->execute(compact('offset', 'limit'));

    return $statement->fetchAll();
}

function count_products(): int
{
    $connection = get_database_connection();

    $statement = $connection->prepare(
        'SELECT COUNT(*) AS products_count FROM `products`'
    );

    $statement->execute();

    return (int) $statement->fetch()['products_count'];
}

function get_product(int $id): array
{
    $connection = get_database_connection();

    $statement = $connection->prepare(
        'SELECT * FROM `products` WHERE `id` = :id'
    );

    $statement->execute(['id' => $id]);

    $product = $statement->fetch();

    return !empty($product) ? $product : [];
}

function get_count_cart_products(array $products): int
{
    $qtyArr = [];
    foreach ($products as $product) {
        $qtyArr[] = $product['qty'];
    }
    return array_sum($qtyArr);
}

function get_total_price(array $products): int
{
    $priceArr = [];
    foreach ($products as $product) {
        $priceArr[] = $product['price'] * $product['qty'];
    }
    return array_sum($priceArr);
}

function create_order(array $products, string $customerName, string $customerPhone, string $customerEmail): string
{
    $result = 'success';

    try {
        $connection = get_database_connection();

        //Create new order
        $statement = $connection->prepare(
         'INSERT INTO `orders` (`customer_name`, `customer_phone`, `customer_email`) 
                VALUES (:name, :phone, :email)'
        );
        $statement->execute([
            'name' => $customerName,
            'phone' => $customerPhone,
            'email' => $customerEmail
        ]);
        $statement->fetch();

        //Get last order_id
        $statement = $connection->prepare(
            'SELECT * FROM `orders` ORDER BY `id` DESC LIMIT 1'
        );
        $statement->execute();
        $order = $statement->fetch();
        $orderId = $order['id'];

        //Create order items
        foreach ($products as $id => $product) {
            $statement = $connection->prepare(
                'INSERT INTO `order_items` (`order_id`, `product_id`, `product_count`) 
                VALUES (:order_id, :product_id, :product_count)'
            );
            $statement->execute([
                'order_id' => $orderId,
                'product_id' => $id,
                'product_count' => $product['qty']
            ]);
            $statement->fetch();
        }
    } catch (Exception $e) {
        $result = $e->getMessage();
    }

    return $result;
}
<?php

require_once __DIR__.'/functions/products.php';
require_once __DIR__.'/functions/template.php';

$id = (int) ($_GET['id'] ?? '');
if (!$id) {
    http_response_code(404);
    exit;
}
$product = get_product($id);
if (empty($product)) {
    http_response_code(404);
    exit;
}
$productName = $product['name'];
$productImage = $product['image'];
$productPrice = $product['price'];
?>

<?php get_header($product['name']); ?>

<div class="container mb-5">
    <div class="row">
        <div class="col-lg-12 col-xl-7">
            <img src="storage/<?php echo $productImage; ?>" width="600" alt="<?php echo $productName; ?>"/>
        </div>
        <div class="col-lg-12 col-xl-5 add-product-link mt-2">
            <h1 class="mb-4"><?php echo $productName; ?></h1>
            <h2 class="product-price mb-4"><?php echo $productPrice; ?> ₴</h2>
            <form action="controllers/add-to-cart-controller.php" method="post">
                <fieldset>
                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                    <button class="btn btn-success btn-lg add-to-cart" type="submit">Add To Cart</button>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<?php get_footer(); ?>

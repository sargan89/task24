<?php
require_once __DIR__.'/functions/template.php';
require_once __DIR__.'/functions/products.php';
?>

<?php get_header('Checkout Page'); ?>

<?php
if (!$_SESSION['product_ids']) {
    set_alert('alert alert-warning', 'Cart is empty!');
    header('Location: index.php');
}
$products = $_SESSION['product_ids'];
$countCartProducts = get_count_cart_products($products);
$totalPrice = get_total_price($products);
$productsJson = json_encode($products);
?>

<div class="container mb-5">
    <h4 class="mt-5 mb-2"><strong>Products</strong></h4>

    <table class="table text-sm-center">
        <thead class="thead-light">
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Qty</th>
            <th scope="col">Price</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $id => $product): ?>
            <?php
            $productName = $product['name'];
            $productQty = $product['qty'];
            ?>
            <tr>
                <td>
                    <a href="product.php?id=<?php echo $id; ?>">
                        <img src="storage/<?php echo $product['image']; ?>" alt="<?php echo $productName; ?>" width="80">
                    </a>
                </td>
                <td><a class="text-decoration-none" href="product.php?id=<?php echo $id; ?>"><?php echo $productName; ?></a></td>
                <td><?php echo $productQty; ?></td>
                <td><?php echo $product['price']; ?> ₴</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <form class="mb-5 text-sm-end" action="controllers/clear-cart-controller.php" method="post">
        <fieldset>
            <button class="btn btn-info" type="submit">Clear Cart</button>
        </fieldset>
    </form>

    <form action="controllers/checkout-controller.php" method="post">
        <fieldset>
            <div class="row">
                <div class="col-12 col-sm-8">
                    <h4>Your contact details</h4>
                    <label class="col-form-label required" for="customer-name">Name</label>
                    <input type="text" name="customer_name" class="form-control" id="customer-name" required>

                    <label class="col-form-label" for="customer-phone">Phone (example: 0991234567)</label>
                    <input type="tel" name="customer_phone" pattern="[0-9]{10}" class="form-control" id="customer-phone" required>

                    <label class="col-form-label" for="customer-email">Email</label>
                    <input type="email" name="customer_email" class="form-control" id="customer-email" required>
                </div>
                <div class="col-12 col-sm-4 mt-3 px-4 bg-light bg-gradient rounded-3 p-3">
                    <p class="text-uppercase mt-4 mb-4"><strong>Order Summary</strong></p>
                    <div class="row">
                        <div class="col-9">
                            Number of products:
                        </div>
                        <div class="col-3 text-sm-end">
                            <?php echo $countCartProducts; ?>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-6">
                            Total Price:
                        </div>
                        <div class="col-6 text-sm-end">
                            <strong class="fs-5"><?php echo $totalPrice; ?> ₴</strong>
                        </div>
                    </div>
                    <button class="mt-5 btn btn-success btn-lg w-100 add-to-cart" type="submit">Place Order</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>

<?php get_footer(); ?>

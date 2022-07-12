<?php
require_once __DIR__.'/functions/products.php';
require_once __DIR__.'/functions/template.php';

$page            = (int) ($_GET['page'] ?? 1);
$productsPerPage = 3;
$offset = 1 === $page ? 0 : ($page * $productsPerPage) - $productsPerPage;

$products = get_products($productsPerPage, $offset);

$productsCount = count_products();
$maxPage       = ceil($productsCount / $productsPerPage);
?>

<?php get_header('Homepage'); ?>

<div class="container">
    <a href="add-product-form.php" class="btn btn-secondary mb-5">Add new product</a>
    <div class="row">
        <?php if(!empty($products)): ?>
            <?php
            foreach ($products as $product):
                echo get_template_contents(__DIR__.'/templates/product-tile.php', [
                    'image' => 'storage/' . $product['image'],
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'id' => $product['id']
                ]);
            endforeach;
            ?>

            <nav class="mt-5 mb-5" aria-label="Page navigation example">
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $maxPage; ++$i): ?>
                        <?php
                        $current = '';
                        if ($i == $page) {
                            $current = 'active';
                        }
                        ?>
                        <li class="page-item <?php echo $current; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php else: ?>
            <h1>There are no products.</h1>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>


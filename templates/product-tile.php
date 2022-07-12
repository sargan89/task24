<?php
/**
 * @var string $_image
 * @var string $_name
 * @var float $_price
 * @var int $_id
 */
?>
<div class="col col-lg-4">
    <div class="card">
        <a href="product.php?id=<?php echo $_id; ?>">
            <img src="<?php echo $_image; ?>" class="card-img-top" width="400" alt="<?php echo $_name; ?>">
        </a>
        <div class="card-body">
            <a class="text-decoration-none" href="product.php?id=<?php echo $_id; ?>">
                <h5 class="card-title">
                    <?php echo $_name; ?>
                </h5>
            </a>
            <p class="card-text">
                <?php echo $_price; ?> ₴
            </p>
            <a href="product.php?id=<?php echo $_id; ?>" class="btn btn-primary">View</a>
        </div>
    </div>
</div>

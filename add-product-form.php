<?php require_once __DIR__.'/functions/template.php'; ?>

<?php get_header('Add Product'); ?>

<div class="container mt-4 mb-5">
    <div class="row justify-content-center">
        <div class="col col-lg-4">
            <form class="mb-5" action="controllers/add-product-controller.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Product Name
                    </label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">
                        Product Image
                    </label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">
                        Product Price
                    </label>
                    <input type="number" name="price" id="price" step="0.01" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-lg btn-success d-block w-100">
                    Add Product
                </button>
            </form>
        </div>
    </div>
</div>

<?php get_footer(); ?>

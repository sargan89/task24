<?php
require_once __DIR__.'/functions/template.php';
?>

<?php get_header('Checkout Success Page'); ?>

<div class="container mb-5">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Congrats!</h4>
        <p>You have created the order! Thanks!</p>
        <hr>
        <p class="mb-0">We will call you back and clarify all the details of the order.</p>
    </div>
    <a href="index.php">Return to Homepage</a>
</div>

<?php get_footer(); ?>

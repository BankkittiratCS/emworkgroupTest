<?php
require_once("RegisterAndloginsystem.php");
require_once("Product.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Index</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navbar -->
    <?php include_once("Navbar.php"); ?>
    <!-- Hero Section -->
    <section class="hero text-center d-flex align-items-center justify-content-center">
        <div class="hero-content">
            <h1 class="display-4">Welcome to MyShop</h1>
            <p class="lead">Find the best products here at unbeatable prices!</p>
            <a href="#products" class="btn btn-primary btn-lg">Shop Now</a>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-5">
        <div class="container">
            <?php
           $Product1 = new Product();
           $Product1->ShowProduct();
           ?>
        </div>
    </section>

 <?php include_once("Footer.php"); ?>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

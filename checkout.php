<?php
session_start();
require "koneksi.php";

// Clear the cart after checkout
unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dhefa Garden | Checkout</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php"; ?>

    <div class="container-fluid py-5 d-flex flex-column justify-content-center align-items-center" style="height: 80vh;">
        <div class="text-center">
            <img src="image/dhefa2.jpg" alt="Terima Kasih" class="img-fluid mb-4" style="max-width: 500px;">
            <h3 class="font-monospace">Terima Kasih Telah Berbelanja di Dhefa Garden!</h3>
        </div>
    </div>

    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>

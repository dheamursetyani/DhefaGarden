<nav class="navbar navbar-expand-lg navbar-dark warna2">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item me-5">
                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link" href="about-us.php">About Us</a>
                </li>
                <li class="nav-item me-5">
                    <a class="nav-link" href="produk.php">Tanaman Hias</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto fs-6">
                <li class="nav-item">
                    <?php
                    // Menghitung jumlah item di dalam keranjang
                    $cart_count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
                    ?>
                    <a class="nav-link" href="keranjang.php">
                        <i class="fas fa-cart-shopping"></i>
                        <span class="badge bg-secondary"><?php echo $cart_count; ?></span> <!-- Anda dapat menampilkan jumlah item di keranjang di sini -->
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
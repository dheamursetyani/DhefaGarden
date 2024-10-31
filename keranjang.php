<?php
session_start();
require "koneksi.php";

// Mendapatkan data dari session keranjang
$cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dhefa Garden | Keranjang</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php"; ?>

    <div class="container-fluid py-5">
        <div class="container">
            <h3>Keranjang Belanja</h3>
            <div class="row mt-4">
                <?php if (count($cart_items) > 0) { ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>Kuantitas</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total_belanja = 0;
                            foreach ($cart_items as $item) {
                                $produk_id = $item['produk_id'];
                                $kuantitas = $item['kuantitas'];

                                // Mengambil informasi produk dari database
                                $result = mysqli_query($conn, "SELECT id, nama, harga, foto FROM produk WHERE id = '$produk_id'");
                                $data = mysqli_fetch_assoc($result);

                                if ($data) {
                                    $subtotal = $data['harga'] * $kuantitas;
                                    $total_belanja += $subtotal;
                                    ?>
                                    <tr>
                                        <td><img src="image/<?php echo $data['foto']; ?>" alt="" width="50"></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td>Rp.<?php echo $data['harga']; ?></td>
                                        <td><?php echo $kuantitas; ?></td>
                                        <td>Rp.<?php echo $subtotal; ?></td>
                                        <td>
                                            <!-- Formulir untuk menghapus item -->
                                            <form method="POST" action="hapus-item.php">
                                                <input type="hidden" name="produk_id" value="<?php echo $produk_id; ?>">
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                            <tr>
                                <td colspan="4" class="text-end">Total Belanja</td>
                                <td>Rp.<?php echo $total_belanja; ?></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                <?php } else { ?>
                    <p>Keranjang Anda kosong.</p>
                <?php } ?>
            </div>
            <a href="produk.php" class="btn btn-outline-info">Lanjut Belanja</a>
            <a href="checkout.php" class="btn btn-primary">Checkout</a>
        </div>
    </div>

    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>

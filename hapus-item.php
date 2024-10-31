<?php
session_start();

// Memeriksa apakah 'produk_id' ada dalam array keranjang di session
if (isset($_POST['produk_id']) && isset($_SESSION['cart'])) {
    $produk_id = $_POST['produk_id'];

    // Cari item dalam array session cart dan hapus item jika ditemukan
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['produk_id'] == $produk_id) {
            unset($_SESSION['cart'][$key]); // Menghapus item dari array
            $_SESSION['cart'] = array_values($_SESSION['cart']); // Reindex array setelah penghapusan
            break;
        }
    }
}

// Redirect kembali ke halaman keranjang
header("Location: keranjang.php");
exit();
?>

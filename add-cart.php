<?php
session_start();
require "koneksi.php";

if (isset($_POST['produk_id']) && isset($_POST['kuantitas'])) {
    $produk_id = $_POST['produk_id'];
    $kuantitas = $_POST['kuantitas'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Cek apakah produk sudah ada di keranjang
    $found = false;
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['produk_id'] == $produk_id) {
            $_SESSION['cart'][$key]['kuantitas'] += $kuantitas;
            $found = true;
            break;
        }
    }

    if (!$found) {
        // Produk tidak ada, tambahkan ke keranjang
        $_SESSION['cart'][] = [
            'produk_id' => $produk_id,
            'kuantitas' => $kuantitas
        ];
    }

    header("Location: keranjang.php");
    exit();
}
?>

<?php
require "koneksi.php";
$nama = htmlspecialchars($_GET['nama']);
$queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE nama='$nama'");
$produk = mysqli_fetch_array($queryProduk);
$queryProdukTerkait = mysqli_query($conn, "SELECT * FROM produk WHERE kategori_id='$produk[kategori_id]' AND id != '$produk[id]' LIMIT 4");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dhefa Garden | Detail Tanaman</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php";?>
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-5">
                    <img src="image/<?php echo $produk['foto'];?>" alt="" class="w-100">
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <h1><?php echo $produk['nama'];?></h1>
                    <p class="fs-5"><?php echo $produk['detail'];?></p>
                    <p>Rp.<?php echo $produk['harga'];?></p>
                    <p class="fs-5">Status Ketersediaan : <strong><?php echo $produk['ketersediaan_stok'];?></strong></p>
                    <form method="POST" action="add-cart.php">
                        <input type="hidden" name="produk_id" value="<?php echo $data['id']; ?>">
                        <input type="number" name="kuantitas" value="1" min="1" class="form-control mb-2 text-center">
                        <button type="submit" class="btn warna1 text-white">Tambah ke Keranjang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--footer -->
    <div class="container-fluid py-5 warna2">
        <div class="container">
            <h2 class="text-center text-white mb-5">Tanaman Terkait</h2>
            <div class="row">
                <?php while($data=mysqli_fetch_array($queryProdukTerkait)){?>
                <div class="col-md-6 col-lg-3 mb-3">
                    <a href="produk-detail.php?nama=<?php echo $data['nama'];?>"><img src="image/<?php echo $data['foto'];?>"  class="img-fluid img-thumbnail produk-terkait-image"></a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    
     <!--footer -->
     <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>
<?php 
require "koneksi.php" ;
$queryKategegori = mysqli_query($conn,"SELECT * FROM kategori");

//get produk by keyword
if(isset($_GET['keyword'])){
    $queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE nama LIKE '%$_GET[keyword]%'");
}
//get produk by kategori
else if(isset($_GET['kategori'])){
    $queryKategoriId = mysqli_query($conn, "SELECT id FROM kategori WHERE nama='$_GET[kategori]'");
    $kategoriid = mysqli_fetch_array($queryKategoriId);
    $queryProduk = mysqli_query($conn, "SELECT * FROM produk WHERE kategori_id='$kategoriid[id]'");
}
//get produk default
else{
    $queryProduk = mysqli_query($conn, "SELECT * FROM produk");
}
$countData = mysqli_num_rows($queryProduk);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dhefa Garden | Tanaman Hias</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php"; ?>
    <!-- banner -->
    <div class="container-fluid banner2 d-flex align-items-center">
        <div class="container">
            <h1 class="text-white text-center display-4">Tanaman Hias</h1>
        </div>
    </div>
    
    <!-- body -->
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 mb-5">
                <h3>Kategori</h3>
                <ul class="list-group">
                    <?php while($kategori = mysqli_fetch_array($queryKategegori)){?>
                    <a class="no-decoration" href="produk.php?kategori=<?php echo $kategori['nama'];?>">
                        <li class="list-group-item"><?php echo $kategori['nama'];?></li>
                    </a>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-lg-9">
                <h3 class="text-center mb-3">Tanaman</h3>
                <div class="row">
                    <?php
                        if($countData<1){
                    ?>
                        <h4 class="text-center my-5">Tanaman yang anda cari tidak tersedia</h4>
                    <?php
                        }
                    ?>
                    <?php while ($produk = mysqli_fetch_array($queryProduk)) { ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 text-center">
                            <div class="image-box">
                                <img src="image/<?php echo $produk['foto']; ?>" class="card-img-top" alt="">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $produk['nama']; ?> </h4>
                                <p class="card-text text-truncate"><?php echo $produk['detail']; ?> </p>
                                <p class="card-text">Rp.<?php echo $produk['harga']; ?></p>
                                <form method="POST" action="add-cart.php">
                                    <input type="hidden" name="produk_id" value="<?php echo $produk['id']; ?>">
                                    <input type="number" name="kuantitas" value="1" min="1" class="form-control mb-2 text-center">
                                    <button type="submit" class="btn warna1 text-white">Tambah ke Keranjang</button>
                                </form>
                                <a href="produk-detail.php?nama=<?php echo $produk['nama']; ?>" class="btn warna1 text-white mt-2">Detail Tanaman</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>

    
    <!--footer -->
    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>
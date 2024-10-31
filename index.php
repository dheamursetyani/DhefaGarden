<?php
require "koneksi.php";
$queryProduk = mysqli_query($conn, "SELECT id, nama, harga, foto, detail FROM produk LIMIT 9");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dhefa Garden | Home</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php require "navbar.php"; ?>
    <!-- banner -->
    <div class="container-fluid banner d-flex align-items-center">
        <div class="container text-center text-white">
            <h1 class="display-4">Dhefa Garden</h1>
            <h4 class="display-4">Cari Tanaman Apa Kak?</h4>
            <div class="col-md-8 offset-md-2">
                <form method="get" action="produk.php">
                    <div class="input-group input-group-lg my-4">
                        <input type="text" class="form-control" placeholder="Nama Tanaman" aria-describedby="basic-addon2" name="keyword">
                        <button type="submit" class="btn warna1 text-white">Cari</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- kategori highlight -->
    <div class="container-fluid py-4">
        <div class="container text-center">
            <h3>Kategori Terlaris</h3>

            <div class="row mt-5">
                <div class="col-md-4 mb-3">
                    <div class="highlight-kategori d-flex justify-content-center align-items-center kategori-bunga">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Tanaman Hias Bunga">Tanaman Hias Bunga</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlight-kategori d-flex justify-content-center align-items-center kategori-daun">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Tanaman Hias Daun">Tanaman Hias Daun</a></h4>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="highlight-kategori d-flex justify-content-center align-items-center kategori-akar">
                        <h4 class="text-white"><a class="no-decoration" href="produk.php?kategori=Tanaman Hias Akar">Tanaman Hias Akar</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- about us -->
    <div class="container-fluid warna2 py-5">
        <div class="container text-center">
            <h3 class="text-white font-monospace fw-bolder">About Us</h3>
            <p class="text-white font-monospace fw-semi-bold">Selamat Datang di Dhefa Garden!</p>
            <p class="text-white font-monospace">
                Di Dhefa Garden, kami menghidupkan keindahan alam ke dalam rumah dan ruang kerja Anda dengan koleksi tanaman hias berkualitas tinggi.
                Berdiri sejak tugas ini disampaikan, toko kami berkomitmen untuk menyediakan berbagai jenis tanaman hias yang tidak hanya mempercantik,
                tetapi juga meningkatkan kualitas udara dan memberikan kedamaian bagi lingkungan Anda.
            </p>
        </div>
    </div>

    <!-- tanaman hias -->
    <div class="container-fluid py-5">
        <div class="container text-center">
            <h3>Tanaman Hias</h3>
            <div class="row mt-5">
                <?php while ($data = mysqli_fetch_array($queryProduk)) { ?>
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="card h-100">
                            <div class="image-box">
                                <img src="image/<?php echo $data['foto']; ?>" class="card-img-top" alt="">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $data['nama']; ?> </h4>
                                <p class="card-text text-truncate"><?php echo $data['detail']; ?> </p>
                                <p class="card-text">Rp.<?php echo $data['harga']; ?></p>
                                <form method="POST" action="add-cart.php">
                                    <input type="hidden" name="produk_id" value="<?php echo $data['id']; ?>">
                                    <input type="number" name="kuantitas" value="1" min="1" class="form-control mb-2 text-center">
                                    <button type="submit" class="btn warna1 text-white">Tambah ke Keranjang</button>
                                </form>
                                <a href="produk-detail.php?nama=<?php echo $data['nama']; ?>" class="btn warna1 text-white mt-2">Detail Tanaman</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <a class="btn btn-outline-info mt-3" href="produk.php">Lihat selengkapnya</a>
        </div>
    </div>

    <!--footer -->
    <?php require "footer.php"; ?>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="fontawesome/js/all.min.js"></script>
</body>

</html>
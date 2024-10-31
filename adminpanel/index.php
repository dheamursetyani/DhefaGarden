<?php
require "session.php";
require "../koneksi.php";

$queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
$jumlahKategori = mysqli_num_rows($queryKategori);
$queryTanaman = mysqli_query($conn, "SELECT * FROM produk");
$jumlahTanaman = mysqli_num_rows($queryTanaman);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<style>
    .summary-kategori {
        background-color: #0c4651;
        border-radius: 15px;
    }

    .no-decoration {
        text-decoration: none;
    }

    .summary-tanamanhias {
        background-color: #22780a;
        border-radius: 15px;
    }
</style>

<body>
    <?php
    require "navbar.php";
    ?>
    <div class="container mt-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-home"></i> Home
                </li>
            </ol>
        </nav>
        <h2>Welcome <?php echo $_SESSION['username']; ?>,</h2>

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-4 col-md-6 col12 mb-3">
                    <div class="summary-kategori p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fa-solid fa-list fa-8x"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-2">Kategori</h3>
                                <p class="fs-4"><?php echo $jumlahKategori; ?> Kategori</p>
                                <p><a href="kategori.php" class="text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col12 mb-3">
                    <div class="summary-tanamanhias p-3">
                        <div class="row">
                            <div class="col-6">
                                <i class="fa-solid fa-seedling fa-8x"></i>
                            </div>
                            <div class="col-6 text-white">
                                <h3 class="fs-2">Tanaman</h3>
                                <p class="fs-4"><?php echo $jumlahTanaman; ?> Tanaman</p>
                                <p><a href="produk.php" class="text-white no-decoration">Lihat Detail</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>
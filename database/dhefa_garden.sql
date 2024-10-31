-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2024 pada 16.46
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhefa_garden`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `itemkeranjang`
--

CREATE TABLE `itemkeranjang` (
  `id` int(11) NOT NULL,
  `keranjang_id` int(11) DEFAULT NULL,
  `produk_id` int(11) DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Tanaman Hias Bunga'),
(2, 'Tanaman Hias Daun'),
(4, 'Tanaman Hias Akar'),
(5, 'Tanaman Hias Pohon'),
(8, 'Tanaman Hias Buah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `status` enum('aktif','selesai') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `detail` text DEFAULT NULL,
  `ketersediaan_stok` enum('kosong','tersedia') DEFAULT 'tersedia',
  `harga` double NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `kategori_id`, `nama`, `detail`, `ketersediaan_stok`, `harga`, `foto`) VALUES
(6, 1, 'Anggrek', 'Tanaman berbunga dengan anggota jenis terbanyak. Setiap spesies anggrek memiliki pesona unikna sendiri. Beberapa anggrek memiliki bunga yang besar dan mencolok.', 'tersedia', 150000, 'Xg2m604GRqS8SSEBjFUp.jpg'),
(7, 1, 'Lily', 'Tanaman ini memiliki tiga daun bunga, terdapat dalam berbagai warna dari putih, kuning, jingga, merah muda, ungu, warna tembaga, hingga hampir hitam. Terdapat pula corak berupa bitnik-bintik.', 'tersedia', 15000, '8xDF34HNC7qGsaQI6XaH.jpg'),
(8, 1, 'Mahkota Duri', 'Tanaman yang memiliki bunga tertutup dalam bracts berwarna merah atau kuning. Bunga mahkota duri memiliki manfaat untuk menghentikan pendarahan rahim.', 'tersedia', 15000, 'CAu3SBD5ziSk4MDcNbhZ.jpg'),
(9, 1, 'Mawar', 'Tanaman Semak berduri yang tingginya dapat mencapai 2-5 m. bunga mawar terdiri dari 5 hdlai daun, kecuali jenis rosa sericea yang hanya mempunai 4 helai daun mahkota.', 'tersedia', 10000, 'uQnueIFH8617s2dtB4en.jpg'),
(10, 1, 'Melati', 'Tanaman yang memiliki tipe daun yang rata dan tulang daun menyirip. Bunga Melati mengandung minyak esensial alami yang dipercaya dapat melembapkan, mengatasi peradangan, dan membasmi kuman di kulit.', 'tersedia', 25000, 'b9GlEXYbhnVeZLhY6zUF.jpg'),
(11, 2, 'Calathea', 'Tanaman hias yang berasal dari daerah tropis. Memiliki daun yang lebar, hijau, dan berwarna-warni. Daun lebar ini membuat popular untuk area dengan Cahaya redup.', 'tersedia', 35000, 'V2uQpy5KOr0ILqHaG22h.jpg'),
(12, 2, 'Daun Puring', 'Tanaman hias berbentuk perdu dengan bentuk dan warna daun yang sangat bervariasi', 'tersedia', 10000, 'LQfhGDs0uVJWcnpOZr6N.jpg'),
(13, 2, 'Gelombang Cinta', 'Tanaman ini memiliki tinggi sekitar 10-30 cm. memiliki manfaat menyegarkan udara di dalam ruangan dan sebagai hiasan di dalam rumah.', 'tersedia', 30000, 'ckkPL3SltfDrUQq5FlLw.jpg'),
(14, 2, 'Kuping Gajah', 'Tanaman yang memiliki tinggi tanaman sekitar 35-40 cm. batang tanaman kuping gajah sangat kecil sehingga disebut sebagai batang semu. Batang diselimuti tangai daun yang berada diseputar buku batangnya.', 'tersedia', 90000, 'CTzG8RNYwbxNfdzC7ZDM.jpg'),
(15, 2, 'Monstera', 'Tanaman hias daun tropis yang bisa menjadi hiasan interior yang estetis bergaya minimalis. Manfaat monstera adalah menghasilkan oksigen pada malam hari.', 'tersedia', 40000, 'n0EP5hipXh2I7XDKBCae.jpg'),
(16, 4, 'Adenium', 'Tanaman hias yang memiliki batang besar, akar dapat membesar menyerupai umbi, bentuk daunnya Panjang, runcing, kecil, warna bunga bermacam-macam.', 'tersedia', 15000, 'xZTkYQdoJsSl574d4slQ.jpg'),
(17, 4, 'Bonsai Beringin', 'Tanaman kecil yang bibitnya diambil dari pohon beringin. Selain berukuran kecil, mempunyai keindahan dari segi bentuknya. ', 'tersedia', 10000, 'sTUmkpXyvMc0lcBnlDCt.jpg'),
(18, 4, 'Bougenville', 'Tanaman hias yang memiliki kelopak bunga yang tipis seperti kertas, tanaman ini dapat tumbuh besar atau dijadikan bonsai.', 'tersedia', 30000, 'cPqjgSF22LexHbCqfTPz.jpg'),
(19, 4, 'Karet Kebo', 'Tanaman yang memiliki tinggi mencapai 30 m. daunnya memiliki Panjang 7-20 cm, dengan tepi halus dan ujung yang tumpul. Daunnya sepanjang 1 kaki dan tebal berwarna hijau tua.', 'tersedia', 50000, 'cdWcZLubLIkTE3zGMe20.jpg'),
(20, 4, 'Ulumus Cina', 'Tanaman setinggi 30-60 kaki dengan batak dan tajuk ramping. Kulit batangnya terkelupas dan lebar sekitar 60-300 cm.', 'tersedia', 10000, 'TMiat0xi2TX2DOVTvJso.jpg'),
(21, 5, 'Bambu Air', 'Tanaman hias yang memiliki ukuran kecil serta mudah untuk ditanam. Tanaman ini dipercaya memiliki kemampuan untuk memberikan keuntungan bagi siapapun yang merawatnya.', 'tersedia', 20000, '4pmix9R2HKcrtySWHBgb.jpg'),
(22, 5, 'Bambu Kuning', 'Tanaman ini memiliki ciri batang yang beruas-ruas, tinggi, dan batangnya berwarna kuning. Biasanya, bambu jenis ini hidup di lingkungan tropis.', 'tersedia', 15000, 'Lis38y0LDqg3atB9i3zI.jpg'),
(23, 5, 'Kaktus', 'Kaktus memiliki daun berbentuk duri untuk mengurangi penguapan kadar air pada tubuhnya. ', 'tersedia', 15000, 'sjyRFiG8crvB2Sk7OfUE.jpg'),
(24, 5, 'Kamboja', 'Tanaman yang memiliki Panjang 10-25 cm bahkan lebih, tebal dan memiliki bentuk lonjong. Daun kamboja berwarna hijau muda dan hijau tua.', 'tersedia', 30000, '98QC4rtJEx4UVsv0dEgx.jpg'),
(25, 5, 'Pandan Bali', 'Tanaman ini memiliki cabang gemuk yang tumbuh dari batang inti. Daunnya Panjang dan berbentuk seperti padang. Tanaman ini untuk menyerap racun di udara.\r\n\r\n', 'tersedia', 30000, 'LxwqGHAcGiZpIrfXm4Vw.jpg'),
(26, 8, 'Belimbing', 'Tanaman yang tahan terhadap suhu tinggi. Buah belimbing untuk mengatasi penyakit batuk pada anak-anak, dapat mengatasi sariawan, dan gusi berdarah.', 'tersedia', 15000, 'Sf6fde0pARrevg4SnCsb.jpg'),
(27, 8, 'Jambu Kristal', 'Tanaman yang memiliki buah berbentuk bulat agak lonjong. Warna kulitnya hijau muda terang. Jambu kristal mengandung serat yang tinggi yang penting untuk Kesehatan pencernaan.', 'tersedia', 30000, 'LIhOq3TFYnwWQ93YjVab.jpg'),
(28, 8, 'Jeruk Limau', 'Tanaman yang dimanfaatkan terutama buah dan daunnya sebagai bumbu penyedap masakan, menambah harum aroma masakan', 'tersedia', 15000, 'cUOdxbSSsTehSGeA3eG1.jpg'),
(29, 8, 'Lemon', 'Tanaman yang memiliki batang berduri Panjang tetapi tidak rapat. Lemon tidak hanya dapat meningkatkan daya tahan tubuh, tetapi juga mencegah penyakit jantung.', 'tersedia', 12000, 'OlYzIPgGIKfGSfTWwDsT.jpg'),
(30, 8, 'Tomat Ceri', 'Tanaman tahunan berbentuk perdu dengan ciri khas buah yang kecil. Tomat ceri memiliki bentuk bulat hingga bulat memanjang dan memilki kandungan dry matter, gula, dan asam organk yang lebih banyak.\r\n', 'tersedia', 13000, 'J8301jnAxXr6wu8fvIxk.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$oy5vUiQ1RsdFo4AlLO0/huxC7RsJkP5p/frwkBTudc7jVj0gFuuHS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `itemkeranjang`
--
ALTER TABLE `itemkeranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjang_id` (`keranjang_id`),
  ADD KEY `produk_id` (`produk_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`),
  ADD KEY `kategori_produk` (`kategori_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `itemkeranjang`
--
ALTER TABLE `itemkeranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `itemkeranjang`
--
ALTER TABLE `itemkeranjang`
  ADD CONSTRAINT `itemkeranjang_ibfk_1` FOREIGN KEY (`keranjang_id`) REFERENCES `keranjang` (`id`),
  ADD CONSTRAINT `itemkeranjang_ibfk_2` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`);

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_produk` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

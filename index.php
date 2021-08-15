<?php
session_start();

if (!isset($_SESSION["login"])){
    header("Location: login.php");
}
require 'functions.php';

//penghalamanan
//konfigurasi
$jumlahDataPerHalaman = 5;
$jumlahData =count(query("SELECT * FROM tiket"));
$jumlahHalaman =ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = (isset($_GET["halaman"]))? $_GET["halaman"] :1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
//


$mahasiswa =query ("SELECT * FROM tiket LIMIT $awalData, $jumlahDataPerHalaman");

//tombol cari di tekan
if (isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>DATA PEMESAN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container">
<h1 class="text-center card-header bg-primary text-white">DAFTAR NAMA PEMESAN TIKET BUS</h1>
<br>
<br>
    <form action="" method="post">
    <input type="text" name="keyword" autofocus placeholder="Masukan Kata Kunci" id="keyword">
        <button type="submit" name="cari" id="tombol-cari" class="btn btn-primary ">Cari</button>
        <a href="tambah.php" class="btn btn-primary">TAMBAH</a>
        <a href="logout.php" class="btn btn-primary">KELUAR</a>
	</form>
    <br>
    <br>
    <table class="table table-striped">

            <tr  class="primary">
                <th>NO.</th>
                <th>AKSI</th>
                <th>PEMESAN</th>
                <th>TUJUAN</th>
                <th>TARIF</th>
                <th>JUMLAH TIKET</th>
                <th>TOTAL HARGA</th>
            </tr>
<?php $i =1; ?>
<?php foreach ( $mahasiswa as $row) : ?>           
            <tr>
                <td><?= $i ?></td>
                <td>
                	<a href="ubah.php?id=<?= $row ["id"]; ?>">Ubah</a>
					<a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin');">Hapus</a>
                </td>
                <td><?= $row["pemesan"]; ?></td>
                <td><?= $row["tujuan"]; ?></td>
                <td><?= $row["tarif"]; ?></td>
                <td><?= $row["jumlahtiket"]; ?></td>
                <td><?= $row["totalharga"]; ?></td>

            </tr>
<?php $i++; ?>
<?php endforeach; ?>

        </table>
</div>
<script src="js/bootstrap.bundle.min.js"></script>
</body>

</html> 
<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location:../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bengkel Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<header class="bg-dark">
<nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Bengkel Website</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="./order.php">Permintaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./mekanik.php">Mekanik</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../core/logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container mt-5">
        <?php
            include '../../core/koneksi.php';
            $query = mysqli_query($konek, "SELECT o.*, m.nama AS nama_mekanik, a.username AS nama_admin
                                            FROM `permintaan` o
                                            INNER JOIN mekanik m ON o.id_mekanik = m.id
                                            INNER JOIN `admin` a ON o.id_admin = a.id
                                            WHERE o.id = '$_GET[id]'");

            while ($data = mysqli_fetch_array($query)) {
                $id_order = $data['id'];
                $status = $data['status'];
                $nama_pelanggan = $data['nama'];
                $plat_kendaraan_pelanggan = $data['plat_kendaraan'];
                $keluhan_order = $data['keluhan'];
                $tanggal_order = $data['tanggal'];
                $detail_perbaikan = $data['detail'];
                $biaya_order = $data['biaya'];
                $nama_mekanik = $data['nama_mekanik'];
                $nama_admin = $data['nama_admin'];

                echo "ID Order: $id_order<br>";
                echo "Nama Status: $status<br>";
                echo "Nama Pelanggan: $nama_pelanggan<br>";
                echo "Plat Kendaraan Pelanggan: $plat_kendaraan_pelanggan<br>";
                echo "Keluhan Order: $keluhan_order<br>";
                echo "Tanggal Order: $tanggal_order<br>";
                if ($detail_perbaikan !== NULL) {
                    echo "Detail Perbaikan: $detail_perbaikan<br>";
                } else {
                    echo "Detail Perbaikan: Belum Diperbaiki<br>";
                }
                if ($biaya_order !== NULL) {
                    echo "Biaya Order: $biaya_order<br>";
                } else {
                    echo "Biaya Order: Belum Ditentukan<br>";
                }
                echo "Nama Mekanik: $nama_mekanik<br>";
                echo "Username Admin: $nama_admin<br>";


                


            }
        ?>
           
    </main>

    <footer class="bg-dark">
        <div class="container text-center text-white">
            <p>Bengkel Website</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
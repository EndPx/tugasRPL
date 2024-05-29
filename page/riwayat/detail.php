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
                            <a class="nav-link" href="../buat/buat.php">Buat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../mekanik/mekanik.php">Mekanik</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../riwayat/riwayat.php">Riwayat</a></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container mt-5">
        <a class="btn btn-primary" href="javascript:history.go(-1)">Kembali</a>
        <?php
            include '../../core/koneksi.php';
            $query = mysqli_query($konek, "SELECT o.*, m.nama_mekanik, so.nama_status
                                            FROM `order` o
                                            LEFT JOIN mekanik m ON o.id_mekanik = m.id_mekanik
                                            LEFT JOIN statusorder so ON o.id_status = so.id_status
                                            WHERE o.id_order = '$_GET[id_order]'");

            while ($data = mysqli_fetch_array($query)) {
                $id_order = $data['id_order'];
                $nama_pelanggan = $data['nama_pelanggan'];
                $plat_kendaraan_pelanggan = $data['plat_kendaraan_pelanggan'];
                $keluhan_order = $data['keluhan_order'];
                $tanggal_order = $data['tanggal_order'];
                $nama_mekanik = $data['nama_mekanik'];
                $biaya_order = $data['biaya_order'];
                $nama_status = $data['nama_status'];

                echo "ID Order: $id_order<br>";
                echo "Nama Status: $nama_status<br>";
                echo "Nama Pelanggan: $nama_pelanggan<br>";
                echo "Plat Kendaraan Pelanggan: $plat_kendaraan_pelanggan<br>";
                echo "Keluhan Order: $keluhan_order<br>";
                echo "Tanggal Order: $tanggal_order<br>";

                if ($nama_mekanik !== NULL) {
                    echo "Nama Mekanik: $nama_mekanik<br>";
                } else {
                    echo "Nama Mekanik: Tidak ada mekanik yang ditugaskan<br>";
                }
                if ($biaya_order !== NULL) {
                    echo "Biaya Order: $biaya_order<br>";
                } else {
                    echo "Biaya Order: Belum Ditentukan<br>";
                }

                if($data['id_status']==1){
                    echo '<a class="btn btn-success" href="../mekanik/pemilihanMekanik.php?id_order=' . $data['id_order'] . '">Mencari Mekanik</a>';
                }else if($data['id_status']==2){
                    echo '<a class="btn btn-success" href="formHarga.php?id_order=' . $data['id_order'] . '">Selesaikan</a>';
                }
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
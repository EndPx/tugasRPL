<?php
    include "koneksi.php";

    if(isset($_POST['nama_pelanggan']) && isset($_POST['keluhan_order']) && isset($_POST['plat_kendaraan_pelanggan'])) {
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $keluhan_order = $_POST['keluhan_order'];
        $plat_kendaraan_pelanggan = $_POST['plat_kendaraan_pelanggan'];

        if(!empty($nama_pelanggan) && !empty($keluhan_order) && !empty($plat_kendaraan_pelanggan)) {
            $query = mysqli_query($konek, "INSERT INTO `order`(`nama_pelanggan`, `keluhan_order`, `plat_kendaraan_pelanggan`, `status_order`) VALUES ('$nama_pelanggan','$keluhan_order','$plat_kendaraan_pelanggan','Mencari')")
                or die(mysqli_error($konek));

            if ($query) {
                header("location:../page/admin/songs.php");
                exit();
            } else {
                echo "Proses Input gagal";
            }
        } else {
            echo "Proses Input gagal: Data tidak boleh kosong.";
        }
    } else {
        echo "Proses Input gagal: Data tidak lengkap.";
    }
?>

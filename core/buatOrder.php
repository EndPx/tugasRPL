<?php
    include "koneksi.php";
    
    if(isset($_POST['nama_pelanggan']) && isset($_POST['plat_kendaraan_pelanggan']) && isset($_POST['keluhan_order'])) {
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $plat_kendaraan_pelanggan = $_POST['plat_kendaraan_pelanggan'];
        $keluhan_order = $_POST['keluhan_order'];

        if(!empty($nama_pelanggan) && !empty($plat_kendaraan_pelanggan) && !empty($keluhan_order)) {
            $query = mysqli_query($konek, "INSERT INTO `order`(`id_status`, `nama_pelanggan`, `plat_kendaraan_pelanggan`, `keluhan_order`) VALUES ('1','$nama_pelanggan','$plat_kendaraan_pelanggan','$keluhan_order')")
                or die("Error: " . mysqli_error($konek));

            if (mysqli_affected_rows($konek) > 0) {
                $id_order_baru = mysqli_insert_id($konek);
                header("location:../page/mekanik/pemilihanMekanik.php?id_order=$id_order_baru");
                exit();
            } else {
                echo "Proses gagal: Tidak ada data yang dimasukkan.";
            }
        } else {
            echo "Proses gagal: Data input tidak boleh kosong.";
        }
    } else {
        echo "Proses gagal: Data input tidak lengkap.";
    }
?>

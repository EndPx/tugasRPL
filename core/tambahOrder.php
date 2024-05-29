<?php
include "koneksi.php";


$nama_pelanggan = $_POST['nama_pelanggan'];
$keluhan_order = $_POST['keluhan_order'];
$plat_kendaraan_pelanggan = $_POST['plat_kendaraan_pelanggan'];

$query = mysqli_query($konek, "INSERT INTO `order`(`nama_pelanggan`, `keluhan_order`, `plat_kendaraan_pelanggan`,`status_order`) VALUES ('$nama_pelanggan','$keluhan_order','$plat_kendaraan_pelanggan','Mencari')"
) or die(mysqli_error($konek));

if ($query) {
    header("location:../page/admin/songs.php");
} else {
    echo "Proses Input gagal";
}
?>
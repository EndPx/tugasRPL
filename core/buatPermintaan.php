<?php
include "koneksi.php";

session_start();
if (empty($_SESSION["id"])) {
    header("location:../loginAdmin.php");
}

$plat_kendaraan = $_POST["plat_kendaraan"];
$keluhan = $_POST["keluhan"];
$nama = $_POST["nama"];
$no_hp = $_POST["no_hp"];
$id_mekanik = $_POST["id_mekanik"];
$query2 = "UPDATE `mekanik` SET `status`='sibuk' WHERE id=$id_mekanik";
$query = "INSERT INTO `permintaan`(`nama`, `plat_kendaraan`, `keluhan`, `status`, `id_mekanik`, `id_admin`,`no_hp`) VALUES ('$nama','$plat_kendaraan','$keluhan','pengecekan','$id_mekanik','" . $_SESSION["id"] . "',$no_hp)";
$data = mysqli_query($konek, $query) or die(mysqli_error($konek));

if ($data) {
    $data = mysqli_query($konek, $query2) or die(mysqli_error($konek));
    header("location:../page/admin/permintaan.php?pesan=berhasil");
} else {
    header("location:../page/admin/permintaan.php?pesan=gagal");
}
?>

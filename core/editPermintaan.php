<?php
include "koneksi.php";

$id = $_GET["id"];
$nama = $_POST["nama"];
$no_hp = $_POST["no_hp"];
$plat_kendaraan = $_POST["plat_kendaraan"];
$keluhan = $_POST["keluhan"];

$data = mysqli_query($konek, "UPDATE `permintaan` SET `nama`='$nama', `no_hp`='$no_hp', `plat_kendaraan`='$plat_kendaraan', `keluhan`='$keluhan' WHERE `id`=$id");

if ($data) {
    header("location:../page/admin/permintaan.php?pesan=berhasilEdit");
} else {
    header("location:../page/admin/permintaan.php?pesan=gagalEdit");
}
?>

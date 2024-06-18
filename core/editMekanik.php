<?php
include "koneksi.php";

$id = $_GET["id"];
$nama = $_POST["nama"];
$gaji = $_POST["gaji"];
$bonus = $_POST["bonus"];

$data = mysqli_query($konek, "UPDATE `mekanik` SET `nama`='$nama', `gaji`='$gaji', `bonus`='$bonus' WHERE `id`=$id");

if ($data) {
    header("location:../page/admin/mekanik.php?pesan=berhasilEdit");
} else {
    header("location:../page/admin/mekanik.php?pesan=gagalEdit");
}
?>

<?php
include "koneksi.php";
session_start();
$id = $_SESSION["id"];
$nama = $_POST["nama"];
$username = $_POST["username"];
$password = $_POST["password"];
$cek1 = mysqli_query($konek,"SELECT * from `mekanik` WHERE username = '$username' ") or die (mysqli_error($connect));
$cekBaris = mysqli_num_rows($cek1);
$cek2 = mysqli_query($konek,"SELECT * from `mekanik` WHERE id = '$id' ") or die (mysqli_error($connect));
$row1 = mysqli_fetch_array($cek1);
$row2 = mysqli_fetch_array($cek2);
if($cekBaris >0 && $row1["username"]!=$row2["username"]){
    header("location:../page/mekanik/profile.php?pesan=gagalSama");
}else{
    $data = mysqli_query($konek, "UPDATE `mekanik` SET `nama`='$nama', `username`='$username', `password`='$password' WHERE `id`=$id");
    if ($data) {
        header("location:../page/mekanik/profile.php?pesan=berhasil");
    } else {
        header("location:../page/mekanik/profile.php?pesan=gagal");
    }
}
?>

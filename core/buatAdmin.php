<?php
include "koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];
$cek1 = mysqli_query($konek,"SELECT * from `admin` WHERE username = '$username' ") or die (mysqli_error($connect));

$cek = mysqli_num_rows($cek1);

if($cek >0){
    header("location:../page/admin/akun.php?pesan=gagalSama");
}else{
    $data = mysqli_query($konek,"INSERT INTO `admin`( `username`, `password`) VALUES ('$username','$password')") or die (mysqli_error($connect));

    if($data){
        header("location:../page/admin/akun.php?pesan=berhasil");
    }else{
        header("location:../page/admin/akun.php?pesan=gagal");
    }
}


?>
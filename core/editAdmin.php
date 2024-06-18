<?php
include "koneksi.php";
session_start();
$username = $_POST["username"];
$password = $_POST["password"];
$id=$_SESSION["id"];
$cek1 = mysqli_query($konek,"SELECT * from `admin` WHERE username = '$username' ") or die (mysqli_error($connect));
$cek2 = mysqli_query($konek,"SELECT * from `admin` WHERE id = '$id' ") or die (mysqli_error($connect));
$cek = mysqli_num_rows($cek1);
$row1 = mysqli_fetch_array($cek1);
$row2 = mysqli_fetch_array($cek2);
if($cek >0 && $row1["username"]!=$row2["username"]){
    header("location:../page/admin/profile.php?pesan=gagalSama");
}else{
    $data = mysqli_query($konek,"UPDATE `admin` SET `username`='$username', `password`='$password' WHERE id='$id'") or die (mysqli_error($connect));

    if($data){
        header("location:../page/admin/profile.php?pesan=berhasil");
    }else{
        header("location:../page/admin/profile.php?pesan=gagal");
    }
}


?>
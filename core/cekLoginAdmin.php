<?php
include "koneksi.php";
session_start();
$username = $_POST["username"];
$password = $_POST["password"];
$data = mysqli_query($konek,"SELECT * from `admin` WHERE username = '$username' and password = '$password'") or die (mysqli_error($connect));

$cek = mysqli_num_rows($data);

if($cek >0){
    $row = mysqli_fetch_assoc($data);
    $_SESSION["id"]=$row["id"];
    $_SESSION["username"]=$row["username"];
    $_SESSION["role"]="admin";
    header("location:../page/admin/index.php");
}else{
    header("location:../page/loginAdmin.php?pesan=gagal");
}
?>
<?php
include "koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];
$nama = $_POST["nama"];
$gaji = $_POST["gaji"];
$cek1 = mysqli_query($konek,"SELECT * from `mekanik` WHERE username = '$username' ") or die (mysqli_error($connect));

$cek = mysqli_num_rows($cek1);
$row = mysqli_fetch_assoc($cek1);
if($cek >0 || $row["username"!==$username]){
    header("location:../page/admin/mekanik.php?pesan=gagalTambahSama");
}else{
    $data = mysqli_query($konek,"INSERT INTO `mekanik`( `username`, `password`, nama, gaji) VALUES ('$username','$password','$nama',$gaji)") or die (mysqli_error($connect));

    if($data){
        echo "<script>
        alert('Data berhasil dibuat.');
        </script>";
        header("location:../page/admin/mekanik.php?pesan=berhasilTambah");
    }else{
        echo "<script>
        alert('Data gagal dibuat.');
        </script>";
        header("location:../page/admin/mekanik.phppesan=gagalTambah");
    }
}
?>
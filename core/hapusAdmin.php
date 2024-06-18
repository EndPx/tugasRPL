<?php
include "koneksi.php";

$id = $_GET["id"];
$queri = mysqli_query($konek,"DELETE FROM `admin` WHERE id=$id") or die (mysqli_error($connect));
if($queri){
    header("location:../page/admin/akun.php?pesan=berhasilHapus");
}else{
    header("location:../page/admin/akun.php?pesan=gagalHapus");
}
?>
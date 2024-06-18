<?php
include "koneksi.php";

session_start();
if (empty($_SESSION["id"])) {
    header("location:../page/loginAdmin.php");
}

$id = $_GET["id"];
$queri = mysqli_query($konek,"DELETE FROM `permintaan` WHERE id=$id") or die (mysqli_error($connect));
if($queri){
    header("location:../page/admin/permintaan.php?pesan=berhasilHapus");
}else{
    header("location:../page/admin/permintaan.php?pesan=gagalHapus");
}
?>
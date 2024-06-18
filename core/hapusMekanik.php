<?php
include "koneksi.php";

$id = $_GET["id"];
$queriHapus = mysqli_query($konek,"DELETE FROM `permintaan` WHERE id_mekanik=$id") or die (mysqli_error($connect));
$queri = mysqli_query($konek,"DELETE FROM `mekanik` WHERE id=$id") or die (mysqli_error($connect));
if($queri){
    header("location:../page/admin/mekanik.php");
}else{
    header("location:../page/admin/mekanik.php");
}
?>
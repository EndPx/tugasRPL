<?php
include "koneksi.php";

$id = $_GET["id"];
$queri = mysqli_query($konek,"UPDATE `permintaan` SET status='perbaikan' WHERE id=$id") or die (mysqli_error($connect));
if($queri){
    header("location:../page/mekanik/permintaanSekarang.php?pesan=updatePerbaikan");
}else{
    header("location:../page/mekanik/permintaanSekarang.php?pesan=gagalUpdate");
}
?>
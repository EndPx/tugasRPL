<?php
include "koneksi.php";
session_start();
$id = $_GET["id"];
$biaya = $_POST["biaya"];
$detail = $_POST["detail"];
$queri = mysqli_query($konek,"UPDATE `permintaan` SET status='selesai', biaya='$biaya', detail='$detail' WHERE id=$id") or die (mysqli_error($connect));
if($queri){
    $queri = mysqli_query($konek, "UPDATE `mekanik` SET `status`='senggang', total_permintaan=total_permintaan+1, bonus=bonus+($biaya/10) WHERE id=" . $_SESSION["id"]) or die(mysqli_error($connect));
    header("location:../page/mekanik/kosong.php?pesan=updateSelesai");
}else{
    header("location:../page/mekanik/permintaanSekarang.php?pesan=gagalUpdate");
}
?>
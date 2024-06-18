<?php
include "koneksi.php";

$id = $_GET["id"];
$pengecekan = $_POST["pengecekan"];
$queri = mysqli_query($konek,"UPDATE `permintaan` SET status='persetujuan', pengecekan='$pengecekan' WHERE id=$id") or die (mysqli_error($connect));
if($queri){
    header("location:../page/mekanik/permintaanSekarang.php?pesan=updatePersetujuan");
}else{
    header("location:../page/mekanik/permintaanSekarang.php?pesan=gagalUpdate");
}
?>
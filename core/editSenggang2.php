<?php
    include "koneksi.php";
    if(isset($_GET['id_mekanik'])){
        $id_mekanik = $_GET['id_mekanik'];
        $query = mysqli_query($konek, "UPDATE mekanik SET id_status=3 WHERE id_mekanik='$id_mekanik'")
            or die(mysqli_error($konek));
        if (mysqli_affected_rows($konek) > 0) {
            header("location:../page/mekanik/mekanik.php");
            exit();
        } else {
            echo "Proses gagal: Tidak ada baris yang terpengaruh.";
        }
    } else {
        echo "Proses gagal: Parameter id_mekanik tidak ditemukan.";
    }
?>

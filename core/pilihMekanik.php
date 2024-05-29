<?php
    include "koneksi.php";

    if(isset($_GET['id_order']) && isset($_GET['id_mekanik'])) {
        $id_order = $_GET['id_order'];
        $id_mekanik = $_GET['id_mekanik'];

        $updateMekanik = mysqli_query($konek, "UPDATE mekanik SET id_status=3 WHERE id_mekanik='$id_mekanik'")
            or die("Error: " . mysqli_error($konek));

        $query = mysqli_query($konek, "UPDATE `order` SET id_mekanik='$id_mekanik', id_status=2 WHERE id_order='$id_order'")
            or die("Error: " . mysqli_error($konek));

        if (mysqli_affected_rows($konek) > 0) {
            header("location:../page/riwayat/detail.php?id_order=$id_order");
            exit();
        } else {
            echo "Proses gagal: Tidak ada baris yang terpengaruh.";
        }
    } else {
        echo "Proses gagal: Variabel tidak ditemukan.";
    }
?>

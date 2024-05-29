<?php
include "koneksi.php";

if(isset($_GET['id_order']) && isset($_GET['id_mekanik'])) {
    $id_order = $_GET['id_order'];
    $id_mekanik = $_GET['id_mekanik'];

    if(isset($_POST['biaya_order'])) {
        $biaya_order = $_POST['biaya_order'];

        if(is_numeric($biaya_order) && intval($biaya_order) == $biaya_order) {
            $updateMekanik = mysqli_query($konek, "UPDATE mekanik SET id_status=2 WHERE id_mekanik='$id_mekanik'")
                or die(mysqli_error($konek));

            $query = mysqli_query($konek, "UPDATE `order` SET biaya_order='$biaya_order', id_status=3 WHERE id_order='$id_order'")
                or die(mysqli_error($konek));

            if(mysqli_affected_rows($konek) > 0) {
                header("location:../page/riwayat/detail.php?id_order=$id_order");
                exit();
            } else {
                echo "Proses gagal: Tidak ada baris yang terpengaruh.";
            }
        } else {
            echo "Proses gagal: Biaya order harus berupa angka bulat.";
        }
    } else {
        echo "Proses gagal: Data biaya_order tidak ditemukan.";
    }
} else {
    echo "Proses gagal: Variabel id_order atau id_mekanik tidak ditemukan.";
}
?>

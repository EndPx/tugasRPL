<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location:../loginMekanik.php");
}
include '../../core/koneksi.php';
$query = mysqli_query($konek, "SELECT o.*, m.nama AS nama_mekanik, a.username AS nama_admin
                               FROM `permintaan` o
                               INNER JOIN mekanik m ON o.id_mekanik = m.id
                               INNER JOIN `admin` a ON o.id_admin = a.id
                               WHERE m.id=" . $_SESSION["id"] . " AND (o.status != 'selesai' AND o.status != 'batal')");
$row = mysqli_fetch_array($query);
$cek = mysqli_num_rows($query);
if ($cek<=0) {
    header("location:kosong.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Bengkel</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../style/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-60">
                    <i class='fas fa-car-side' style='font-size:48px;color:white'></i>
                </div>
                <div class="sidebar-brand-text mx-2">MEKANIK Bengkel</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Data Bengkel
            </div>
            <li class="nav-item">
                <a class="nav-link" href="permintaanSekarang.php">
                    <i class="fas fa-user"></i>
                    <span>Permintaan Sekarang</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="riwayat.php">
                    <i class="fas fa-road"></i>
                    <span>Riwayat Permintaan</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Pengaturan
            </div>
            <li class="nav-item">
                <a class="nav-link" href="profile.php"><i class="fas fa-fw fa-cog"></i><span>Profile Akun</span></a>
            </li>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in">
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['username'] ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="../../core/logoutMekanik.php" onclick="return confirm('apakah anda yakin?')">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Permintaan Sekarang</h1>
                    </div>
                    <?php
                        if (isset($_GET['pesan'])) {
                            if ($_GET['pesan'] == "updatePersetujuan") {
                                echo "<div class='alert alert-success' role='alert'>Permintaan anda membutuhkan persetujuan Pelanggan!</div>";
                            }elseif ($_GET['pesan'] == "gagalUpdate") {
                                echo "<div class='alert alert-danger' role='alert'>Gagal Saat Input ke Database!</div>";
                            }elseif ($_GET['pesan'] == "updatePerbaikan") {
                                echo "<div class='alert alert-success' role='alert'>Kendaraan Sekarang dilanjutkan sampai Selesai!</div>";
                            }
                        }
                    ?>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>ID Permintaan</td>
                                                    <td>:</td>
                                                    <td><b><?php echo $row["id"]?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Pelanggan</td>
                                                    <td>:</td>
                                                    <td><b><?php echo $row["nama"]?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Nomor Telpon Pelanggan</td>
                                                    <td>:</td>
                                                    <td><b><?php echo $row["no_hp"]?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Plat Kendaraan</td>
                                                    <td>:</td>
                                                    <td><b><?php echo $row["plat_kendaraan"]?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Keluhan</td>
                                                    <td>:</td>
                                                    <td><b><?php echo $row["keluhan"]?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>:</td>
                                                    <td><b><?php echo $row["status"]?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Tanggal Permintaan</td>
                                                    <td>:</td>
                                                    <td><b><?php echo $row["tanggal"]?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Mekanik</td>
                                                    <td>:</td>
                                                    <td><b><?php echo $row["nama_mekanik"]?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Username Admin</td>
                                                    <td>:</td>
                                                    <td><b><?php echo $row["nama_admin"]?></b></td>
                                                </tr>
                                                <tr>
                                                    <td>Pengecekan</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php 
                                                            if ($row['status']=='pengecekan') {
                                                                echo '<form action="../../core/updatePermintaan1.php?id=' . $row['id'] . '" method="POST">';
                                                                echo '<textarea name="pengecekan" class="form-control" required></textarea>';
                                                            } else {
                                                                echo '<b>' . $row["pengecekan"] . '</b>';
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Detail</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php 
                                                            if ($row['status']=='perbaikan') {
                                                                echo '<form action="../../core/updatePermintaan4.php?id=' . $row['id'] . '" method="POST">';
                                                                echo '<textarea name="detail" class="form-control" required></textarea>';
                                                            } else {
                                                                echo '<b>' . $row["detail"] . '</b>';
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Biaya</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php 
                                                            if ($row['status']=='perbaikan') {
                                                                echo '<textarea name="biaya" class="form-control" required></textarea>';
                                                            } else {
                                                                echo '<b>' . $row["biaya"] . '</b>';
                                                            }
                                                        ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>  
                                    </div>
                                    <div>
                                        <div class="col">
                                            <?php 
                                                if ($row['status']=='pengecekan') {
                                                    echo '<button type="submit" class="btn btn-sm btn-success mt-2"><i class="fa"></i>Simpan</button>';
                                                    echo '</form>';
                                                } elseif ($row['status']=='persetujuan') {
                                                    echo '<a href="../../core/updatePermintaan2.php?id=' . $row['id'] . '" class="btn btn-sm pe-5 btn-success"><i class="fa"></i>Pelanggan Setuju Dengan Perbaikan</a>';
                                                    echo '<a href="../../core/updatePermintaan3.php?id=' . $row['id'] . '" class="btn btn-sm btn-danger"><i class="fa"></i>Pelanggan Tidak Setuju Dengan Perbaikan</a>';
                                                } else {
                                                    echo '<button type="submit" class="btn btn-sm btn-success mt-2"><i class="fa"></i>Simpan</button>';
                                                    echo '</form>';
                                                }     
                                            ?>
                                        </div>
                                    </div>              
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <p>&copy; Rekayasa Perangkat Lunak Sistem Bengkel.</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../js/sb-admin-2.min.js"></script>
        <script src="../vendor/chart.js/Chart.min.js"></script>
        <script src="../js/demo/chart-area-demo.js"></script>
        <script src="../js/demo/chart-pie-demo.js"></script>
    </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bengkel Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<header class="bg-dark">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Bengkel Website</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../buat/buat.php">Buat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../mekanik/mekanik.php">Mekanik</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../riwayat/riwayat.php">Riwayat</a></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container mt-5">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-header">
                    <center>
                    <a class="btn btn-primary" href="javascript:history.go(-1)">Kembali</a>
                        <h2>Riwayat Order</h2> 
                        <center>
                    </div>
                    <div class="card-body">
                        <table class="table table-dark table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id Order</th>
                                    <th scope="col">Nama Pelanggan</th>
                                    <th scope="col">Plat Kendaraan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include '../../core/koneksi.php';
                                $query = mysqli_query($konek, "select * FROM `order` WHERE id_status=2;");
                                while ($data = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td><?php echo $data['id_order']; ?></td>
                                        <td><?php echo $data['nama_pelanggan']; ?></td>
                                        <td><?php echo $data['plat_kendaraan_pelanggan']; ?></td>
                                        <td>
                                            <?php
                                                echo '<a class="btn btn-success" href="detail.php?id_order=' . $data['id_order'] . '">Detail</a>';
                                                echo '<a class="btn btn-success" href="formHarga.php?id_order=' . $data['id_order'] . '">Selesaikan</a>';
                                            ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </main>

    <footer class="bg-dark">
        <div class="container text-center text-white">
            <p>Bengkel Website</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>
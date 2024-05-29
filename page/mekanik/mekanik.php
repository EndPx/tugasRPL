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
					<h2>Data Mekanik</h2> 
                    <center>
				</div>
				<div class="card-body">
					<table class="table table-dark table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Nama Mekanik</th>
								<th scope="col">Status</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include '../../core/koneksi.php';
							$query = mysqli_query($konek, "select mekanik.id_mekanik, mekanik.nama_mekanik, statusmekanik.nama_status from mekanik INNER JOIN statusmekanik ON mekanik.id_status=statusmekanik.id_status");
                            while ($data = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?php echo $data['nama_mekanik']; ?></td>
                                    <td><?php echo $data['nama_status']; ?></td>
                                    <td>
                                        <?php
                                            if ($data['nama_status']=="libur") {
                                                echo '<a class="btn btn-success" href="../../core/editLibur.php?id_mekanik=' . $data['id_mekanik'] . '">Datang Kerja</a>';
                                            }else if(($data['nama_status']=="senggang")){
                                                echo '<a class="btn btn-success" href="../../core/editSenggang.php?id_mekanik=' . $data['id_mekanik'] . '">Libur</a>';
                                            }else{
                                                $cariorder=mysqli_query($konek, "SELECT mekanik.id_mekanik, order.id_order FROM `order` INNER JOIN mekanik ON `order`.id_mekanik = mekanik.id_mekanik WHERE `order`.id_status = 2");
                                                $dataorder = mysqli_fetch_array($cariorder);
                                                echo '<a class="btn btn-success" href="../riwayat/detail.php?id_order=' . $dataorder['id_order'] . '">Lihat Order</a>';
                                            }
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
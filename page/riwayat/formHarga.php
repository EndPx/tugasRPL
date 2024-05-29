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
                        <h2>Tambah Order</h2> 
                    </center>
                </div>
                <div class="card-body">
                    
                    <?php 
                        include '../../core/koneksi.php';
                        $id_order = mysqli_real_escape_string($konek, $_GET['id_order']);
                        $query = mysqli_query($konek, "SELECT id_mekanik FROM `order` WHERE id_order = '$id_order'");

                        $data = mysqli_fetch_array($query);
                    ?>
                    <form action="../../core/perbaruOrder.php?id_order=<?php echo $_GET['id_order'] ?>&id_mekanik=<?php echo $data['id_mekanik']; ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Biaya:</label>
                            <input type="text" class="form-control" id="biaya_order" name="biaya_order" required>
                        </div>
                        <button type="submit" class="btn btn-primary mx-auto d-block">Add</button>
                    </form>
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
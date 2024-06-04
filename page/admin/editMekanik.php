<?php
session_start();
if (empty($_SESSION["id"])) {
    header("location:../login.php");
}
?>

<?php
include '../../core/koneksi.php';
$id = $_GET['id'];
$queri = mysqli_query($konek, "SELECT *
                        FROM mekanik
                        WHERE id = '$id'");
$data = mysqli_fetch_array($queri);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bengkel Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
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
                            <a class="nav-link" href="./order.php">Permintaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./mekanik.php">Mekanik</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../core/logout.php">Logout</a>
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
                        <h2>Edit Mekanik</h2>
                    </center>
                </div>
                <div class="card-body">
                    <form action="../../core/editMekanik.php?id= <?php echo $id ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nama Mekanik:</label>
                            <input type="text" class="form-control" value="<?php echo $data['nama']?>" id="nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Username:</label>
                            <input type="text" class="form-control" value="<?php echo $data['username']?>" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Password:</label>
                            <input type="password" class="form-control" value="<?php echo $data['password']?>" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary mx-auto d-block">Edit</button>
                    </form>
                </div>
            </div>
        </div>
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
								<th scope="col">Username</th>
                                <th scope="col">Password</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include '../../core/koneksi.php';
							$query = mysqli_query($konek, "select * from mekanik");
                            while ($data = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['password']; ?></td>
                                    <td>
                                        <?php
                                            echo '<a class="btn btn-success" href="./editMekanik.php?id=' . $data['id'] . '">Edit</a>';
                                            echo '<a class="btn btn-success" href="../../core/hapusMekanik.php?id=' . $data['id'] . '">Hapus</a>';
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
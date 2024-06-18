<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin login page for Sistem Bengkel">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style/formLogin.css">
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo">Sistem Bengkel</div>
                    <nav class="nav-links">
                        <a href="loginAdmin.php">Admin</a>
                        <a href="loginMekanik.php" class="active">Mekanik</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card">
                        <h2 class="text-center mb-4">Mekanik Login</h2>
                        <?php
                            if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal") {
                                echo "<div class='alert alert-danger' role='alert'>Username atau password salah!</div>";
                            }
                        ?>
                        <form method="POST" action="../core/cekLoginMekanik.php">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required />
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required />
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>&copy; Rekayasa Perangkat Lunak Sistem Bengkel.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
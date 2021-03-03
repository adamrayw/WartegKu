<?PHP

include "../config.php";

$featured_menu = mysqli_query($db, "SELECT * FROM featured_menu");
$fm = mysqli_num_rows($featured_menu);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastFood - Pesan makanan sambil rebahan!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6678200964.js" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="assets/css/tailwind.css"> -->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php session_start(); ?>

    <!-- // di cek apakah session level sudah di set -->
    <?php if (!isset($_SESSION['level'])) { ?>
        <!-- // jika belum tampilkan peringatan seperti dibawah -->
        <div class="container  text-center error mt-4 mw-75 mx-auto">
            <img class="mb-3" src="../assets/image/error.svg" alt="error">
            <h1>Anda tidak memiliki hak akses!</h1>
            <a href="../auth/login.php" class="text-danger">Login</a>
        </div>

        <?php die(); ?>
    <?php } else if ($_SESSION['level'] === 'user') { ?>
        <div class="container  text-center error mt-4 mw-75 mx-auto">
            <img class="mb-3" src="../assets/image/error.svg" alt="error">
            <h1>Anda tidak memiliki hak akses!</h1>
            <a href="../auth/login.php" class="text-danger">Login</a>
        </div>
        <?php die(); ?>
    <?php } ?>

    <div class="container admin">
        <div class="row mt-4">
            <div class="col-3 border px-4 text-dark">
                <div class="nama-admin my-4">
                    <h5 class="mb-1">Welcome,<br> <?= $_SESSION['nama'] ?></h5>
                    <a class="btn btn-danger text-white mt-1" href="../auth/logout.php">Log Out</a>
                </div>
                <hr>
                <ul class="list-group mb-4">
                    <a class="text-decoration-none" href="featured.php">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Featured Menu
                            <span class="badge bg-primary rounded-pill"><?= $fm ?></span>
                        </li>
                    </a>
                    <a class="text-decoration-none" href="pesanan.php">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Pesanan Masuk
                            <span class="badge bg-primary rounded-pill">2</span>
                        </li>
                    </a>

                    <a class="mt-5" href="../">Lihat halaman utama</a>
                </ul>
            </div>
            <div class="col text-center">
                <div class="container">
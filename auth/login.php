<?php

// mengaktifkan session
session_start();

// include config agar terkoneksi ke database
include "../config.php";

// melakukan query agar data yang ada di database terbaca
$query = mysqli_query($db, "SELECT * FROM user");

// mengubah data user ke array
$userid = mysqli_fetch_assoc($query);

error_reporting(0);

// cek apakah button login sudah di klik atau belum
if (isset($_POST['login'])) {
    // jika sudah di klik

    // menyimpan data dari form
    $id = $_GET['id'];
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // melakukan query untuk mengambil data dari table user
    $result = mysqli_query($db, "SELECT * FROM user WHERE username = '$username' and password ='$password'");

    // menghitung jumlah row
    $cek = mysqli_num_rows($result);

    // di cek jika ada data
    if ($cek > 0) {

        // ubah data result ke array
        $row = mysqli_fetch_assoc($result);

        // jika password yang di form sama dengan yang di database
        if ($password === $row['password']) {
            // jika ditemukan, cek lagi apakah user tersebut level/hak akses nya user atau admin
            if ($row['level'] === 'admin') {
                // jika levelnya admin
                // buat session untuk admin
                $_SESSION['iduser'] = $row['id'];
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['alamat'] = $row['alamat'];
                $_SESSION['level'] = 'admin';
                $_SESSION['username'] = $_POST['username'];
                // dan di direct ke halaman admin
                header("Location: ../admin/admin.php");
                exit;
            } else {
                // jika level nya user
                // buat session untuk user
                $_SESSION['nama'] = $row['nama'];
                $_SESSION['iduser'] = $row['id'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['alamat'] = $row['alamat'];
                $_SESSION['level'] = 'user';
                $_SESSION['username'] = $_POST['username'];
                // dan di direct ke halaman index
                header("Location: ../index.php");
                exit;
            }
        } else {
            echo "<script>alert('Email atau password salah!')</script>";
        }
    } else {
        echo "<script>alert('Email atau password salah!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WartegKu - Pesan makanan sambil rebahan!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6678200964.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/custom.css">
</head>

<body>

    <div class="container login">
        <div class="wrapper-brand">
            <h1>WartegKu</h1>
            <p>Pesan makanan sambil rebahan!</p>
        </div>
        <div class="wrapper_login mt-5">
            <h1>Sign In</h1>
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <input class="btn btn-primary" type="submit" name="login" id="login" value="Sign In">
            </form>
            <div class="login-footer">
                <p class="pr-3">don't have an account?</p>
                <a class="text-primary" href="register.php">Sign Up</a>
            </div>
            <div class="login-later">
                <p class="mb-3">Or</p>
                <a href="../index.php">Sign In Later</a>
            </div>
        </div>

    </div>

</body>

</html>
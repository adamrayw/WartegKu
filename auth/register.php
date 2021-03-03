<?php

session_start();

include "../config.php";

if (isset($_POST['register'])) {
    $email = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $nama   = htmlspecialchars($_POST['nama']);
    $level = htmlspecialchars($_POST['level']);

    mysqli_query($db, "INSERT INTO user (email, nama, username, password, level) VALUES ('$email', '$nama','$username', '$password', '$level')");
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
    <!-- <link rel="stylesheet" href="assets/css/tailwind.css"> -->
    <link rel="stylesheet" href="../assets/css/custom.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

    <div class="container login">
        <div class="wrapper-brand">
            <h1>FastFood</h1>
            <p>Pesan makanan sambil rebahan!</p>
        </div>
        <div class="wrapper_login mt-5">
            <h1>Sign Up</h1>
            <form action="success-register.php" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                    <div id="usernameHelp" class="form-text">Gunakan huruf kecil dan tanpa spasi!</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="level" id="level" value="user" required>
                </div>
                <div class="info-signup">
                    <p class="sk mb-3">Dengan mengklik sign up, Anda menyetujui Ketentuan.
                    </p>
                </div>
                <input class="btn btn-primary" type="submit" name="register" id="register" value="Sign Up">
            </form>

            <div class="login-footer">
                <p>already have an account?</p>
                <a class="text-primary" href="login.php">Sign In</a>
            </div>
        </div>

    </div>

</body>

</html>
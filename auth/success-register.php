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
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body style="font-family: sans-serif;" onload="alert();">

    <script>
        function alert() {
            swal({
                title: "Sign up berhasil!",
                text: "Silahkan sign in dengan username dan password anda.",
                icon: "success",
                button: "Sign In",
            }).then(function() {
                window.location = "login.php";
            });
        }
    </script>
</body>

</html>
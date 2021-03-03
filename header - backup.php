<?php
session_start();
include "config.php";

error_reporting(0);
$id = $_SESSION['iduser'];

$cart = mysqli_query($db, "SELECT * FROM cart WHERE id = '$id'");
$total_row = mysqli_num_rows($cart);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastFood - Pesan makanan sambil rebahan!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/6678200964.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body>
    <div class="container-fluid main">
        <!-- <nav>
            <div class="brand">
                <h1 class="text-center sm:text-left">FastFood</h1>
            </div>
            <div class="link">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pricing</a></li>
                    <li><a href="#"><i class="fab fa-opencart fa-xl"></i></a></li>
                </ul>
            </div>
        </nav> -->
        <nav class="navbar navbar-expand-lg navbar-light mt-1">
            <a class="navbar-brand" href="index.php">FastFood</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link " href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link d-flex align-items-center" href="#" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle fa-2x pr-2"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                <?php error_reporting(0); ?>
                                <?php if (!isset($_SESSION['nama'])) { ?>
                                    <li><a class="dropdown-item" href="#" style="display: none;">Hallo, <?= $_SESSION['nama']; ?></a></li>
                                    <li style="display: none;">
                                        <a class="dropdown-item d-flex align-items-center" href="checkout.php">
                                            <!-- <i class="fab fa-opencart fa-xl pr-1"></i> -->
                                            <p class="pr-1">My Cart</p>
                                            <p><?= $total_row ?></p>
                                        </a>
                                    </li>
                                <?php } else { ?>
                                    <li><a class="dropdown-item" href="#">Hallo, <?= $_SESSION['nama']; ?></a></li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center" href="checkout.php">
                                            <!-- <i class="fab fa-opencart fa-xl pr-1"></i> -->
                                            <p class="pr-1">My Cart</p>
                                            <p><?= $total_row ?></p>
                                        </a>
                                    </li>
                                <?php } ?>

                                <li>
                                    <?php if (!isset($_SESSION['nama'])) { ?>
                                        <a class="dropdown-item" href="login.php">Login</a>
                                        <a class="dropdown-item" id="logout" style="display: none;" href="logout.php">Keluar</a>
                                    <?php } else { ?>
                                        <a class="dropdown-item text-danger" id="logout" href="logout.php">Log out</a>
                                        <a class="dropdown-item" style="display: none;" href="login.php">Login</a>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
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
    <meta name="description" content="Pesan makanan online!">
    <meta name="keywords" content="HTML, CSS, JavaScript, PHP">
    <meta name="author" content="Adam Ray Wibowo">
    <title>WartegKu - Pesan makanan sambil rebahan!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <script src="https://kit.fontawesome.com/6678200964.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/custom.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>

<body>
    <div class="container main">
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
        <nav>
            <div class="navbar px-0">
                <div class="brand">
                    <a class="navbar-brand" href="index.php">WartegKu</a>
                </div>
                <div class="navbar-right d-flex">
                    <div class="cart mr-2 d-flex align-items-center">
                        <a href="checkout.php">
                            <i class="fas fa-shopping-cart fa-lg" style="color: black; font-size: 20px;"></i>
                        </a>
                        <?php if (!isset($_SESSION['iduser'])) { ?>
                            <p class="ps-1 pt-3" style="display: block;"><?= 0 ?></p>
                        <?php } else { ?>
                            <p class="ps-1 pt-3" style="display: block;"><?= $total_row ?></p>
                        <?php } ?>
                    </div>
                    <div class="dropdown">
                        <div class="btn-group">
                            <a class="nav-link pr-0" href="#" id="dropdownMenuButton" data-bs-toggle="dropdown" ata-display="static" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user-circle fa-lg pr-2 text-dark"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" aria-labelledby="dropdownMenuButton">
                                <?php error_reporting(0); ?>
                                <?php if (!isset($_SESSION['nama'])) { ?>
                                    <li><p class="dropdown-item" href="#" disabled style="display: none;">Hallo, <?= $_SESSION['nama']; ?></p></li>
                                <?php } else { ?>
                                    <li><a class="dropdown-item nama" href="#">Hi, <?= $_SESSION['nama']; ?></a></li>
                                    <li><a class="dropdown-item mb-2" href="edit-data.php">Accounts</a></li>
                                <?php } ?>

                                <li>
                                    <?php if (!isset($_SESSION['nama'])) { ?>
                                        <a class="dropdown-item" href="auth/login.php">Sign In</a>
                                        <a class="dropdown-item" id="logout" style="display: none;" href="auth/logout.php">Keluar</a>
                                    <?php } else { ?>
                                        <a class="dropdown-item text-danger" id="logout" href="auth/logout.php">Log out</a>
                                        <a class="dropdown-item" style="display: none;" href="auth/login.php">Login</a>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
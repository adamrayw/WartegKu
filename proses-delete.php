<?php
session_start();
include "config.php";

$id = $_SESSION['iduser'];

$ids = $_GET['id'];
$query = mysqli_query($db, "DELETE FROM cart WHERE ids = '$ids'");


header("Location: checkout.php");

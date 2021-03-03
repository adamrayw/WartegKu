<?php

include "config.php";

$id = $_GET['id'];

$result = mysqli_query($db, "SELECT * FROM featured_menu WHERE id = '$id'");
$menu = mysqli_fetch_assoc($result);


?>
<?php include "header.php";
if (!isset($_SESSION['iduser'])) {
    header("Location: checkout-error.php");
    exit();
}
?>

<div class="container">
    <div class="wrapper konfirmasi">
        <h1>Konfirmasi Menu</h1>
        <img class="mb-2" src="assets/image-resources/<?= $menu['nama_gambar']; ?>" alt="food" width="300">
        <form class="text-left" action="success-add.php" method="POST">
            <label for="nama">Nama :</label>
            <input class="form-control" type="text" name="nama" id="nama" value="<?= $menu['nama']; ?>" readonly>
            <label for="harga">Harga :</label>
            <input class="form-control" type="text" name="harga" id="harga" value="<?= $menu['harga'] ?>" readonly>
            <input class="form-control btn btn-primary" type="submit" name="submit" id="submit" value="Add to Cart">
        </form>
    </div>
</div>


<?php include "footer.php" ?>
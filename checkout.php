<?php include "header.php" ?>
<?php

// Turn off error reporting
// error_reporting(0);

include "config.php";

$id = $_SESSION['iduser'];

$result = mysqli_query($db, "SELECT * FROM cart WHERE id = '$id'");

$data = [];

while ($baris = mysqli_fetch_assoc($result)) {
    $data[] = $baris;
}

$menu = $data;

foreach ($menu as $m) {
    $price = $m['harga'];
    $total += $price;
}


?>
<?php
if (!isset($_SESSION['username'])) {
    header("Location: checkout-error.php");
    exit;
}
?>
<div class="checkout">
    <div class="checkout-wrapper">
        <div class="order-details">
            <h1 class="mb-4 fw-bolder">Order Details</h1>
            <div class="daftar-menu">
                <?php $no = 1; ?>
                <?php
                if ($no == 0) {
                    echo "Keranjang Kosong!";
                }
                ?>
                <?php foreach ($menu as $row) : ?>
                    <div class="item d-flex justify-content-between mb-2">
                        <div class="nama d-flex">
                            <p class="pe-2"><?= $no++; ?>.</p>
                            <p><?= $row['nama']; ?></p>

                        </div>
                        <div class="item-right d-flex align-items-center">

                            <p class="pe-4"><?= $row['harga'] . ".000"; ?></p>

                            <a href="proses-delete.php?id=<?= $row['ids']; ?>">

                                <i class="fas fa-trash mb-3" style="color: tomato;"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="billing-details flex-column bg-primary p-3 text-white">
            <h1>Billing Details</h1>

            <div class="radios mt-2 ">
                <form action="POST">
                    <label for="nama">Nama <br>
                        <input class="form-control" type="text" name="nama" value="<?= $_SESSION['nama']; ?>" disabled>
                    </label><br>
                    <label for="email">Email <br>
                        <input class="form-control" type="email" name="nama" value="<?= $_SESSION['email']; ?>" disabled>
                    </label><br>
                    <label for="alamat">Alamat <br>
                        <textarea class="form-control" name="alamat" id="alamat" cols="26" rows="6" disabled><?= $_SESSION['alamat'] ?></textarea>
                    </label><br>
                    <label for="alamat">Pilih Metode Pembayaran <br>
                        <select class="form-control mb-4" aria-label="Default select example" name="bank" id="bank">
                            <option selected>Pilih disini</option>
                            <option value="bca">BCA</option>
                            <option value="bri">BRI</option>
                            <option value="bca">Mandiri</option>
                            <option value="bni">BNI</option>
                            <option value="gopay">Gopay</option>
                        </select>
                    </label>
                </form>
                <small>* Pastikan semua data benar.</small><br>
                <small class="mt-5">* Untuk mengubah data silahkan ke menu Edit data.</small>
            </div>
        </div>
    </div>
    <div class="pesan-lagi mt-2">
        <a class="mt-2" href="index.php">Pesan lagi..</a><br>
    </div>

    <label class="mt-2" for="message">Message (Optional)</label>
    <textarea class="form-control mb-4" name="message" id="message"></textarea>
    <hr>
    <div class="cek-ongkir py-2 d-flex justify-content-between">
        <p>Ongkir : </p>
        <p class="text-error">Bayar ditempat</p>
    </div>
    <div class="total d-flex justify-content-between">
        <p>Total : </p>
        <p class="total">Rp <?= $total . ".000"; ?></p>
    </div>
    <div class="place-order">
        <a class="btn btn-success my-4 float-end" href="#">Place Order</a>
    </div>

</div>




<?php include "footer.php" ?>
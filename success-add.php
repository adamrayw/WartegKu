

<body style="font-family: sans-serif;">
<?php include "header.php"; ?>
<?php

include "config.php";

    $_SESSION['iduser'];
    $id = $_SESSION['iduser'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    mysqli_query($db, "INSERT INTO cart (id, nama, harga) VALUES ('$id', '$nama', '$harga')");

?>




<div class="container success-add text-center">
    <img src="assets/image/success-add.svg" alt="sucess-add" width="300px">
    <p class="mt-4">Menu berhasil di tambahkan <br> Silahkan lanjutkan pembayaran di keranjang.</p>
    <div class="mt-4">
        <a class="btn btn-primary" href="checkout.php">Keranjang</a>
        <a class="btn border" href="index.php">Home</a>
    </div>
</div>













    <!-- <script>
        function alert() {
            swal({
                title: "Makanan berhasil di tambahkan!",
                text: "Silahkan lanjutkan pembayaran di My Cart",
                icon: "success",
                button: "Selesai",
            }).then(function() {
                window.location = "index.php";
            });
        }
    </script> -->
</body>

</html>
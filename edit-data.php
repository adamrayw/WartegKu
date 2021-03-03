<?php include "header.php"; ?>
<?php

$id = $_SESSION['iduser'];

$query = mysqli_query($db, "SELECT * FROM user WHERE id = '$id'");

if (isset($_POST['submit'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $alamat = htmlspecialchars($_POST['alamat']);

    mysqli_query($db, "UPDATE user SET nama = '$nama', email = '$email', alamat = '$alamat' WHERE id = '$id'");
}


?>
<div class="edit-data">
    <h1 class="mb-4">Accounts</h1>
    <form action="" method="POST">
        <label class="form-label" for="nama">Nama <br>
            <input class="form-control" type="text" name="nama" value="<?= $_SESSION['nama']; ?> ">
        </label> <br>
        <label class="form-label my-3" for="email">Email <br>
            <input class="form-control" type="email" name="email" value="<?= $_SESSION['email']; ?>">
        </label> <br>
        <label class="form-label" for="alamat">Alamat <br>
            <textarea class="form-control px-2" name="alamat" id="alamat" cols="30" rows="4"><?= $_SESSION['alamat']; ?></textarea>
        </label>
        <hr>
        <input type="submit" name="submit" class="btn btn-success" value="Simpan Perubahan"><br><br>
        <?php if (isset($_POST['submit'])) {
            echo "<p class='text-danger'>Data telah di ubah, silahkan login ulang!</p>";
        } ?>
    </form>
</div>
<?php include "footer.php"; ?>
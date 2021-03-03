<?PHP include "header.php"; ?>
<?php

$query = mysqli_query($db, "SELECT * FROM featured_menu");

$data = [];

while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row;
}

$featured_menu = $data;



?>

<h1>Featured Menu</h1>
<div class="container mt-4">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Menu</th>
                <th scope="col">Harga</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($featured_menu as $fmenu) : ?>
                <tr>
                    <td style="display: none;"><?= $fmenu['id']; ?></td>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $fmenu['nama']; ?></td>
                    <td><?= $fmenu['harga']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $fmenu['id']; ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include "footer.php"; ?>
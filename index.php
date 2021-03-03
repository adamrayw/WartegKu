<?php
include "config.php";


$result = mysqli_query($db, "SELECT * FROM featured_menu");
// 
$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
$fmenu = $data;

?>

<?php include "header.php";

?>
<section class="hero" style="margin: 0;">
    <div class="swiper-container">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
            <div class="swiper-slide">
                <h2 data-aos="fade-up" class="disc-item">Males keluar rumah? <br> pesan di Wartegku!</h2>
                <img src="assets/image-resources/pecel.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <h2 data-aos="fade-up" class="disc-item">PROMO 12.12 <br> Diskon 50% semua menu</h2>
                <img src="assets/image-resources/pecel.jpg" alt="">
            </div>
            <div class="swiper-slide">
                <h2 data-aos="fade-up" class="disc-item">Ajak temanmu dan dapatkan diskon up to 70%!</h2>
                <img src="assets/image-resources/kokii.jpg" alt="">
            </div>

        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>

<div class="best-food mt-4">
    <div class="best-food-head" id="featured-menu">
        <h1 class="text-left">Menu yang paling sering di pesan</h1>
    </div>
    <hr>
    <div class="card-containers">
        <div class="card-container mb-2">
            <?php foreach ($fmenu as $menu) : ?>
                <a class="text-decoration-none" href="proses-add.php?id=<?= $menu['id']; ?>">
                    <div class="card">
                        <img src="assets/image-resources/<?= $menu['nama_gambar']; ?>" alt="food" width="300">
                        <div class="description">
                            <div class="price">
                                <div class="nama_menu">
                                    <p class="nama"><?= $menu['nama']; ?></p>
                                    <p class="harga">Rp <?= $menu['harga']; ?></p>
                                    <p class="category mb-4"><?= $menu['jenis']; ?></p>
                                </div>
                                <div class="rate float-end">
                                    <i class="fas fa-star" style="color: orange"></i>
                                    <small class="text-dark">4.8</small>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </a>

            <?php endforeach; ?>
        </div>
    </div>
    <div class="container text-center developer my-5 p-0">
        <div class="dev">
            <p class="p-0 m-0">Developed by <a href="https://adamray.my.id/">adamray.my.id</a></p>
        </div>
        <!-- <div class="info mt-2">
            <a href="#">Contact</a>
            <a href="#" class="px-4">Instagram</a>
            <a href="#">Review</a>
        </div> -->
    </div>
</div>
<!-- <div class="rate my-5">
    <div class="ratethis text-center">
        <a href="#" class="rate mb-2" data-toggle="modal" data-target="#exampleModal">RATE THIS WEBSITE</a>
    </div> -->


    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rate This Website</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="nama" class="form-control" id="nama" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan (Optional)</label>
                            <textarea class="form-control mb-4" name="message" id="message"></textarea>
                        </div>
                        <p>Nilai :</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                            <label class="form-check-label" for="inlineRadio1">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="option4">
                            <label class="form-check-label" for="inlineRadio4">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="option5">
                            <label class="form-check-label" for="inlineRadio5">5</label>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
</div>
<?php include "footer.php";

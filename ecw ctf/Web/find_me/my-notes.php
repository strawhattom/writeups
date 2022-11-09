<?php
include_once('header.php');
include_once('functions.php');

if(!isset($_SESSION['username'])) {
    header('Location: /login.php');
    die();
}

$user = $_SESSION['username'];
$notes = findNotes($user);

?>
<section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-2.jpg);">
            <div class="container">
                </br></br></br></br></br></br></br></br></br></br></br></br></br>
                <div class="list-group">
                    <?php
                        $i = 1;
                        foreach($notes as $note) {
                            echo "<a href='#' class='list-group-item list-group-item-action flex-column align-items-start'>
                            <div class='d-flex w-100 justify-content-between'>
                            <small>$user's note $i</small>
                            <small>2 days ago</small>
                            </div>
                            <h5>$note</h5>
                        </a>";
                        $i++;
                        }
                    ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

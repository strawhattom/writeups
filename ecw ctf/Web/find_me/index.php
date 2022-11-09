<?php
include_once('header.php');

?>

<section id="hero">
    <div class="hero-container">
      <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url(assets/img/slide/slide-1.jpg);">
            <div class="carousel-container">
              <div class="carousel-content">
                <h2 class="animate__animated animate__fadeInDown">Car Rental Service</span></h2>
                <p class="animate__animated animate__fadeInUp">You've just arrived at our airport and need a car to explore the city ? Find me is here for you</p>
                <a href="#about" class="btn-get-started scrollto animate__animated animate__fadeInUp">Read More</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-double-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-double-right" aria-hidden="true"></span>
        </a>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>About</h2>
          <p>We have a whole parking lot filled with the newest car models. What you are looking for must be here, somewhere, you just have to find it !</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <img src="assets/img/about-img.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 content">
            <h3>How to get your car ?</h3>
            <ul>
              <li><i class="bi bi-check-circle"></i> Come see us in the basement of the airport.</li>
              <li><i class="bi bi-check-circle"></i> Explore the parking lot and find your dream car.</li>
              <li><i class="bi bi-check-circle"></i> Pay the bill depending on the specs of the car</li>
            </ul>
            <h3>Do you need to create an account ?</h3>
            <ul>
              <li><i class="bi bi-check-circle"></i> No, the login functionnality is used by our employees only !</li>
            </ul>
            <h3>How to thank us ?</h3>
            <ul>
              <li><i class="bi bi-check-circle"></i> We all love MONGO candies, be kind and share them with us !</li>
            </ul>
          </div>
        </div>

      </div>
    </section>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>

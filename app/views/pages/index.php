<?php require APPROOT . '/views/inc/header.php'; ?>
<div id="banner" class="jumbotron jumbotron-fluid text-center">
  <div class="container">
  </div>
</div>

<!-- About Us Section -->
<section class="bg-light py-5">
  <div class="container">
    <h2 class="text-center mb-4">About Us</h2>
    <p>easyCart is committed to providing you with the best online shopping experience. Our team is dedicated to
      offering a wide selection of high-quality products, seamless checkout processes, and excellent customer service.
    </p>
    <img src="<?php echo URLROOT; ?>/public/img/about-us.jpg" class="img-fluid rounded mx-auto d-block" alt="About Us Image">
  </div>
</section>

<!-- Why Choose Easy Cart Section -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-4">Why Choose easyCart</h2>
    <p>At easyCart, we understand that convenience, reliability, and affordability are essential when it comes to online
      shopping. That's why we strive to make your shopping experience as effortless and enjoyable as possible. With
      easyCart, you can shop with confidence, knowing that you're getting the best products at the best prices.</p>
    <img src="https://via.placeholder.com/500" class="img-fluid rounded mx-auto d-block" alt="Why Choose Us Image">
  </div>
</section>

<!-- Partner With Us Section -->
<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-4">Partner With Us</h2>
        <div id="partnerCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <!-- Add partner logos as carousel items -->
                <div class="carousel-item active">
                    <img src="partner1.jpg" class="d-block mx-auto img-thumbnail" alt="Partner Logo 1" style="width: 150px;">
                </div>
                <div class="carousel-item">
                    <img src="partner2.jpg" class="d-block mx-auto img-thumbnail" alt="Partner Logo 2" style="width: 150px;">
                </div>
                <!-- Add more carousel items as needed -->
            </div>
            <!-- Add carousel control buttons -->
            <a class="carousel-control-prev" href="#partnerCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#partnerCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>


<?php require APPROOT . '/views/inc/footer.php'; ?>
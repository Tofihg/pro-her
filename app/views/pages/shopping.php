<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
  <h1 class="mt-5 mb-4 text-center">Products</h1>
  <div class="row">
    <?php
    // Example array of products (replace with actual data fetched from database)
    $products = $products = $data['products'];

    foreach ($products as $product) {
      ?>
      <div class="col-md-4 mb-3">
        <div class="card product-card">
          <img src=" <?php echo URLROOT ?>\img\products\<?php echo $product->image; ?>" class="card-img-top"
            alt="<?php echo $product->name; ?>" with="150" height="300">
          <div class="card-body">
            <h5 class="card-title"><?php echo $product->name; ?></h5>
            <p class="card-text">Price: $<?php echo $product->price; ?></p>
            <!-- Add other product information here -->
            <a href="#" class="btn btn-primary">Add to Cart</a>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
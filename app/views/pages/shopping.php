<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('order_message'); ?>
<div class="container">
  <h1 class="mt-5 mb-4">Products</h1>
  <div class="row">
    <?php
    // Example array of products (replace with actual data fetched from database)
    $products = $products = $data['products'];

    foreach ($products as $product) {
      ?>
      <div class="col-md-4 mb-3">
        <div class="card product-card">
          <img src="<?php echo URLROOT ?>\img\products\<?php echo $product->image; ?>" class="card-img-top"
            alt="<?php echo $product->name; ?>" with="150" height="300">
          <div class="card-body">
            <h5 class="card-title"><?php echo $product->name; ?></h5>
            <p class="card-text">Price: $<?php echo $product->price; ?></p>
            <!-- Add other product information here -->
            <button class="btn btn-primary addToCartBtn" data-product-id="<?php echo $product->productId; ?>">Add to Cart</button>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.addToCartBtn').click(function () {
            var productId = $(this).data('product-id');
            addToCart(productId);
        });
        
        function addToCart(productId) {
            $.ajax({
                type: 'GET',
                url: '<?php echo URLROOT; ?>/pages/addToCart',
                data: { productId: productId },
                success: function (response) {
                  window.location.reload();
                    // Optionally, do something after successful addition to cart
                },
                error: function (xhr, status, error) {
                    console.error('Request failed. Status: ' + status + ', Error: ' + error);
                    // Optionally, handle error
                }
            });
        }
    });
</script>




<?php require APPROOT . '/views/inc/footer.php'; ?>
<?php
class Pages extends Controller
{

  public function __construct()
  {
    $this->productModel = $this->model('Product');
  }

  public function index()
  {
    $data = [
      'title' => 'Twitter'
    ];

    // Load view
    $this->view('pages/index', $data);
  }

  public function shopping()
  {
    $this->createShoppingSession();

    $data = [
      'title' => 'Shopping',
      'products' => $this->productModel->getProducts()
    ];

    $this->view('pages/shopping', $data);
  }

  public function cart()
  {
    $cartProducts = [];

    if (isset($_SESSION['products']) && is_array($_SESSION['products'])) {
      foreach ($_SESSION['products'] as $product) {
        $productDetails = $this->productModel->getProductById($product['product_id']);
        // If product details are found, add them to the cartProducts array
        if ($productDetails) {
          $productDetails->quantity = $product['quantity'];
          $cartProducts[] = $productDetails;
        }
      }
    }

    $data = [
      'title' => 'Cart',
      'products' => $cartProducts
    ];

    // Load the view with the data
    $this->view('pages/cart', $data);
  }

  public function addToCart($productId)
  {
    $product = $this->productModel->getProductById($productId);

    if ($product) {
      // Check if the product is already in the session
      $productExists = false;
      foreach ($_SESSION['products'] as &$sessionProduct) {
        if ($sessionProduct['product_id'] == $productId) {
          // If the product exists, increment its quantity
          $sessionProduct['quantity']++;
          $productExists = true;
          break;
        }
      }

      // If the product is not already in the session, add it with quantity 1
      if (!$productExists) {
        $_SESSION['products'][] = ['product_id' => $productId, 'quantity' => 1];
      }
    }
  }

  public function placeOrder()
  {
    if (!isset($_SESSION['user_id']))
      redirect('users/login');

    if (isset($_SESSION['products']) && is_array($_SESSION['products']) && isset($_SESSION['user_id'])) {
      // Iterate through the products
      foreach ($_SESSION['products'] as $product) {
        $product['user_id'] = $_SESSION['user_id'];
        $this->productModel->placeOrder($product);
      }
      $_SESSION['products'] = [];
      flash('order_message', 'Order is  Placed!');
      redirect('pages/shopping');

    } else {
      die('Something went wrong');
    }
  }


  private function createShoppingSession()
  {
    if (!isset($_SESSION['products']))
      $_SESSION['products'] = [];
  }

}
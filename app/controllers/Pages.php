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

  private function createShoppingSession()
  {
    if (!isset($_SESSION['products']))
      $_SESSION['products'] = [];
  }

}
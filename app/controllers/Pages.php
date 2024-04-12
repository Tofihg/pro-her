<?php
class Pages extends Controller
{

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
    $this->productModel = $this->model('Product');

    $data = [
      'title' => 'Shopping',
      'products' => $this->productModel->getProducts()
    ];

    $this->view('pages/shopping', $data);
  }

  public function test()
  {
    echo 'test';
    # code...
  }
}
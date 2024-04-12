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
    $data = [
      'title' => 'Shopping'
    ];

    $this->view('pages/shopping', $data);
  }

  public function test()
  {
    echo 'test';
    # code...
  }
}
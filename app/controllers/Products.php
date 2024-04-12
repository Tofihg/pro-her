<?php
class Products extends Controller
{
  public function __construct()
  {
    $this->productModel = $this->model('Product');
  }

  public function index()
  {    
    $data = [
      'title' => 'Shopping',
      'products' => $this->productModel->getProducts()
    ];

    $this->view('pages/shopping', $data);
  }

  // public function isLoggedIn()
  // {
  //   if (isset($_SESSION['user_id'])) {
  //     return true;
  //   } else {
  //     return false;
  //   }
  // }

  // public function addToCartdd()
  // {
  //   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //     // Sanitize POST array
  //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  //     $data = [
  //       'title' => trim($_POST['title']),
  //       'body' => trim($_POST['body']),
  //       'image' => trim($_POST['image']),
  //       'user_id' => $_SESSION['user_id'],
  //       'title_err' => '',
  //       'body_err' => ''
  //     ];

  //     // Validate data
  //     if (empty($data['title'])) {
  //       $data['title_err'] = 'Please enter title';
  //     }
  //     if (empty($data['body'])) {
  //       $data['body_err'] = 'Please enter body text';
  //     }

  //     if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
  //       $uploadDir = URLROOT . 'uploads/';
  //       var_dump($uploadDir);
  //       $uploadFile = $uploadDir . uniqid() . '_' . basename($_FILES['image']['name']);

  //       if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
  //         // die('Photo was uploaded successfu');
  //         // File was uploaded successfully
  //       } else {
  //         die('Error uploading photo!');
  //       }
  //     }


  //     // Make sure no errors
  //     if (empty($data['title_err']) && empty($data['body_err'])) {
  //       // Validated
  //       if ($this->postModel->addPost($data)) {
  //         flash('post_message', 'Post Added');
  //         redirect('posts');
  //       } else {
  //         die('Something went wrong');
  //       }
  //     } else {
  //       // Load view with errors
  //       $this->view('posts/add', $data);
  //     }
  //   } else {
  //     $data = [
  //       'title' => '',
  //       'body' => '',
  //       'image' => '',
  //       'title_err' => '',
  //       'body_err' => ''
  //     ];

  //     $this->view('posts/add', $data);
  //   }
  // }

  // public function edit($id)
  // {
  //   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //     // Sanitize POST array
  //     $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

  //     $data = [
  //       'id' => $id,
  //       'title' => trim($_POST['title']),
  //       'body' => trim($_POST['body']),
  //       'user_id' => $_SESSION['user_id'],
  //       'title_err' => '',
  //       'body_err' => ''
  //     ];

  //     // Validate data
  //     if (empty($data['title'])) {
  //       $data['title_err'] = 'Please enter title';
  //     }
  //     if (empty($data['body'])) {
  //       $data['body_err'] = 'Please enter body text';
  //     }

  //     // Make sure no errors
  //     if (empty($data['title_err']) && empty($data['body_err'])) {
  //       // Validated
  //       if ($this->postModel->updatePost($data)) {
  //         flash('post_message', 'Post Updated');
  //         redirect('posts');
  //       } else {
  //         die('Something went wrong');
  //       }
  //     } else {
  //       // Load view with errors
  //       $this->view('posts/edit', $data);
  //     }
  //   } else {
  //     // Get existing post from model
  //     $post = $this->postModel->getPostById($id);

  //     // Check for owner
  //     if ($post->user_id != $_SESSION['user_id']) {
  //       redirect('posts');
  //     }

  //     $data = [
  //       'id' => $id,
  //       'title' => $post->title,
  //       'body' => $post->body,
  //       'title_err' => '',
  //       'body_err' => ''
  //     ];

  //     $this->view('posts/edit', $data);
  //   }
  // }

  public function addToCart($productId)
  {

    var_dump(1);
    $product = $this->productModel->getProductById($productId);

    if ($product)
      array_push($_SESSION['products'], ['id' => $productId, 'name' => $product->name, 'quantity' => 1]);
  }

  // public function delete($id)
  // {
  //   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //     // Get existing post from model
  //     $post = $this->postModel->getPostById($id);

  //     // Check for owner
  //     if ($post->user_id != $_SESSION['user_id']) {
  //       redirect('posts');
  //     }

  //     if ($this->postModel->deletePost($id)) {
  //       flash('post_message', 'Post Removed');
  //       redirect('posts');
  //     } else {
  //       die('Something went wrong');
  //     }
  //   } else {
  //     redirect('posts');
  //   }
  // }

  // public function addLike($post_id)
  // {
  //   // var_dump($post_id);
  //   $data = [
  //     'user_id' => $_SESSION['user_id'],
  //     'post_id' => $post_id
  //   ];

  //   if ($this->likeModel->hasLike($data))
  //     $this->likeModel->deleteLike($data);
  //   else
  //     $this->likeModel->addLike($data);
  // }
}

<?php
  include_once('../models/book.php');
  include_once('../helpers/index.php');

  if(isset($_FILES['uploadFile']['name'])) {
    $file = $_FILES['uploadFile']['tmp_name'];
    $file_name = $_FILES['uploadFile']['name'];
    $file_name_array = explode(".", $file_name);
    $extension = end($file_name_array);
    $new_image_name = rand() . '.' . $extension;
    chmod('../public/images/books/upload', 0777);
    $allowed_extension = array("jpg", "gif", "png");
    
    if(in_array($extension, $allowed_extension)) {
      $isUploaded = move_uploaded_file($file, '../public/images/books/upload/' . $new_image_name);
      if($isUploaded) {
        $_REQUEST['uploadFile'] = 'images/books/upload/' . $new_image_name;
      }
    }
  }

  $id = randomString(10);
  $bookName = $_REQUEST['bookName'];
  $author = $_REQUEST['author'];
  $coverPrice = $_REQUEST['coverPrice'];
  $discount = $_REQUEST['discount'];
  $inventory = $_REQUEST['inventory'];
  $categoryId = $_REQUEST['categoryId'];
  $description = $_REQUEST['description'];
  $imageUrl = $_REQUEST['uploadFile'];

  $ok = Book::addOne($id, $bookName,$author,$coverPrice,$discount,$inventory,$categoryId,$description,$imageUrl);
  if($ok) {
    // header("Location: http://localhost/book-store-php/views/newpost.php"); 
    echo '<script>confirm("Thêm sách thành công! Thêm sách khác") ? window.location.href = "http://localhost/book-store-php/views/newpost.php" : window.location.href = "http://localhost/book-store-php/views/home.php"</script>';
  }
  
?>
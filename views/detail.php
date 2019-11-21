<?php
  include_once('../models/category.php');
  include_once('../models/book.php');

  $bookId = $_REQUEST["bookId"];
  $book = Book::getById($bookId);

  echo '<pre>' . var_export($book, true) . '</pre>';
?>

<!DOCTYPE html>
<html>

<?php
  include_once('./components/head.php');
?>

<body>
  <div class="container">
    <div class="sticky-top">
      <?php 
        include_once('./components/header.php');
        include_once('./components/nav.php');
      ?>
    </div>

    <div class="row">
      <!-- Book image -->
      <div class="col-12 col-md-4">
        <div class="text-center">
          <img src="../public/<?php echo $book->imageUrl ?>" class="img-fluid" alt="img">
        </div>
      </div>
      
      <!-- Book detail -->
      <div class="col-12 col-md-8">
        <div class="px-0 px-md-3">
          <h4 class="h4 mt-2"><?php echo $book->bookName ?></h4>
          <p><?php echo $book->author ?></p>
          <p class="text-muted d-inline align-top" style="text-decoration: line-through; font-size: 0.75rem"><?php echo $book->coverPrice ?>đ</p>
          <p class="text-danger font-weight-bold"><?php echo $book->price ?>đ</p>
          <button class="btn btn-sm btn-outline-danger mr-2"><i class="fas fa-cart-plus"></i> Thêm vào giỏ</button>
          <a href="cart.php?op=add&id=<?php echo $book->bookId ?>"><button class="btn btn-sm btn-danger mx-1">Thanh toán</button></a>
          <button class="btn btn-sm border-0" title="Yêu thích"><i class="fas fa-heart text-danger"></i></button>
        </div>
      </div>
    </div>
    
    <!-- Book description -->
    <div class="mt-2 mt-md-5">
      <h3 class="h3">Mô tả:</h3>
      <hr>
      <p><?php echo $book->description ?></p>
    </div>

    <?php 
      include_once('./components/footer.php');
    ?>
  </div>

  <?php include_once('./components/script.php'); ?>
  <script>
    // add cart

    // checkout
  </script>
</body>
</html>
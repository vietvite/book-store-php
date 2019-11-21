<?php
  include_once('../models/category.php');
  $categories = Category::getAllCategories();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light pt-0 mb-4">
  <div class="dropdown">
    <button class="btn btn-sm btn-light dropdown-toggle ml-n2 mr-4 font-weight-bold" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Thể loại
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <?php foreach ($categories as $key => $value) { ?>
      <a class="dropdown-item" href="category.php?categoryId=<?php echo $value->categoryId ?>"><?php echo $value->categoryName ?></a>
      <?php } ?>
    </div>
  </div>
  <div class="ml-auto">
  	<a href="http://localhost/book-store-php/views/cart.php">
    	<button id="cart" class="btn btn-sm btn-light btn-outline-danger" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-cart-arrow-down"></i> Giỏ hàng <span class="text-dark" id="cartQuantity"></span></button>
    </a>
  </div>
</nav>
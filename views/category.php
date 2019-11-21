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

    <div class="px-3">
      <?php
        include_once('./components/bestsale.php');
      ?>
      <?php 
        include_once('../models/book.php');
        $select = array($_REQUEST["categoryId"]);
        $category = Category::getCategoryByIds($select);
        $booksByCategory = Book::getBookByCategory($category);
        
        $category = (object) $booksByCategory[0];
      ?>
      <div class="mt-3">
      <a href="category.php?categoryId=<?php echo $category->categoryId ?>" class="text-decoration-none"><h3 class="h3 d-inline text-dark"><?php echo $category->categoryName ?></h3></a>
        <hr>
        <div class="row">
          <?php foreach ($category->books as $value) { ?>

          <div class="col-12 col-md-3 pb-1 pb-md-3">
            <div class="hover-shadow card border-0" style="width: 15rem;">
              <a href="detail.php?bookId=<?php echo $value->bookId ?>" class="text-decoration-none text-dark">
                <img src="../public/<?php echo $value->imageUrl ?>" class="card-img-top" alt="img">
                <div class="card-body text-center pt-0">
                  <h6 class="card-title mb-1 text-truncate" title="<?php echo $value->bookName ?>"><?php echo $value->bookName ?></h6>
                  <p class="mb-1 text-muted text-truncate"><?php echo $value->author ?></p>
                  <p class="text-muted d-inline align-top" style="text-decoration: line-through; font-size: 0.75rem"><?php echo $value->coverPrice ?> đ</p>
                  <p class="font-weight-bold d-inline pl-2 pl-md-4"><?php echo round((($value->price - $value->coverPrice)/$value->coverPrice)*100) ?>%</p>

                  <p class="text-danger mb-1"><?php echo $value->price ?> đ</p>
                  <button onclick="checkout(event,'<?php echo $value->bookId ?>')" class="btn btn-danger btn-sm" title="Thanh toán"><i class="px-2 fas fa-shopping-cart"></i></button>
                  <button onclick="addCart(event,'<?php echo $value->bookId ?>')" class="btn btn-danger btn-sm"><i class="px-2 fas fa-plus" title="Thêm vào giỏ"></i></button>
                </div>
              </a>
            </div>
          </div>

          <?php } ?>
          <script>
            function addCart(e, bookId) {
              e.preventDefault();
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  // const rs = JSON.parse(this.responseText);
                  $('#cart').tooltip({ 
                    title: 'Đã thêm vào giỏ',
                    template: "<div class='bg-light border border-secondary rounded-lg m-2 p-2'>Đã thêm vào giỏ</div>"
                  }).tooltip('show')
                }
              };
              xmlhttp.open("GET", `../controllers/cart.controller.php?op=add&bookId=${bookId}`, true);
              xmlhttp.send();
            }

            function checkout(e, bookId) {
              e.preventDefault();
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  // const rs = JSON.parse(this.responseText);
                  window.location.href = "http://localhost/book-store-php/views/cart.php";
                }
              };
              xmlhttp.open("GET", `../controllers/cart.controller.php?op=add&bookId=${bookId}`, true);
              xmlhttp.send();
            }
          </script>
        </div>
      </div>
    </div>

    <?php 
      include_once('./components/footer.php');
    ?>
  </div>

  <?php include_once('./components/script.php'); ?>
  
  <script type="text/javascript" src="../public/vendor/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
  <script type="text/javascript">
  $('.owl-carousel').owlCarousel({
      items:4,
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:2000,
      autoplayHoverPause:true
  });
  </script>
</body>
</html>
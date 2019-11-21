<?php 
  include_once('../models/book.php');
  $select = array('vanhoc', 'kynang');
  $category = Category::getCategoryByIds($select);
  $bookByCategory = Book::getBookByCategory($category, 8);
?>
<?php foreach ($bookByCategory as $value) { 
  $value = (object) $value;
  ?>
  <div class="mt-3">
    <a href="category.php?categoryId=<?php echo $value->categoryId ?>" class="text-decoration-none"><h3 class="h3 d-inline text-dark"><?php echo $value->categoryName ?></h3></a>
    <hr>
    <div class="row">
      <?php foreach ($value->books as $key => $value) { ?>

      <div class="col-12 col-md-3 pb-1 pb-md-3">
        <div class="hover-shadow card border-0" style="width: 15rem;">
          <a href="detail.php?bookId=<?php echo $value->bookId ?>" class="text-decoration-none text-dark">
            <img src="../public/<?php echo $value->imageUrl ?>" class="card-img-top" alt="img">
            <div class="card-body text-center pt-0">
              <h6 class="card-title mb-1 text-truncate" title="<?php echo $value->bookName ?>"><?php echo $value->bookName ?></h6>
              <p class="mb-1 text-muted text-truncate"><?php echo $value->author ?></p>
              <p class="text-muted d-inline align-top" style="text-decoration: line-through; font-size: 0.75rem"><?php echo $value->coverPrice ?> đ</p>
              <p class="font-weight-bold d-inline pl-2 pl-md-4"><?php echo round((($value->price - $value->coverPrice)/$value->coverPrice)*100) ?>%</p>

              <p class="text-danger mb-1"><?php echo number_format($value->price , 0, ',', '.'); ?> đ</p>
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
              window.location.href = "http://localhost/book-store-php/views/cart.php";
            }
          };
          xmlhttp.open("GET", `../controllers/cart.controller.php?op=add&bookId=${bookId}`, true);
          xmlhttp.send();
        }
      </script>
    </div>
  </div>
<?php } ?>
<!DOCTYPE html>
<html>

<?php
  include_once('./components/head.php');
  include_once('../models/cart.php');
  include_once('../helpers/index.php');

  session_start();
  // $_SESSION["cart"] = null;
  $books = $_SESSION["cart"];
  // echo '<pre>' . var_export($books, true) . '</pre>';
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
      <h2 class="mb-3">Giỏ hàng</h2>

      <?php if(isset($books)) { ?>
      <div class="row">
        <div class="col-md-9">
        <?php foreach ($books as $key => $value) { ?>
          <div id="book<?php echo $value->bookId ?>" class="d-flex justify-content-between bg-white p-4 ml-n3 mb-3">
            <div class="d-flex flex-col">
              <img style="width: 26%;" alt="bookimg" src="../public/<?php echo $value->imageUrl ?>">
              <div>
                <h5><?php echo $value->bookName ?></h5>
                <p class="text-danger"><?php echo number_format($value->price , 0, ',', '.'); ?>đ</p>
              </div>
            </div>
            
            <div class="d-flex flex-row">
              <h5 class="mr-4" id="sumProductPrice<?php echo $value->bookId ?>"><?php echo number_format($value->price * $value->quantity , 0, ',', '.'); ?>đ</h5>
              <div style="width: 79px;">
                <div class="input-group input-group-sm">
                  <div class="input-group-prepend">
                    <a class="btn btn-outline-secondary" onclick="updateQuantity(event,'down','<?php echo $value->bookId ?>')">
                      -
                    </a>
                  </div>
                  <input id="quantity<?php echo $value->bookId ?>" type="text" class="form-control" placeholder="" value="<?php echo $value->quantity ?>">
                  <div class="input-group-append">
                    <a class="btn btn-outline-secondary" onclick="updateQuantity(event,'up','<?php echo $value->bookId ?>')">
                      +
                    </a>
                  </div>
                </div>
              </div>
              <div>
                <a class="text-decoration-none m-3 text-dark" onclick="removeItem(event,'<?php echo $value->bookId ?>')"><i class="far fa-trash-alt"></i></a>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>

        <div class="col-md-3 bg-white p-3">
          <div class="d-flex flex-row justify-content-between">
            <h4 class="font-weight-light">Thành tiền:</h4>
            <h4 id="sumCartPrice<?php $value->bookId ?>" class="font-weight-light">
              <?php
                echo number_format(calcCartPrice($books) , 0, ',', '.');
              ?>
              đ</h4>
          </div>
          <button style="width: 100%" class="d-block btn btn-danger mt-4">Đặt hàng</button>
        </div>
      </div>
    <?php } else { ?>
   		<div class="">
   			<img class="rounded mx-auto d-block mr-n5 mb-5" src="../public/images/empty-cart.png">
   		</div>
   	<?php } ?>
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

  function updateQuantity(e, op, bookId) {
    e.preventDefault();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        const rs = JSON.parse(this.responseText);
        // console.log(rs);
        
        if(rs.error) return;
        
        document.getElementById(`quantity${bookId}`).value = rs.quantity;
        document.getElementById(`sumProductPrice${bookId}`).innerHTML = rs.sumProductPrice + 'đ';
        document.getElementById(`sumCartPrice`).innerHTML = rs.sumCartPrice + ' đ';
      }
    };
    if (op == 'up') {
      xmlhttp.open("GET", `../controllers/cart.controller.php?op=up&bookId=${bookId}`, true);
    } else {
      xmlhttp.open("GET", `../controllers/cart.controller.php?op=down&bookId=${bookId}`, true);
    }
    xmlhttp.send();
  }

  function removeItem(e, bookId) {
    e.preventDefault();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        const rs = JSON.parse(this.responseText);
        console.log({rs});
        
        // if(rs.emptyCart) {
        //   location.reload();
        //   return;
        // }
        if(rs.emptyCart) window.location.href = "http://localhost/book-store-php/views/home.php";
        const item = document.getElementById(`book${bookId}`);
        item.parentNode.removeChild(item);
        document.getElementById(`sumCartPrice`).innerHTML = rs.sumCartPrice + ' đ';
      }
    };
    xmlhttp.open("GET", `../controllers/cart.controller.php?op=remove&bookId=${bookId}`, true);
    xmlhttp.send();
  }
  </script>
</body>
</html>
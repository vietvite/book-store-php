<nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
  <a class="navbar-brand" href="http://localhost/book-store-php/views/home.php">Book Store</a>

  <!-- Account button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#account" aria-controls="account" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-user"></i>
  </button>

  <!-- Nav button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-search"></i>
  </button>

  <div class="collapse navbar-collapse" id="navbar">
      <form class="input-group my-3 my-md-0" action="/book_trading_servlet/search" method="get">
		<input type="text" class="form-control" name="keyword" value="" placeholder="Tìm kiếm" aria-label="Tìm kiếm" aria-describedby="button-addon2">
		<div class="input-group-append">
		  <button class="btn border-top border-right border-bottom" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
		</div>      
      </form>
  </div>

  <div class="collapse navbar-collapse flex-grow-0" id="account">
    <div class="pl-md-3 my-3 my-md-0 text-center">
      <button class="btn btn-sm btn-light font-weight-bold border-0"><i class="fas fa-user-circle"></i> Tài khoản</button>
      <!-- <button class="btn btn-sm btn-light font-weight-bold border-0"><i class="fas fa-user-circle"></i> Đăng nhập</button>
      <button class="btn btn-sm btn-light font-weight-bold border-0"><i class="fas fa-user-circle"></i> Đăng ký</button> -->
    </div>
  </div>
</nav>
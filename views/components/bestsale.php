<?php 
  include_once('../models/book.php');
	$books = Book::getBestSales();
?>

<div class="mt-5">
	<h3 class="h3 d-inline text-dark">Best Sale</h3>
	<hr>
	<div class="owl-carousel owl-theme">
	<?php foreach ($books as $key => $value) { ?>
	<a href="detail.php?bookId=<?php echo $value->bookId ?>">
		<div class="item bg-primary"><img src="../public/<?php echo $value->imageUrl ?>" class="card-img-top" alt="img"></div>
	</a>
	<?php } ?>
	</div>
</div>
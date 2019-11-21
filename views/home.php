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
        include_once('./components/carousel.php');
        include_once('./components/bestsale.php');
        include_once('./components/categorySection.php');
      ?>
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
  $(document).ready(function() {
    // $('#cart').tooltip({ 
    //   title: 'Added to cart'
    // }).tooltip('show')
  });
  </script>
</body>
</html>
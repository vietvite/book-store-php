<?php include_once('../database/database.php') ?>

<?php 
  class Payment {
    var $paymentId;
    var $userId;
    var $cartId;

    function __construct($paymentId, $userId, $cartId) {
      $this->paymentId = $paymentId;
      $this->userId = $userId;
      // $this->cartId = $cartId;
    }

    static function setPayment($payment, $cart) {
      $conn = Database::getConnection();

      $query = "INSERT INTO `cart`(`categoryId`, `categoryName`) VALUES ([value-1],[value-2])";
      $rs = $conn->query($query);

      return $rs->num_rows > 0 ? fetchBook($rs) : null;
    }
    
  }
?>
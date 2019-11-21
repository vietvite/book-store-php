<?php
  function calcCartPrice($cart) {
    $sum = 0;
    foreach ($cart as $key => $value) {
      $sum = $sum + ($value->price * $value->quantity);
    }
    return $sum;
  }
?>
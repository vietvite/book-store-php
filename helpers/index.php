<?php
  function calcCartPrice($cart) {
    $sum = 0;
    foreach ($cart as $key => $value) {
      $sum = $sum + ($value->price * $value->quantity);
    }
    return $sum;
  }

  function randomString($n=10) { 
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
  $randomString = ''; 

  for ($i = 0; $i < $n; $i++) { 
    $index = rand(0, strlen($characters) - 1); 
    $randomString .= $characters[$index]; 
  } 

  return $randomString; 
} 
?>
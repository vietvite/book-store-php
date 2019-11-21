<?php
  include_once('../models/cart.php');
  include_once('../models/book.php');

  $op = $_REQUEST["op"];
  $bookId = $_REQUEST["bookId"];
  if ($op === "") return;
  if ($bookId === "") return;

  session_start();
  // $_SESSION["cart"] = null;
  $cart = $_SESSION["cart"]; // typeof cart is an array

  include_once('../helpers/index.php');
  include_once('./response.php');

  if($op === "add") {
    $book = Book::getById($bookId);
    if(!isset($book)) return;

    // if current cart is empty, add new
    if(!isset($cart)) {
      var_dump(isset($cart));
      $cart = array();
      array_push($cart, new Cart(
        $book->bookId,
        $book->bookName,
        $book->author,
        $book->price,
        1,
        $book->imageUrl,
      ));
    } else {
      $bookExisted = false;
      // if book existed, update quantity
      foreach ($cart as $key => $value) {
        if($value->bookId === $bookId) {
          $value->quantity++;
          $bookExisted = true;
        }
      }

      // if book not existed, add new
      if(!$bookExisted) {
        array_push($cart, new Cart(
          $book->bookId,
          $book->bookName,
          $book->author,
          $book->price,
          1,
          $book->imageUrl,
        ));
      }
    }
    $_SESSION["cart"] = $cart;
    return;
  }

  if($op === "up") {
    foreach ($cart as $key => $value) {
      if($value->bookId === $bookId) {
        $value->quantity++;
        $quantity = $value->quantity;
        $sumProductPrice = $value->quantity * $value->price;
      }
    }
    $_SESSION["cart"] = $cart;
    
    $resParams = array(
      "quantity" => $quantity, 
      "sumProductPrice" => $sumProductPrice, 
      "sumCartPrice" => calcCartPrice($cart));

    resSuccess($resParams);
  }

  if($op === "down") {
    foreach ($cart as $key => $value) {
      if($value->bookId === $bookId) {
        if($value->quantity <= 1) {
          resError();
          return;
        }
        $value->quantity--;
        $quantity = $value->quantity;
        $sumProductPrice = $value->quantity * $value->price;
      }
    }
    $_SESSION["cart"] = $cart;
    $resParams = array(
      "quantity" => $quantity, 
      "sumProductPrice" => $sumProductPrice, 
      "sumCartPrice" => calcCartPrice($cart));

    resSuccess($resParams);
  }

  if($op === "remove") {
    foreach ($cart as $key => $value) {
      if($value->bookId === $bookId) {
        unset($cart[$key]);
      }
    }
    if(empty($cart)) $cart = null;
    $_SESSION["cart"] = $cart;

    if($cart === null) {
      resSuccess(["emptyCart" => true]);
      return;
    }
    
    $resParams = array(
      "emptyCart" => false, 
      "sumCartPrice" => calcCartPrice($cart));

    resSuccess($resParams);
  }

?>
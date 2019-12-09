<?php
  include_once('../models/cart.php');
  include_once('../models/book.php');
  include_once('../helpers/index.php');
  include_once('./response.php');

  $op = $_REQUEST['op'];
  $bookId = $_REQUEST['bookId'];
  if ($op === '') return resError(['msg' => 'URL không hợp lệ']);
  if ($bookId === '') return resError(['msg' => 'Không tìm thấy sách']);

  session_start();
  $rCart = $_SESSION['cart']; // typeof rootCart is an array

  /**
   * Handle request
   */
  if($op === 'add') {
    $book = Book::getOneById($bookId);
    if(!isset($book)) {
      return resError(['msg' => 'Không tìm thấy sách']);
    };

    // if current cart is empty, add new
    if(!isset($rCart)) {
      $cart = initCart($book);
    } else {
      $cart = addCart($rCart, $bookId, $book);
    }
    return $_SESSION['cart'] = $cart;
  }

  if($op === 'up' || $op === 'down') {
    $result = $op === 'up' 
      ? updateCart($rCart, $bookId, 1) 
      : updateCart($rCart, $bookId, -1);

    if($result['error']) return resError();

    $_SESSION['cart'] = $result['cart'];
    
    return resSuccess([
      'quantity' => $result['quantity'], 
      'itemPrice' => $result['itemPrice'], 
      'totalPrice' => calcCartPrice($rCart)
    ]);
  }

  if($op === 'remove') {
    $cart = removeCart($rCart, $bookId);

    $_SESSION['cart'] = $cart;

    if(!isset($cart)) {
      return resSuccess(['emptyCart' => true]);
    }
    
    return resSuccess([
      'emptyCart' => false, 
      'totalPrice' => calcCartPrice($cart)
    ]);
  }

  /**
   * Handle function
   */
  function initCart($book) {
    $cart = array();
    array_push($cart, new Cart(
      $book->bookId,
      $book->bookName,
      $book->author,
      $book->price,
      1,
      $book->imageUrl,
    ));

    return $cart;
  }

  function addCart($rCart, $bookId, $book) {
    $bookExisted = false;
    $cloneCart = $rCart;

    // update quantity if book existed
    foreach ($cloneCart as $value) {
      if($value->bookId === $bookId) {
        $value->quantity++;
        $bookExisted = true;
      }
    }

    // if book not existed, add new
    if(!$bookExisted) {
      array_push($cloneCart, new Cart(
        $book->bookId,
        $book->bookName,
        $book->author,
        $book->price,
        1,
        $book->imageUrl,
      ));
    }

    return $cloneCart;
  }

  function updateCart($rCart, $bookId, $arg) {
    $cloneCart = $rCart;
    foreach ($cloneCart as $value) {
      if($value->bookId === $bookId) {
        if($arg < 0 && $value->quantity <= 1) {
          // if operation is down quantity
          // and current quantity is equal 1, prevent this operation
          return array('error' => true);
        }
        $value->quantity += $arg;
        $quantity = $value->quantity;
        $itemPrice = $value->quantity * $value->price;
      }
    }

    return array(
      'error' => false, 
      'cart' => $cloneCart, 
      'quantity' => $quantity, 
      'itemPrice' => $itemPrice);
  }

  function removeCart($rCart, $bookId) {
    $cloneCart = $rCart;
    foreach ($cloneCart as $key => $value) {
      if($value->bookId === $bookId) {
        unset($cloneCart[$key]);
      }
    }
    
    return empty($cloneCart) ? null : $cloneCart;
  }
?>
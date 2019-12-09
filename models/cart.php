<?php 
  class Cart {
    var $bookId;
    var $bookName;
    var $author;
    var $price;
    var $quantity;
    var $imageUrl;

    function __construct($bookId, $bookName, $author, $price, $quantity, $imageUrl) {
      $this->bookId = $bookId;
      $this->bookName = $bookName;
      $this->author = $author;
      $this->price = $price;
      $this->quantity = $quantity;
      $this->imageUrl = $imageUrl;
    }
  }
?>
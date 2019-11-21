<?php include_once('../database/database.php') ?>

<?php 
  class Book {
    var $bookId;
    var $bookName;
    var $author;
    var $price;
    var $coverPrice;
    var $description;
    var $categoryType;
    var $quantity;
    var $imageUrl;

    function __construct($bookId, $bookName, $author, $price, $coverPrice, $description, $categoryType, $quantity, $imageUrl) {
      $this->bookId = $bookId;
      $this->bookName = $bookName;
      $this->author = $author;
      $this->price = $price;
      $this->coverPrice = $coverPrice;
      $this->description = $description;
      $this->categoryType = $categoryType;
      $this->quantity = $quantity;
      $this->imageUrl = $imageUrl;
    }

    static function getAllBooks() {
      $conn = Database::getConnection();

      $query = "SELECT * FROM books";
      $rs = $conn->query($query);
      $returnArr = array();
      if($rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
          array_push($returnArr, new Book(
            $row["id"],
            $row["bookname"],
            $row["author"],
            $row["price"],
            $row["coverPrice"],
            $row["description"],
            $row["categoryId"],
            $row["quantity"],
            $row["imageUrl"]
          ));
        };
      }

      return $returnArr;
    }

    static function getBestSales() {
      $conn = Database::getConnection();

      $query = "SELECT * FROM books LIMIT 10";
      $rs = $conn->query($query);
      $returnArr = array();
      if($rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
          array_push($returnArr, new Book(
            $row["id"],
            $row["bookname"],
            $row["author"],
            $row["price"],
            $row["coverPrice"],
            $row["description"],
            $row["categoryId"],
            $row["quantity"],
            $row["imageUrl"]
          ));
        };
      }

      return $returnArr;
    }

    static function getById($bookId) {
      $conn = Database::getConnection();

      $query = "SELECT * FROM books WHERE id='$bookId'";
      $rs = $conn->query($query);
      $returnArr = array();
      if($rs->num_rows > 0) {
        $row = $rs->fetch_assoc();
        $returnArr = new Book(
          $row["id"],
          $row["bookname"],
          $row["author"],
          $row["price"],
          $row["coverPrice"],
          $row["description"],
          $row["categoryId"],
          $row["quantity"],
          $row["imageUrl"]
        );
      }
      return $returnArr;
    }

    static function getBookByCategory($categories = array(), $limit = -1) {
      $conn = Database::getConnection();

      $returnArr = array();
      foreach ($categories as $value) {
        $query =
          $limit > 0 
          ? "SELECT * FROM books WHERE categoryId='$value->categoryId' LIMIT $limit"
          : "SELECT * FROM books WHERE categoryId='$value->categoryId'";
        $rs = $conn->query($query);

        if($rs->num_rows > 0) {
          $books = array();
          while ($row = $rs->fetch_assoc()) {
            array_push($books, new Book(
              $row["id"],
              $row["bookname"],
              $row["author"],
              $row["price"],
              $row["coverPrice"],
              $row["description"],
              $row["categoryId"],
              $row["quantity"],
              $row["imageUrl"]
            ));
          };
          $booksByCategory = array(["categoryId" => $value->categoryId, "categoryName" => $value->categoryName, "books" => $books]);
          $returnArr = array_merge($returnArr, $booksByCategory);
        }
      }
      // echo '<pre>' . var_export($returnArr, true) . '</pre>';

      return $returnArr;
    }


  }
?>
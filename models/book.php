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

    /**
     * NOTE: this is temporary function to show bestsale
     * 
     * @param String $dbName - name of database need to query
     * @param Int $limit - limit of items
     * 
     * @return Array
     */
    static function getBooks($dbName = 'books', $limit = -1) {
      $conn = Database::getConnection();

      $query =
        $limit > 0
        ? "SELECT * FROM books LIMIT $limit"
        : "SELECT * FROM books";
      $rs = $conn->query($query);

      return $rs->num_rows > 0 ? fetchBook($rs) : null;
    }

    /**
     * Get one detail book
     * 
     * @param String $bookId - book id
     * 
     * @return Object
     */
    static function getOneById($bookId) {
      $conn = Database::getConnection();

      $query = "SELECT * FROM books WHERE id='$bookId'";
      $rs = $conn->query($query);

      return $rs->num_rows > 0 ? fetchBook($rs)[0] : null;
    }

    /**
     * Get books by categories
     * 
     * @param Array - Array of category properties
     * @param Int - Quantity limit of query items
     * 
     * @return Array
     */
    static function getManyByCategories($categories = array(), $limit = -1) {
      $conn = Database::getConnection();

      $returnArr = array();
      foreach ($categories as $value) {
        $query =
          $limit > 0 
          ? "SELECT * FROM books WHERE categoryId='$value->categoryId' LIMIT $limit"
          : "SELECT * FROM books WHERE categoryId='$value->categoryId'";
        $rs = $conn->query($query);

        if($rs->num_rows > 0) {
          $booksByCategory = array([
            "categoryId" => $value->categoryId, 
            "categoryName" => $value->categoryName, 
            "books" => fetchBook($rs)]);
          $returnArr = array_merge($returnArr, $booksByCategory);
        }
      }

      return $returnArr;
    }
  }

  // Helper function

  /**
   * @param mysqli_result $pointer
   * 
   * @return array $books
   */
  function fetchBook($pointer) {
    $books = array();
    while ($row = $pointer->fetch_assoc()) {
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

    return $books;
  }
?>
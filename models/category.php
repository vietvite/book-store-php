<?php include_once('../database/database.php') ?>

<?php 
  class Category {
    var $categoryId;
    var $categoryName;

    function __construct($categoryId, $categoryName) {
      $this->categoryId = $categoryId;
      $this->categoryName = $categoryName;
    }

    static function getAllCategories() {
      $conn = Database::getConnection();

      $query = "SELECT * FROM categories";
      $rs = $conn->query($query);
      $returnArr = array();
      if($rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
          array_push($returnArr, new Category(
            $row["categoryId"],
            $row["categoryName"]
          ));
        };
      }

      return $returnArr;
    }

    static function getCategoryByIds($ids = array()) {
      $conn = Database::getConnection();

      $in = '('. implode(',', $ids) .')';
      $query = "SELECT * FROM categories WHERE categoryId IN('" . implode("','", $ids) . "')";
      $rs = $conn->query($query);
      $returnArr = array();
      if($rs->num_rows > 0) {
        while ($row = $rs->fetch_assoc()) {
          array_push($returnArr, new Category(
            $row["categoryId"],
            $row["categoryName"]
          ));
        };
      }

      return $returnArr;
    }
  }
?>
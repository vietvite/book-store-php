<?php
  include_once('../environment.php');

  class Database {
    function __construct() {
    }

    static function getConnection() {
      $conn = new mysqli($_ENV['url'], $_ENV['username'], $_ENV['password'], $_ENV['database']);
      $conn->set_charset("utf8");
      if($conn->connect_error) {
        die("Connect database failed: " . $conn->connect_error);
      }

      return $conn;
    }
  }
  
?>
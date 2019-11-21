<?php
  include_once('../environment.php');

  class Database {
    function __construct() {
    }

    static function getConnection() {
      $conn = new mysqli($_ENV['url'], $_ENV['username'], $_ENV['password'], $_ENV['database']);
      $conn->set_charset("utf8");
      if($conn->connection_error) {
        die("Connect database failed: " . $conn->connection_error);
      }

      return $conn;
    }
  }
  
?>
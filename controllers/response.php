<?php
  function resError($resParams = array()) {
    echo json_encode(array_merge(["error" => true], $resParams));
  }
  function resSuccess($resParams = array()) {
    echo json_encode(array_merge(["error" => false], $resParams));
  }
?>
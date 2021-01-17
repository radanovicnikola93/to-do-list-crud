<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$mysqli = new mysqli('localhost', 'root', '', 'data');

// v kolikor je napaka pri povezavi med php in bazo pokazi napako
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

function pre_r($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

$result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
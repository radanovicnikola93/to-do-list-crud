<?php
// prikazemo errorje v kolikor so prisotni
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

// povezemo PHP in MySQL z classom mysqli
$mysqli = new mysqli('localhost', 'root', '', 'data');

// v kolikor je napaka pri povezavi med php in bazo pokazi napako
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

// CREATE
if (isset($_POST['create'])) { // v kolikor je gumb pritisnjen nadaljuj 
    // definiramo spremenljivke
    $name = $_POST['name'];
    $date = $_POST['date'];

    // dodamo v bazo
    $mysqli->query("INSERT INTO data (name, date) VALUES('$name', '$date')") or die($mysqli->error);

    // session sporocila
    $_SESSION['sporocilo'] = "Uspesno ste dodali opravilo!";
    $_SESSION['tip_Sporocila'] = "success"; // success je ime Bootstrap classa

    // redirect
    header("location: index.php"); // ob ustvarjanju sporocila bo redirect ostal na isti strani
}
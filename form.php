<?php
// prikazemo errorje v kolikor so prisotni
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// povezemo PHP in MySQL z classom mysqli
$mysqli = new mysqli('localhost', 'root', '', 'data');
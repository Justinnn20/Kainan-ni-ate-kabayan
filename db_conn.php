<?php
$sname = "localhost";
$uname = "root";
$password = "042707"; // Ang password na ginawa natin sa simula
$db_name = "users_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

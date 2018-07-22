<?php
$servername = "localhost";
$username = "admin";
$password = "";
$dbname = "invoice_sys";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

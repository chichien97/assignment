<?php
session_start();
include "connection.php";
$slc = "SELECT * FROM client_customer WHERE client_ID = '".$_SESSION["id"]."'";
$res = mysqli_query($conn, $slc);
if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)){
    echo "<script type='javascript'>";
    echo "var "
    echo "</script>";
  }
}
?>

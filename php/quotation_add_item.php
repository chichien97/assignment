<?php
session_start();
include "connection.php";
$row = mysqli_fetch_assoc($res);
$p = "SELECT * FROM client_product WHERE product_Name ='".$_POST["pname"]."'";
$res2 = mysqli_query($conn, $p);
if (mysqli_num_rows($res2) > 0) {
  $row2 = mysqli_fetch_assoc($res2);
  echo $ins = "INSERT INTO client_quotation_item(quotation_No, product_ID, client_ID, quantity, price, tax, amount)
  VALUES ('".$_GET["quotation_No"]."', '".$row2["product_ID"]."', '".$_SESSION["id"]."', '".$_POST["quantity"]."', '".$_POST["price"]."', '".$_POST["tax"]."', '".$_POST["amount"]."')";
  if (mysqli_query($conn, $ins)) {
    header("location:".$_SERVER["HTTP_REFERER"]);
  }
  else{
    echo "failed";
  }
}
else{
  echo "<script>";
  echo "alert('item not found!');";
  echo "window.location = '".$_SERVER["HTTP_REFERER"]."';";
  echo "</script>";
}
 ?>

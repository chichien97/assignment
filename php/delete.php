<?php
session_start();
include "connection.php";

// Admin Manage Client DELETE
if($_GET["client_ID"]){
  echo $del = "DELETE FROM manage_client WHERE client_ID='".$_GET["client_ID"]."'";
  if (mysqli_query($conn, $del)) {
      echo $del2 = "DELETE FROM login WHERE client_ID='".$_GET["client_ID"]."'";
      if(mysqli_query($conn, $del2)){
        echo "sucess";
      }
      else{
        echo "fail";
      }
  }
}
// Client Quotation DELETE

// Client Invoice DELETE

// Client Maintenance DELETE
else if($_GET["customer_ID"]){
  echo $del_c = "DELETE FROM client_customer WHERE customer_ID='".$_GET["customer_ID"]."'";
  if (mysqli_query($conn, $del_c)) {
    echo "something happen";
  }
  else{
    echo "failed";
  }
}
else if($_GET["product_ID"]){
   echo $del_p = "DELETE FROM client_product WHERE product_ID='".$_GET["product_ID"]."'";
   if (mysqli_query($conn, $del_p)) {
     echo "something happen";
   }
   else{
     echo "failed";
   }
}
else{
  echo "fail all";
}
?>

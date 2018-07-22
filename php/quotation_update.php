<?php
session_start();
include "connection.php";
// SELECT customer ID
echo $slc = "SELECT * FROM client_customer WHERE customer_Name = '".$_POST["cust_name"]."' && client_ID = '".$_SESSION["id"]."'";
$res = mysqli_query($conn, $slc);
if (mysqli_num_rows($res) > 0) {
  $row = mysqli_fetch_assoc($res);
  echo $upd = "UPDATE client_quotation SET customer_ID = '".$row["customer_ID"]."', quotation_Start_Date = '".$_POST["dateStart"]."', quotation_End_Date = '".$_POST["dateEnd"]."', quotation_Amount = '".$_POST["totalAmount"]."' WHERE quotation_ID = '".$_GET["quotation_ID"]."'";
  if ($conn->query($upd) === TRUE) {
    echo "Record updated successfully";
    echo $pas = "SELECT * FROM client_quotation WHERE quotation_No = '".$_POST["qno"]."' and client_ID = '".$_SESSION["id"]."'";
    $result = mysqli_query($conn, $pas);
    if (mysqli_num_rows($result) > 0) {
      $u = mysqli_fetch_assoc($result);
      // Go to view quotation
      // echo "wtf";
      header('location:../client Site/client_quotation_view.php?quotation_ID='.$u["quotation_ID"].'');
    }
  }
}
else{
  echo "<script>";
  // echo "window.location."
  echo "alert('customer not found!');";
  // go back last page
  echo "window.location = '".$_SERVER["HTTP_REFERER"]."';";
  echo "</script>";
  // header("location:".$_SERVER["HTTP_REFERER"]);
}
 ?>

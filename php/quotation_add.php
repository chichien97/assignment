<?php
session_start();
include "connection.php";
$dateNow = date("Y-m-d");
// SELECT customer for ID
$slc = "SELECT * FROM client_customer WHERE customer_Name = '".$_POST["cust_name"]."' and client_ID = '".$_SESSION["id"]."'";
$res = mysqli_query($conn, $slc);
if (mysqli_num_rows($res) > 0) {
  $row = mysqli_fetch_assoc($res);
  // INSERT into quotation
  $sql = "INSERT INTO client_quotation (quotation_ID, quotation_No, quotation_Date, customer_ID, client_ID, quotation_Start_Date, quotation_End_Date, quotation_Amount)
  VALUES (NULL, '".$_POST["qno"]."', $dateNow, '".$row["customer_ID"]."', '".$_SESSION["id"]."', '".$_POST["dateStart"]."', '".$_POST["dateEnd"]."', '".$_POST["totalAmount"]."')";
  if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    // SELECT quotation for ID
    $pas = "SELECT * FROM client_quotation WHERE quotation_No = '".$_POST["qno"]."' and client_ID = '".$_SESSION["id"]."'";
    $result = mysqli_query($conn, $pas);
    if (mysqli_num_rows($result) > 0) {
      $u = mysqli_fetch_assoc($result);
      // echo $u["quotation_ID"];
      // Go to view quotation
      header("location:../client Site/client_quotation_view.php?quotation_ID ='".$u["quotation_ID"]."'");
    }
  }
}
else{
  echo "<script>";
  // echo "window.location."
  echo "alert('customer not found!');";
  // echo "document.write('ahhaha')";
  echo "window.location = '".$_SERVER["HTTP_REFERER"]."';";
  echo "</script>";
  // header("location:".$_SERVER["HTTP_REFERER"]);
}
?>

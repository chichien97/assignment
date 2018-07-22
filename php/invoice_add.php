<?php
session_start();
include "connection.php";
$dateNow = date("Y-m-d");
echo $dateNow;
// SELECT customer for ID
$slc = "SELECT * FROM client_customer WHERE customer_Name = '".$_POST["cust_name"]."' and client_ID = '".$_SESSION["id"]."'";
$res = mysqli_query($conn, $slc);
if (mysqli_num_rows($res) > 0) {
  $row = mysqli_fetch_assoc($res);
  // INSERT into invoice
  echo $sql = "INSERT INTO client_invoice (invoice_ID, invoice_No, invoice_Date, customer_ID, client_ID, invoice_Amount, invoice_Balance payment_Due, status)
  VALUES (NULL, '".$_POST["ino"]."', '".$_POST["invoiceDate"]."', '".$row["customer_ID"]."', '".$_SESSION["id"]."', '".$_POST["totalAmount"]."', '".$_POST["totalAmount"]."', '".$_POST["paymentDue"]."', 'Draft')";
  if ($conn->query($sql) === TRUE) {
    // echo "New record created successfully";
    // SELECT quotation for ID
    $pas = "SELECT * FROM client_invoice WHERE invoice_No = '".$_POST["ino"]."' and client_ID = '".$_SESSION["id"]."'";
    $result = mysqli_query($conn, $pas);
    if (mysqli_num_rows($result) > 0) {
      $u = mysqli_fetch_assoc($result);
      echo "success";
      // Go to view quotation
      header("location:../client Site/client_invoice_view.php?invoice_ID ='".$u["invoice_ID"]."'");
    }
  }
  else{
    echo "fail";
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

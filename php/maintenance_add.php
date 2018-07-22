<?php
session_start();
include "connection.php";

// echo $_SESSION["id"];
// echo $_POST["cust_name"];
// echo $_POST["cust_email"];
// echo $_POST["cust_contact"];
// echo $_POST["pdct_name"];
// echo $_POST["pdct_price"];
// $dateNow = date("Y-m-d");
$dateNow = date("Y-m-d");
echo $dateNow;

if($_POST["cust_name"] == TRUE){
  echo $ins_cpy = "INSERT INTO client_customer (customer_ID, customer_Name, customer_Email, customer_Contact, customer_Address_Line, customer_Address_City, customer_Address_Country, customer_Address_State, customer_Address_ZIP, customer_Register_Date, client_ID)
  VALUES (NULL, '".$_POST["cust_name"]."', '".$_POST["cust_email"]."', '".$_POST["cust_contact"]."', '".$_POST["cust_address_line"]."', '".$_POST["cust_address_city"]."', '".$_POST["cust_country"]."', '".$_POST["cust_state"]."', '".$_POST["cust_zip"]."', '".$dateNow."', '".$_SESSION["id"]."')";
  if (mysqli_query($conn, $ins_cpy)) {
    // echo "success";
    echo '<script>';
    echo 'alert("successfully Register Customer.");';
    echo '</script>';
    header("location:".$_SERVER["HTTP_REFERER"]);
  }
  else{
    echo 'failed customer';
  }
}
else if($_POST["pdct_name"] == TRUE){
  echo $ins_p = "INSERT INTO client_product (product_ID, product_Name, product_Price, product_Description, client_ID)
  VALUES (NULL, '".$_POST["pdct_name"]."', '".$_POST["pdct_price"]."', '".$_POST["pdct_descp"]."', '".$_SESSION["id"]."')";
  if (mysqli_query($conn, $ins_p)) {
    // echo "success Add";
    echo '<script>';
    echo 'alert("successfully Register Product.")';
    echo '</script>';
    header("location:".$_SERVER["HTTP_REFERER"]);
  }
  else{
    echo 'fail product';
  }
}
else{
  echo " p nothing";
}
mysqli_close($conn);
 ?>

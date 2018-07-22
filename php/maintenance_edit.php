<?php
  include "connection.php";
  if($_POST["cust_name"] == TRUE){
    $upd = "UPDATE client_quotation SET customer_Name = '".$_POST["cust_name"]."', customer_Email = '".$_POST["cust_email"]."', customer_Contact = '".$_POST["cust_contact"]."', customer_Address_Line = '".$_POST["cust_add_line"]."', customer_Address_City = '".$_POST["cust_add_city"]."', customer_Address_ZIP = '".$_POST["cust_add_zip"]."',
    customer_Address_State = '".$_POST["cust_add_state"]."', customer_Address_Country = '".$_POST["cust_add_country"]."' WHERE customer_ID = '".$_GET["customer_ID"]."'";
    if ($conn->query($upd) === TRUE) {
      echo "Record updated successfully";
    }
  }
  else if($_POST["pdct_name"] == TRUE){
    $upd = "UPDATE client_product SET product_Name = '".$_POST["pdt_name"]."', product_Price = '".$_POST["pdt_price"]."', product_Description = '".$_POST["pdt_desc"]."' WHERE product_ID = '".$_GET["product_ID"]."'";
    if ($conn->query($upd) === TRUE) {
      echo "Record updated successfully";
    }
  }
 ?>

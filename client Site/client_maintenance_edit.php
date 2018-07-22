<?php
session_start();
include "../php/connection.php";
$slc = "SELECT * FROM client_customer WHERE customer_ID = '".$_GET["customer_ID"]."' AND client_ID = '".$_SESSION["id"]."'";
$res = mysqli_query($conn, $slc);
if (mysqli_num_rows($res) > 0) {
  $row = mysqli_fetch_assoc($res);
}
$slc2 = "SELECT * FROM client_product WHERE product_ID = '".$_GET["product_ID"]."' AND client_ID = '".$_SESSION["id"]."'";
$res2 = mysqli_query($conn, $slc2);
if (mysqli_num_rows($res2) > 0) {
  $row2 = mysqli_fetch_assoc($res2);
}
// if($_GET["customer_ID"] === TRUE){
//
// }
 ?>
<html>
  <head>
    <title>Maintenance - </title>
    <?php
    include "../plugins/include/head/head.html";
    ?>
    <script>
    </script>
  </head>
  <body>
    <!-- Navigation Bar -->
    <header>
      <?php
      include "../plugins/include/header/clientHeader.php";
      ?>
    </header>
    <!-- Main -->
    <div class="main">
      <!-- Customer Edit Container -->
      <div>
        <form action="../php/maintenance_edit.php?customer_ID=<?php echo $_GET["customer_ID"]; ?>" method="post">
          <h4>Customer Edit - <?php echo $row["customer_Name"]?></h4>
          <div>
            <label>Name:</label>
            <input type="email" name="cust_name"  value="<?php echo $row["customer_Name"]?>">
          </div>
          <div>
            <label>Email:</label>
            <input type="email" name="cust_email"  value="<?php echo $row["customer_Email"]?>">
          </div>
          <div>
            <label>Contact No:</label>
            <input type="text" name="cust_contact" value="<?php echo $row["customer_Contact"]?>">
          </div>
          <div>
            <label>Address Line:</label>
            <input type="text" name="cust_add_line" value="<?php echo $row["customer_Address_Line"]?>">
          </div>
          <div>
            <label>City:</label>
            <input type="text" name="cust_add_city" value="<?php echo $row["customer_Address_City"]?>">
          </div>
          <div>
            <label>ZIP:</label>
            <input type="text" name="cust_add_zip" value="<?php echo $row["customer_Address_ZIP"]?>">
          </div>
          <div>
            <label>State:</label>
            <input type="text" name="cust_add_state" value="<?php echo $row["customer_Address_State"]?>">
          </div>
          <div>
            <label>Country:</label>
            <input type="text" name="cust_add_country" value="<?php echo $row["customer_Address_Country"]?>">
          </div>
          <button class="btn btn-edit"><i class="fas fa-edit btn-icon"></i>Edit</button>
        </form>
      </div>
      <!-- Product Edit Container -->
      <div>
        <form action="../php/maintenance_edit.php?product_ID=<?php echo $_GET["product_ID"]; ?>" method="post">
          <h4>Product Edit - <?php echo $row2["product_Name"]?></h4>
          <div>
            <label>Name:</label>
            <input type="text" name="pdt_name"  value="<?php echo $row["product_Name"]?>">
          </div>
            <label>Price:</label>
            <input type="text" name="pdt_price"  value="<?php echo $row["product_Price"]?>">
          </div>
          <div>
            <label>Description:</label>
            <input type="text" name="pdt_desc" value="<?php echo $row["product_Description"]?>">
          </div>
          <button class="btn btn-edit"><i class="fas fa-edit btn-icon"></i>Edit</button>
        </form>
      </div>
    </div>
  </body>
</html>

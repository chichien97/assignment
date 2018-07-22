<?php
session_start();
include "../php/connection.php";
$slc = "SELECT * FROM client_invoice WHERE invoice_ID = '".$_GET["invoice_ID"]."'";
$res = mysqli_query($conn, $slc);
if (mysqli_num_rows($res) > 0) {
  $row = mysqli_fetch_assoc($res);
  $ino = $row["invoice_No"];
  $slc2 = "SELECT * FROM client_customer WHERE customer_ID='".$row["customer_ID"]."'";
  $res2 = mysqli_query($conn, $slc2);
  if(mysqli_num_rows($res2) > 0){
    $row2 = mysqli_fetch_assoc($res2);
    // $dTs = date($row[""]);
  }
}
 ?>
<html>
  <head>
    <title>Invoice View - </title>
    <?php
    include "../plugins/include/head/head.html";
    ?>
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
      <!-- Details of Invoice -->
      <div class="q-container">
        <!-- Invoice Menu Bar -->
        <div class="qView-btn">
          <button class="btn btn-pdf"><i class="fas fa-file-pdf btn-icon"></i>Export PDF</button>
          <button class="btn btn-save"><i class="fas fa-print btn-icon"></i>Print</button>
          <button class="btn btn-edit" onclick="location.href='client_invoice_edit.php?invoice_ID=<?php echo $_GET["invoice_ID"];?>'"><i class="far fa-edit btn-icon"></i>Edit</button>
        </div>
        <!-- Invoice Content -->
        <div class="qView-content">
          <!-- Content Header -->
          <!-- <div> -->
            <h4 style="margin-bottom:1.0rem;">Invoice No: <?php echo $ino; ?></h4>
          <!-- </div> -->
          <!-- Content Body -->
          <div>
            <p><?php echo $row2["customer_Address_Line"].", ".$row2["customer_Address_City"].","; ?></p>
            <p><?php echo $row2["customer_Address_ZIP"].", ".$row2["customer_Address_State"].","; ?></p>
            <p><?php echo $row2["customer_Address_Country"]."."; ?></p>
            <hr></hr>
            <p><b><?php echo $row2["customer_Name"];?></b></p>
            <p>Email: <?php echo $row2["customer_Email"];?></p>
            <p>Contact No: <?php echo $row2["customer_Contact"];?></p>
            <hr></hr>
            <!-- Items -->
            <p><b>Items</b></p>
            <table class="table table-bordered">
              <thead class="thead-dark">
                <tr>
                  <th class="col-lg-2">Product</th>
                  <th class="col-lg-4">Description</th>
                  <th class="col-lg-1">Quantity</th>
                  <th class="col-lg-1">Price(each)</th>
                  <th class="col-lg-2">Tax</th>
                  <th class="col-lg-2">Amount</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Get product ID from quotation
                $slc3 = "SELECT * FROM client_invoice_item WHERE invoice_No = $ino";
                $res3 = mysqli_query($conn, $slc3);
                if (mysqli_num_rows($res3) > 0) {
                  while($row3 = mysqli_fetch_assoc($res3)){
                    // Get product detail with ID
                    $slc4 = "SELECT * FROM client_product WHERE product_ID = '".$row3["product_ID"]."'";
                    $res4 = mysqli_query($conn, $slc4);
                    if (mysqli_num_rows($res4) > 0) {
                      while($row4 = mysqli_fetch_assoc($res4)){
                        echo "<tr>";
                        echo "<td class='col-lg-1'>";
                        echo $row4["product_Name"];
                        echo "</td>";
                        echo "<td class='col-lg-5'>";
                        echo $row4["product_Description"];
                        echo "</td>";
                        echo "<td class='col-lg-1'>";
                        echo $row3["quantity"];
                        echo "</td>";
                        echo "<td class='col-lg-1'>";
                        echo $row4["product_Price"];
                        echo "</td>";
                        echo "<td class='col-lg-2'>";
                        echo $row3["tax"];
                        echo "</td>";
                        echo "<td class='col-lg-2'>";
                        echo $row3["amount"];
                        echo "</td>";
                        echo "</tr>";
                      }
                    }
                  }
                }
                ?>
              </tbody>
              <tfoot>
                <tr class="table-light">
                  <td colspan="4">
                    <label>Remark:</label>
                    <?php echo $_SESSION['remark'];?>
                  </td>
                  <td>
                    <label>Total:</label>
                    <hr></hr>
                    <label>Balance:</label>
                  </td>
                  <td colspan="2">
                    <label><?php echo $row["invoice_Amount"];?></label>
                    <hr/>
                    <label><?php echo $row["invoice_Balance"];?></label>
                  </td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

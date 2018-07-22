<?php
session_start();
include "../php/connection.php";
$slc = "SELECT * FROM client_invoice WHERE client_ID='".$_SESSION["id"]."'";
$res = mysqli_query($conn, $slc);
if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)){
    if($row["invoice_No"] == 0){
      $ino = $row["invoice_No"];
      ++$ino;
      // echo $ino;
    }
    else if($row["invoice_No"] != 0){
      $ino = $row["invoice_No"];
      ++$ino;
      // echo $ino;
    }
  }
}
else{
  ++$ino;
}
$qi = "SELECT * FROM client_invoice_item WHERE invoice_No = $ino and client_ID = '".$_SESSION["id"]."'";
$rQi = mysqli_query($conn, $qi);
if (mysqli_num_rows($rQi) > 0) {
  while($rowQi = mysqli_fetch_assoc($rQi)){
    $amt = "SELECT * FROM client_product WHERE product_ID = '".$rowQi["product_ID"]."'";
    $rAmt = mysqli_query($conn, $amt);
    if (mysqli_num_rows($rAmt) > 0) {
      while($rowA = mysqli_fetch_assoc($rAmt)){
        $t += $rowQi["amount"];
      }
    }
  }
}
 ?>
<html>
  <head>
    <title>Invoice New</title>
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
      <!-- Create New Invoice -->
      <div class="i-container">
          <div class="i-header">
            <h3>Invoice No: <?php echo $ino;?></h3>
          </div>
          <div class="i-input-container col-lg-12"> <!-- EITHER EDIT OR REMOVE EXTRA CONTAINER JUST IN CASE -->
            <form action="../php/invoice_add.php" method="post">
              <!-- Left side section -->
              <div class="i-left">
                <div class="i-input">
                  <input type="hidden" name="ino" value="<?php echo $ino;?>">
                  <label>Customer Name</label>
                  <input type="text" list="customer_list" name="cust_name" class="cust-input" placeholder="Enter Customer Name" id="cust_name">
                  <datalist id="customer_list">
                    <?php
                    $slc2 = "SELECT * FROM client_customer WHERE client_ID='".$_SESSION["id"]."'";
                    $res2 = mysqli_query($conn, $slc2);
                    if (mysqli_num_rows($res2) > 0) {
                      while($row2 = mysqli_fetch_assoc($res2)){
                        echo "<option value='".$row2["customer_Name"]."'>";
                      }
                    }
                    // mysqli_close($conn);
                    ?>
                  </datalist>
                </div>
                <div class="i-input">
                  <label>Invoice Date</label>
                  <input type="date" name="invoiceDate" placeholder="Invoice Date" required>
                </div>
                <div class="i-input">
                  <label>Payment Due</label>
                  <input type="date" name="paymentDue" placeholder="Payment Due" required>
                </div>
                <input type="hidden" name="totalAmount" value="<?php echo $t;?>" readonly>
                <button type="submit" class="btn btn-save"><i class="fa fa-save btn-icon"></i>Save and View</button>
                <button type="button" class="btn btn-pay"><i class="fas fa-hand-holding-usd btn-icon"></i>Payment</button>
              </div>
              <!-- Right Section -->
              <!-- <div class="i-right">
                <div class="i-input">
                  <label>Address
                    <textarea rows="5" cols="20" name="cmpy_address" placeholder="Company Address"></textarea>
                  </label>
                </div>
                <div class="i-input">
                  <label>Address Line</label>
                  <input type="text" name="addressLine" placeholder="Enter Address Line">
                </div>
                <div class="i-input">
                  <label>City</label>
                  <input type="text" name="addressCity" placeholder="Enter City">
                </div>
                <div class="i-input">
                  <label>Zip</label>
                  <input type="text" name="addressZip" placeholder="Enter Zip Code / Postal Code">
                </div>
                <div class="i-input">
                  <label>State</label>
                  <input type="text" name="addressState" placeholder="Enter State">
                </div>
                <div class="i-input">
                  <label>Country</label>
                  <input type="text" name="addressCountry" placeholder="Enter Country">
                </div>
              </div> -->
            </form>
          </div>
            <!-- <button type="button" class="btn btn-edit-item" id="btn_edit_open"><i class="fas fa-pen btn-icon"></i>Edit Items</button> -->
            <!-- <button type="button" class="btn btn-edit-item" id="btn_edit_close"><i class="fas fa-pen btn-icon"></i>Edit Items</button> -->
          <!-- Table showing items -->
          <div class="i-create-table">
            <form action="../php/invoice_add_item.php?invoice_No=<?php echo $ino;?>" method="post">
              <table class="table table-bordered i-table">
                <!-- Product inside Quotation -->
                <thead class="thead-light">
                  <!-- <th class="col-sm-1"></th> -->
                  <th class="col-lg-2">Product</th>
                  <th class="col-lg-4">Description</th>
                  <th class="col-lg-1">Quantity</th>
                  <th class="col-lg-1">Price</th>
                  <th class="col-lg-2">Tax</th>
                  <th class="col-lg-2" colspan="2">Amount</th>
                </thead>
                <tbody>
                  <!-- Show when edit button pressed -->
                  <tr id="edit_item_row" class="edit-item-row">
                    <td colspan="2">
                      <input type="text" list="product_list" id="pname" name="pname" class="iEdit-input col-lg-12" placeholder="Product name" required>
                      <datalist id="product_list">
                        <?php
                        include "../php/connection.php";
                        $slc3 = "SELECT * FROM client_product WHERE client_ID='".$_SESSION["id"]."'";
                        $res3 = mysqli_query($conn, $slc3);
                        if (mysqli_num_rows($res3) > 0) {
                          while($row3 = mysqli_fetch_assoc($res3)){
                            echo "<option value='".$row3["product_Name"]."'>".$row3["product_Name"]."</option>";
                          }
                          $pid = $row3["product_ID"];
                        }
                        ?>
                      </datalist>
                    </td>
                    <td>
                      <input type="text" id="quantity" name="quantity" class="iEdit-input i-input-num col-lg-12" placeholder="Quantity" required>
                    </td>
                    <td>
                      <input type="text" id="price" name="price" class="iEdit-input i-input-num col-lg-12" placeholder="Price" required>
                    </td>
                    <td>
                      <input type="text" id="tax" name="tax" class="iEdit-input col-lg-12" placeholder="Tax description" required>
                    </td>
                    <td>
                      <input type="text" id="total_amount" name="amount" class="iEdit-input col-lg-12" placeholder="Amount" required>
                    </td>
                    <td>
                      <input type="hidden" value="Delete">
                      <button type="submit" name="add" id="btn_add" class="btn btn-add-down col-lg-12" style="margin-left:2px;"><i class="fas fa-level-down-alt btn-icon"></i>Add</button>
                    </td>
                  </tr>
                  <?php
                  //Get ID from quotation
                  $slc4 = "SELECT * FROM client_invoice_item WHERE invoice_No = $ino and client_ID = '".$_SESSION["id"]."'";
                  $res4 = mysqli_query($conn, $slc4);
                  if (mysqli_num_rows($res4) > 0) {
                    while($row4 = mysqli_fetch_assoc($res4)){
                      // Get Name
                      $slc5 = "SELECT * FROM client_product WHERE product_ID = '".$row4["product_ID"]."'";
                      $res5 = mysqli_query($conn, $slc5);
                      if (mysqli_num_rows($res5) > 0) {
                        while($row5 = mysqli_fetch_assoc($res5)){
                          echo "<tr>";
                          echo "<td class='col-lg-2'>";
                          echo $row5["product_Name"];
                          echo "</td>";
                          echo "<td class='col-lg-4'>";
                          echo $row5["product_Description"];
                          echo "</td>";
                          echo "<td class='col-lg-1'>";
                          echo $row4["quantity"];
                          echo "</td>";
                          echo "<td class='col-lg-1'>";
                          echo $row4["price"];
                          echo "</td>";
                          echo "<td class='col-lg-2'>";
                          echo $row4["tax"];
                          echo "</td>";
                          echo "<td class='col-lg-1'>";
                          echo $row4["amount"];
                          echo "</td>";
                          echo "<td class='col-lg-1'>";
                          echo "<i id='delRow' class='fas fa-times btn-icon' style='color:red;padding:auto;cursor:pointer;' onclick=location.href='../php/invoice_delete_item.php?iList_ID=".$row4["iList_ID"]."'></i>";
                          echo "</td>";
                          echo "</tr>";
                          $total += $row4["amount"];
                        }
                      }
                    }
                  }
                  ?>
                </tbody>
                <tfoot>
                  <!-- Remark -->
                  <tr>
                    <td colspan="4">
                      <label>Remark:</label>
                      <input type="text" class="q-input" size="50" value="<?php echo $_SESSION['remark'];?>">
                    </td>
                    <td>
                      <label>Total:</label>
                    </td>
                    <td colspan="2">
                      <input type="text" name="tAmount" id="total_amount" value="<?php echo $total;?>" style="border:0px;" readonly>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

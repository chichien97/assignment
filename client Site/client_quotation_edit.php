<?php
session_start();
include "../php/connection.php";
// GET Data from quotation table
$slc = "SELECT * FROM client_quotation WHERE quotation_ID='".$_GET["quotation_ID"]."'";
$res = mysqli_query($conn, $slc);
if (mysqli_num_rows($res) > 0) {
  $row = mysqli_fetch_assoc($res);
  $qno = $row["quotation_No"];
  $slc2 = "SELECT * FROM client_customer WHERE customer_ID='".$row["customer_ID"]."'";
  $res2 = mysqli_query($conn, $slc2);
  if(mysqli_num_rows($res2) > 0){
    $row2 = mysqli_fetch_assoc($res2);
    // $dTs = date($row[""]);
  }
}
$qi = "SELECT * FROM client_quotation_item WHERE quotation_No = $qno and client_ID = '".$_SESSION["id"]."'";
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
    <title>quotation Edit - </title>
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
      <!-- Modal Box Container -->
      <!-- Modal Box For Customer  -->
      <!-- <div id="q_add_cust" class="modal-box-container">
        <div class="modal-add">
          <form action="" method="post">
            <div class="modal-content-c">
              <div class="modal-header">
                <h4>Add Customer</h4>
                <span class="close-modal" onclick="closeAdd_c()">&times;</span>
              </div>
              <div class="modal-input">
                <label for="cust_name" class="modal-label">Customer Name: </label>
                <input type="text" name="cust_name" class="modal-text" placeholder="Enter Customer Name" required>
              </div>
              <div class="modal-input">
                <label for="cust_email" class="modal-label">Customer Email: </label>
                <input type="email" name="cust_email" class="modal-text" placeholder="Enter Customer Email" required>
              </div>
              <div class="modal-input">
                <label for="cust_contact" class="modal-label">Customer Contact: </label>
                <input type="text" name="cust_contact" class="modal-text" placeholder="Enter Customer Contact" required>
              </div>
              <div>
                <button type="submit" name="add_c_btn" class="btn btn-add">Add</button>
              </div>
            </div>
          </form>
        </div>
      </div> -->
      <!-- Modal Box For Product -->
      <!-- <div id="q_add_product" class="modal-box-container">
        <div class="modal-add">
        <form action="" method="post">
          <div class="modal-content-p">
            <div class="modal-header">
              <h4>Add Product</h4>
              <span class="close-modal" onclick="closeAdd_p()">&times;</span>
            </div>
            <div class="modal-input">
              <label for="pdct_name" class="modal-label">Product Name: </label>
              <input type="text" name="pdct_name" class="modal-text" placeholder="Enter Product Name" required>
            </div>
            <div class="modal-input">
              <label for="pdct_price" class="modal-label">Product Price: </label>
              <input type="text" name="pdct_price" class="modal-text" placeholder="Enter Price" required>
            </div>
            <div>
              <button type="submit" name="add_p_btn" class="btn btn-add">Add</button>
            </div>
          </div>
        </form>
        </div>
      </div> -->
      <!-- ADD NEW section -->
      <div class="q-container col-lg-12">
        <!-- Add Customer Section -->
        <div class="q-header">
          <h3>Quotation No: <?php echo $qno;?></h3>
          <!-- <button type="submit" class="btn btn-create" onclick="location.href='client_quotation_view.php'"><i class='fa fa-file-text btn-icon'></i>Create</button> -->
        </div>
        <div class="q-cust-container col-lg-12">
          <form action="../php/quotation_update.php?quotation_ID=<?php echo $_GET["quotation_ID"]?>" method="post">
            <div class="q-cust-left col-lg-6">
              <!-- <div class="add-cust-container" style="float:right;">
                <label>Bill To:</label>
                <textarea rows="3" cols="30" class="cust-input address-input" placeholder="Enter Address"></textarea>
              </div> -->
              <div class="add-cust-container">
                <input type="hidden" name="qno" value="<?php echo $qno;?>"></input>
                <label>Customer Name</label>
                <input type="text" list="customer_list" id="cust_name" name="cust_name" class="cust-input" value="<?php echo $row2["customer_Name"]?>" placeholder="Enter Customer Name">
                <datalist id="customer_list">
                  <?php
                  $slc3 = "SELECT * FROM client_customer WHERE client_ID='".$_SESSION["id"]."'";
                  $res3 = mysqli_query($conn, $slc3);
                  if (mysqli_num_rows($res3) > 0) {
                    while($row3 = mysqli_fetch_assoc($res3)){
                      echo "<option value='".$row3["customer_Name"]."'>";
                    }
                  }
                  // mysqli_close($conn);
                  ?>
                </datalist>
                <!-- <i class="fa fa-plus add-btn" onclick="openAdd_c()"></i> -->
              </div>
              <div class="add-cust-container">
                <label>Date Start</label>
                <input type="date" name="dateStart" class="cust-input" value="<?php echo $row["quotation_Start_Date"];?>">
              </div>
              <div class="add-cust-container">
                <label>Date End</label>
                <input type="date" name="dateEnd" class="cust-input" value="<?php echo $row["quotation_End_Date"];?>">
              </div>
              <input type="hidden" name="totalAmount" value="<?php echo $t;?>" readonly>
              <button type="submit" class="btn btn-edit"><i class='fas fa-file-upload btn-icon'></i>Update</button>
            </div>
            <div class="q-cust-right col-lg-6" style="float:right;display:none;">
              <div class="add-cust-container">
                <label>Bill To:</label>
                <div>
                  <label>Address Line</label>
                  <input type="text" name="addressLine" class="cust-input" placeholder="Enter Address Line" value="<?php echo $row["customer_Address_Line"];?>">
                </div>
                <div>
                  <label>City</label>
                  <input type="text" name="addressCity" class="cust-input" placeholder="Enter City" value="<?php echo $row["customer_Address_City"];?>">
                </div>
                <div>
                  <label>Zip</label>
                  <input type="text" name="addressZip" class="cust-input" placeholder="Enter Zip Code / Postal Code" value="<?php echo $row["customer_Address_ZIP"];?>">
                </div>
                <div>
                  <label>State</label>
                  <input type="text" name="addressState" class="cust-input" placeholder="Enter State" value="<?php echo $row["customer_Address_State"];?>">
                </div>
                <div>
                  <label>Country</label>
                  <input type="text" name="addressCountry" class="cust-input" placeholder="Enter Country" value="<?php echo $row["customer_Address_Country"];?>">
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- Add Product section -->
        <div class="q-product-container col-lg-12">
          <form action ="../php/quotation_add_item.php?quotation_No=<?php echo $qno;?>" method="post">
            <table class="table table-bordered product-table" id="pTable">
              <thead>
                <!-- <th class="col-lg-1">#</th> -->
                <th class="col-lg-6" colspan="2">Product : Description
                  <!-- <i class="fa fa-plus add-btn" style="float:right;margin-top:0.3em" onclick="openAdd_p()"></i> -->
                </th>
                <!-- <th class="col-lg-3">Description</th> -->
                <th class="col-lg-1">Quantity</th>
                <th class="col-lg-1">Price(each)</th>
                <th class="col-lg-2">Tax</th>
                <th class="col-lg-2" colspan="2">Amount</th>
              </thead>
              <tbody>
                <tr>
                  <!-- <td>
                    <input type="hidden" value="0" id="rowNo">
                  </td> -->
                  <td colspan="2">
                    <input type="text" list="product_list" id="pname" name="pname" class="q-input col-lg-12" placeholder="Product name" required>
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
                  <!-- <td colspan="2">
                    <input type="text" id="desc" name="descript" class="q-input col-lg-12" placeholder="Description" required> -->
                  <!-- </td> -->
                  <td>
                    <input type="text" id="quantity" name="quantity" class="q-input q-input-num col-lg-12" placeholder="Quantity" required>
                  </td>
                  <td>
                    <input type="text" id="price" name="price" class="q-input q-input-num col-lg-12" placeholder="Price" required>
                  </td>
                  <td>
                    <input type="text" id="tax" name="tax" class="q-input col-lg-12" placeholder="Tax description" required>
                  </td>
                  <td>
                    <input type="text" id="total_amount" name="amount" class="q-input col-lg-12" placeholder="Amount" required>
                  </td>
                  <td>
                    <input type="hidden" value="Delete">
                    <button type="submit" name="add" id="btn_add" class="btn btn-add-down col-lg-12" style="margin-left:2px;"><i class="fas fa-level-down-alt btn-icon"></i>Add</button>
                  </td>
                </tr>
                <?php
                  $slc4 = "SELECT * FROM client_quotation_item WHERE quotation_No = $qno and client_ID = '".$_SESSION["id"]."'";
                  $res4 = mysqli_query($conn, $slc4);
                  if (mysqli_num_rows($res4) > 0) {
                    while($row4 = mysqli_fetch_assoc($res4)){
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
                          echo "<i id='delRow' class='fas fa-times btn-icon' style='color:red;padding:auto;cursor:pointer;' onclick=location.href='../php/quotation_delete_item.php?list_ID=".$row4["list_ID"]."'></i>";
                          echo "</td>";
                          echo "</tr>";
                          $total += $row4["amount"];
                        }
                      }
                    }
                  }
                 ?>
                <!-- <tr>
                  <td>
                    <p id="productN">(Empty)</p>
                  </td>
                  <td>
                    <p id="productD">(Empty)</p>
                  </td>
                  <td>
                    <p id="productQ">(Empty)</p>
                  </td>
                  <td>
                    <p id="productP">(Empty)</p>
                  </td>
                  <td>
                    <p id="productT">(Empty)</p>
                  </td>
                  <td>
                    <p id="productA">(Empty)</p>
                  </td>
                  <td>
                    <p id="productDel">(Empty)</p>
                  </td>
                </tr> -->
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
                    <input type="text" name="totalAmount" id="total_amount" value="<?php echo $total;?>" style="border:0px;" readonly>
                    <script type="text/javascript">
                    </script>
                  </td>
                </tr>
              </tfoot>
            </table>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

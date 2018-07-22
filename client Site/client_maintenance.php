<?php
session_start();
 ?>
<html>
  <head>
    <title>Maintenance - </title>
    <?php
    include "../plugins/include/head/head.html";
    ?>
  </head>
  <body onload="openTab_default()">
    <!-- Navigation Bar -->
    <header>
    <?php
    include "../plugins/include/header/clientHeader.php";
    ?>
    </header>
    <!-- Main -->
    <div class="main">
      <div class="maintenance-container">
      <!-- Table with two tabs -->
        <div class="tab-container">
          <!-- Tab button -->
          <div class="tab-btn-container">
            <button class="btn btn-tab" onclick="openTab_c()" style="font-size:1.3em"><i class="far fa-address-book btn-icon"></i>Customer</button>
            <button class="btn btn-tab" onclick="openTab_p()" style="font-size:1.3em"><i class="fas fa-cubes btn-icon"></i>Product</button>
          </div>
          <!-- Tab Content -->
          <div class="tab-content" id="tabcompany" style="display:block;">
            <table class="table table-striped">
              <thead>
                <tr>
                  <!-- <th>#</th> -->
                  <th class="col-lg-2">Customer Name</th>
                  <th class="col-lg-2">Email</th>
                  <th class="col-lg-2">Contact</th>
                  <th class="col-lg-4">Address</th>
                  <th class="col-lg-2">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <!-- PHP Goes Here -->
                  <?php
                  include "../php/connection.php";
                  $cslc = "SELECT * FROM client_customer WHERE client_ID='".$_SESSION["id"]."'";
                  $cres = mysqli_query($conn, $cslc);
                  if (mysqli_num_rows($cres) > 0) {
                    while($crow = mysqli_fetch_assoc($cres)){
                      echo "<tr>";
                      echo "<td>";
                      echo $crow["customer_Name"];
                      echo "</td>";
                      echo "<td>";
                      echo $crow["customer_Email"];
                      echo "</td>";
                      echo "<td>";
                      echo $crow["customer_Contact"];
                      echo "</td>";
                      echo "<td>";
                      echo "<p>".$crow["customer_Address_Line"].", ".$crow["customer_Address_City"].", ".$crow["customer_Address_ZIP"].", ".$crow["customer_Address_State"].", ".$crow["customer_Address_Country"].".</p>";
                      echo "</td>";
                      echo "<td>";
                      // echo "<button onclick='location.href='admin_edit.php?client_ID='".$row["client_ID"]."'''>Edit</button>";
                      // echo "<a onclick='openEdit_c()' href='customer_maintenance.php?client_ID=".$row["client_ID"]."'><i class='fa fa-edit' style='font-size: 32px;'></i></a>";
                      echo "<a href='client_maintenance_edit.php?customer_ID=$crow[customer_ID]'><i id='edit_c' onclick='openEdit_c()' class='fa fa-edit btn-action' style='font-size: 32px; cursor: pointer;'></i></a>";
                      // prompt modal box
                      echo "&nbsp;";
                      echo "<a href='../php/delete.php?customer_ID=$crow[customer_ID]' name='delete'><i class='fa fa-trash btn-action' style='font-size: 32px;'></i></a>";
                      echo "</td>";
                      echo "</tr>";
                    }
                  }
                  mysqli_close($conn);
                  ?>
                </tr>
              </tbody>
              <tfoot>
              </tfoot>
            </table>
          </div>
          <div class="tab-content" id="tabproduct">
            <table class="table table-striped">
              <thead>
                <tr>
                  <!-- <th>#</th> -->
                  <th class="col-lg-2">Product Name</th>
                  <th class="col-lg-6">Description</th>
                  <th class="col-lg-2">Price</th>
                  <th class="col-lg-2">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <!-- PHP Goes Here -->
                  <?php
                  include "../php/connection.php";
                  $pslc = "SELECT * FROM client_product WHERE client_ID='".$_SESSION["id"]."'";
                  $pres = mysqli_query($conn, $pslc);
                  if (mysqli_num_rows($pres) > 0) {
                    while($prow = mysqli_fetch_assoc($pres)){
                      echo "<tr>";
                      echo "<td>";
                      echo $prow["product_Name"];
                      echo "</td>";
                      echo "<td>";
                      echo $prow["product_Description"];
                      echo "</td>";
                      echo "<td>";
                      echo $prow["product_Price"];
                      echo "</td>";
                      echo "<td>";
                      // echo "<button onclick='location.href='admin_edit.php?client_ID='".$row["client_ID"]."'''>Edit</button>";
                      // echo "<a onclick='openEdit_p()' href='customer_maintenance.php?client_ID=".$row["client_ID"]."'><i class='fa fa-edit' style='font-size: 32px;'></i></a>";
                      echo "<a href='client_maintenance_edit.php?product_ID=$prow[product_ID]'><i id='edit_p' onclick='openEdit_p()' class='fa fa-edit actionbtn' style='font-size: 32px; cursor: pointer;'></i></a>";
                      // prompt modal box
                      echo "&nbsp;";
                      echo "<a href='../php/delete.php?product_ID=$prow[product_ID]'><i class='fa fa-trash actionbtn' style='font-size: 32px;'></i></a>";
                      echo "</td>";
                      echo "</tr>";
                    }
                  }
                  mysqli_close($conn);
                  ?>
                </tr>
              </tbody>
              <tfoot>
              </tfoot>
            </table>
          </div>
        </div>
        <!-- Customer Container -->
        <div class="customer-container" id="customer_container">
          <!-- Add Customer Container -->
          <div class="customer-create-container" id="customer_create">
            <div>
              <h3>Customer - Create New
                <i class="fa fa-close header-close" onclick="closeCreate_c()"></i>
              </h3>
              <form action="../php/client_add_maintenance.php" method="post">
                <div>
                  <label for="cust_name" class="customer-label">Name: </label>
                  <input type="text" name="cust_name" class="customer-input" placeholder="Enter Customer Name" required>
                </div>
                <div>
                  <label for="cust_email" class="customer-label">Email: </label>
                  <input type="email" name="cust_email" class="customer-input" placeholder="Enter Customer Email" required>
                </div>
                <div>
                  <label for="cust_contact" class="customer-label">Contact: </label>
                  <input type="text" name="cust_contact" class="customer-input" placeholder="Enter Customer Contact" required>
                </div>
                <div>
                  <label for="cust_address_line" class="customer-label">Address Line: </label>
                  <input type="text" name="cust_address_line" class="customer-input" placeholder="Enter Addre" required>
                </div>
                <div>
                  <label for="cust_address_city" class="customer-label">City: </label>
                  <input type="text" name="cust_address_city" class="customer-input" placeholder="Enter City" required>
                </div>
                <div>
                  <label for="cust_zip" class="customer-label">Zip / Postal Code: </label>
                  <input type="text" name="cust_zip" class="customer-input" placeholder="Enter Zip/Postal Code" required>
                </div>
                <div>
                  <label for="cust_state" class="customer-label">State: </label>
                  <input type="text" name="cust_state" class="customer-input" placeholder="Enter State" required>
                </div>
                <div>
                  <label for="cust_country" class="customer-label">Country: </label>
                  <input type="text" name="cust_country" class="customer-input" placeholder="Enter Country" required>
                </div>
                <div>
                  <button type="submit" name="add_customer_btn" class="btn btn-add">Add</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Product Container -->
        <div class="product-container" id="product_container">
          <!-- Create Product Container -->
          <div class="product-create-container" id="product_create">
            <div>
              <h3>Product - Create New
                <i class="fa fa-close header-close" onclick="closeCreate_p()"></i>
              </h3>

              <form action="../php/client_add_maintenance.php" method="post">
                <div>
                  <label for="pdct_name" class="product-label">Product Name: </label>
                  <input type="text" name="pdct_name" class="product-input" placeholder="Enter Product Name" required>
                </div>
                <div>
                  <label for="pdct_price" class="product-label">Product Price: </label>
                  <input type="text" name="pdct_price" class="product-input" placeholder="Enter Price" required>
                </div>
                <div>
                  <label for="pdct_descp" class="product-label">Product Description: </label>
                  <textarea rows="3" cols="10" name="pdct_descp" class="product-input" placeholder="Enter Description" required></textarea>
                </div>
                <div>
                  <button type="submit" name="add_product_btn" class="btn btn-add">Add</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

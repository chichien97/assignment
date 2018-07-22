<?php
session_start();
 ?>
<html>
  <head>
    <title>Invoice - </title>
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
      <div class="i-container">
        <!-- Filter  -->
        <div class="filter-container" style="margin:0px;width:100%;">
          <h5><b>Filter</b></h5>
          <div class="filter-content">
            <label>Customer Name</label>
            <input type="text" placeholder="Enter Customer Name" name="cust_name" id="cust_name">
          </div>
          <p class="adv-setting-on" id="adv_setting_on" onclick="advFilter_on()"><u>Advance Setting<i class="fas fa-angle-double-down"></i></u></p>
          <p class="adv-setting-off" id="adv_setting_off" onclick="advFilter_off()"><u>Advance Setting<i class="fas fa-angle-double-up"></i></u></p>
          <div id="adv_setting" class="adv-setting-container" style="display:none;">
            <div class="filter-content">
              <label>Invoice No</label>
              <input type="text" placeholder="Enter Invoice Number" name="invoice_no" id="invoice_no">
            </div>
            <div class="filter-content">
              <label>Date</label>
              <input type="date"> <label>To</label> <input type="date">
            </div>
          </div>
          <div class="filter-btn">
            <button type="submit" class="btn btn-filter"><i class="fa fa-filter btn-icon"></i>Filter</button>
            <button type="button" class="btn btn-add" onclick="location.href='client_invoice_create.php'"><i class="fa fa-file btn-icon"></i>Create</button>
          </div>
        </div>
        <!-- Invoice Content -->
        <div>
          <!-- Tabs for Tables -->
          <div class="i-tabs-content">
            <button class="btn i-tab" onclick="table_all()">All</button>
            <button class="btn i-tab" onclick="table_draft()">Draft</button>
            <button class="btn i-tab" onclick="table_paid()">Paid</button>
            <button class="btn i-tab" onclick="table_overdue()">Overdue</button>
            <button class="btn i-tab" onclick="table_partial()">Partial</button>
          </div>
          <!-- Table -->
          <div>
            <table class="table iV-table table-striped table-bordered">
              <thead>
                <tr>
                  <th class="col-lg-1">Status</th>
                  <th class="col-lg-2">Date</th>
                  <th class="col-lg-2">Invoice No</th>
                  <th class="col-lg-2">Customer</th>
                  <th class="col-lg-1">Amount</th>
                  <th class="col-lg-1">Balance</th>
                  <th class="col-lg-2">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                include "../php/connection.php";
                $islc = "SELECT * FROM client_invoice WHERE client_ID = '".$_SESSION["id"]."'";
                $ires = mysqli_query($conn, $islc);
                if (mysqli_num_rows($ires) > 0) {
                  while($irow = mysqli_fetch_assoc($ires)){
                    $cslc = "SELECT * FROM client_customer WHERE customer_ID = '".$irow["customer_ID"]."'";
                    $cres = mysqli_query($conn, $cslc);
                    if (mysqli_num_rows($cres) > 0) {
                      while($crow = mysqli_fetch_assoc($cres)){
                        echo "<tr>";
                        echo "<td>";
                        echo "<label class=".$irow["status"]."><b>".$irow["status"]."</b></label>";
                        echo "</td>";
                        echo "<td>";
                        echo "<p>".$irow["invoice_Date"]."</p>";
                        echo "</td>";
                        echo "<td>";
                        echo "<p>".$irow["invoice_No"]."</p>";
                        echo "</td>";
                        echo "<td>";
                        echo "<p>".$crow["customer_Name"]."</p>";
                        echo "</td>";
                        echo "<td>";
                        echo "<p>".$irow["invoice_Amount"]."</p>";
                        echo "</td>";
                        echo "<td>";
                        echo "<p>".$irow["invoice_Balance"]."</p>";
                        echo "</td>";
                        echo "<td>";
                        echo "<div class='i-drop'>";
                        echo "<button class='btn btn-info btn-drop'>Action</button>";
                        echo "<div class='i-drop-content'>";
                        echo "<a href='client_invoice_view.php?invoice_ID=".$irow["invoice_ID"]."'>View</a>";
                        echo "<a href='client_invoice_edit.php?invoice_ID=".$irow["invoice_ID"]."'>Edit</a>";
                        echo "<a href=''>Print</a>";
                        echo "<a href=''>Export To PDF</a>";
                        echo "<a href='../php/delete.php?invoice_ID=".$irow["invoice_ID"]."'>Delete</a>";
                        echo "</div>";
                        echo "</div>";
                        echo "</td>";
                        echo "</tr>";
                      }
                    }
                  }
                }
                mysqli_close($conn);
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

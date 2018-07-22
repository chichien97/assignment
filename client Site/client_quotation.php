<?php
session_start();
 ?>
<html>
  <head>
    <title>Quotation - </title>
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
      <div class="q-container">
        <!-- Filter part -->
        <div class="filter-container" style="margin:0px;width:100%;">
          <h5><b>Filter</b></h5>
          <div class="filter-content">
            <label>Customer Name</label>
            <input type="text" placeholder="Enter Customer Name" id="cust_name">
          </div>
          <p class="adv-setting-on" id="adv_setting_on" onclick="advFilter_on()"><u>Advance Setting On<i class="fas fa-angle-double-down"></i></u></p>
          <p class="adv-setting-off" id="adv_setting_off" onclick="advFilter_off()"><u>Advance Setting Off<i class="fas fa-angle-double-up"></i></u></p>
          <div id="adv_setting" class="adv-setting-container" style="display:none;">
            <div class="filter-content">
              <label>Quotation No</label>
              <input type="text" placeholder="Enter Quotation Number" name="quotation_no" id="quotation_no">
            </div>
            <div class="filter-content">
              <label>Date</label>
              <input type="date"> <label>To</label> <input type="date">
            </div>
            <!-- Status: <input type="radio" value="draft" id="draft"><input type="radio" value=""> -->
            <div class="filter-content">
              <label>Amount</label>
              <input type="text" placeholder="Enter Amount" id="cust_amount">
            </div>
          </div>
          <div class="filter-btn">
            <button type="button" class="btn btn-filter"><i class="fa fa-filter btn-icon"></i>Filter</button>
            <button type="submit" class="btn btn-create" onclick="location.href='client_quotation_create.php'"><i class="fa fa-file btn-icon"></i>Create</button>
          </div>
        </div>
        <!-- Table part, go to detail when pressed -->
        <div>
          <table class="table table-striped table-bordered q-table">
            <thead>
              <tr>
                <th class="col-lg-2">Status</th>
                <th class="col-lg-2">Date</th>
                <th class="col-lg-2">Quotation No</th>
                <th class="col-lg-2">Customer Name</th>
                <th class="col-lg-2">Amount</th>
                <th class="col-lg-2">Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- Details of customer from database -->
              <?php
              include "../php/connection.php";
              $qslc = "SELECT * FROM client_quotation WHERE client_ID = '".$_SESSION["id"]."'";
              $qres = mysqli_query($conn, $qslc);
              if (mysqli_num_rows($qres) > 0) {
                while($qrow = mysqli_fetch_assoc($qres)){
                  $cslc = "SELECT * FROM client_customer WHERE customer_ID = '".$qrow["customer_ID"]."'";
                  $cres = mysqli_query($conn, $cslc);
                  if (mysqli_num_rows($cres) > 0) {
                    while($crow = mysqli_fetch_assoc($cres)){
                      echo "<tr>";
                      echo "<td>";
                      echo "<label><i class='fa fa-file-text btn-icon'></i><b>Draft</b></label>";
                      echo "</td>";
                      echo "<td>";
                      echo "<input type='text' value='".$qrow["quotation_Date"]."' readonly>";
                      echo "</td>";
                      echo "<td>";
                      echo "<input input type='text' value='".$qrow["quotation_No"]."' readonly>";
                      echo "</td>";
                      echo "<td>";
                      echo "<input type='text' value='".$crow["customer_Name"]."' readonly>";
                      echo "</td>";
                      echo "<td>";
                      echo "<input type='text' value='".$qrow["quotation_Amount"]."' readonly>";
                      echo "</td>";
                      echo "<td>";
                      echo "<div class='q-drop'>";
                      echo "<button class='btn btn-info btn-drop'>Action</button>";
                      echo "<div class='q-drop-content'>";
                      echo "<a href='client_quotation_view.php?quotation_ID=".$qrow["quotation_ID"]."'>View</a>";
                      echo "<a href='client_quotation_edit.php?quotation_ID=".$qrow["quotation_ID"]."'>Edit</a>";
                      echo "<a href=''>Print</a>";
                      echo "<a href='client_invoice_view.php'>Convert to Invoices</a>";
                      echo "<a href=''>Export To PDF</a>";
                      echo "<a href='../php/delete.php?quotation_ID=".$qrow["quotation_ID"]."'>Delete</a>";
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
              <!-- <tr>
                <td>
                  <label><i class="fa fa-file-text btn-icon"></i><b>Draft</b></label>
                </td>
                <td>
                  <input type="text" value="2018/02/03" readonly>
                </td>
                <td>
                  <input type="text" value="123123" readonly>
                </td>
                <td>
                  <input type="text" value="ching chong" readonly>
                </td>
                <td>
                  <input type="text" value="10000" readonly>
                </td>
                <td>
                  <div class="q-drop">
                    <button class="btn btn-info btn-drop">Action</button>
                    <div class="q-drop-content">
                      <a href="">View</a>
                      <a href="">Edit</a>
                      <a href="">Print</a>
                      <a href="">Convert to Invoices</a>
                      <a href="">Export To PDF</a>
                      <a href="">Delete</a>
                    </div>
                  </div>
                </td>
              </tr> -->
              <!-- <tr>
                <td>
                  <label><i class="fa fa-file-text btn-icon"></i><b>Draft</b></label>
                </td>
                <td>
                  <input type="text" value="2018/02/03" readonly>
                </td>
                <td>
                  <input type="text" value="123123" readonly>
                </td>
                <td>
                  <input type="text" value="ching chong" readonly>
                </td>
                <td>
                  <input type="text" value="10000" readonly>
                </td>
                <td>
                  <div class="q-drop">
                    <button class="btn btn-info btn-drop">Action</button>
                    <div class="q-drop-content">
                      <a href="">View</a>
                      <a href="">Edit</a>
                      <a href="">Print</a>
                      <a href="">Convert to Invoices</a>
                      <a href="">Export To PDF</a>
                      <a href="">Delete</a>
                    </div>
                  </div>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>

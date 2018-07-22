<?php
session_start();
include "../php/connection.php";
$slc = "SELECT COUNT(*) AS custNo FROM client_customer WHERE client_ID = '".$_SESSION["id"]."'";
$result = mysqli_query($conn, $slc);
$row = mysqli_fetch_assoc($result);
$custNo = $row["custNo"];
$q = "SELECT COUNT(*) AS qNo FROM client_quotation WHERE client_ID = '".$_SESSION["id"]."'";
$result2 = mysqli_query($conn, $q);
$r = mysqli_fetch_assoc($result2);
$qNo = $r["qNo"];
$inv = "SELECT COUNT(*) AS iNo FROM client_invoice WHERE client_ID = '".$_SESSION["id"]."'";
$rest = mysqli_query($conn, $inv);
$i = mysqli_fetch_assoc($rest);
$iNo = $i["iNo"];
$oInv = "SELECT COUNT(*) AS oInv FROM client_invoice WHERE client_ID = '".$_SESSION["id"]."' and status = overdue";
$rest2 = mysqli_query($conn, $oInv);
$o = mysqli_fetch_assoc($rest2);
$overDue = $o["oInv"];
$pdct = "SELECT COUNT(*) AS pNo FROM client_product WHERE client_ID = '".$_SESSION["id"]."'";
$pResult = mysqli_query($conn, $pdct);
$p = mysqli_fetch_assoc($pResult);
$pNo = $p["pNo"];

?>
<html>
  <head>
    <title>Dashboard - </title>
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
      <div class="db-container">
        <h4>Dashboard</h4>
        <div class="row">
          <div class="col-3 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1">
                <i class="fas fa-user-tie"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Customer</span>
                <span class="info-box-number">
                  <!-- PHP goes here -->
                  <?php echo $custNo;?>
                </span>
              </div>
            </div>
          </div>
          <div class="col-3 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1">
                <i class="fas fa-file-alt"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Quotation</span>
                <span class="info-box-number">
                  <!-- PHP goes here -->
                  <?php echo $qNo;?>
                </span>
              </div>
            </div>
          </div>
          <div class="col-3 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1">
                <i class="fas fa-hand-holding-usd"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Sales</span>
                <span class="info-box-number">
                  <!-- PHP goes here -->
                  <?php echo $iNo;?>
                </span>
              </div>
            </div>
          </div>
          <div class="col-3 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1">
                <i class="fas fa-exclamation-triangle"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Overdue Invoices</span>
                <span class="info-box-number">
                  <!-- PHP goes here -->
                  <?php echo $overDue; ?>
                </span>
              </div>
            </div>
          </div>
          <div class="col-3 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1">
                <i class="fas fa-box"></i>
              </span>
              <div class="info-box-content">
                <span class="info-box-text">Total Product</span>
                <span class="info-box-number">
                  <!-- PHP goes here -->
                  <?php echo $pNo;?>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="month-chart" style="width:100%;height:auto;">
          <canvas id="month_chart"></canvas>
          <script type="text/javascript">
          var mLine = document.getElementById('month_chart').getContext('2d');
          var mChart = new Chart(mLine, {
            type: 'line',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
                datasets: [{
                  label: "My First dataset",
                  borderColor: rgba(255,255,0),
                  data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                }]
            },
            options: {
            }
          });
          </script>
        </div>
        <div class="quotation-chart">
          <canvas id="quotation_chart"></canvas>
        </div>
        <div class="invoice-chart">
          <canvas id="invoice_chart"></canvas>
        </div>
        <div class="overdue-chart">
          <canvas id="overdue_chart"></canvas>
        </div>
      </div>
    </div>
  </body>
</html>

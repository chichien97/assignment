<?php
session_start();
include "../php/connection.php";
$slc = "SELECT COUNT(*) AS clientNo FROM manage_client";
$result = mysqli_query($conn, $slc);
$row = mysqli_fetch_assoc($result);
$clientNo = $row["clientNo"];
 ?>
<html>
  <head>
    <title>Dashboard</title>
    <?php
    include "../plugins/include/head/head.html";
    ?>
  </head>
  <body>
    <header>
      <?php
      include "../plugins/include/header/adminHeader.php";
      ?>
    </header>
    <!-- Main -->
    <div class="main">
      <div class="db-container">
        <h4 class="col-12">Dashboard</h4>
        <div class="col-lg-4 col-sm-12 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1">
              <i class="fas fa-user-tie"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Total Client </span>
              <span class="info-box-number">
                <!-- PHP goes here -->
                <?php echo $clientNo; ?>
              </span>
            </div>
          </div>
        </div>
        <div class="db-chart">
          <canvas id="myChart"></canvas>
          <script type="text/javascript">
          var monthChart = document.getElementById('myChart').getContext('2d');
          var chart = new Chart(monthChart, {
            // The type of chart we want to create
            type: 'line',
            // The data for our dataset
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
                datasets: [{
                    label: "My First dataset",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [2, 10, 5, 2, 20, 30, 45, 55, 20, 15, 12, 33]
                }]
            },
            // Configuration options go here
            options: {
              // scales:{
              //   xAxes:[{
              //     type: 'Month',
              //     labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
              //     stacked: true
              //   }],
              //   yAxes:[{
              //     stacked: true
              //   }]
              // }
            }
          });
          </script>
          <!-- <canvas id="barChart" class="db-chart"></canvas>
          <script>
          var ctx = document.getElementById('barChart').getContext('2d');
          var myBarChart = new Chart(ctx, {
              type: 'bar',

              data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [0, 10, 5, 2, 20, 30, 45],
                }]
              },
              options: {}
          });
          </script> -->
          <canvas id="myChart" width="200px" height="200px"></canvas>
          <!-- <script>
          var ctx = document.getElementById("myChart").getContext('2d');
          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                  datasets: [{
                      label: '# of Votes',
                      data: [12, 19, 3, 5, 2, 3],
                      backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(255, 206, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(255, 159, 64, 0.2)'
                      ],
                      borderColor: [
                          'rgba(255,99,132,1)',
                          'rgba(54, 162, 235, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(153, 102, 255, 1)',
                          'rgba(255, 159, 64, 1)'
                      ],
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true
                          }
                      }]
                  }
              }
          });
          </script> -->
        </div>
      </div>
    </div>
    <?php
    include "../plugins/include/footer/adminFooter.html";
    ?>
  </body>
</html>

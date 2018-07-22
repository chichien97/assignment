<?php
session_start();
include "../php/connection.php";
// echo $_SESSION["status"];
$pg = $_GET["page"];
if($pg == "" || $pg == "1"){
  $pno = 0;
}
else{
  $pno = ($pg*2)-2;
}
?>
<html>
  <head>
    <title>Manage - </title>
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
    <!-- Main Body -->
    <div class="main">
      <h3 style="padding-left:30px;">Manage Client</h3>
      <!-- CreateNew Pop-Up Modal-->
      <div onload="noModal()">
        <form action="../php/admin_add_client.php" method="post">
          <div id="add_modal" class="add-modal">
            <div class="add-modal-content">
              <div class="add-modal-header">
                <h4>Create New Client<i class="fa fa-times-circle header-close" onclick="closeModal()"></i>
                </h4>
              </div>
              <div style="margin-top:40px;">
                <div class="modal-box-input">
                  <label for="client_name" class="modal-box-label">Company Name: </label>
                  <input type="text" name="client_name" placeholder="Enter Name" class="modal-box-text" required><br>
                </div>
                <div class="modal-box-input">
                  <label for="client_email" class="modal-box-label">Company Email: </label>
                  <input type="email" name="client_email" placeholder="Enter Email" class="modal-box-text" required><br>
                </div>
                <div class="modal-box-input">
                  <label for="client_contact" class="modal-box-label">Company Contact: </label>
                  <input type="text" name="client_contact" placeholder="Enter Company Contact" class="modal-box-text" required><br>
                </div>
                <div class="modal-box-input">
                  <label for="client_userName" class="modal-box-label">Company Username: </label>
                  <input type="text" name="client_userName" placeholder="Enter Username" class="modal-box-text" required>
                </div>
                <div class="modal-box-input">
                  <label for="client_name" class="modal-box-label">Company Password: </label>
                  <input type="text" name="client_passWord" placeholder="Enter Password" class="modal-box-text" required>
                </div>
                <div style="margin-top:20px;">
                  <button type="submit" class="btn btn-add"><i class="fa fa-user-plus btn-icon"></i>Add</button>&nbsp;&nbsp;&nbsp;
                  <button type="button" class="btn btn-close" onclick="closeModal()"><i class="fa fa-close btn-icon"></i>Close</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- Filter -->
      <div class="filter-container">
        <h5><b>Filter</b></h5>
        <div class="filter-content">
          <label>Company Name</label>
          <input type="text" placeholder="Enter Company Name" name="cmpy_name" id="filter_input" onkeyup="filter()">
           <!-- JAVASCRIPT AUTO COMPLETE -->
          <!-- <button type="submit" class="btn btn-filter" id="filter_tbl" style="margin-top:0px;width:100px;"><i class="fa fa-filter btn-icon"></i>Filter</button> -->
        </div>
      </div>
      <!-- Management Container -->
      <div class="manage-container">
        <!-- button for modal (web)-->
        <div class="w-container">
          <button id="add_btn" onclick="openModal()" class="btn btn-create"><i class="fa fa-industry btn-icon"></i>Create</button>
        </div>
        <!-- button for modal (mobile)-->
        <div  class="m-container">
          <button id="add_btn_m" onclick="location.href='admin_add_m.php'" class="btn btn-m-create"><i class="fa fa-industry btn-m-icon"></i>Create</button>
        </div>
        <!-- <p style="color:red;">***Note : checkbox is for delete function only !***</p> -->
        <!-- Management table -->
        <div>
          <!-- Action button on the first column -->
          <table class="table table-striped m-table" id="table_client">
            <thead>
              <tr>
                <th class="col-lg-3 col-sm-3">Company Name</th>
                <th class="col-lg-4 col-sm-4">Address</th>
                <th class="col-lg-2 col-sm-2">Email</th>
                <th class="col-lg-2 col-sm-2">Contact</th>
                <th class="col-lg-1 col-sm-1">Action</th>
              </tr>
            </thead>
            <!-- PHP Select SQL with Edit and Delete-->
            <tbody>
            <?php
            $slc = "SELECT * FROM manage_client limit $pno, 5";
            $res = mysqli_query($conn, $slc);
            if (mysqli_num_rows($res) > 0) {
              while($row = mysqli_fetch_assoc($res)){
                echo "<tr>";
                echo "<td>";
                echo $row["client_Name"];
                echo "</td>";
                echo "<td>";
                echo $row["client_Address"];
                echo "</td>";
                echo "<td>";
                echo $row["client_Email"];
                echo "</td>";
                echo "<td>";
                echo $row["client_Contact"];
                echo "</td>";
                echo "<td>";
                // echo "<button onclick='location.href='admin_edit.php?client_ID='".$row["client_ID"]."'''>Edit</button>";
                echo "<div class='m-drop'>";
                echo "<button class='btn btn-info btn-drop'>Action</button>";
                echo "<div class='m-drop-content'>";
                echo "<a href='admin_edit.php?client_ID=".$row["client_ID"]."'>Edit</a>";
                echo "<a href='../php/delete.php?client_ID=".$row["client_ID"]."'>Delete</a>";
                echo "</div>";
                echo "</div>";
                echo "</td>";
                echo "</tr>";
              }
            }
            // mysqli_close($conn);
            ?>
            </tbody>
          </table>
          <?php
          $slcp = "SELECT * FROM manage_client";
          $resp = mysqli_query($conn, $slcp);
          $rowp = mysqli_num_rows($resp);
          $p = $rowp/5;
          // echo $p;
          $page = ceil($p);
          // echo $page;
          for($b=1; $b <= $page; $b++){
            echo "<a href='admin_manage.php?page=$b'>".$b." "."</a>";
          }
          mysqli_close($conn);
          ?>
        </div>
      </div>
    </div>
  </body>
</html>

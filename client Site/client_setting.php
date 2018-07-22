<?php
session_start();
include "../php/connection.php";
if($_POST["client_name"]){
  // echo "yes";
  $sql = "UPDATE manage_client SET client_Name='".$_POST["client_name"]."',
  client_Address_Line = '".$_POST["client_add_line"]."', client_Address_City = '".$_POST["client_add_city"]."', client_Address_ZIP = '".$_POST["client_add_zip"]."', client_Address_State = '".$_POST["client_add_state"]."', client_Address_Country = '".$_POST["client_add_country"]."',
  client_Contact='".$_POST["client_contact"]."', client_Email='".$_POST["client_email"]."',
  client_Remark='".$_POST["client_remark"]."' WHERE client_ID='".$_SESSION["id"]."'";
  if (mysqli_query($conn, $sql)) {
    // echo "Record updated successfully";
  }
}
 ?>
<html>
  <head>
    <title>Setting - </title>
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
      <!-- Details about client -->
      <div class="client-setting col-lg-12">
        <div class="client-logo col-lg-5">
          <label>Company Name</label>
          <img src="" id="client_logo" style="width:90%;height:20%;" alt="company logo">
          <br>
          <ul class="client-list">
            <hr></hr>
            <li>
              <label>Register Date</label>
              <br>
              <hr></hr>
              <label class="list-no">2017-07-05</label>
              <br>
            </li>
            <hr></hr>
            <li>
              <button class="btn btn-upload" id="uploadbtn" style="display:none;"><i class="fas fa-upload btn-icon"></i>Upload Logo</button>
              <!-- <hr></hr> -->
              <button type="button" class="btn" onclick="openReset()" id="resetbtn"><i class="fa fa-key btn-icon"></i>Reset Password</button>
            </li>
          </ul>
        </div>
        <!-- Client Details ( HIDDEN WHEN EDIT ) -->
        <div id="client_setting_details" class="client-setting-detail col-lg-7">
          <?php
          include "../php/connection.php";
          $slc = "SELECT * FROM manage_client WHERE client_ID = '".$_SESSION["id"]."'";
          $res = mysqli_query($conn, $slc);
          if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $slc2 = "SELECT * FROM login WHERE client_ID = '".$_SESSION["id"]."'";
            $res2 = mysqli_query($conn, $slc2);
            if(mysqli_num_rows($res2) > 0){
              $row2 = mysqli_fetch_assoc($res2);
            }
          }
          ?>
          <!-- <h3>Detail</h3> -->
          <!-- <div class="setting-detail-input" style="float:right;margin-right:100px;width:40%;height:auto;">
            <label class="setting-label" style="width:140px;"><b>Company Address</b></label><br>
              <input type="text" value="<?php //echo $row["client_Address"] ?>" class="setting-input" style="margin-top:10px;height:auto;width:100%;" readonly><br>
          </div> -->
          <!-- <div class="setting-detail-input">
            <label class="setting-label"><b>Company Name</b></label>
              <input type="text" value="<?php //echo $row["client_Name"] ?>" class="setting-input" readonly><br>
          </div> -->
          <div class="setting-detail-input">
            <label class="setting-label">Company Email</label><br>
              <p class="setting-input"><?php echo $row["client_Email"] ?></p><br>
          </div>
          <hr></hr>
          <div class="setting-detail-input">
            <label class="Setting-label">Company Contact</label><br>
              <p class="setting-input"><?php echo $row["client_Contact"] ?></p><br>
          </div>
          <hr></hr>
          <div class="setting-detail-input">
            <label class="setting-label">Company Address</label><br>
              <!-- <textarea rows="4" cols="30" class="setting-input" readonly> -->
                <p><?php echo $row["client_Address_Line"].", ".$row["client_Address_City"].","; ?></p>
                <p><?php echo $row["client_Address_ZIP"].", ".$row["client_Address_State"].","; ?></p>
                <p><?php echo $row["client_Address_Country"]."."; ?></p>
              <!-- </textarea><br> -->
          </div>
          <hr></hr>
          <div class="setting-detail-input">
            <label class="setting-label">Company Remark</label><br>
              <textarea rows="3" cols="20" class="setting-input" readonly><?php echo $row["client_Remark"] ?></textarea>
          </div>
          <hr></hr>
          <div>
            <button type="button" class="btn btn-edit" onclick="openEdit()" id="editbtn"><i class="material-icons btn-icon" style="font-size:14px;">border_color</i>Edit</button>
          </div>
        </div>
        <!-- Edit Client Details Section hide -->
        <form action="client_setting.php" method="post">
          <div id="client_setting_edit" class="client-setting-edit col-lg-7">
            <div class="setting-up">
              <div class="setting-edit-input">
                <label for="client_name" class="setting-edit-label">Company Name <b style=color:red>*</b></label>
                  <input type="text" name="client_name" placeholder="Enter Name" value="<?php echo $row["client_Name"] ?>" class="setting-input" required><br>
              </div>
              <div class="setting-edit-input">
                <label for="client_email" class="setting-edit-label">Company Email <b style=color:red>*</b></label>
                  <input type="email" name="client_email" placeholder="Enter Email" value="<?php echo $row["client_Email"] ?>" class="setting-input" required><br>
              </div>
              <div class="setting-edit-input">
                <label for="client_contact" class="setting-edit-label">Company Contact <b style=color:red>*</b></label>
                  <input type="text" name="client_contact" value="<?php echo $row["client_Contact"] ?>" placeholder="Enter Company Contact" class="setting-input" required><br>
              </div>
              <div class="setting-edit-input">
                <label for="client_name" class="setting-edit-label">Company Address Line <b style=color:red>*</b></label>
                  <input type="text" name="client_add_line" placeholder="Enter Address Line" value="<?php echo $row["client_Address_Line"] ?>" class="setting-input" required><br>
              </div>
              <div class="setting-edit-input">
                <label for="client_name" class="setting-edit-label">City <b style=color:red>*</b></label>
                  <input type="text" name="client_add_city" placeholder="Enter City" value="<?php echo $row["client_Address_City"] ?>" class="setting-input" required><br>
              </div>
              <div class="setting-edit-input">
                <label for="client_name" class="setting-edit-label">Zip <b style=color:red>*</b></label>
                  <input type="text" name="client_add_zip" placeholder="Enter ZIP/ POSTAL code" value="<?php echo $row["client_Address_ZIP"] ?>" class="setting-input" required><br>
              </div>
              <div class="setting-edit-input">
                <label for="client_name" class="setting-edit-label">State <b style=color:red>*</b></label>
                  <input type="text" name="client_add_state" placeholder="Enter State" value="<?php echo $row["client_Address_State"] ?>" class="setting-input" required><br>
              </div>
              <div class="setting-edit-input">
                <label for="client_name" class="setting-edit-label">Country <b style=color:red>*</b></label>
                  <input type="text" name="client_add_country" placeholder="Enter Country" value="<?php echo $row["client_Address_Country"] ?>" class="setting-input" required><br>
              </div>
              <div class="setting-edit-input">
                <label class="setting-edit-label">Company Remark</label><br>
                  <textarea name="client_remark" rows="4" cols="25" placeholder="Enter Remark"><?php echo $row["client_Remark"] ?></textarea>
              </div>
            </div>
            <div class="setting-bottom" style="">
              <button type="submit" class="btn btn-save"><i class="fa fa-save btn-icon"></i>Save</button>
              <button type="button" class="btn btn-back" onclick="closeEdit()"><i class="fa fa-arrow-left btn-icon"></i>Back</button>
            </div>
          </div>
        </form>
        <!-- Edit Client Password Section Hide -->
        <form action="../php/resetpwd.php" method="post">
          <div id="client_setting_reset" class="client-setting-reset col-lg-7">
            <div class="setting-reset-input">
              <label for="client_userName" class="setting-label">Company Username: <b style=color:red>*</b></label><br>
              <input type="text" name="client_userName" placeholder="Enter Username" value="<?php echo $row2["userName"] ?>" class="reset-input" readonly>
            </div>
            <!-- <hr></hr> -->
            <div class="setting-reset-input">
              <label for="client_userName" class="setting-label">Old Password: <b style=color:red>*</b></label><br>
              <input type="password" name="client_old_password" placeholder="Enter Old Password" class="reset-input" required>
            </div>
            <!-- <hr></hr> -->
            <div class="setting-reset-input">
              <label for="client_userName" class="setting-label">New Password: <b style=color:red>*</b></label><br>
              <input type="password" name="client_new_password" placeholder="Enter New Password" class="reset-input" required>
            </div>
            <!-- <hr></hr> -->
            <div class="setting-reset-input">
              <label for="client_name" class="setting-label">Re-enter Password: <b style=color:red>*</b></label><br>
              <input type="password" name="client_re_password" placeholder="Re-enter Password" class="reset-input" required>
            </div>
            <!-- <hr></hr> -->
            <div class="setting-bottom">
              <button type="submit" class="btn btn-reset"><i class="fa fa-refresh btn-icon"></i>Reset</button>
              <button type="button" class="btn btn-back" onclick="closeReset()"><i class="fa fa-arrow-left btn-icon"></i>Back</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>

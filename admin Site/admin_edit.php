<?php
session_start();
include "../php/connection.php";

if($_POST["updatebtn"]){
  echo $upd = "UPDATE manage_client SET client_Name = '".$_POST["edit_name"]."', client_Address = '".$_POST["edit_address"]."', client_Contact = '".$_POST["edit_contact"]."', client_Email = '".$_POST["edit_email"]."' WHERE client_ID='".$_GET["client_ID"]."'";
  if (mysqli_query($conn, $upd)) {
    $upd2 = "UPDATE login SET userName = '".$_POST["edit_userName"]."', passWord = '".$_POST["edit_passWord"]."' WHERE client_ID = '".$_GET["client_ID"]."'";
    if (mysqli_query($conn, $upd2)) {
      alert("Changed had updated");
    }
  }
}
mysqli_close($conn);
?>
 <!-- IF EDIT BECOME MODAL BOX THIS PAGE USE AS UPDATE.php -->
<html>
  <head>
    <title>Edit Client - </title>
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
      <!-- Edit Container -->
      <div class="edit-container">
        <div class="edit-header">
          <?php
          include "../php/connection.php";

          $slc = "SELECT client_Name FROM manage_client WHERE client_ID = '".$_GET["client_ID"]."'";
          $res = mysqli_query($conn, $slc);
          if (mysqli_num_rows($res) > 0) {
            while($row = mysqli_fetch_assoc($res)){
              echo "<h3>";
              echo $row["client_Name"]."'s Details";
              echo "</h3>";
            }
          }
          mysqli_close($conn);
          ?>
        </div>
        <form action="admin_edit.php" method="post">
          <div class="edit-content">
            <?php
            include "../php/connection.php";

            $slc = "SELECT * FROM manage_client WHERE client_ID = '".$_GET["client_ID"]."'";
            $result = mysqli_query($conn, $slc);
            if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
            }

            $slc2 = "SELECT * FROM login WHERE client_ID = '".$_GET["client_ID"]."'";
            $result2 = mysqli_query($conn, $slc2);
            if (mysqli_num_rows($result2) > 0) {
              $lg = mysqli_fetch_assoc($result2);
            }
            ?>
            <p style="color:red;">*** Address need user to manually enter ***</p>
            <div class="edit-input">
              <label for="client_name" class="edit-label">Company Name: </label>
              <input type="text" name="edit_name" placeholder="Enter Name" class="edit-text" value="<?php echo $row["client_Name"]; ?>" required><br>
            </div>
            <!-- <div class="edit-input">
              <label for="client_address" class="edit-label">Company Address: </label>
              <input type="textfield" name="edit_address" placeholder="Enter Address" class="edit-text" value="<?php echo $row["client_Address"]; ?>"  required><br>
            </div> -->
            <div class="edit-input">
              <label for="client_email" class="edit-label">Company Email: </label>
              <input type="email" name="edit_email" placeholder="Enter Email" class="edit-text" value="<?php echo $row["client_Email"]; ?>"  required><br>
            </div>
            <div class="edit-input">
              <label for="client_contact" class="edit-label">Company Contact: </label>
              <input type="text" name="edit_contact" placeholder="Enter Company Contact" class="edit-text" value="<?php echo $row["client_Contact"]; ?>"  required><br>
            </div>
            <div class="edit-input">
              <label for="client_userName" class="edit-label">Company Username: </label>
              <input type="text" name="edit_userName" placeholder="Enter Username" class="edit-text" value="<?php echo $lg["userName"]; ?>"  required>
            </div>
            <div class="edit-input">
              <label for="client_name" class="edit-label">Company Password: </label>
              <input type="text" name="edit_passWord" placeholder="Enter Password" class="edit-text" value="<?php echo $lg["passWord"]; ?>"  required>
            </div>
            <div class="edit-input">
              <button type="submit" class="btn btn-save" name="updatebtn"><i class="fas fa-redo btn-icon"></i>Update</button>
            </div>
          </div>
          <?php
          mysqli_close($conn);
          ?>
        </form>
      </div>
    </div>
  </body>
</html>

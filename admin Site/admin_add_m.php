<html>
  <head>
    <title>Add Client</title>
    <?php
    include "../plugins/include/head/head.html";
     ?>
  </head>
  <body>
    <div class="main">
      <header>
        <?php
        include "../plugins/include/header/adminHeader.html";
         ?>
      </header>
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
              <button type="submit" class="btn btn-create" name="updatebtn"><i class="fas fa-user-plus btn-icon"></i>Add</button>
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

<?php
session_start();
include "connection.php";
$slc = "SELECT * FROM login WHERE client_ID = '".$_SESSION["id"]."' and status = '".$_SESSION["status"]."'";
$res = mysqli_query($conn, $slc);
if (mysqli_num_rows($res) > 0) {
  while($row = mysqli_fetch_assoc($res)){
    // IF old password is same as database password run query
    if($_POST["client_old_password"] == $row["passWord"]){
      if($_POST["client_new_password"] == $_POST["client_re_password"]){
        $upd = "UPDATE login SET passWord = '".$_POST["client_new_password"]."' WHERE client_ID = '".$_SESSION["id"]."'";
        if ($conn->query($upd) === TRUE) {
          echo "<script>";
          echo "alert('Successfully changed, please login again!');";
          echo "window.location = 'logout.php';";
          echo "</script>";
        }
      }
      else{
        echo "<script>";
        echo "alert('Password not match!');";
        echo "window.location = '".$_SERVER["HTTP_REFERER"]."';";
        echo "</script>";
      }
    }
    else{
      echo "<script>";
      echo "alert('Incorrect old password!');";
      echo "window.location = '".$_SERVER["HTTP_REFERER"]."';";
      echo "</script>";
    }
  }
}
else{
  echo "fail";
}

 ?>

<?php
session_start();
include "connection.php";
if($_POST["validation"] == "admin"){
  $sql = "SELECT * FROM login WHERE status = 'admin'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if($row["userName"] == $_POST["username"]){
      if($row["passWord"] == $_POST["password"]){
        $_SESSION["name"] = $row["name"];
        $_SESSION["status"] = $row["status"];
        // echo "successfully";
        header("location:../admin Site/admin_dashboard.php");
      }
      else{
        echo '<script language="javascript">';
        echo 'alert("wrong password")';
        echo '</script>';
      }
    }
    else{
      echo '<script language="javascript">';
      echo 'alert("wrong username")';
      echo '</script>';
    }
  }
}
else if($_POST["validation"] == "client"){
  $sql = "SELECT * FROM login WHERE status = 'client'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if($row["userName"] == $_POST["username"]){
      if($row["passWord"] == $_POST["password"]){
        $_SESSION["name"] = $row["name"];
        $_SESSION["id"] = $row["client_ID"];
        $_SESSION["status"] = $row["status"];
        $user = "SELECT * FROM manage_client WHERE client_ID = '".$row["client_ID"]."'";
        $res = mysqli_query($conn, $user);
        if (mysqli_num_rows($res) > 0){
          $usr = mysqli_fetch_assoc($res);
          $_SESSION["remark"] = $usr["client_Remark"];
            // echo "successfully";
            // echo $_SESSION["remark"];
          header("location:../client Site/client_dashboard.php");
        }
      }
      else{
        echo '<script language="javascript">';
        echo 'alert("wrong password!");';
        echo "window.location = '".$_SERVER["HTTP_REFERER"]."';";
        echo '</script>';
      }
    }
    else{
      echo '<script language="javascript">';
      echo 'alert("wrong username!");';
      echo "window.location = '".$_SERVER["HTTP_REFERER"]."';";
      echo '</script>';
    }
  }
}

 ?>

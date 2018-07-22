<?php
session_start();
// include "connection.php";
//
// $sql = "SELECT status FROM login";
// $result = mysqli_query($conn, $sql);
// if (mysqli_num_rows($result) > 0) {
//   $row = mysqli_fetch_assoc($result);
if($_SESSION["status"] == 'admin'){
  // echo $_SESSION["status"];
  session_destroy();
  header("location:../admin Site/admin_portal.php");
}
else if($_SESSION["status"] == 'client'){
  session_destroy();
  header("location:../client Site/client_portal.php");
}
?>

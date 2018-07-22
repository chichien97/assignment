<?php
session_start();
include "connection.php";
// echo $_SESSION["status"];
// echo $_POST["client_name"];
// echo $_POST["client_address"];
// echo $_POST["client_contact"];
// echo $_POST["client_userName"];
// echo $_POST["client_passWord"];
$dateNow = date("Y-m-d");
// echo $dateNow;

// Insert Value into manage client
echo $ins = "INSERT INTO manage_client (client_ID, client_Name, client_Address, client_Contact, client_Email, client_Register_Date)
VALUES (NULL, '".$_POST["client_name"]."', '** WAITING CLIENT TO ENTER **', '".$_POST["client_contact"]."', '".$_POST["client_email"]."', $dateNow)";
if (mysqli_query($conn, $ins)) {
  // Get value from manage client
  echo $slc = "SELECT * FROM manage_client WHERE client_Name = '".$_POST["client_name"]."'";
  $result = mysqli_query($conn, $slc);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo $row["client_ID"];
    // Insert value into login
    echo $reg = "INSERT INTO login (login_ID, client_ID, userName, passWord, name, status)
    VALUES (NULL, '".$row["client_ID"]."', '".$_POST["client_userName"]."', '".$_POST["client_passWord"]."', '".$_POST["client_name"]."', 'client')";
    if (mysqli_query($conn, $reg)) {
      echo '<script language="javascript">';
      echo 'alert("successfully Registered.")';
      echo '</script>';
      header("location:../admin Site/admin_manage.php");
    }
  }
}
else{
  echo '<script language="javascript">';
  echo 'alert("failed Registered.")';
  echo '</script>';
  header("location:../admin Site/admin_manage.php");
}
mysqli_close($conn);
?>

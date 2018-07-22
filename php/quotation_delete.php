<?php
session_start();
include "connection.php";
$del = "DELETE FROM client_quotation WHERE quotation_ID = '".$_GET["quotation_ID"]."'";
if ($conn->query($del) === TRUE) {
    echo "deleted successfully";
    header("location:".$_SERVER["HTTP_REFERER"]);
}
else{
  echo"fail";
}

 ?>

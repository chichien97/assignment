<?php
include "connection.php";
$del = "DELETE FROM client_quotation_item WHERE list_ID = '".$_GET["list_ID"]."'";
if ($conn->query($del) === TRUE) {
    echo "deleted successfully";
    header("location:".$_SERVER["HTTP_REFERER"]);
}
else{
  echo"fail";
}
 ?>

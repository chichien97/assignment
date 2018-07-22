<?php
include "connection.php";
$del = "DELETE FROM client_invoice_item WHERE iList_ID = '".$_GET["iList_ID"]."'";
if ($conn->query($del) === TRUE) {
    echo "deleted successfully";
    header("location:".$_SERVER["HTTP_REFERER"]);
}
else{
  echo"fail";
}
 ?>

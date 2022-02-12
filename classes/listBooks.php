<?php
require('connection.php');


$q=$_REQUEST["term"]; 

// determine if this is coming  from manage user page or if it's coming from autofill on checkout.php
if ($q == null) {
  require('connection.php');

  $sqlListQuery= "select * from group3.LibraryInventoryItem LIMIT 10;";

  $sqlBooks = mysqli_query($db,$sqlListQuery);
  
}

else {

 $sqlListQuery= "select `barcode` from group3.ItemCopies WHERE barcode LIKE '%$q%';";

$sqlBooks = mysqli_query($db,$sqlListQuery);
 

  $json=array();
  while($row = mysqli_fetch_array($sqlBooks)) {
    array_push($json, $row['barcode']);
  }

  echo json_encode($json);
}

?>
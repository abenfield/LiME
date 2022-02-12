<?php
require('connection.php');


function amountCheckedOut($patronId){
  require('connection.php');
  $sql = "SELECT COUNT(*) FROM group3.Borrowed WHERE patronId = '$patronId';";
  $result = mysqli_query($db,$sql);
  $result = mysqli_fetch_row($result);
  return $result[0];
}


$q=$_REQUEST["term"]; 

// determine if this is coming  from manage user page or if it's coming from autofill on checkout.php
if ($q == null) {
  require('connection.php');

  $sqlListQuery= "select * from group3.Patron;";
  
   $sqlUsers = mysqli_query($db,$sqlListQuery);
}

else {



$sqlListQuery= "select `email` from group3.Patron WHERE email LIKE '%$q%';";

 $sqlUsers = mysqli_query($db,$sqlListQuery);
 

  $json=array();
  while($row = mysqli_fetch_array($sqlUsers)) {
    array_push($json, $row['email']);
  }

  echo json_encode($json);
}





?>
<?php
  require('connection.php');

$sqlListQuery= "select * from group3.ItemCopies WHERE isbn = $isbn;";

 $sqlCopies = mysqli_query($db,$sqlListQuery);
 
   

?>
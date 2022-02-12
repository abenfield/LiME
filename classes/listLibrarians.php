<?php
  require('connection.php');

$sqlListQuery= "select * from group3.Librarian;";

 $sqlLibrarians = mysqli_query($db,$sqlListQuery);
 

   

?>
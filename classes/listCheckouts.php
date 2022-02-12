<?php
 require('connection.php');

 $sqlListQuery= "select barcode from group3.ItemCopies;";

 $sqlBooks = mysqli_query($db,$sqlListQuery);

?>
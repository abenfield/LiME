<?php

    require('session.php');


if ($type_check = "staff")
{

    // Gather form POST data and assign them to local variables
    $barcode = $_REQUEST["barcode"]; 
   
    require('connection.php');
    $sql = "DELETE FROM `group3`.`ItemCopies` WHERE (`barCode` = '$barcode'); ";
    $result = mysqli_query($db,$sql);
    echo $sql;

    header('Location: ' . $_SERVER['HTTP_REFERER']);



} else {
        // not auth'd returning home.
        header("location:catalog.php");
     }

    

?>




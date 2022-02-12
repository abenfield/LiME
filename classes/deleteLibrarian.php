<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {


    require('session.php');


if ($type_check = "admin")
{
    // Gather form POST data and assign them to local variables
    $employeeid = $_REQUEST["employeeId"]; 
    echo $employeeid;
    $tags = $_POST["tags"];
    require('connection.php');
    $sql = "DELETE FROM `group3`.`Librarian` WHERE (`employeeId` = '$employeeid'); ";
    $result = mysqli_query($db,$sql);

    header("location:../admin/catalog.php");



} else {
        // not auth'd returning home.
        header("location:catalog.php");
     }

    } 

?>
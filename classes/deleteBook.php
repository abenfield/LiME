<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {


    require('session.php');


if ($type_check = "staff")
{
    // Gather form POST data and assign them to local variables
    $isbn = $_REQUEST["isbn"]; 
    echo $isbn;

    $tags = $_POST["tags"];
    require('connection.php');
    $sql = "DELETE FROM `group3`.`LibraryInventoryItem` WHERE (`isbn` = '$isbn'); ";
    $result = mysqli_query($db,$sql);

    $sql = "DELETE FROM `group3`.`ItemCopies` WHERE (`isbn` = '$isbn'); ";
    $result = mysqli_query($db,$sql);

    header("location:../catalog.php");



} else {
        // not auth'd returning home.
        header("location:catalog.php");
     }

    } 

?>




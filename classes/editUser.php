<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {


    require('session.php');


if ($type_check = "staff")
{
    // Gather form POST data and assign them to local variables
    $patronId = $_REQUEST["patronId"]; 
    $firstname = $_POST["firstname"]; 
    $lastname = $_POST["lastname"]; 
    $email = $_POST["email"];
    $phone = $_POST["phone"]; 
    $address = $_POST["address"]; 
    $city = $_POST["city"];
    $state = $_REQUEST["state"];
    $zipCode = $_REQUEST["zipCode"];
    $status = "1";
 
 



    $tags = $_POST["tags"];
    require('connection.php');
    $randomInt = rand();
    $sql = "UPDATE `group3`.`Patron`  SET `patronId` = '$patronId', `firstName` = '$firstname',`lastName` = '$lastname',`email` = '$email',`phone` = '$phone',`address` = '$address', `city` = '$city', `state` = '$state', `zipCode` = '$zipCode', `status` = '$status' WHERE (`patronId` = '$patronId') ;    ";
    $result = mysqli_query($db,$sql);
   
    header("location:../manage-users.php");



} else {
        // not auth'd returning home.
        header("location:../catalog.php");
     }

    } 

?>
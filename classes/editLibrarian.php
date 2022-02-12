<?php

echo "hi";
if($_SERVER["REQUEST_METHOD"] == "POST") {


    require('session.php');


//if ($type_check = "admin")
//{
    // Gather form POST data and assign them to local variables
    $employeeId = $_REQUEST["employeeId"]; 
    $firstname = $_POST["firstname"]; 
    $lastname = $_POST["lastname"]; 
    $email = $_POST["email"];
    $phone = $_POST["phone"]; 

    $tags = $_POST["tags"];
    require('connection.php');
    $randomInt = rand();
    $sql = "UPDATE `group3`.`Librarian`  SET `employeeId` = '$employeeId', `firstName` = '$firstname',`lastName` = '$lastname',`email` = '$email',`phone` = '$phone' WHERE (`employeeId` = '$employeeId') ;    ";
    $result = mysqli_query($db,$sql);
    header("location:index.php");


//} 
//else {
        // not auth'd returning home.
     //   header("location:index.php");
  //   }

    } 

?>
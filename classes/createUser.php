<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {


    require('session.php');
    require("mailUser.php");

if ($type_check = "staff")
{
    // Gather form POST data and assign them to local variables
    $email = mysqli_real_escape_string($db,$_POST["email"]);
    $firstname = mysqli_real_escape_string($db,$_POST["firstname"]); 
    $lastname = mysqli_real_escape_string($db,$_POST["lastname"]); 
    $phone = mysqli_real_escape_string($db,$_POST["phone"]); 
    $address = mysqli_real_escape_string($db,$_POST["address"]); 
    $city = mysqli_real_escape_string($db,$_POST["city"]);
    $state = mysqli_real_escape_string($db,$_POST["state"]);
    $zipCode = mysqli_real_escape_string($db,$_POST["zipCode"]);
    $status = '1';
    $patronPassword = randomPassword();


    
    //See what copy number it is.
    //$sql = "SELECT * FROM group3.ItemCopies WHERE isbn = '$isbn';";
    //$result = mysqli_query($db,$sql);
    //$copyNumber = $result->num_rows + 1;

    //generate a barcode using Codabar 1D (https://en.wikipedia.org/wiki/Codabar)
    //$barcode = A . $isbn . $copyNumber . B;


    require('connection.php');

    //Check if patronId exists in table
    $sql = "SELECT * FROM group3.Patron WHERE email = '$email';";
    $result = mysqli_query($db,$sql);

    if($result->num_rows == 0) {
        //Create new patronId entry if patronId doesn't already exist
        $sql = "INSERT INTO `group3`.`Patron` ( `firstName`, `lastName`, `email`, `phone`, `address`, `city`, `state`, `zipcode`, `status`) VALUES ('$firstname', '$lastname', '$email', '$phone', '$address', '$city', '$state', '$zipCode', '$status')";

        $result = mysqli_query($db,$sql);

        // Get patronId from last query
        $sql = "SELECT * FROM `group3`.`Patron` WHERE `email` = '$email';";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        $patronId = $row[0];

        sendEmail($firstname, $email, $patronPassword);
        $patronPassword = password_hash($patronPassword,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `group3`.`PatronPassword` ( `patronId`, `password`) VALUES ('$patronId', '$patronPassword')";
        $result = mysqli_query($db,$sql);
        header("location:../manage-users.php");


   } 
   else {
       echo "Email address is in use. Please use another email.";
   }
   



} else {
        // not auth'd returning home.
        header("location:../login.php");
     }

    } 


    function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    


?>
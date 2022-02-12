<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

   if($_SERVER["REQUEST_METHOD"] == "POST") {

	  require('session.php');

  // if ($type_check = "admin") {

	  // Gather form POST data and assign them to local variables
      //$employeeid = $_REQUEST["employeeid"];
      $firstname = $_POST["firstname"];
	  $lastname = $_POST["lastname"];
	  $email = $_POST["email"];
	  $phone = $_POST["phone"];

	  require('connection.php');

	  // Check if librarian exists in table
	  $sql = "SELECT * FROM group3.Librarian WHERE email = '$email';";
	  $result = mysqli_query($db,$sql);

	  if($result->num_rows == 0) {
		  // Create new employeeId entry if employeeId does not already exists
		 // $sql = "INSERT INTO 'group3'.'Librarian' ('employeeId', 'firstName', 'lastName', 'email', 'phone') VALUES($employeeId, $firstName, $lastName', '$email', '$phone');";
		  $sql = "INSERT INTO `group3`.`Librarian` (`firstName`, `lastName`, `email`, `phone`) VALUES('$firstname', '$lastname', '$email', '$phone');";
		  echo $sql;

		  $result = mysqli_query($db,$sql);
	  }

      
	  header("location:/admin/index.php");

 //  } else {
 //   header("location:/admin/catalog.php");
}
  // }

?> 
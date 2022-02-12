<?php
  
  require('connection.php');
  
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $type_check = $_SESSION['auth'];

   $error = $_SESSION['error'];

   // nullifies error on restart so user only sees error once
   $_SESSION['error'] =null;

   if ($type_check == "staff")
   $sql = "SELECT firstName,employeeId FROM group3.Librarian WHERE email = '$user_check'" ;
   else
   $sql = "SELECT firstName, patronId FROM group3.Patron WHERE email = '$user_check'" ;

   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result, MYSQLI_NUM);

   
   $login_session = $row[0];

   //Set employee ID for transactions
   if ($type_check == "staff") {
      $employeeId = $row[1];
   }else {
      $patronId = $row[1];
   }
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");

      die();
   }
?>
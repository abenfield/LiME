<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

include("connection.php");

   // username and password sent from form 
   
   $myusername = mysqli_real_escape_string($db,$_POST['username']);
   $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
    if ($type == "staff")
   $sql = "SELECT password FROM group3.LibrarianPassword WHERE employeeId = (SELECT employeeId FROM group3.Librarian WHERE email = '$myusername');";
    else
    $sql = "SELECT password FROM group3.PatronPassword WHERE patronId = (SELECT patronId FROM group3.Patron WHERE email = '$myusername');";

   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

   $active = $row['active'];
   $result = mysqli_query($db,$sql);
   $row = mysqli_fetch_array($result, MYSQLI_NUM);
   $hash = $row[0];


   if (password_verify($mypassword, $hash)) {
     session_start();
     $_SESSION['login_user'] = $myusername;
     $_SESSION['auth'] = $type;
     header("location: ../catalog.php");
   }
   else {
      echo "<div style = \"margin:0;\"class=\"alert alert-danger\" role=\"alert\">
      Uh oh, Incorrect Email or password!
    </div>";
   }
}
?>

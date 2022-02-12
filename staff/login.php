<?php
$type = "staff";
require "../classes/login.php";

?>

	<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>LiMe 0.1 - Staff Login</title>
	    <link rel="stylesheet" href="../css/global.css" />
    <link rel="stylesheet" href="../css/main.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	
    <link rel="icon" href="images/favicon.png" />
  </head>

  <body>
  <a  href="../index.php">
<nav class="navbar navbar-expand-lg navbar-custom">

<img src = "../content/logo.png" class = "center logo-index"/>

</nav>
</a>



	 
 <div class = "container">

<div class = "container-login">
<h2 class ="accountText">Welcome to LiME, Please login below to get started!</h2>
<div class="container">
    <form action = "" method = "post">
	
	<label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        <a href = "staff.html">
    <button type="submit">Login</button>
	</a>
  </div>
  </form>
  <p class = "tinyText">
  <a href= "#">Forgot your password?</a>
	<a class ="tinyText" href= "#">Contact IT Department</a>
</p>




</div>
</div>
 
	  
</div>
</div>

<!-- Footer -->
<footer class="page-footer font-small blue footer fixed-bottom">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">Powered by LiME
  <img src = "../content/lime.jpg" class="footer-logo"/>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->





  </body>
  <script src="../js/bootstrap.js"></script>
</html>



<?php
include('classes/session.php');

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="x-ua-compatible" content="ie=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title><?php echo $title ?></title>
      <link rel="stylesheet" href="/css/catalog.css" />
      <link rel="stylesheet" href="/css/global.css" />
    <link rel="stylesheet" href="/css/input.css" />
    <link rel="stylesheet" href="/css/bootstrap-datepicker3.css" />
    <link rel="stylesheet" href="/css/jquery-ui.min.css" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="/css/bootstrap.css">
  <!-- Material Design Bootstrap -->
     <link rel="icon" href="/images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="../css/jquery.tagsinput.css" />
  <script src="/js/jquery-3.4.1.min.js"></script>
  <script src ="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"> </script>
  <script src="/js/jquery.tagsinput.js"></script>
  <script src="/js/jquery.inview.min.js"></script>
  <script src="/js/jquery.validate.min.js"></script>
  <script src="/js/jquery-ui.min.js"></script>
  <script src="/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->



   </head>
   <body>
   
      <nav class="navbar navbar-expand-lg navbar-light navbar-custom ">
        <img src = "/content/logo.png" class = "logo-index"/>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">

 <?php  if ($type_check == "staff")    
 echo 
<<<EOT
        <ul class="navbar-nav mr-auto">
         <li class="nav-item active">
            <a href ="catalog.php" class="nav-link">Library Catalog</a>
          </li>
          <li class="nav-item active">
            <a href ="manage-users.php"class="nav-link">Manage Users</a>
          </li>
          <li class="nav-item active">
            <a href ="checkout.php"class="nav-link">Check-In/Out</a>
          </li>
        </ul>
   
 EOT;

else  if ($type_check == "user")
echo
<<<EOT
<ul class="navbar-nav mr-auto">
<li class="nav-item active">
  <a href ="catalog.php"class="nav-link">Library Catalog</a>
</li>
<li class="nav-item">
  <a href ="checkouts.php"class="nav-link">Your Checkouts</a>
</li>
<li class="nav-item">
  <a href ="wishlist.php"class="nav-link">Wishlist</a>
</li>
<li class="nav-item">
  <a href ="suggestions.php"class="nav-link">Suggestions</a>
</li>
</ul>

EOT;

        ?>


			   <li class="nav-item">
            <a class="nav-link">Hello, <?php echo $login_session ?>! </a> <a href ="/classes/logout.php"><span class = "logout"> </a>
          </li>
          </div>
      </nav>




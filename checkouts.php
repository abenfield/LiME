<?php

	include("config.php");

	$title = "LiMe 1.0";
  
  $patronId = $_GET["patronId"];
  session_start();
  $type_check = $_SESSION['auth'];

	$content = <<<EOT

  
     <table class="table table-hover">
        <thead class="thead-light">
          <tr>
            <th scope="col">ISBN</th>
            <th scope="col">Book Title</th>
            <th scope="col">Author</th>
            <th scope="col">Genre</th>
            <th scope="col">Check Out Date</th>
            <th scope="col">Due Date</th>
            <th scope="col">Date Returned</th>
          </tr>
        </thead>
        <tbody>
          <tr>
           

	  
EOT;

if ($type_check == "staff")
$site->displayTransaction($content, $title, $patronId);

if ($type_check == "user")
  $site->displayTransactions($content, $title);



?>
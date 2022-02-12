<?php

	include("config.php");

	$title = "LiMe 0.1 - Add new librarian";

	$noTopBar = "true";

	$content = <<<EOT
<div class ="container">
        <h2 class ="center inputText">Add new librarian</h2>
      </div>
      <div class = "formContainer">
      
      <form action = "../classes/createLibrarian.php" method = "POST">
  <div class="form-group">
    <label for="exampleInputFirstName1">First Name</label>
    <input type="text"  name = "firstname" class="form-control" id="exampleInputFirstName1" placeholder="First Name">
  </div>
  <div class="form-group">
    <label for="exampleInputLastName1">Last Name</label>
    <input type="text" name="lastname" class="form-control" id="exampleInputLastName1" placeholder="Last Name">
  </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPhone1">Phone</label>
    <input type="text" name ="phone"class="form-control" id="exampleInputPhone1" placeholder="Phone">
  </div>
  <div class ="center">
  <button type="submit" class="btn btn-warning">Discard Changes</button>
  <button type="submit" class="btn btn-primary">Add new librarian</button>
</div>
</form>
</div>
</div>
      </div>
	  
EOT;

	$site->displayNoTitleBar($content, $title);


?>
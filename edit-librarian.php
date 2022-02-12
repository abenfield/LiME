<?php


include("../config.php");

$employeeId = $_GET['employeeId'];

$title = "LiMe 0.1 - Edit existing Librarian";

$librarianDetails = new librarianDetails($employeeId);


$content = <<<EOT
<div class ="container">
    <h2 class ="center inputText">Editing existing librarian: $librarianDetails->firstname </h2>
  </div>
  <div class = "formContainer">
  
  <form action = "../classes/editLibrarian.php" method = "POST">
  <input type="hidden" name="employeeId" value="$librarianDetails->employeeId">
<div class="form-group">
<label for="exampleInputFirstName1">First Name</label>
<input type="text" name = "firstname" class="form-control" id="exampleInputFirstName1" value="$librarianDetails->firstname">
</div>
<div class="form-group">
<label for="exampleInputLastName1">Last Name</label>
<input type="text" name = "lastname" class="form-control" id="exampleInputLastName1" value="$librarianDetails->lastname">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Email address</label>
<input type="email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="$librarianDetails->email">
</div>
<div class="form-group">
<label for="exampleInputPhone1">Phone</label>
<input type="text" name = "phone" class="form-control" id="exampleInputPhone1" value="$librarianDetails->phone">
</div>
<div class ="center">
<button type="submit" class="btn btn-warning">Discard Changes</button>
<button type="submit" class="btn btn-success">Save Changes</button>

</form>
<form   action = "../classes/deleteLibrarian.php" method = "POST">
<input type = "hidden" name = "employeeId" value="$librarianDetails->employeeId">
<button type="submit" class="btn btn-danger">Delete Librarian</button>
</div>
</form>
</div>
</div>
  </div>
  
EOT;

$site->displayNoTitleBar($content, $title);


?>
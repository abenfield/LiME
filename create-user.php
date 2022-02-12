
   
   <?php

	include("config.php");
	
	$title = "LiMe 0.1 - Create new User";
	
	$noTopBar = "true";
	
	$content = <<<EOT

<div class ="container">
        <h2 class ="center inputText">Create new user</h2>

      </div>
      <div class = "formContainer">
      
      <form id = "addUser" action = "../classes/createUser.php" method = "POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">First Name</label>
    <input type="text"  name = "firstname" class="form-control" id="exampleInputPassword1" placeholder="First Name">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Last Name</label>
    <input type="text" name="lastname" class="form-control" id="exampleInputPassword1" placeholder="Last Name">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Phone</label>
    <input type="text" name ="phone"class="form-control" id="exampleInputPassword1" placeholder="Phone">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" name = "address"class="form-control" id="exampleInputPassword1" placeholder="Address">
  </div>
  <div class="form-group">
  <label for="exampleInputPassword1">City</label>
  <input type="text" name="city" class="form-control" id="exampleInputPassword1" placeholder = "City">
</div>
<div class="form-group">
  <label for="exampleInputPassword1">State</label>
  <select class="form-control form-control-lg" name="state">
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>
</div>

  <div class="form-group">
    <label for="exampleInputPassword1">Zip Code</label>
    <input type="text" name="zipCode" class="form-control" id="exampleInputPassword1" placeholder = "Zip Code">
  </div>
  <div class ="center">
  <a href="manage-users.php"
  <button type="button" class="btn btn-warning">Discard Changes</button>
  </a>
  <button type="submit" class="btn btn-primary">Create new user</button>
</div>
</form>
</div>
</div>

      </div>
	  
EOT;
	
	$site->displayNoTitleBar($content, $title);


?>
     
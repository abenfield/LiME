
   
   <?php

  include("config.php");
  
  $patronId = $_GET['patronId'];

  $patronDetails = new patronDetails($patronId);


	$title = "LiMe 0.1 - Edit User";
	
	
	$content = <<<EOT


    <div class ="container">
        <h2 class ="center inputText">Editing existing user: $patronDetails->firstname $patronDetails->lastname</h2>

      </div>
      <div class = "formContainer">
      
      <form action = "../classes/editUser.php" method = "POST">
  <div class="form-group">
  <input type="hidden" name="patronId" value="$patronDetails->patronId">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email"class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="$patronDetails->email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">First Name</label>
    <input type="text" name="firstname"class="form-control" id="exampleInputPassword1" value="$patronDetails->firstname">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Last Name</label>
    <input type="text" name="lastname"class="form-control" id="exampleInputPassword1" value="$patronDetails->lastname">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone</label>
    <input type="text" name="phone" class="form-control" id="exampleInputPassword1" value="$patronDetails->phone">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" name="address" class="form-control" id="exampleInputPassword1" value="$patronDetails->address">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">City</label>
    <input type="text" name="city" class="form-control" id="exampleInputPassword1" value="$patronDetails->city">
  </div>
  <div class="form-group">
  <label for="exampleInputPassword1">State</label>
  <select class="form-control form-control-lg" name="state">
  <option selected="$patronDetails->state" value="$patronDetails->state" >$patronDetails->state</option>
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
    <input type="text" name="zipCode" class="form-control" id="exampleInputPassword1" value="$patronDetails->zip">
  </div>
  <div class ="center">
  <button onclick="location.href = 'manage-users.php';"type="button" class="btn btn-warning">Discard Changes</button>
  <button type="submit" class="btn btn-success">Save Changes</button>
</form>
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
    Delete User
  </button>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deletion Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete user, $patronDetails->firstname $patronDetails->lastname ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form   action = "../classes/deleteUser.php" method = "POST">
          <input type = "hidden" name = "patronId" value="$patronId">
    <button type="submit" class="btn btn-danger">Delete User</button>
    </form>
    
  </div>
        </div>
</div>
</div>

      </div>
	  
EOT;
	
	$site->displayNoTitleBar($content, $title);


?>
      
 
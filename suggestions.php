   
      
<?php

	include("config.php");
	
	$title = "LiMe 1.0";
	
	$content = <<<EOT

	  <div class ="container">
        <h2 class ="center inputText">New Suggestion</h2>

      </div>
      <div class = "formContainer">
      
      <form>
  <div class="form-group">
    <label for="exampleInputPassword1">Title</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Title">
  </div>
  <div class="form-group">
    <label for="comment">Suggestion:</label>
    <textarea class="form-control" rows="5" id="comment"></textarea>
  </div>
  <div class ="center">
  <button type="submit" class="btn btn-warning">Discard Changes</button>
  <button type="submit" class="btn btn-primary">Submit Suggestion</button>
</div>
</form>
</div>


      </div>
 
	  
EOT;
	
	$site->displayNoTitleBar($content, $title);


?>



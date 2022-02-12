
   
   <?php

	include("../config.php");
	
	$title = "LiMe 0.1 - Manage Librarians";
	
	
	$content = <<<EOT

      <table class="table table-hover">
        <thead class="thead-light">
          <tr>
            <th scope="col">Employee ID</th>
            <th scope="col">Email</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Phone</th>
            <th scope="col"></th>
			<th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
       
   
	  
EOT;


$additionalContent = <<<EOT
	
	
	       </tr>
          
        </tbody>
      </table>

      <div class = "container">
      </div>
      </div>
	
EOT;
	
	$site->displayLibrarians($content, $additionalContent, $title);


?>
   
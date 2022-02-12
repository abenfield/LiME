
   
   <?php

	include("config.php");
	
	$title = "LiMe 0.1 - Manage Users";
	
	
	$content = <<<EOT

      <table class="table table-hover">
        <thead class="thead-light">
          <tr>
          <th scope="col">Patron ID</th>
            <th scope="col">Email</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Address</th>
            <th scope="col">Books Checked Out</th>
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
	
	$site->displayUserBar($content, $additionalContent, $title);


?>
   
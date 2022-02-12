   
    <?php

	include("config.php");
	
	$title = "LiMe 1.0";
	
	$content = <<<EOT

	 
          
      <table class="table table-hover">
        <thead class="thead-light">
          <tr>
            <th scope="col">ISBN</th>
            <th scope="col">Book Title</th>
            <th scope="col">Author</th>
            <th scope="col">Genre</th>
            <th scope="col">Tags</th>
            <th scope="col">Availability</th>
          </tr>
        </thead>
        <tbody>
          <tr>
                  <!-- Catalog data entry begins here -->
            <th scope="row">978-3-16-148410-0</th>
            <td>Cat in the Hat</td>
            <td>Dr. Sus</td>
            <td>Family</td>
            <td>Silly, Feline</td>
            <td>5 available </td>



          </tr>
          
        </tbody>
      </table>
	  
EOT;
	
	$site->displayWishBar($content, $title);


?>

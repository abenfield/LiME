<?php

		include("config.php");
	
	$title = "LiMe 1.0 - Catalog";
		
	$content = <<<EOT

 <table class="table table-hover  table-sm ">
        <thead class="thead-light ">
          <tr>
            <th scope="col">ISBN</th>
            <th scope="col">Book Title</th>
            <th scope="col">Author</th>
            <th scope="col">Genre</th>
            <th scope="col">Summary</th>
            <th scope="col">Tags</th>
            <th scope="col">Availability</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody id = "load">
        
EOT;

	
	$site->displayBooks($content, $title);


?>
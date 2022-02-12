<?php

function __autoload($class) {
	
		include "../classes/".$class.".php";
	
	}

	$site = new site;
	
	$site->addHeader("header.php");
				
   $site->addTopbar("toolbars/topbar.php");
   
   $site->addCheckOutBar("toolbars/topbarCheckOut.php");
     
	 $site->addWishBar("toolbars/topbarWish.php");
			
	$site->addFooter("footer.php");
	
	$page = new page;
	
?>
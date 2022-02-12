<?php


	class site {

		private $header;
		private $topbar;
		private $footer;

		private $topBarCheckOut;
		private $topWishBar;


		private $userbar;



		public function addUserBar($userbar) {
		
			$this->userbar = $userbar;
		
		}

		
		public function addHeader($header) {
		
			$this->header = $header;
		
		}


		public function addTopBar($topbar) {
		
			$this->topbar = $topbar;
		
		}

									
	
											
		public function addStaffBar($topbarStaff) {
		
			$this->topbarStaff = $topbarStaff;
		
		}
		

		
		public function addTopbarUser($topbarUser) {
		
			$this->topbarUser = $topbarUser;
		
		}
		
			
		public function addCheckOutBar($topBarCheckOut) {
		
			$this->topBarCheckOut = $topBarCheckOut;
		
		}
		
					
		public function addWishBar($topWishBar) {
		
			$this->topWishBar= $topWishBar;
		
		}

		public function addFooter($footer) {
		
			$this->footer = $footer;
		

		}
		
		// This is the function that is used to display the topbar used for catalog pages both user/staff.


		public function display($content, $title) {
			
		
			global $page;
		
			include $this->header;

			include $this->topbar;
			
				$page->display($content);
			
			include $this->footer;
		
		}


		// This is the function that is used to display the books listing on the catalog.php page.(User/Staff)

		public function displayBooks($content, $title) {		
		
			global $page;
		
			include $this->header;
			
			include $this->topbar;
			
			$page->displayBooks($content);
			
			include $this->footer;
		
		}

		public function displayCopies($content,$additionalContent, $title, $isbn) {		
		
			global $page;
		
			include $this->header;
			
			
			$page->displayCopies($content, $additionalContent, $isbn);
			 

			include $this->footer;
		
		}


		public function displayLibrarians($content,$additionalContent, $title) {		
		
			global $page;
		
			include $this->header;
			
			include $this->userbar;
			
			$page->displayLibrarians($content, $additionalContent, $isbn);
			 

			include $this->footer;
		
		}

		// This is the function that is used to hide topbar display. (User/Staff)

		
		public function displayNoTitleBar($content, $title) {
				
			global $page;
		
			include $this->header;
					
				$page->display($content);
			
			include $this->footer;
		
		}

		// This is the function that is used to display user bar for managing users. (Staff)


		public function displayUserBar($content,$additionalContent, $title) {
				
			global $page;
		
			include $this->header;
			
		      include $this->userbar;
					
				$page->displayUsers($content, $additionalContent);
			
			include $this->footer;
		
		}
		
		// This is the function that is used to display the checkout bar. (User)

	public function displayTransactions($content, $title) {
				
			global $page;
		
			include $this->header;
			
		      include $this->topBarCheckOut;

				$page->displayTransactions($content);
			
			include $this->footer;
		
		}
		public function displayTransaction($content, $title, $patronId) {
				
			global $page;
		
			include $this->header;
			
		      include $this->topBarCheckOut;
					
				$page->displayTransaction($content, $patronId);
			
			include $this->footer;
		
		}



				// This is the function that is used to display the wishlist bar. (User)

		public function displayWishBar($content, $title) {
				
			global $page;
		
			include $this->header;
			
		      include $this->topWishBar;
					
				$page->display($content);
			
			include $this->footer;
		
		}
		
		
		
	
	}

?>

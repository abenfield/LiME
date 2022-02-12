<?php

// This class is responsible for displaying pages to  the user
	class page {
	

		public function display($content) {			
			echo $content;		
		}
		
		public function displayCopies($content, $additionalContent, $isbn){
			echo $content;
			$isbn = $isbn;
			include("listCopies.php");
			while ($row = mysqli_fetch_assoc($sqlCopies)) {
				$count = 1;
				$barcode = $row['barCode'];
				echo "<tr>";
				echo  "<td>" . $barcode . "</td>";
				echo  "<td>" . $count . "</td>";
				echo  "<td>" . "null". "</td>";
				echo  "<td>" . "null". "</td>";
				echo "<td><a href = \"../classes/deleteCopy.php?barcode=$barcode\"><img class = \"icon\" src=\"../content/trash.png\"></img> </a></td>";
				echo "</tr>";

			}
			echo $additionalContent;
		}
		public function displayTransactions($content) {

			require('session.php');
		
			$sqlBooks = getTransactions($patronId);

			echo $content;
		

			while ($row = mysqli_fetch_assoc($sqlBooks)) {
				$barcode = $row['barCode'];
				
				// look up isbn based off barcode
				$sql = "SELECT isbn FROM group3.ItemCopies WHERE `barCode` = '$barcode';";
				$isbn = mysqli_query($db,$sql);
				$book = mysqli_fetch_row($isbn);
				$bookDetails = new bookDetails($book[0]);
			
				
				echo "<tr>";
					echo  "<td>" .$bookDetails->isbn . "</td>";
					echo  "<td>" .$bookDetails->title . "</td>";
					echo  "<td>" .$bookDetails->author . "</td>";
					echo  "<td>" .$bookDetails->genre . "</td>";
					echo  "<td>" .$row['dateOut'] . "</td>";
					echo  "<td>" .$row['dateDue'] . "</td>";
					echo  "<td>" .$row['dateReturned'] . "</td>";
					
				echo "</tr>";
				


			}
		}
			
			public function displayTransaction($content, $patronId) {
				require('session.php');
		
				$sqlBooks = getTransactions($patronId);
	
				echo $content;
			
	
				while ($row = mysqli_fetch_assoc($sqlBooks)) {
					$barcode = $row['barCode'];
					
					// look up isbn based off barcode
					$sql = "SELECT isbn FROM group3.ItemCopies WHERE `barCode` = '$barcode';";
					$isbn = mysqli_query($db,$sql);
					$book = mysqli_fetch_row($isbn);
					$bookDetails = new bookDetails($book[0]);
				
					
					echo "<tr>";
						echo  "<td>" .$bookDetails->isbn . "</td>";
						echo  "<td>" .$bookDetails->title . "</td>";
						echo  "<td>" .$bookDetails->author . "</td>";
						echo  "<td>" .$bookDetails->genre . "</td>";
						echo  "<td>" .$row['dateOut'] . "</td>";
						echo  "<td>" .$row['dateDue'] . "</td>";
						echo  "<td>" .$row['dateReturned'] . "</td>";
						
					echo "</tr>";
					
	
				}
	

		
		}

	// This function is grab users from database and display users [manage-users.php]
		public function displayUsers($content, $additionalContent) {

			include("listUsers.php");

			echo $content;
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
		
			while ($row = mysqli_fetch_assoc($sqlUsers)) {
				$patronId = $row['patronId'];
				$firstname = $row['firstName'];
				$lastname = $row['lastName'];
				$email = $row['email'];
				$phone = $row['phone'];
				$address = $row['address'];
				$city = $row['city'];
				$state = $row['state'];
				$zip = $row['zipCode'];
				$amountCheckedOut = amountCheckedOut($patronId);

				echo "<tr>";
					echo  "<td>" .$patronId . "</td>";
					echo  "<td>" .$email . "</td>";
					echo  "<td>" .$firstname . "</td>";
					echo  "<td>" .$lastname . "</td>";
					echo "<td>" . $phone . "</td>";
					echo "<td>" . $address . "</td>";
						echo "<td>" . $amountCheckedOut. "</td>";
				echo "<td><a href = \"checkouts.php?patronId=$patronId\"><img class = \"icon\" src=\"../content/view.png\"></a></img> <a href = \"edit-user.php?patronId=$patronId\"><img class = \"icon\" src=\"../content/edit.png\"></img> </a></td>";
				echo "</tr>";
				
			}
				
				echo $additionalContent;


				
		
		}
	
		public function displayBooks($content) {
			
			require('session.php');
			include("listBooks.php");

			echo $content;
		
			$search = $_GET["search"];

			while ($row = mysqli_fetch_assoc($sqlBooks)) {
				
				$isbn = $row['isbn'];
				
				
				$bookDetails = new bookDetails($isbn);
			
				$amountCheckedOut = $bookDetails->getAmountCheckedOut($isbn);
				$totalCopies  = $bookDetails->getTotalCopies($isbn);
				$available = $totalCopies - $amountCheckedOut;

				echo "<tr>";
					echo  "<td>" .$bookDetails->isbn . "</td>";
					echo  "<td>" .$bookDetails->title . "</td>";
					echo  "<td>" .$bookDetails->author . "</td>";
					echo  "<td>" .$bookDetails->genre . "</td>";
					echo " <td ><textarea readonly class=\"form-control rounded-0\ rows=\"4\"> $bookDetails->summary</textarea></td>";
					echo " <td style = \"pointer-events:none\"><textarea readonly class=\"readOnlyTags form-control rounded-0\" id=\"exampleFormControlTextarea2\" rows=\"3\"> $bookDetails->tags </textarea></td>";

					echo  "<td>" . $available .  " out of " . $totalCopies . "</td>";
				echo "<td><a href = \"view-book.php?isbn=$bookDetails->isbn\"><img class = \"icon\" src=\"../content/view.png\"></a></img> ";
				if ($type_check == "staff")
				echo "<a href = \"edit-book.php?isbn=$bookDetails->isbn\"><img class = \"icon\" src=\"../content/edit.png\"></img> </a></td>";
				if ($type_check == "user")
				echo "<a href = \"\"><img class = \"icon\" src=\"../content/favorite_unchecked.png\"></img> </a></td>";

				echo "</tr>";		

			}
			echo "</table>";
			echo "<input type=\"hidden\" id=\"pageno\" value=\"1\">";
			echo "<input type=\"hidden\" id=\"test\" value=\"1\">";
				echo "<img class = \"center\"id=\"loader\" src=\"../content/loading.gif\">";	
			echo "
			
			<script>
			$(document).ready(function(){





				$('#loader').on('inview', function(event, isInView) {
					if (isInView) {
						loadData();
					}
				});
			
			
			});

			function loadData() {
				var nextPage = parseInt($('#pageno').val())+1;
				$.ajax({
					type: 'POST',
					url: 'classes/pagination.php',
					data: { pageno: nextPage, type : \"book\"},
					success: function(data){
						if (data.length < 5){
						$(\"#loader\").hide();
						}
						if(data != null){							 
							$('#load').append(data);
							$('#pageno').val(nextPage);
							$(\"#loader\").hide();
						} 
					}
				});
			}
			


			</script>
			";
		
		
		}

		public function displayLibrarians($content, $additionalContent) {

			include("listLibrarians.php");

			echo $content;

		
			while ($row = mysqli_fetch_assoc($sqlLibrarians)) {
				$employeeId = $row['employeeId'];
				$firstname = $row['firstName'];
				$lastname = $row['lastName'];
				$email = $row['email'];
				$phone = $row['phone'];
				$address = $row['address'];
	
				echo "<tr>";
					echo  "<td>" .$employeeId . "</td>";
					echo  "<td>" .$email . "</td>";
					echo  "<td>" .$firstname . "</td>";
					echo  "<td>" .$lastname . "</td>";
					echo "<td>" . $phone . "</td>";

				echo "<td><a href = \"edit-librarian.php?employeeId=$employeeId\"><img class = \"icon\" src=\"../content/edit.png\"></img> </a></td>";
				echo "</tr>";
				
			}
				
				echo $additionalContent;


			

			
	

		
		}
	


	
	}






?>
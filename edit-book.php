
   
   <?php

  include("config.php");

  $isbn = $_GET["isbn"];

	$bookDetails = new bookDetails($isbn);

	
	$title = "LiMe 0.1 - Create new Book";
	
	$noTopBar = "true";
	
	$content = <<<EOT

    
       <div class ="container">
        <h2 class ="center inputText">Edit existing Book : $bookDetails->title</h2>

      </div>
      <div class = "formContainer">
      
      <form   id = "editBook" action = "../classes/editBook.php" method = "POST">
      
  <div class="form-group">
    <label for="isbn">ISBN</label>
    <input type="text" class="form-control" name = "isbn"  aria-describedby="isbn" value="$bookDetails->isbn">
  </div>
  <div class="form-group">
    <label for="title">Book Title</label>
    <input type="text" class="form-control" name="title" value="$bookDetails->title">
  </div>
  <div class="form-group">
    <label for="firstname">Author's First Name</label>
    <input type="text" class="form-control" name="firstname" value=" $bookDetails->firstname">
  </div>
  <div class="form-group">
    <label for="lastname">Author's Last Name</label>
    <input type="text" class="form-control" name="lastname" value=" $bookDetails->lastname">
  </div>
  <div class="form-group">
    <label for="publisher">Publisher</label>
    <input type="text" class="form-control" name="publisher" value = "$bookDetails->publisher">
  </div>
  <div class="form-group">
    <label for="publishdate">Publish Date</label>
    <input type="text" class="form-control" name="publishdate" value = "$bookDetails->publishdate">
  </div>
  <div class="form-group">
    <label for="Genre">Genre</label>
    <input type="text" class="form-control" id = "genre" name="genre" value= "$bookDetails->genre">
  </div>
  <div class="form-group">
  <label for="tags">Tags</label>
  <input type="text" class="form-control" id = "tags" name="tags" value= "$bookDetails->tags">
</div>
<div class="form-group">
    <label for="summary">Summary</label>
    <textarea name = "summary" id = "summary" class="form-control" id="exampleFormControlTextarea1" rows="3">$bookDetails->summary</textarea>

  </div>
  <div class ="center">
  <button onclick="location.href = 'catalog.php';"type="button" class="btn btn-warning">Discard Changes</button>
  <button type="submit" class="btn btn-primary">Save Changes</button>
  </form>


<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
    Delete item
  </button>

</div>
</div>

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
        Are you sure you want to delete $bookDetails->title?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form   action = "../classes/deleteBook.php" method = "POST">
        <input type = "hidden" name = "isbn" value="$isbn">
  <button type="submit" class="btn btn-danger">Delete Book</button>
  </form>
  
</div>
      </div>
    </div>
  </div>
</div>

    


      <script type="text/javascript">


      $(tags).tagsInput({
        'defaultText':'add...',
        'height':'50px',
        'width':'100%',

      });
      </script>
      
	  
EOT;
	
	$site->displayNoTitleBar($content, $title);


?>
      
    
  <?php

	include("config.php");
	
	$title = "LiMe 0.1 - Create new Book";
	
	
	$content = <<<EOT


        <h2 class ="center inputText">Create new Book</h2>

      </div>
      <div class = "formContainer">
      
      <form id = "addBook" method = "POST" action = "../classes/createBook.php">
  <div class="form-group">
    <label for="isbn">ISBN</label>
    <input type="text" class="form-control" id="isbn" name = "isbn" aria-describedby="isbn" placeholder="Enter ISBN" required>
  </div>
  <div class="form-group">
    <label for="title">Book Title</label>
    <input type="text" class="form-control" id="title" name = "title" placeholder="Book Title">
  </div>
  <div class="form-group">
    <label for="author">Author's First Name</label>
    <input type="text" class="form-control" id="firstname" name = "firstname"placeholder="First Name">
  </div>
  <div class="form-group">
  <label for="author">Author's Last Name</label>
  <input type="text" class="form-control" id="lastname" name = "lastname" placeholder="Last Name">
</div>
  <div class="form-group">
    <label for="genre">Publisher</label>
    <input type="text" class="form-control" name = "publisher" id="publisher" placeholder="Publisher">
  </div>
  <div class="form-group">
    <label for="publishdate">Date Published</label>
    <input type="text" class="form-control" name = "publishdate" id="publishDate" placeholder="yyyy-mm-dd">
  </div>
  <div class="form-group">
  <label for="publishdate">Genre</label>
  <input type="text" class="form-control" name = "genre" id="genre" placeholder="genre">
</div>
<div class="form-group">
<label for="tags">Tags</label>
<input type="text" class="form-control" id = "tags" name="tags" value= ""/>
</div>
  <div class="form-group">
    <label for="summary">Summary</label>
    <textarea name = "summary" id = "summary" placeholder = "Summary" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

  </div>
  <div class ="center">
  <a href = "catalog.php">
  <button type="button" class="btn btn-warning">Discard Changes</button>
  </a>
  <button type="submit" class="btn btn-primary">Create new book</button>
</div>
</form>
</div>


      </div>
      <script type="text/javascript">
      $(tags).tagsInput({
        'defaultText':'add...',
        'height':'50px',
        'width':'100%',

      });
      </script>
     
    

      <script>
      $('#publishDate').datepicker({
        format: "yyyy/mm/dd"
    });
    </script>




EOT;
	
	$site->displayNoTitleBar($content, $title);


?>
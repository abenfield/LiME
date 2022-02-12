
   
   <?php

include("config.php");

$isbn = $_GET["isbn"];

  $bookDetails = new bookDetails($isbn);

  
  $title = "LiMe 0.1 - Viewing $bookDetails->title";
  
  $noTopBar = "true";
  
  $data = json_decode(
    file_get_contents("https://www.googleapis.com/books/v1/volumes?q=isbn:$isbn")
);

if ($data->items[0]->volumeInfo->imageLinks->thumbnail != null)
$cover =  $data->items[0]->volumeInfo->imageLinks->thumbnail;
else {
  $cover = "../content/cover.png";
}

  $content = <<<EOT

  
  <div class ="container">
  <h2 class ="center inputText">$bookDetails->title</h2>
<img class = "center cover" src = "$cover" />

<div class = " bookDetails center">
<h2>ISBN: $bookDetails->isbn</h2>
<h2>Author: $bookDetails->author</h2>
<h2>Publisher: $bookDetails->publisher</h2>
<h2>Publish Date: $bookDetails->publishdate</h2>
<h2>Genre: $bookDetails->genre</h2>
<h2>Summary: $bookDetails->summary</h2>
</div>
<div class = "center copies">
<h2>Copies Available</h2> 
<table class="table table-hover table-sm ">
<thead class="thead-light ">
<tr>
 <th scope="col">Bar Code</th>
 <th scope="col">Copy Number</th>
 <th scope="col">Location</th>
 <th scope="col">Checked Out</th>
 <th scope="col">Actions</th>
</tr>
</thead>
<tbody>

    
EOT;
  

$additionalContent = <<<EOT

</tbody>
</table>
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
  <input type = "hidden" name = "isbn" value="0060850523">
<button type="submit" class="btn btn-danger">Delete Book</button>
</form>

</div>
</div>
</div>
</div>
</div>
    
    
EOT;

  $site->displayCopies($content, $additionalContent, $title, $bookDetails->isbn);


?>
    
  
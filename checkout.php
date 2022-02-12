 <?php
include("config.php");

$title = "LiMe 0.1 - Check outs";
session_start();
$error = $_SESSION['error'];
$content = <<<EOT
$error
<h2 class ="center inputText">Check Out User</h2>
</div>
<div class = "formContainer">

<form id = "transaction"action = "../classes/transaction.php" method = "post">
<div class="form-group">
<label for="username">Patron's Email:</label>
<input type="email" name ="email"class="form-control" id="email" aria-describedby="emailHelp" placeholder="Patron's Email">

<hr/>
<label for="username">Barcode #1:</label>
<input type="barcode" class="form-control barcode" name = "bc1" id="barcode" aria-describedby="emailHelp" placeholder="Barcode">
</div>
<button id = "newEntry" type="button" class="btn btn-success">+</button>
<br/>
<br/>

<label for="condition">Book Conditions:</label>
<textarea name = "condition" id = "conditon" placeholder = "Condition" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
<input type="hidden" name="action" id="action" value=""/>
</form>
<button type = "button" name = "check-out" type="button" class="btn btn-warning" onclick="return buttonClick(this)" >Check out</button>
<button type = "button" name = "check-in" type="button" class="btn btn-primary" onclick="return buttonClick(this)" >Check in</button>



</div>

<script>
function buttonClick(theButton){
  document.getElementById('action').value = theButton.name;
  document.getElementById('transaction').submit();
  return true;
}

</script>




<script type="text/javascript"> 
 $(document).ready(function(){                  
 $("#email").autocomplete({                        
 source:'../classes/listUsers.php', 
 minLength:1                  
   }); 
   });        
</script>


<script type="text/javascript"> 
 $(document).ready(function(){                  
 $(".barcode").autocomplete({                        
 source:'../classes/listBooks.php', 
 minLength:1                  
   }); 
   });        
</script>





<script>
count=1;
var wrapper   		= $(".form-group");

$( "#newEntry" ).click(function() {
    count++;
    $(wrapper).append('<hr/><label for="username">Barcode #' + count + '   :</label>    '); 

    $(wrapper).append('<input type="barcode" class="form-control barcode" name = "bc' + count + '"id="barcode" aria-describedby="emailHelp" placeholder="Barcode">'); 

    $(".barcode").autocomplete({                        
        source:'../classes/listBooks.php', 
        minLength:1                  
          }); 
    
  });
</script>


EOT;

$site->displayNoTitleBar($content, $title);


?>

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"] == "POST") {


    require('session.php');
    require('connection.php');

if ($type_check = "staff")
{
    // Gather form POST data and assign them to local variables
    $isbn = mysqli_real_escape_string($db,$_REQUEST["isbn"]); 
    $title = mysqli_real_escape_string($db,$_REQUEST["title"]); 
    $firstname = mysqli_real_escape_string($db,$_POST["firstname"]); 
    $lastname = mysqli_real_escape_string($db,$_POST["lastname"]);
    $publisher = mysqli_real_escape_string($db,$_POST["publisher"]);
    $publishdate = mysqli_real_escape_string($db,$_POST["publishdate"]); 
    $summary = mysqli_real_escape_string($db,$_POST["summary"]); 
    $genre = mysqli_real_escape_string($db,$_POST["genre"]);
    $tags = mysqli_real_escape_string($db,$_POST["tags"]);
    

    
    //See what copy number it is.
    $sql = "SELECT * FROM group3.ItemCopies WHERE isbn = '$isbn';";
    $result = mysqli_query($db,$sql);
    $copyNumber = $result->num_rows + 1;

    //generate a barcode using Codabar 1D (https://en.wikipedia.org/wiki/Codabar)
    $barcode = A . $isbn . $copyNumber . B;




    //Check if isbn exists in table
    $sql = "SELECT * FROM group3.LibraryInventoryItem WHERE isbn = '$isbn';";
    $result = mysqli_query($db,$sql);

    if($result->num_rows == 0) {
        //Create new isbn entry if isbn doesn't already exist
        $sql = "INSERT INTO `group3`.`LibraryInventoryItem` (`isbn`, `title`, `authorFirstName`, `authorLastName`, `publisher`, `datePublished`, `summary`, `genre`) 
        VALUES ('$isbn', '$title', '$firstname', '$lastname', '$publisher', '$publishdate', '$summary', '$genre')";

        $result = mysqli_query($db,$sql);
   } 
   
   // Insert new copy
    $sql = "INSERT INTO `group3`.`ItemCopies` (`barCode`, `isbn`) VALUES ('$barcode', '$isbn');";
    $result = mysqli_query($db,$sql);
   // Insert Tags (Consider revisiting to add autofilling and utilizing StandardTag table)
   $sql = "INSERT INTO `group3`.`AssignedTags` (`isbn`, `tagCode`) VALUES ('$isbn', '$tags');";
   $result = mysqli_query($db,$sql);

   header("location:../catalog.php");


} else {
        // not auth'd returning home.
        header("location:/staff/login.php");
     }

    } 

?>
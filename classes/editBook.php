<?php


if($_SERVER["REQUEST_METHOD"] == "POST") {


    require('session.php');


if ($type_check = "staff")
{
    require('connection.php');
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

    //Update Book
    $sql = "UPDATE `group3`.`LibraryInventoryItem`  SET `isbn` = '$isbn',`title` = '$title', `authorFirstName` = '$firstname',`authorLastName` = '$lastname',`publisher` = '$publisher',`datePublished` = '$publishdate',`summary` = '$summary',`genre` = '$genre' WHERE (`isbn` = '$isbn') ;    ";
    $result = mysqli_query($db,$sql);
    //Update Tags
    $sql = "UPDATE `group3`.`AssignedTags`  SET `tagCode` = '$tags' WHERE (`isbn` = '$isbn') ;    ";
    echo $sql;
   $result = mysqli_query($db,$sql);
    header("location:../catalog.php");



} else {
        // not auth'd returning home.
        header("location:../catalog.php");
     }

    } 

?>
<?php
function getTransactions($patronId){
    require('connection.php');
    $sqlListQuery= "SELECT * FROM group3.Borrowed WHERE `patronId` = '$patronId';";
    
    $sqlBooks = mysqli_query($db,$sqlListQuery);

    return $sqlBooks;
}

function getUserName($patronId){
    require('connection.php');
    $sqlListQuery= "SELECT firstName, lastName FROM group3.Patron WHERE `patronId` = '$patronId';";
    $result = mysqli_query($db,$sqlListQuery);

    $row = mysqli_fetch_assoc($result);

    return $row['firstName'] . " ".$row['lastName'];
}
?>
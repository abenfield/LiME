<?php

    include("connection.php");
    include('bookDetails.php');
    include('session.php');
    
    $pageno = $_POST['pageno'];
    $type = $_POST['type'];


    $no_of_records_per_page = 10;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $sql = "select * from group3.LibraryInventoryItem LIMIT $offset, $no_of_records_per_page";
    $res_data =   mysqli_query($db,$sql);




    if (mysqli_num_rows($res_data)>0) {
    while($row = mysqli_fetch_array($res_data)){

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
    echo "<a href = \"\"><img class = \"icon\" src=\"..content/favorite_unchecked.png\"></img> </a></td>";

    echo "</tr>";

    }
}
?>
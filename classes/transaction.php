<?php

require('session.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($type_check = "staff"){

     //Determine mode of operation

     $op = $_POST['action'];

        $error = null;

        //Determine if email is valid and obtain patron Id
        $email = $_POST["email"];

        $sql="SELECT patronId FROM group3.Patron WHERE `email` = '$email';";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        $patronId =  $row[0];
        if ($patronId == null) {
            $error = "<div style = \"margin:0;\"class=\"alert alert-danger\" role=\"alert\">
      Could not find a user with the email, $email! Transaction aborted.
    </div>";
            $_SESSION['error']=$error;

            header('Location: ../checkout.php');
        }
     
        $dateOut = new \DateTime("now");
        $dateDue = new \DateTime("+14 day");
        $do = $dateOut->format('Y-m-d');
        $dd = $dateDue->format('Y-m-d');

        $condition = $_POST['condition'];

        //Determine how many barcodes were passed in.
        $i=0;
        foreach($_POST as $k => $v){
            ++$i;
          }
          //offset fix due to email, condition, and operation being passed through.
        $i = $i - 3;

          while ($i > 0)
         {
   // Check out loop
        
   require('connection.php');
        $barcode =  $_POST["bc" . $i];

        if ($barcode != '') { 

       //Determine if barcode is valid
        $sql="SELECT barcode FROM group3.ItemCopies WHERE `barcode` = '$barcode';";
        $result = mysqli_query($db,$sql);

        if (mysqli_num_rows($result) == 0){
        $error .= "<div style = \"margin:0;\"class=\"alert alert-danger\" role=\"alert\">
        Could not find a book with the barcode, $barcode.
      </div>";
        }else {
          if ($op == "check-out"){
            //Determine if barcode is already checked out
        $sql="SELECT barcode FROM group3.Borrowed WHERE `barcode` = '$barcode' AND `dateReturned` IS null;";
        $result = mysqli_query($db,$sql);
        if (mysqli_num_rows($result) > 0)
        $error .= "<div style = \"margin:0;\"class=\"alert alert-danger\" role=\"alert\">
        Could not checkout $barcode, $barcode is already checked out! Did you mean to check in this book?
      </div>";
  
        // if there are no errors; proceed to enter into the database.
          if ($error == null) {
        //Update Borrowed Table
       $sql="INSERT INTO `group3`.`Borrowed` (`patronId`, `employeeId`, `barCode`, `dateOut`, `dateDue`, `bookCondition`) VALUES ('$patronId', '$employeeId', '$barcode', '$do', '$dd',  '$condition')";
        $result = mysqli_query($db,$sql);
            if (!$result){
            $error .= "<div style = \"margin:0;\"class=\"alert alert-danger\" role=\"alert\">
            Transaction was not successful. Could not insert into database.
          </div>";
            }else
              $alert .= "<div style = \"margin:0;\"class=\"alert alert-success\" role=\"alert\">
              Sucessfully checked out $barcode for $email! 
            </div>";
          } 

        } else if ($op == "check-in") {
          $sql="UPDATE `group3`.`Borrowed` SET `dateReturned` = '$do' WHERE (`barCode` = '$barcode');";
          $result = mysqli_query($db,$sql);
          if (!$result){
            $error .= "<div style = \"margin:0;\"class=\"alert alert-danger\" role=\"alert\">
            Check in for $barcode was not successful. Could not insert into database. Is the book already checked in?
          </div>";
          }else{
            $alert .= "<div style = \"margin:0;\"class=\"alert alert-success\" role=\"alert\">
              Sucessfully checked in $barcode for $email! 
            </div>";
          }
        }

        }


      }
        --$i;
        
        
        
         }

        }

         if ($error !=null)
         $_SESSION['error']=$error;
         else
         $_SESSION['error']=$alert;
         header('Location: ../checkout.php');
       
    }

?>
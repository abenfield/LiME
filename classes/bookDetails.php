<?php

	class bookDetails {
    
        public $isbn;
        public $title;
        public $author;
        public $firstname;
        public $lastname;
        public $genre;
        public $tags;
        public $availability;
        public $publisher;
        public $summary;

        public function __construct($isbn) {
            
            require('connection.php');
            $sql = "SELECT * FROM group3.LibraryInventoryItem WHERE isbn = '$isbn'" ;
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);

            $this->isbn = $row[0];

            $this->title = $row[1];

            $this->firstname = $row[2];

            $this->lastname = $row[3];
            $this->publisher = $row[4];
            $this->publishdate = $row[5];
            $this->author = $row[2] . " " . $row[3];
            $this->summary = $row[6];
            $this->genre = $row[7];
            $sql = "SELECT * FROM group3.AssignedTags WHERE isbn = '$isbn'" ;
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);

            $this->tags = $row[1];

            $this->availability = "null";


        }


            //Find how many are checked out
           public function getAmountCheckedOut($isbn){
            require('connection.php');
           $sql = " SELECT COUNT(*)
            from group3.ItemCopies
            join group3.Borrowed
            on group3.ItemCopies.barCode = group3.Borrowed.barCode
            where group3.Borrowed.dateReturned is null AND group3.ItemCopies.isbn = '$isbn';";
            $result = mysqli_query($db,$sql);
            $result = mysqli_fetch_row($result);
            return $result[0];
           }

           public function getTotalCopies($isbn){
            require('connection.php');
               $sql = "SELECT COUNT(*) FROM group3.ItemCopies WHERE `isbn` = '$isbn';";
               $result = mysqli_query($db,$sql);
               $result = mysqli_fetch_row($result);
               return $result[0];
           }




        
		}


	
	







?>
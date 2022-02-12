<?php

	class librarianDetails {
    
        public $employeeId;
        public $email;
        public $firstname;
        public $lastname;
        public $phone;
   

        public function __construct($employeeId) {
            require('connection.php');
           
            $sql = "SELECT * FROM group3.Librarian WHERE employeeId = '$employeeId';" ;
            
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
  
     
            $this->employeeId = $row[0];

            $this->firstname = $row[1];

            $this->lastname = $row[2];
            $this->email = $row[3];
            $this->phone = $row[4];

    




        }



        
		}


	
	







?>
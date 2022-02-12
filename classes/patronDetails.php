<?php

	class patronDetails {
    
        public $patronId;
        public $email;
        public $firstname;
        public $lastname;
        public $phone;
        public $address;
        public $city;
        public $state;
        public $zip;


        public function __construct($patronId) {
            
            require('connection.php');
            $sql = "SELECT * FROM group3.Patron WHERE patronId = '$patronId';" ;
            
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result, MYSQLI_NUM);
  
     
            $this->patronId = $row[0];

            $this->firstname = $row[1];

            $this->lastname = $row[2];
            $this->email = $row[3];
            $this->phone = $row[4];

            $this->address = $row[5];
    
            $this->city = $row[6];

            $this->state = $row[7];

            $this->zip = $row[8];




        }



        
		}


	
	







?>
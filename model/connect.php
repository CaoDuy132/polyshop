<?php
   
     class connect{
         
        protected $localhost = 'localhost:3307';
        protected $username = 'root';
        protected $password = '';
        protected $dbname  = 'polyshop';
        public $connect;

        public function __construct()
        {
            $this->connect = mysqli_connect($this->localhost , $this->username , $this->password , $this->dbname);
            if($this->connect){
                mysqli_query($this->connect , "SET NAMES 'utf8" );
            }
        }
     }


?>
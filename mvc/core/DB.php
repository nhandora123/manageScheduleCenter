<?php
    class DB{
        public $con;
        public $serverName= "localhost";
        public $username = "root";
        public $password= "";
        public $databaseName="schedule";

        function __construct(){
            $this->con=mysqli_connect($this->serverName, $this->username, $this->password);
            mysqli_select_db($this->con, $this->databaseName);
            mysqli_query($this->con, "SET NAMES 'utf8'");
        }
    }
?>
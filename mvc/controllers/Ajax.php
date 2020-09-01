<?php
    class Ajax extends Controller{
        public $userModel;

        function __construct()
        {
            $this->userModel = $this->model("UserModel");
        }

        function checkingUsername(){
            $email= $_POST["email"];

            $result = $this->userModel->checkingUsername($email);
            echo $result;   
        }
    }
?>
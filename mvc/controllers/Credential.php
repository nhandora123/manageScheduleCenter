<?php
//session_start();
    class Credential extends Controller{
        
        public $userModel;
        public $userView;
        function __construct()
        {
            $this->userModel= $this->model("UserModel");
        }

        function index(){
            if(isset($_SESSION["flag"])){
                $this->_header("home");
            }else
                $this->_header("credential","signIn");
        }
        function SignIn(){
            if(isset($_SESSION["flag"])){
                $this->_header("home");
            }else
                $this->view("credential/SignIn", []);

        }

        function PostSignIn(){
            if(isset($_POST["sbSignIn"])){
                $email = $_POST["email"];
                $password = $_POST["password"];
                
                $userInfor = $this->userModel->SignIn($email, $password);
                $hashPassword = $userInfor[1];
                $result = "";


                if(password_verify($password, $hashPassword)) {

                    $_SESSION["flag"]=true;
                    $obj = new User($email, $userInfor[2], $userInfor[3], $userInfor[4], $userInfor[5]);
                    $_SESSION["user"]= $obj;
                    $this->_header("Home");
                    
                }
                else{
                    $result = "Username or password is wrong!";
                    //$this->_header("signIn");
                    $this->view("credential/signIn",[
                        "notify"=> $result
                    ]);
                }
                    

            }
        }

        function SignUp(){
            $this->view("credential/SignUp",[]);
        }

        function PostSignUp(){
            $error = "";
            if(isset($_POST["sbSignUp"])){
                if(isset($_POST["email"])){
                    $email = $_POST["email"];
                }
                if(isset($_POST["fullname"])){
                    $fullname= $_POST["fullname"];
                }
                if(isset($_POST["radioPermission"])){
                    $permission = $_POST["radioPermission"];
                }
                if(isset($_POST["password"])){
                    $password = $_POST["password"];
                }
                if(isset($_POST["developCode"])){
                    $codeDevelop = $_POST["developCode"];
                }
                if($codeDevelop ==="noras"){
                    $phoneNumber="09090090";
                    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    
                    $kq = $this->userModel->SignUp($email, $hashPassword, $fullname, $phoneNumber, $permission);
                    $userInfor = $this->userModel->SignIn($email, $password);

                    $_SESSION["flag"]=true;
                    $obj = new User($email, $userInfor[2], $userInfor[3], $userInfor[4], 0);
                    $_SESSION["user"]= $obj;
                    
                    $this->_header("Home");
                }else {

                    $this->view("credential/signUp",
                    [
                        "notify" => "Code Develop is wrong !"
                    ]);
                }

            }else{

                $this->view("credential/signUp",
                [
                    "notify" => "Errorr!"
                ]);
            }

        }
        function SignOut(){
            session_unset();
            $this->_header("credential","signIn");
        }
    }

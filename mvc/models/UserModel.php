<?php

    class UserModel extends DB{

        public function SignIn($email, $password){
            $qr = "Select * from user where email='$email'";
            $result = mysqli_query($this->con, $qr);
            if($result->num_rows>0){
                return mysqli_fetch_row($result);
                }
            return json_encode($email);

        }

        public function SignUp($email, $password, $fullname, $phoneNumber, $permission){
            
            $qr = "INSERT INTO user values ('$email', '$password', '$fullname', $phoneNumber, '$permission', '0')";
            $rows = mysqli_query($this->con, $qr);
            $abc = Array(["abbc"=>"dsaf"]);
            
            if($rows){
                return mysqli_fetch_row($rows);
            }
            return json_encode($rows);

        }
        
        public function checkingUsername($email){
            $qr="SELECT email FROM user where email='$email'";
            $rows = mysqli_query($this->con, $qr);
            $result = false;
            
            if(mysqli_num_rows($rows)>0){
                $result = true;
            }

            return $result;
        }
        public function uploadAvatar($email){
            $qr="UPDATE `user` SET `image`=1 WHERE email='$email'";
            $rows = mysqli_query($this->con, $qr);
            $result = false;
            
            if($rows){
                $result = true;
            }

            return $result;
        }

        public function getTeacher(){
            $qr="SELECT email FROM user where permission= 'teacher'";
            $rows = mysqli_query($this->con, $qr);
            
            $mang = array();
            while($row=mysqli_fetch_array($rows)){
                array_push($mang, $row);
            }
            return json_encode($mang, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
            
        }
    }
?>
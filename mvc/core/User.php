<?php
    class User {
        private $username;
        private $password;
        private $numberPhone;
        private $fullName;
        private $permission;
        private $image;
        
        function User($username, $fullName, $numberPhone, $permission, $image)
        {
            $this->username = $username;
            $this->fullName = $fullName;
            $this->numberPhone = $numberPhone;
            $this->permission = $permission;
            $this->image = $image;
        }
        
        function getUserName(){
            return $this->username;
        }
        function getFullName(){
            return $this->fullName;
        }
        function getPermission(){
            return $this->permission;
        }
        function getImage()
        {
            return $this->image;
        }
    }

?>
<?php
    class SalaryModel extends DB{

        public function updateSalary( $email, $month, $year, $salary){

            $qr = "SELECT `email`, `Month`, `Year`, `Salary` FROM `salary` where email ='$email' and `month` ='$month' and `year`='$year'";
            $result = mysqli_query($this->con, $qr);
            if($result->num_rows>0){
                $qr1 ="UPDATE `salary` SET `Salary`=$salary WHERE `email`=$email and`Month`= $month and `Year`= $year";
            }else{
                $qr1 = "INSERT INTO `salary`(`email`, `Month`, `Year`, `Salary`) VALUES ('$email','$month','$year','$salary')";
            }
            $result1 = mysqli_query($this->con, $qr1);
            return json_encode($result1);

        }
    }
?>
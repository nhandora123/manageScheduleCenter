<?php
    class SubjectModel extends DB{

        public function takeSubject(){
            $rows = mysqli_query($this->con, "SELECT * FROM `subject`");

            $mang = array();
            while($row=mysqli_fetch_array($rows)){
                array_push($mang, $row);
            }
            return json_encode($mang, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
            
        }

    }
<?php
    class ScheduleModel extends DB{

        public function GetClassOfTeacher($idTeach){
            $qr = "SELECT * FROM class WHERE emailTeacher ='$idTeach'";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while($row=mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        }
        public function GetAllClass(){
            $qr = "SELECT * FROM class";
            $rows = mysqli_query($this->con, $qr);
            $mang = array();
            while($row=mysqli_fetch_array($rows)){
                $mang[] = $row;
            }
            return json_encode($mang, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
        }
        public function GetScheduleOfClass($idClass, $dateTeach){
            $qr = "SELECT * FROM schedule where idClass='$idClass' and dateTeach='$dateTeach'";
            $rows = mysqli_query($this->con, $qr);
            $result=false;
            while($row=mysqli_fetch_assoc($rows)){
                $result = $row;
            }
            //print_r($mang);
            return json_encode($result);
        }
        public function cancelSchedule($p_data){
            $data = json_decode($p_data);
            print_r($data);
            $check= mysqli_query($this->con,"SELECT * FROM schedule where idClass='$data->idClass' and dateTeach='$data->dateTeach'");
            if($check->num_rows){
                $server = mysqli_query($this->con,"UPDATE schedule SET checking=$data->checking WHERE idClass='$data->idClass' and dateTeach='$data->dateTeach'");
            }else{
                $server = $this->con->prepare("INSERT INTO schedule VALUES (?, ?, ?)");
                $server -> bind_param("sss", $data->idClass, $data->checking, $data->dateTeach);
                $server -> execute();
            }
            $server = mysqli_query($this->con,"UPDATE `class` SET dateEnd = DATE_ADD(dateEnd, INTERVAL 7 DAY) WHERE idClass ='$data->idClass'");
            if($server){
                echo "Edit Successful";
            }else{
                echo "Edit Failure";
            }
        }
        public function deleteSchedule($p_data, $p_choose){
            echo $p_data;
            $data = json_decode($p_data);
            print_r($data);
            if($p_choose==1){
                $check= $this->con->query("SELECT * FROM schedule where idClass='$data->idClass'");
                if($check->num_rows>0){
                    $server = $this->con->query("DELETE FROM schedule WHERE idClass='$data->idClass'");
                }
                $check=$this->con->query("SELECT * FROM class where idClass='$data->idClass'");
                if($check->num_rows>0){
                    $server = $this->con->query("DELETE FROM class WHERE idClass='$data->idClass'");
                }
            }else{
                $date=mktime(0, 0, 0, substr($data->dateTeach, 6, 2), substr($data->dateTeach, 8, 2), substr($data->dateTeach, 0, 4));
                $lastWeek = date("Y-m-d",strtotime("-1 weeks", $date));
                echo $lastWeek;
                if($lastWeek==$data->dateStart){
                    $server = $this->con->query("DELETE FROM schedule WHERE idClass='$data->idClass'");  
                    $server = $this->con->query("DELETE FROM class WHERE idClass='$data->idClass'");
                }
                else{
                    $server = $this->con->query("UPDATE class SET dateEnd='$lastWeek' WHERE idClass='$data->idClass'");
                }
            }
            if($server){
                echo "Edit Successful";
            }else{
                echo "Edit Failure";
            }
        }
        public function GetScheduleAccordingAddress($p_month, $p_email){
            $result=$this->con->query("SELECT DISTINCT `address` from class where emailTeacher ='$p_email' and idClass in (select idClass from schedule where month(dateTeach)='$p_month' and checking=1)");
            if ($result->num_rows>0) {
                $abc=array();
                $i=0;
                while ($obj = $result -> fetch_object()) {
                    //lấy hết lớp từ câu lệnh object
                    $abc[$i]=$obj->address;
                    $i++;
                }
                echo json_encode($abc, JSON_UNESCAPED_UNICODE);
            //$obj= $result->fetch_array(MYSQLI_NUM);
                //echo $obj[0];
                //.obj[1].obj[2].obj[3];
                //echo json_encode($obj, JSON_UNESCAPED_UNICODE);
            } else {
                echo "error";
            }
        }
        public function GetSalaryAccordingAddress($p_month, $p_email){
            
            $result=$this->con->query("SELECT class.idClass, `nameClass`, numberStudent, count(*) as numberDateTeach, address from class, schedule where class.idClass=SCHEDULE.idClass and emailTeacher = '$p_email' and month(dateTeach)='$p_month' and checking = 1 group by class.idClass");
            if ($result->num_rows>0) {
                $abc=array();
                $i=0;
                while ($obj = $result -> fetch_object()) {
                    //lấy hết lớp từ câu lệnh object
                    $abc[$i]=$obj;
                    $i++;
                }
                echo json_encode($abc, JSON_UNESCAPED_UNICODE);
            //$obj= $result->fetch_array(MYSQLI_NUM);
                //echo $obj[0];
                //.obj[1].obj[2].obj[3];
                //echo json_encode($obj, JSON_UNESCAPED_UNICODE);
            } else {
                echo "error";
            }
        }
    }
    

?>
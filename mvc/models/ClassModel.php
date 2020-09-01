<?php
    class ClassModel extends DB{

            public function addSchedule($p_data){
                $data = json_decode($p_data);
                print_r($data);
                $server = $this->con->prepare("INSERT INTO class VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $server -> bind_param("sssssssss", $data->idClass, $data->nameClass, $data->numberStudent, $data->timeStartTeach, $data->timeEndTeach, $data->dateStart, $data->dateEnd, $data->address, $data->emailTeacher);
                $server -> execute();
                if($server){
                    echo "Insert Successful";
                }else{
                    echo "Insert Failure";
                }
            }   
            public function editClass($p_data){
                $data = json_decode($p_data);
                
                $result=$this->con->query("UPDATE class SET `nameClass`='$data->nameClass', `numberStudent`='$data->numberStudent', `timeStartTeach`='$data->timeStartTeach', `timeEndTeach`='$data->timeEndTeach', `dateStart`='$data->dateStart', `dateEnd` = '$data->dateEnd', `address`='$data->address', `emailTeacher`='$data->emailTeacher' WHERE idClass='$data->idClass'");
                if($result){
                    echo "Edit Successful";
                }else{
                    echo "Edit Failure";
                }
            }
            public function showInforClass($p_idClass){
                $result = $this->con->query("SELECT * FROM class where idClass= '$p_idClass'");

                if($result){
                    echo json_encode(mysqli_fetch_object($result), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
                }else{
                    echo json_encode(["error"=>0]);
                }
            }

    }

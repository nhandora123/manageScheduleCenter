<?php
    //session_start();
    class Home extends Controller{
        
        public $scheduleModel;
        public $classModel;
        public $userModel;
        public $subjectModel;

        function __construct()
        {
            $this->scheduleModel= $this->model("ScheduleModel");
            $this->classModel = $this->model("ClassModel");
            $this->userModel = $this->model("UserModel");
            $this->subjectModel = $this->model("SubjectModel");

            if(isset($_SESSION["flag"])){
                if($_SESSION["flag"]==true){

                    //$this->_header("Home");
                }else{
                    $this->view("signIn",[]);
                    //$this->_header("signIn");
                }
            }else{
                $this->_header("Credential","signIn");
            }
            
        }

        function Index(){
            if(isset($_SESSION["flag"])){
                if($_SESSION["flag"]==true){
                    //$username = $user->fullName;
                    
                    $user = array();
                    foreach ($_SESSION['user'] as $obj) {
                        $user[]= $obj;
                     }
                     $_SESSION['user']= $user;
                     $this->view("home",[
                        "user" => $_SESSION['user'],
                        "listTeacher"=> json_decode($this->userModel->getTeacher()),
                        "listSubject" =>json_decode($this->subjectModel->takeSubject())
                    ]);
                    //$this->_header("Home");
                }else{
                    $this->view("signIn",[]);
                }
            }else{
                $this->_header("Credential","signIn");
            }
            
        }

        function Show($a, $b){
            $teo = $this->model("StudentModel");
            $tong = $teo->Counting($a, $b); 

            $this->view("layout1", [
                "Page" => "page1",
                "tong"=> $tong,
                "Infor" => $teo->TakeStudent()
            ]);
        }

        function getSchedule(){

            $datArray=array("Monday"=>"","Tuesday"=>"", "Wednesday"=>"","Thursday"=>"", "Friday"=>"", "Saturday"=>"", "Sunday"=>"");
            $dateChose = $_GET["getDate"] == null ? date("Y/m/d") : $_GET["getDate"];
            $numDate=strtotime($dateChose);// take number date
            $dat=date("d-m-Y", $numDate);//take date
            $thu=date("l", $numDate);//thứ hiện tại
            $datArray[$thu]= $dat;
            $thuCopy=$thu;//sao chép thứ hiện tại
            $copy=$numDate;//sao chép số ngày hiện tại

            while ($thuCopy!="Monday") {
                $copy=$copy-86400;
                $thuCopy=date("l", $copy);
                $datArray[$thuCopy]=date("d-m-Y", $copy);
            }

            $thuCopy=$thu;//sao chép thứ hiện tại
            $copy=$numDate;//sao chép số ngày hiện tại
            while ($thuCopy!="Sunday") {
                $copy=$copy+86400;
                $thuCopy=date("l", $copy);
                $datArray[$thuCopy]=date("d-m-Y", $copy);
            }

            $inforClass=array("Monday"=>array(),"Tuesday"=>array(), "Wednesday"=>array(),"Thursday"=>array(), "Friday"=>array(), "Saturday"=>array(), "Sunday"=>array());
            foreach ($datArray as $thu => $date) {//days of week
                $i=0;

                if(isset($_SESSION["user"][5]) && gettext($_SESSION["user"][5])=="operator") {
                    $result = $this->scheduleModel->GetAllClass();
                }else{
                    $result = $this->scheduleModel->GetClassOfTeacher($_SESSION["user"][1]);
                }
                $objects = json_decode($result);

                if ($result!=[]) {//so sánh take all lớp
                    foreach($objects as $obj) {//lấy hết lớp từ câu lệnh object
                        $startdate = strtotime($obj->dateStart);    

                        if ($obj->dateEnd=="0000-00-00") {
                            $enddate = strtotime("+12 weeks", $startdate);
                        } else {
                            $enddate = strtotime($obj->dateEnd);
                        }

                        while ($startdate <= $enddate) {
                            if (date("d-m-Y", $startdate)==$date) {
                                $changeDate=date("Y-m-d", $startdate);
                                $thuDate=date("l", $startdate);

                                $resultSchedule = $this->scheduleModel->GetScheduleOfClass($obj->idClass, $changeDate);
                                $objectOfSchedule= json_decode($resultSchedule);

                                $checking=0;
                                if ($resultSchedule!="false") {
                                    $checking= $objectOfSchedule->checking;
                                }
                                $inforClass[$thu][$i] = (object) [
                                    "idClass"=> $obj->idClass, 
                                    "nameClass"=> $obj->nameClass,
                                    "timeStartTeach"=> $obj->timeStartTeach, 
                                    "numberStudent"=> $obj->numberStudent, 
                                    "address"=> $obj->address,
                                    "checking"=> $checking, 
                                    "dateTeach"=>$changeDate, 
                                    "thuTeach"=> $thuDate
                                ];
                                $i=$i+1;
                            }
                            $startdate = strtotime("+1 week", $startdate);
        
                        }
                    }
                }
            }
            header('Content-Type: application/json');
            echo json_encode($inforClass, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }
        function GetScheduleOfMonth(){
            $month= $_GET["month"];
            $inforClass=array("Monday"=>array(),"Tuesday"=>array(), "Wednesday"=>array(),"Thursday"=>array(), "Friday"=>array(), "Saturday"=>array(), "Sunday"=>array());
            foreach ($inforClass as $thu => $date) {//days of week
                $i=0;
                $result = $this->scheduleModel->GetClassOfTeacher($_SESSION["user"][1]);
                $objects = json_decode($result);

                if ($result!=[]) {//so sánh take all lớp
                    foreach($objects as $obj) {//lấy hết lớp từ câu lệnh object
                        //echo $obj->name; echo ' ' .  $obj->dateStart;
                        $startdate = strtotime($obj->dateStart);
                        //echo "<h1>". date("d-m-Y", $startdate) ."</h1>";
                        if ($obj->dateEnd=="0000-00-00") {
                            $enddate = strtotime("+12 weeks", $startdate);
                        } else {
                            $enddate = strtotime($obj->dateEnd);
                        }
                        
                        while ($startdate <= $enddate) {
                            if (date("m", $startdate)==$month && date("l", $startdate)==$thu) {
                                $changeDate=date("Y-m-d", $startdate);
                                $thuDate=date("l", $startdate);
                                $resultSchedule = $this->scheduleModel->GetScheduleOfClass($obj->idClass, $changeDate);
                                $objectOfSchedule= json_decode($resultSchedule);
                                $checking=0;
                                if ($resultSchedule!="false") {
                                    $checking= $objectOfSchedule->checking;
                                }
                                $inforClass[$thu][$i] = (object) [
                                    "idClass"=> $obj->idClass, 
                                    "nameClass"=> $obj->nameClass,
                                    "timeStartTeach"=> $obj->timeStartTeach, 
                                    "numberStudent"=> $obj->numberStudent, 
                                    "address"=> $obj->address,
                                    "checking"=> $checking, 
                                    "dateTeach"=>$changeDate, 
                                    "thuTeach"=> $thuDate
                                ];
                                $i=$i+1;
                            }
                            $startdate = strtotime("+1 week", $startdate);
                        }
                    }
                }
            }
        
            echo json_encode($inforClass, JSON_UNESCAPED_UNICODE);
        
        }
        function Cancel(){
            $data= $_POST["data"];
            echo $this->scheduleModel->cancelSchedule($data);
        }
        function Add(){
            $data= $_POST["data"];
            echo $this->classModel->addSchedule($data);
        }
        function EditClass(){
            $data= $_POST["data"];
            echo $this->classModel->editClass($data);
        }
        function DeleteSchedule(){
            $data = $_POST["data"];
            $choose = $_POST["choose"];
            echo $this->scheduleModel->deleteSchedule($data, $choose);
        }
        function ShowClassById(){
            $idClass=$_POST["idClass"];
            echo $this->classModel->showInforClass($idClass);
        }
        function GetScheduleAccordingAddress(){
            $month= $_POST["month"];
            echo $this->scheduleModel->GetScheduleAccordingAddress($month, gettext($_SESSION["user"][1]));
        }
        function GetSalaryAccordingAddress(){
            $month= $_POST["month"];
            echo $this->scheduleModel->GetSalaryAccordingAddress($month, gettext($_SESSION["user"][1]));
        }

        function UploadAvatar()
        {
            // if (isset ($_POST["ok"]))
            // {
            //     if ($_FILES["file_upload"]["name"] != null)
            //     {
            //         //$_FILES["file_upload"]["type"] = "image/png";
            //         $name = $_FILES["file_upload"]["name"];
            //         move_uploaded_file(, "../public/image/user/.$name");
            //         //move_uploaded_file($_FILES["file_upload"]["tmp_name"], "../public/image/user/.$name");
            //         //move_uploaded_file($_SESSION["user"][1], "./public/image/user/");
            //         echo "Thành công";
            //     }else echo "Thất bại";
            // }

            $uploads_dir = './public/image/user/';
            
            if ($_FILES["file_upload"]["name"] != null) 
            {
                $_FILES["file_upload"]["type"] = "image/png";
                $tmp_name = $_FILES["file_upload"]["tmp_name"];
               
                //$name = basename($_FILES["file_upload"]["name"]);
                $name=gettext($_SESSION["user"][1]) .".png";
                move_uploaded_file($tmp_name, "$uploads_dir/$name");

                $update= $this->userModel->uploadAvatar(gettext($_SESSION["user"][1]));
                $_SESSION["user"][6]=1;
                $this->_header("home");
            }
        
        }
    }

?>
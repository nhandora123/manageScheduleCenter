<?php
//session_start();
    class Salary extends Controller{
        public $salaryModel;

        function __construct()
        {
            $this->salaryModel= $this->model("SalaryModel");
        }

        function UpdateSalary(){
            $month = $_POST["monthSalary"];
            $year = $_POST["yearSalary"];
            $salary = $_POST["salary"];

            $this->salaryModel->updateSalary(gettext($_SESSION["user"][1]), $month, $year, $salary);
            
        }
    }
    ?>
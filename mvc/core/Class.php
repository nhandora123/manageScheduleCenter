<?php
        class InforClass
        {
            public $idClass;
            public $nameClass;
            public $numberStudent;
            public $timeStartTeach;
            public $timeEndTeach;
            public $dateStart;
            public $dateEnd;
            public $address;
            public $emailTeacher;

            public function __construct($idClass, $nameClass, $numberStudent, $timeStartTeach, $timeEndTeach, $dateStart, $dateEnd, $address, $emailTeacher)
            {
                $this->$idClass=$idClass;
                $this->nameClass=$nameClass;
                $this->numberStudent=$numberStudent;
                $this->timeStartTeach=$timeStartTeach;
                $this->timeEndTeach=$timeEndTeach;
                $this->dateStart = $dateStart;
                $this->dateEnd=$dateEnd;
                $this->address=$address;
                $this->emailTeacher= $emailTeacher;

            }
        }
        class Schedule 
        {
            public $idClass;
            public $checking;
            public $dateTeach;
            public $thuDate;

            public function __construct($idClass, $checking, $dateTeach, $thuDate)
            {
                $this->idClass= $idClass;
                $this->dateTeach = $dateTeach;
                $this->checking = $checking;
                $this->thuDate = $thuDate;
            }
        }

    ?>


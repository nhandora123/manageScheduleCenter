<?php
    class Controller {
        public function model($nameModel){
            require_once "./mvc/models/" . $nameModel . ".php";
            return new $nameModel;
        }
        
        public function view($nameView, $data = []){
            require_once "./mvc/views/" . $nameView . ".php";
        }

        public function _header(){
            extract(func_get_args(), EXTR_PREFIX_ALL, "data");
            $host  = $_SERVER['HTTP_HOST'];
            $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $string ="";
            
            if(isset($data_0))
            {
                $string .="/".$data_0;
                if(isset($data_1)){
                    $string .="/".$data_1;
                    if(isset($data_2)){
                        $string .="/".$data_2;
                    }
                }
                
            }
            header("Location: http://$host$uri".$string);
            exit();
        }
    }
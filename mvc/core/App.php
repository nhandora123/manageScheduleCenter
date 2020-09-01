<?php
class App
{
    
    protected $controller = "Home";
    protected $action = "index";
    protected $param = [];

    function __construct()
    {
        $arr = $this->UrlProcess();
        //print_r($arr); 

        //process controller
        if (file_exists("./mvc/controllers/" . $arr[0] . ".php")) {
            $this->controller = $arr[0];
            unset($arr[0]);
        }
        require("./mvc/controllers/" . $this->controller . ".php");
        $this->controller = new $this->controller;

        //process action
        if (isset($arr[1])) {
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        //process param
        $this->param = $arr ? array_values($arr) : []; //['','',1,2,3,]// take values from 1
        //print($this->controller+ $this->action+ $this->param);
        call_user_func_array([$this->controller, $this->action], $this->param);
    }

    function UrlProcess()
    {
        if (isset($_GET["url"])) {
            $cleanUrl = filter_var(trim($_GET["url"], "/"));
            return explode("/", $cleanUrl);
        }
        return [$this->controller, $this->action, $this->param];
    }
}
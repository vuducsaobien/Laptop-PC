<?php
class Controller{

    public function __construct(){
        $this->view = new View();

        //C2 controllers login.php
        // require_once 'models/login_model.php';
        // $this->db   = new Login_model();
    }
        //C3
    public function loadModel($name){
        $path = 'models/'.$name.'_model.php';
        $modelName = ucfirst($name) . '_Model';
        if(file_exists($path)){
            require_once $path;
            $this->db   = new $modelName();
        }
    }

}
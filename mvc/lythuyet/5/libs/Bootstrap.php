<?php
    // error_reporting( error_reporting() & ~E_NOTICE );

class Bootstrap{
    public function __construct(){
        $controllerURL = (isset($_GET['controller'])) ? $_GET['controller'] : 'index';
        $actionURL     = (isset($_GET['action'])) ? $_GET['action'] : 'index';

        $controllerName = ucfirst($controllerURL);
        $file           = 'controllers/' . $controllerURL . '.php';
        if(file_exists($file)){
            require_once $file;
            // $controller = new $controllerName();
            $controller = new $controllerURL();
            if(method_exists($controller, $actionURL)){
                $controller->$actionURL();
                //C2 Load Model controllers login.php
                $controller->loadModel($controllerURL);
            } else {
                $this->error();
            }
        } else {
            $this->error();
        }

    }

    public function error(){
        require_once ('controllers/error.php');
        $error = new Errorr();
        $error->index();
    }




    
}
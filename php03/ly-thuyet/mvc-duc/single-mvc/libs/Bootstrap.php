<?php
    class Bootstrap{

        public function __construct()
        {
            $controllerURL  = (isset($_GET['controller'])) ? $_GET['controller'] : 'index';
            $actionURL      = (isset($_GET['action'])) ? $_GET['action'] : 'index';

            $controllerName = ucfirst($controllerURL);
            // $actionName = ucfirst($_GET['action']);


            $file = 'controller/'.$controllerURL.'.php';

            if(file_exists($file)){
                require_once $file;
                $controller = new $controllerName();

                if(method_exists($controller, $actionURL)==true){
                    $controller->$actionURL();
                } else {
                    $this->error();
                }

            } else {
                $this->error();
            }




        }

        public function index()
        {
            echo '<h3>' . __METHOD__ . '</h3>';
        }

        public function error()
        {
            require_once 'controller/error.php';
            $error = new Errorr();
    }



    }
?>
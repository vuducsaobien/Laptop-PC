<?php
class Bootstrap
{
    private $_params;
    private $_controllerObject;

    public function __construct()
    {
        $this->setParam();

        // $module         = $params['module'];
        // $controller     = $params['controller'];
        // $action         = $params['action'];
        $controllerName = ucfirst($this->_params['controller']) . 'Controller';

        $filePath   = APPLICATION_PATH . $this->_params['module'] . DS . 'controllers' . DS . $controllerName . '.php';
        if (file_exists($filePath)) {
            // require_once $filePath;
            // $controllerObject = new $controllerName();
            // $controllerObject->setModel($this->_params['module'], $this->_params['controller']);
            // $controllerObject->setView($this->_params['module']);
            // $controllerObject->setParams($this->_params);
            $this->loadExistController($filePath, $controllerName);
            $this->callMethod();



            // $actionName = $this->_params['action'] . 'Action';

            // if(method_exists($controllerObject, $actionName)==true){
            //     $controllerObject->$actionName();
            // }else{
            //     $this->_error();
            // }
        } else {
            $this->loadDefaultController();
        }
    }

    // CALL METHOD
    public function callMethod()
    {
        $actionName = $this->_params['action'] . 'Action';

        if (method_exists($this->_controllerObject, $actionName) == true) {
            $this->_controllerObject->$actionName();
        } else {
            $this->_error();
        }
    }

    // SET PARAMS
    public function setParam()
    {
        $this->_params               = array_merge($_GET, $_POST);
        $this->_params['module']     = isset($this->_params['module']) ? $this->_params['module'] : DEFAULT_MODULE;
        $this->_params['controller'] = isset($this->_params['controller']) ? $this->_params['controller'] : DEFAULT_CONTROLLER;
        $this->_params['action']     = isset($this->_params['action']) ? $this->_params['action'] : DEFAULT_ACTION;
    }

    // LOAD DEFAULT CONTROLLER
    private function loadDefaultController()
    {
        $controllerName = ucfirst(DEFAULT_CONTROLLER) . 'Controller';
        $actionName = DEFAULT_ACTION . 'Action';
        $path = APPLICATION_PATH . DEFAULT_MODULE . DS . 'controllers' . DS . $controllerName . '.php';
        if (file_exists($path)) {
            require_once $path;
            $this->_controllerObject = new $controllerName();
            $this->_controllerObject->setView(DEFAULT_MODULE);
            $this->_controllerObject->$actionName();
        }
    }

    // LOAD EXISTING CONTROLLER
    private function loadExistController($filePath, $controllerName)
    {
        // $controllerName = ucfirst($this->_params['controller']) . 'Controller';
        // $filePath   = APPLICATION_PATH . $this->_params['module'] . DS . 'controllers' . DS . $controllerName . '.php';
        // if (file_exists($filePath)) {
        require_once $filePath;
        $this->_controllerObject = new $controllerName($this->_params);
        // $this->_controllerObject->setModel($this->_params['module'], $this->_params['controller']);
        // $this->_controllerObject->setView($this->_params['module']);
        // $this->_controllerObject->setTemplate($this->_controllerObject);
        // $this->_controllerObject->setParams($this->_params);

        //     $actionName = $this->_params['action'] . 'Action';

        //     if(method_exists($controllerObject, $actionName)==true){
        //         $controllerObject->$actionName();
        //     }else{
        //         $this->_error();
        //     }
        // }else{
        //     $this->loadDefaultController();
        // }
    }

    // ERROR CONTROLLER
    public function _error()
    {
        require_once APPLICATION_PATH . 'default' . DS . 'controllers' . DS . 'ErrorController.php';
        $this->_controllerObject = new ErrorController();
        $this->_controllerObject->setView('default');

        $this->_controllerObject->indexAction();
    }
}

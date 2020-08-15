<?php

class Controller
{
    protected $_view;
    protected $_model;
    protected $_arrParam;

    public function __construct()
    {
        // $this->_arrParam = array_merge($_GET, $_POST);
        // $this->_view = new View($this->_arrParam['module']);
    }

    public function loadModel($modulelName, $modelName)
    {
        $modelName = ucfirst($modelName) . 'Model';
        $path = APPLICATION_PATH . $modulelName . DS . 'models' . DS . $modelName . '.php';
        if (file_exists($path)) {
            require_once $path;
            $this->_model = new $modelName();
        }
    }

    // SET VIEW
    public function setView($modulelName)
    {
        $this->_view = new View($modulelName);
    }

    // SET PARAM
    public function setParams($arrParam)
    {
        $this->_arrParam = $arrParam;
    }
}

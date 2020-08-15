<?php

class Controller
{
	// View Object
	protected $_view;
	
	// Model Object
	protected $_model;
	
	// Template object
	protected $_templateObj;
	
	// Params (GET - POST)
	protected $_arrParam;

    public function __construct($arrParams)
    {
        // $this->_controllerObject->setModel($this->_params['module'], $this->_params['controller']);
        // $this->_controllerObject->setView($this->_params['module']);
        // $this->_controllerObject->setTemplate($this->_controllerObject);
        // $this->_controllerObject->setParams($this->_params);

        $this->setModel($arrParams['module'], $arrParams['controller']);
		$this->setTemplate($this);
		$this->setView($arrParams['module']);
		$this->setParams($arrParams);


        // $this->_templateObj = new Template($this);
        // $this->_arrParam = array_merge($_GET, $_POST);
        // $this->_view = new View($this->_arrParam['module']);
    }

    // SET MODEL
    public function setModel($modulelName, $modelName)
    {
        $modelName = ucfirst($modelName) . 'Model';
        $path = APPLICATION_PATH . $modulelName . DS . 'models' . DS . $modelName . '.php';
        if (file_exists($path)) {
            require_once $path;
            $this->_model = new $modelName();
        }
    }

    // GET MODEL
	public function getModel(){
		return $this->_model;
	}


    // SET VIEW
    public function setView($modulelName)
    {
        $this->_view = new View($modulelName);
    }

    // GET VIEW
    public function getView()
    {
        return $this->_view;
    }
    

    // SET TEMPLATE
    public function setTemplate()
    {
        $this->_templateObj = new Template($this);

        // echo '<pre>';
        // print_r($this->_templateObj);
        // echo '</pre>';
    }   

    // GET TEMPLATE
	public function getTemplate(){
		return $this->_templateObj;
	}


    // SET PARAM
    public function setParams($arrParam)
    {
        $this->_arrParam = $arrParam;
    }

    // GET PARAMS
	public function getParams($arrParam){
		$this->_arrParam= $arrParam;
	}

}

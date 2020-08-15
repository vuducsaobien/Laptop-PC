<?php
class View
{
    private $_moduleName;

    public function __construct($moduleName)
    {
        $this->_moduleName = $moduleName;
        
    }

    public function render($fileInclude)
    {
        $path = APPLICATION_PATH . $this->_moduleName . DS . 'views' . DS . $fileInclude . '.php';
        if(file_exists($path)){
            require_once $path;
        }else{
            echo '<h3>' . __METHOD__ . 'Error</h3>';
        }


    }

    // public function render2()
    // {
    //     if ($full == true) {
    //         include_once VIEW_PATH . 'header.php';
    //         // require_once 'views/index/index.php';
    //         require_once VIEW_PATH . $name . '.php';
    //         include_once VIEW_PATH . 'footer.php';
    //     } else {
    //         require_once VIEW_PATH . $name . '.php';
    //     }
    // }



    
}

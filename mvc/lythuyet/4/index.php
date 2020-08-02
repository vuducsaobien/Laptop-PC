<?php
    error_reporting( error_reporting() & ~E_NOTICE );
    //C1
    // require_once ('libs/Bootstrap.php');
    // require_once ('libs/Controller.php');
    // require_once ('libs/Model.php');
    // require_once ('libs/View.php');

    //C2
    function __autoload($clasName){
        $path = 'libs/';
		require_once $path . "{$clasName}.php";
    }
    
    //C3
    // function __autoload($clasName){
    //     require_once LIBRARY_PATH . "{$clasName}.php";
    // }
    

    $bootstrap = new Bootstrap();

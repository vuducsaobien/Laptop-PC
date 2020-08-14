<?php
    class Errorr extends Controller{

        // public function __construct()
        // {
        //     echo '<h3>This is an Error !!</h3>';

        // }

        public function index()
        {
            $this->view->msg = 'This is an error !!';    
            $this->view->render('error/index');     
        }


    }
?>
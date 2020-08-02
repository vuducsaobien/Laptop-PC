<?php

class Errorr extends Controller{

    public function index(){
        // echo '<h3>' . __METHOD__ . '</h3>';
        // $message = '<h3>This is an Error</h3>';
        // $this->view->msg = $message;
        $this->view->msg = '<h3>This is an Error</h3>'; //Trước render
        $this->view->render('error/index');

    }
    
}


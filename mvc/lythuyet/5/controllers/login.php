<?php
class Login extends Controller{

    public function index(){   //Hiển thị danh sách các menu
        $this->view->render('login/index');

        //C1
        // require_once ('models/login_model.php');
        // $model = new Login_Model();
        //C2 libs/Controllers
        
        //C1 Load Model from models
        // $this->loadModel('login');
        //C2 Load Model libs Controller.php

        //Load model #
        $this->loadModel('group');



    }

    public function add(){
    }

}
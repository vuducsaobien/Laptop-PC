<?php
class Login extends Controller{

    public function index(){   //Hiển thị danh sách các menu
        // $this->view->render();
        $this->view->render('login/index');
    }

    public function add(){
    }

}
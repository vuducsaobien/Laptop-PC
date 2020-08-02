<?php
class Index extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){   //Hiển thị danh sách các menu
        // $this->view->render();
        $this->view->render('index/add');
    }

    public function add(){
    }

}
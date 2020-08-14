<?php

    class Index extends Controller{
        public function __construct()
        {
            parent::__construct();
        }

        public function index() // Hiển thị danh sách các Menu
        {
            $this->view->render('index/add');
        }

        public function add() // Add Menu
        {
        }


    }
?>
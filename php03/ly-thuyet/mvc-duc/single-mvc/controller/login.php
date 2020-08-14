<?php

    class Login extends Controller{

        public function index()
        {
            $this->view->render('login/index');
            $this->load('group'); // Load đến Model # (Model Group)

        }


    }
?>
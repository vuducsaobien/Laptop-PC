<?php
class Group extends Controller{
    // public function __construct(){
    //     parent::__construct();
    //     echo '<h3>' . __METHOD__ . '</h3>';
    // }

    public function index(){
        $this->view->render('group/index', false);
        // require_once ('models/group_model.php');
        // $model = new Group_Model();
    }

    public function add(){
        echo '<h3>' . __METHOD__ . '</h3>';
    }

}
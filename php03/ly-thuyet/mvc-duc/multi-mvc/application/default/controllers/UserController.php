<?php
class UserController extends Controller
{
    public function __construct()
    {

        parent::__construct();
        echo '<h3>' . __METHOD__ . '</h3>';
        echo '<pre>AAAAA';
        print_r($this->_arrParam);
        echo '</pre>';


    }

    public function indexAction()
    {
        // $this->loadModel('admin', 'index'); //Truy cập vào Model Khác
        // $this->db->listItems();

    $this->_view->data = array('PHP', 'Joomla');
    $this->_view->render('user/index');
    }

    public function addAction()
    {
    echo '<h3>' . __METHOD__ . '</h3>';    
    }





     
}

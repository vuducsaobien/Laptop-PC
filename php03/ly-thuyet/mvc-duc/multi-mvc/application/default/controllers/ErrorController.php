<?php
class ErrorController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $this->_view->data = '<h3>This is an Error !!</h3>';
        $this->_view->render('error/index');
    }




     
}

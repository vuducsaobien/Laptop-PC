<?php
class Index extends Controller{
	
	public function __construct(){
		parent::__construct();
		$this->view->title = 'Home';
	}
	
	public function index(){

		$this->view->render('index/index');
	}
}
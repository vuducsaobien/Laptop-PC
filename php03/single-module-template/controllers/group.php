<?php
class Group extends Controller{
	
	public function __construct(){
		
		parent::__construct();
		Auth::checkLogin();
		// $this->view->render('group/index');

		$this->view->title = 'Group';

	}
	
	public function index(){
		$this->view->items = $this->db->listItems();
		$this->view->js		= array('group/js/group.js', 'group/js/jquery-ui-1.10.3.custom.min.js');
		$this->view->css	= array('group/css/jquery-ui-1.10.3.custom.min.css');
		$this->view->render('group/index');
		// echo '<pre>';
		// print_r($this->view->items);
		// echo '</pre>';
		echo '<pre>';
		print_r($this->db);
		echo '</pre>';


		
	}

	public function delete(){
		if(isset($_POST['id'])) $this->db->deleteItem($_POST['id']);
	}
}
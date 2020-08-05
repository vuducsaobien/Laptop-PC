<?php
class Group extends Controller{
	
	public function __construct(){
		
		parent::__construct();
		Auth::checkLogin();
		// $this->view->render('group/index');

		$this->view->title = 'Group';

	}
	
	public function index(){

		// Session::init();
		// echo $bbb = $_POST['searchName'];
		// echo $ccc 	= $_POST['searchID'];

		// echo '$bbb = ' . $bbb = Session::get('searchName');
		// $ccc = Session::get('searchID');

		// if(!isset($bbb) && !isset($ccc)){
			$this->view->items = $this->db->listItems();
		// } 
		// else {
		// 	$this->view->items = $this->db->searchItems();
		// }
		$this->view->js		= array('group/js/group.js', 'group/js/jquery-ui-1.10.3.custom.min.js');
		$this->view->css	= array('group/css/jquery-ui-1.10.3.custom.min.css');
		$this->view->render('group/index');
		
		
	}

	public function delete(){
		if(isset($_POST['id'])) $this->db->deleteItem($_POST['id']);
	}
}
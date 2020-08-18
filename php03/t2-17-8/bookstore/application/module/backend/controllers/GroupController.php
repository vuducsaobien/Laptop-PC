<?php
class GroupController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/adminlte/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

	public function indexAction(){
		$this->_view->_title = 'Index List';
		$listItems	= $this->_model->listItem($this->_arrParam, null);
		$this->_view->Items = $listItems;


		$this->_view->render('group/index');
	}

	public function formAction(){
		$this->_view->_title = 'Form List';



		$this->_view->render('group/form');
		}
		
	// ACTION: AJAX STATUS (*)
	public function ajaxStatusAction(){
		$result = $this->_model->changeStatus($this->_arrParam, array('task' => 'change-ajax-status'));
		echo json_encode($result);
	}
	
	// ACTION: AJAX GROUP ACP (*)
	public function ajaxACPAction(){
		$result = $this->_model->changeStatus($this->_arrParam, array('task' => 'change-ajax-group-acp'));
		echo json_encode($result);
	}
	
	// // ACTION: STATUS (*)
	// public function statusAction(){
	// 	$this->_model->changeStatus($this->_arrParam, array('task' => 'change-status'));
	// 	URL::redirect('admin', 'group', 'index');
	// }
	


	
}
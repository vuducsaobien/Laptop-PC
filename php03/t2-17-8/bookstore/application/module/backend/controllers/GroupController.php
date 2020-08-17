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
		$listItems	= $this->_model->listItem($this->_arrParam, ['task' => 'index']);
		$this->_view->Items = $listItems;

		$this->_view->render('group/index');
		}

	public function formAction(){
		$this->_view->_title = 'Form List';




		
		$this->_view->render('group/form');
		}


	
}
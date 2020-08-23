<?php
class DashboardController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/adminlte/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

	public function indexAction(){
	$totalItems	= $this->_model->countItem($this->_arrParam, ['task' => 'group']);

	$this->_view->Items = $totalItems;


	$this->_view->_title = 'DashBoard';
	$this->_view->render('dashboard/index');

	}
}
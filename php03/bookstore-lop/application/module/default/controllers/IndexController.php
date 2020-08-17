<?php
class IndexController extends Controller{
	
	public function __construct($arrParams){
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('default/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}
	
	public function indexAction(){
		// $this->setModel('admin', 'group'); //Truy cập vào Model Khác
        // $this->db->listItems();

		echo '<h3>' . __METHOD__ . '</h3>';
	}
	
}
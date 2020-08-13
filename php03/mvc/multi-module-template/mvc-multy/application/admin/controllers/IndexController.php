<?php
class IndexController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/adminlte/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

	public function indexAction()
	{
		// $this->_view->setTitle('Login');
		// $this->_view->appendCSS(array('user/userlte/css/abc.css'));
		// $this->_view->appendJS(array('user/userlte/js/test.js'));

		$this->_view->abc='thong ke';
		$this->_view->render('index/index');
	}

	public function listAction()
	{

		$this->_view->_title = 'Group Manager :: List';
		$this->_view->render('index/list');
	}
}

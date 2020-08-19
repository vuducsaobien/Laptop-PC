<?php
class GroupController extends Controller
{

	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/adminlte/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

	// ACTION: LIST GROUP
	public function indexAction(){
		$this->_view->_title 		= 'User Manager: User Groups';
		$totalItems					= $this->_model->countItem($this->_arrParam, null);
		
		$configPagination = array('totalItemsPerPage'	=> 5, 'pageRange' => 3);
		$this->setPagination($configPagination);
		$this->_view->pagination	= new Pagination($totalItems, $this->_pagination);
		$this->_view->Items 		= $this->_model->listItem($this->_arrParam, null);
		$this->_view->render('group/index');
	}
	

	// ACTION: LIST GROUP
	public function indexAction2()
	{
		$this->_view->_title = 'Index List';
		$listItems	= $this->_model->listItem($this->_arrParam, null);
		$this->_view->Items = $listItems;


		$this->_view->render('group/index');
	}

	public function formAction()
	{
		$this->_view->_title = 'Form List';



		$this->_view->render('group/form');
	}

	// ACTION: AJAX STATUS (*)
	public function ajaxStatusAction()
	{
		$result = $this->_model->changeStatus($this->_arrParam, array('task' => 'change-ajax-status'));
		echo json_encode($result);
	}

	// ACTION: AJAX GROUP ACP (*)
	public function ajaxACPAction()
	{
		$result = $this->_model->changeStatus($this->_arrParam, array('task' => 'change-ajax-group-acp'));
		echo json_encode($result);
	}

	// ACTION: STATUS (*)
	public function statusAction()
	{
		$this->_model->changeStatus($this->_arrParam, array('task' => 'change-status'));
		URL::redirect('backend', 'group', 'index');
	}

	public function statusActiveAction()
	{
		$this->_model->changeStatus($this->_arrParam, array('task' => 'change-status'));
		URL::redirect('backend', 'group', 'index');
	}

	public function statusInactiveAction()
	{
		$this->_model->changeStatus($this->_arrParam, array('task' => 'change-status'));
		URL::redirect('backend', 'group', 'index');
	}

	// ACTION: TRASH (*)
	public function trashAction()
	{
		$this->_model->deleteItem($this->_arrParam);
		echo $aa = URL::createLink('backend', 'group', 'index');
		// URL::redirect("$aa");
		// URL::createLink(URL::createLink('backend', 'group', 'index'));
	}
}

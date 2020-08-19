<?php
class UserController extends Controller
{
	public function __construct($arrParams)
	{
		parent::__construct($arrParams);
		$this->_templateObj->setFolderTemplate('admin/main/');
		$this->_templateObj->setFileTemplate('index.php');
		$this->_templateObj->setFileConfig('template.ini');
		$this->_templateObj->load();
	}

    public function loginAction()
    {
        // $this->_templateObj->setFolderTemplate('admin/main/');
        // $this->_templateObj->setFileTemplate('index.php');
        // $this->_templateObj->setFileConfig('template.ini');

        // $this->_templateObj->load();


        // Tạo css Riêng cho UserController module admin Application/admin/views/user/css   js
        // $this->_view->appendCSS(array('user/css/abc.css'));
		// $this->_view->appendJS(array('user/js/test.js'));

        $this->_view->setTitle('Login');
        $this->_view->render('user/login', true);

    }

    public function logoutAction()
    {
        
        // $this->_templateObj->setFolderTemplate('admin/main/');
        // $this->_templateObj->setFileTemplate('index2.php');
        // $this->_templateObj->setFileConfig('template.ini') ;

        // $this->_templateObj->load();
        $this->_view->setTitle('Logout');
        $this->_view->render('user/logout', true);

    }




     
}
   
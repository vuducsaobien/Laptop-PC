<?php
class Template
{

    // File config (admin/main/template.ini)
    private $_fileConfig;

    // File template (admin/main/index.php)
    private $_fileTemplate;

    // Folder template (admin/main/)
    private $_folderTemplate;

    // Controller Object
    private $_controller;

    public function __construct($controller)
    {
        $this->_controller = $controller;
    }

    public function load()
    {
        $fileConfig = $this->getFileConfig();
        $folderTemplate = $this->getFolderTemplate();
        $fileTemplate = $this->getFileTemplate();
        //$path Config = public/ template/   admin/main/     template.ini
        $pathFileConfig = TEMPLATE_PATH . $folderTemplate .  $fileConfig;

        if(file_exists($pathFileConfig)){
            $arrConfig = parse_ini_file($pathFileConfig);
            //public/ template/   admin/main/     index.php

            $view = $this->_controller->getView();

            // $view->setTitle($this->createTitle($arrConfig['title']));
            // $view->_title = $this->createTitle($arrConfig['title']);

            $view->_title 		= $view->createTitle($arrConfig['title']);
			$view->_metaHTTP 	= $view->createMeta($arrConfig['metaHTTP'], 'http-equiv');
			$view->_metaName 	= $view->createMeta($arrConfig['metaName'], 'name');
			$view->_cssFiles 	= $view->createLink($this->_folderTemplate . $arrConfig['dirCss'], $arrConfig['fileCss'], 'css');
			$view->_jsFiles 	= $view->createLink($this->_folderTemplate . $arrConfig['dirJs'], $arrConfig['fileJs'], 'js');
			$view->_dirImg 		= TEMPLATE_URL . $folderTemplate . $arrConfig['dirImg'] . DS;

            $view->setTemplatePath(TEMPLATE_PATH . $folderTemplate .  $fileTemplate);
            // $view->_folderTemplate = TEMPLATE_PATH . $folderTemplate; // DUC

        }

    }


    // SET FOLDER TEMPLATE template/   default/main/
    public function setFolderTemplate($value = 'default/main/')
    {
        $this->_folderTemplate = $value;
    }

    // GET FOLDER TEMPLATE
    public function getFolderTemplate()
    {
        return $this->_folderTemplate;
    }
    
    // SET FILE TEMPLATE template/admin/main/     index.php
    public function setFileTemplate($value = 'index.php')
    {
        $this->_fileTemplate = $value;
    }

    // GET FILE TEMPLATE     index.php
    public function getFileTemplate()
    {
        return $this->_fileTemplate;
    }

    // SET FILE CONFIG template/admin/main/     template.ini
    public function setFileConfig($value = 'template.ini')
    {
        $this->_fileConfig = $value;
    }

    // GET FILE CONFIG     template.ini
    public function getFileConfig()
    {
        return $this->_fileConfig;
    }

}

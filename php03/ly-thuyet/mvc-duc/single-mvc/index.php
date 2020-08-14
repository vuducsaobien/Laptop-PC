<?php
error_reporting(error_reporting() & ~E_NOTICE);

echo '<h1>MVC</h1>';

require_once 'libs/Controller.php';
require_once 'libs/View.php';
require_once 'libs/Bootstrap.php';
$bootstrap = new Bootstrap();

?>
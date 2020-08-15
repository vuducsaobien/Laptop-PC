<?php
    $cssURL = PUBLIC_URL . 'css' . DS;
    $jsURL = PUBLIC_URL . 'js' . DS;

    Session::init();

    $menu = '<a class="index" href="index.php?controller=index&action=index">Home</a>';
    if(Session::get('loggedIn')==true){
        $menu .= '<a class="group" href="index.php?controller=group&action=index">Group</a>';
        $menu .= '<a class="user" href="index.php?controller=user&action=logout">Logout</a>';
    }else{
        $menu .= '<a class="user" href="index.php?controller=user&action=login">Login</a>';
    }

	// JS
	if(!empty($this->js)){
		foreach($this->js as $js) {
			$fileJs .= '<script type="text/javascript" src="'.VIEW_URL.$js.'"></script>';
		}
	}
	
	// CSS
	if(!empty($this->css)){
		foreach($this->css as $css) {
			$fileCss .= '<link rel="stylesheet" type="text/css" href="'.VIEW_URL.$css.'">';
		}
	}
	
	// TITLE
	$title = isset($this->title) ? $this->title : 'MVC';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ;?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css ">
    <link rel="stylesheet" type="text/css" href="<?= $cssURL ;?>style.css">
    <script type="text/javascript" src="<?= $jsURL ;?>jquery.js"></script>
    <script type="text/javascript" src="<?= $jsURL ;?>custom.js"></script>
    <?php echo $fileJs . $fileCss;?>

</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h3>Header</h3>

            <?= $menu ;?>


        </div>
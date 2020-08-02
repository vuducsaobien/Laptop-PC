<?php 
	$cssURL	= PUBLIC_URL . 'css' . DS;
	$jsURL	= PUBLIC_URL . 'js' . DS;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Insert Title Here</title>
	<link rel="stylesheet" type="text/css" href="<?php echo $cssURL;?>style.css">
	<script type="text/javascript" src="<?php echo $jsURL;?>jquery.js"></script>
	<script type="text/javascript" src="<?php echo $jsURL;?>custom.js"></script>
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<h3>Header</h3>
			<a class="index" href="index.php?controller=index&action=index">Home</a>
			<a class="login" href="index.php?controller=login&action=index">Login</a>
			<a class="group" href="index.php?controller=group&action=index">Group</a>
		</div>

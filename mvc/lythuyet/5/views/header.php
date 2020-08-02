<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Insert Title Here</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<script type="text/javascript" src="public/js/jquery.js"></script>
	<script type="text/javascript" src="public/js/custom.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			/*var controller = '<?php //echo $_GET["controller"];?>';  */
			// console.log(controller);
			// $('div.header a.login').addClass('active');

			// var controller = '<?php //echo $_GET["controller"];?>';
			// $('div.header a.' + controller).addClass('active');

			var controller = '<?php echo isset($_GET["controller"]) ? $_GET["controller"] : 'index';?>';
			$('div.header a.' + controller).addClass('active');

			// var controller = (getUrlVar('controller')=='') ? "index" : getUrlVar('controller');
			// $('div.header a.' + controller).addClass('active');

		});
	</script>
	
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<h3>Header</h3>
			<a class="index" href="index.php?controller=index&action=index">Home</a>
			<a class="login" href="index.php?controller=login&action=index">Login</a>
			<a class="group" href="index.php?controller=group&action=index">Group</a>

		</div>

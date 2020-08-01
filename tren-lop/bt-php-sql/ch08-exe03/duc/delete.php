<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<title>Delete Single Group</title>
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="js/my-js.js"></script>
		<!-- <script type="text/javascript"> 
			$(document).ready(function(){
				$('#cancel-button').click(function(){
					window.location = 'Index.php';
				});
			});
		</script> -->
	</head>
<body>
	<?php
		require_once 'connect.php';

		$id		= $_GET['id']; 
		$query  = "SELECT * FROM `group` WHERE `id` = '$id'";
		$item   = $database->singleRecord($query);
		
		if(!empty($item)){ 		//Fake ID 
			$status = ($item['status']==0) ? 'Inactive' : 'Active';
			$xhtml = '<div class="row">
							<p>ID:</p>'.$item['id'].'
						</div>
						<div class="row">
							<p>Group name:</p>'.$item['name'].'
						</div>
						<div class="row">
							<p>Status:</p>'.$status.'
						</div>
						<div class="row">
							<p>Ordering:</p>'.$item['ordering'].'
						</div>
						<div class="row">
							<input type="hidden" name="id" value="'.$item['id'].'">
							<input type="submit" value="Delete" name="submit">
							<input type="submit" value="Cancel" name="cancel" id="cancel-button">
						</div>';
		}else{
			header('location: error.php');
			exit();
		}
		
		if(isset($_POST['submit'])){
			$id = $_POST['id'];
			$query = "DELETE FROM `group` WHERE `id` = '$id'";
			$database->query($query);
			$xhtml = '<div class="success">Success! <a href="index.php">Click vào đây</a> để quay về trang quản lý.</div>';
		}

		if(isset($_POST['cancel'])){
			header('location: Index.php');
		}
	?>

	<div id="wrapper">
    	<div class="title">Delete Single Group</div>
        <div id="form">   
	        <form action="#" method="post" name="main-form">
	        <?php echo $xhtml;?>
			</form>    
        </div>
    </div>
</body>
</html>

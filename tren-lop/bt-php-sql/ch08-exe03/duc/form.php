<?php
	require_once 'class/Validate.class.php'; 
	require_once 'class/HTML.class.php'; 
	require_once 'connect.php'; 
	session_start();

	$success 	 = '';
	// Khi name, ordering đã đúng(Sau khi check Error). 
	// Giữ lại dữ liệu cho name, ordering
	// $outValidate = $validate->getResult();
	$error 			= '';
	$id				= $_GET['id'];
	$action			= $_GET['action'];
	$flagRedirect	= false;
	$titlePage		= '';
	$time			= time();
	
	if($action == 'edit'){
	// $id = mysqli_real_escape_string($id); // Attack ịnection
	// Load info từ file cũ
		$query = "SELECT `name`, `status`, `ordering` FROM `group` WHERE id = '" . $id . "'";
		$outValidate	= $database->singleRecord($query);
		$linkForm		= 'form.php?action=edit&id=' . $id;
		// edit.php?action=edit&id=900 id = 900 ko tồn tại
		if(empty($outValidate)) $flagRedirect	= true;		
		$titlePage		= 'EDIT GROUP';
	}else if($action == 'add'){
		$linkForm		= 'form.php?action=add';
		$titlePage		= 'ADD GROUP';
	}else{
		$flagRedirect	= true;
	}
	
	// Redirect page
	if($flagRedirect == true) {
		header('location: error.php');
		exit();
	}
	
	if(!empty($_POST)){
		if($_SESSION['token'] == $_POST['token']){ // refresh page
			unset($_SESSION['token']);
			header('location: ' . $linkForm);
			exit();
		}else{
			$_SESSION['token'] = $_POST['token'];
		}
		
		$source   = array('name' => $_POST['name'], 'status'=> $_POST['status'], 'ordering'=> $_POST['ordering']);
		$validate = new Validate($source);
		// $validate = new Validate($_POST);

		// Check error name, ordering
		$validate->addRule('name', 'string', 2, 50);
		$validate->addRule('ordering', 'int', 1, 10);
		$validate->addRule('status', 'status');

		$validate->run();
		$outValidate = $validate->getResult();
		echo '<pre>';
		print_r($outValidate);
		echo '</pre>';
		// Show error name, ordering
		if(!$validate->isValid()){
			$error = $validate->showErrors();
		}else{
			if($action == 'edit'){
				$where = array(array('id', $id));
				$database->update($outValidate, $where);
			}else if($action == 'add'){
				// check error (đã đúng) -> insert vào database
				$database->insert($outValidate);
				// Sau khi Update thành công vào database, giữ lại name, ordering ở Form
				$outValidate = [];
			}
			$success = '<div class="success">Success</div>'; 
		}
	}
	
	// Tạo select box tự động 
	/*
	<div class="row">
		<p>Status</p>
		<select name="status">
			<option value="1">Select Status</option>
			<option value="1">Active</option>
			<option value="1">Inactive</option>
		</select>
	</div>
	*/

	// select box Status
	$arrStatus 	= array(2=> 'Select status', 1 => 'Active', 0 => 'Inactive' );
	// OR $arrStatus 	= array(2=> 'Select status', 'Active' => 'Active', 'Inactive' => 'Inactive' );
	$status		= HTML::createSelectbox($arrStatus, 'status', $outValidate['status']);
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title><?php echo $titlePage; ?></title>
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="js/my-js.js"></script>
</head>
<body>
	<?php
	echo	
		'<div id="wrapper">
			<div class="title">'.$titlePage.'</div>
			<div id="form">
				' . $error. $success . '   
				<form action="'.$linkForm.'" method="post" name="add-form">

					<div class="row">
						<p>Name</p>
						<input type="text" name="name" value="'.@$outValidate['name'].'">
					</div>
					
					<div class="row">
						<p>Status</p>
						'.$status.'
					</div>
					
					<div class="row">
						<p>Ordering</p>
						<input type="text" name="ordering" value="'.@$outValidate['ordering'].'">
					</div>
					
					<div class="row">
						<input type="submit" value="Save" name="submit">
						<input type="button" value="Cancel" name="cancel" id="cancel-button">
						<input type="hidden" value="'.$time.'" name="token" />
					</div>
													
				</form>    
			</div>
		</div>';
	?>
</body>
</html>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cancel-button').click(function(){
			window.location = 'index.php';
		});
	});
</script>

<title>PHP FILE - ADD - File Làm BT trên lớp</title>
</head>
<body>
<?php

	require_once 'functions.php';
	
	$title				= '';
	$description		= '';
	$errorTitle			= '';
	$errorDescription	= '';

	$flag = false;
    if( isset($_POST['title']) && isset($_POST['description'])) {
        $title         = $_POST["title"];
		$description   = $_POST["description"];

		//Error Title
		$errorTitle				= '';
		if (checkEmpty($title)) 					$errorTitle = '<p class="error">Dữ liệu ko dc rỗng</p>';
		if (checkLength($title, 5, 100))			$errorTitle .= '<p class="error">Tiêu đề dài từ 5 -100 ký tự</p>';

		//Error Description
		$errorDescription		= '';
		if (checkEmpty($description)) 				$errorDescription = '<p class="error">Dữ liệu ko dc rỗng</p>';
		if (checkLength($description, 10, 5000))	$errorDescription .= '<p class="error">Mô tả dài từ 10 - 5000 ký tự</p>';

		// A - Z, a - z, 0 - 9. Put String to File, Tạo ra 1 File Mới.
		if ($errorTitle == '' && $errorDescription == ''){

			$data	= $title . '||' . $description;
			$name	= createFileName(5);
			$fileName = "files/DUC-$name.txt";

			if (file_put_contents($fileName, $data)){
				$title		 = '';
				$description = '';
				$flag		 = true;
			}
		}
	}
?>
	<div id="wrapper">
    	<div class="title">PHP FILE - ADD-2</div>
        <div id="form">   
			<form action="#" method="post" name="add-form">
				<div class="row">
					<p>Title</p>
					<input type="text" name="title" value="<?php echo $title; ?>">
					<?php echo $errorTitle; ?>
                </div>
                
				<div class="row">
					<p>Description</p>
					<textarea name="description" rows="5" cols="100"><?php echo $description; ?></textarea>
                    <?php echo $errorDescription; ?>
                </div>

				<div class="row">
					<input type="submit" value="Save" name="submit">
					<input type="button" value="Cancel" name="cancel" id="cancel-button">
				</div>

				<?php
					if ($flag == true) echo '<div class="row"><p>Dữ liệu đã được ghi thành công</p></div>';
				?>
			</form>    
        </div>
        
    </div>
</body>
</html>
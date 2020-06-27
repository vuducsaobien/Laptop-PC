<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#cancel-button').click(function(){
			window.location = "index.php";
		});
	});
</script>
</head>
<body>
<?php
	$id	= $_GET['id'];
	$content		= file_get_contents("./files/$id");
	$content		= explode('||', $content);
	$title			= $content[0];
	$description	= $content[1];
	// Người dùng đã ấn Delete, Post ID hidden, lấy id để xóa file .txt
	$flag = false;
	if (isset($_POST['id'])){
		$id = $_POST['id'];
		@unlink("./files/$id");
		$flag = true;
	}

?>
	<div id="wrapper">
    	<div class="title">PHP FILE</div>
        <div id="form">
		<?php if ($flag == false) { ?> 
        <form action="" method="post" name="main-form">
			<div class="row">
				<p>File:</p>
				<span><?php echo realpath("./files/$id"); ?></span>
			</div>
			<div class="row">
				<p>Title:</p>
				<span><?php echo $title; ?></span>
			</div>
			<div class="row">
				<p>Description:</p>
				<span><?php echo $description; ?></span>
			</div>
			<div class="row">
				<input type="hidden" name="id" value="<?php echo $id;?>">
				<input type="submit" value="Delete" name="submit">
				<input type="button" value="Cancel" name="cancel" id="cancel-button">
			</div>

			<?php
				} else { echo '<p>Xóa thành công!<a href = "index.php">Ấn vào đây</a> để quay lại</p>';
					}
			?>
		</form>    
        </div>
        
    </div>
</body>
</html>

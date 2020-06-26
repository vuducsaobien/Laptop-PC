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

<title>PHP FILE - ADD</title>
</head>
<body>
<?php
    if (isset($_POST["title"]) && isset($_POST["description"]) {
        echo $title         = $_POST["title"];
        echo $description   = $_POST["description"];
    }
?>
	<div id="wrapper">
    	<div class="title">PHP FILE - ADD-2</div>
        <div id="form">   
			<form action="#" method="post" name="add-form">
				<div class="row">
					<p>Title</p>
					<input type="text" name="title" value="">
					<p class ="error">Dữ liệu không được rỗng</p>
                    <p class ="error">Tiêu đề dài từ 5 đến 100 ký tự</p>
                </div>
                
				<div class="row">
					<p>Description</p>
					<textarea name="description" rows="5" cols="100"></textarea>
					<p class ="error">Dữ liệu không được rỗng</p>
                    <p class ="error">Tiêu đề dài từ 10 đến 5000 ký tự</p>
                </div>

				<div class="row">
					<input type="submit" value="Save" name="submit">
					<input type="button" value="Cancel" name="cancel" id="cancel-button">
				</div>
				
								
			</form>    
        </div>
        
    </div>
</body>
</html>

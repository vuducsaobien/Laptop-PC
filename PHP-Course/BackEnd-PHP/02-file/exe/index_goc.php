<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE - Index</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#multy-delete').click(function(){
			$('#main-form').submit();
		});
	});
</script>
</head>
<body>
	<div id="wrapper">
    	<div class="title">PHP FILE - Index</div>
        <div class="list">   
			<form action="multy-delete.php" method="post" name="main-form" id="main-form">
<?php
?>
	         	<div class="row <?php echo $class;?>">
	            	<p class="no">
	            		<input type="checkbox" name="checkbox[]" value="20Ghf">
	            	</p>
	                <p class="name">ABCD</span></p>
	                <p class="id">20Ghf</p>
	                <p class="size">518 B</p>
	                <p class="action">
	                	<a href="edit.php?id=20Ghf">Edit</a> |
	                	<a href="delete.php?id=20Ghf">Delete</a>
	                </p>
	            </div>

				<div class="row odd">
	            	<p class="no">
	            		<input type="checkbox" name="checkbox[]" value="bYj6s">
	            	</p>
	                <p class="name">DEFGH</span></p>
	                <p class="id">20Ghf</p>
	                <p class="size">573 B</p>
	                <p class="action">
	                	<a href="edit.php?id=bYj6s">Edit</a> |
	                	<a href="delete.php?id=bYj6s">Delete</a>
	                </p>
	            </div>
<?php
?>

	    	</form>
    	</div>
        
	        <div id="area-button">
	        	<a href="add.php">Add File</a>
	        	<a id="multy-delete" href="#">Delete File</a>
	        </div>
    
    </div>
</body>
</html>

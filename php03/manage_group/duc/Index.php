<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>PHP FILE - Index</title>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#multi-delete').click(function(){
			$('#main-form').submit();
		});
	});
</script>
</head>
<body>
	<div id="wrapper">
    	<div class="title">PHP FILE - Index</div>
        <div class="list">   
			<form action="multi-delete.php" method="post" name="main-form" id="main-form">
<?php
	require_once 'functions.php';
	require_once 'define.php';

	$data = scandir ( DIR_FILES );
	$i = 0;
	$title = '';
	foreach ($data as $key => $value){
		if ($value == '.' || $value == '..' || preg_match('#.txt$#imsU', $value) == false) continue;
			$class		 = ($i % 2 == 0) ? 'odd' : 'even';
			$content	 = file_get_contents( DIR_FILES . $value );
			$content 	 = explode('||', $content);
			$title	 	 = $content[0];
			$description = $content[1];
			$image 		 = $content[2];
			$id			 = substr($value, 0, 9);
			$size		 = convertSize(filesize( DIR_FILES . $value ));
			echo
				'<div class="row '.$class.'">

	            	<p class="no">
	            		<input type="checkbox" name="checkbox[]" value = "'.$id.'">
					</p>
					
	                <p class="name">'.$title.'<span>'.$description.'</span>
					</p>

					<p class="image"><img src = '. DIR_IMAGES  . $image . '  alt=""></p>

	                <p class="id">'.$id.".txt".'</p>
	                <p class="size">'.$size.'</p>
	                <p class="action">
	                	<a href="edit.php?id='.$id.'">Edit</a> |
	                	<a href="delete.php?id='.$id.'">Delete</a>
	                </p>
	            </div>';
				$i++;
	}
?>

	    	</form>
    	</div>
        
	        <div id="area-button">
	        	<a href="add.php">Add File</a>
				<?php

				if ($i != 0){
					echo '<a id="multi-delete" href="#">Multi Delete File</a>';
				}

				?>
	        </div>
    
    </div>
</body>
</html>

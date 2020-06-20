<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test Function</title>
	<style type="text/css">
		* {
			margin: 0px;
			padding: 0px;
		}
		
		div.content {
			width: 800px;
			border:2px solid #936;
			height:auto;
			margin:20px auto;
			padding:5px;
		}

		div.content div {
			border: 1px solid #0CC;
			padding: 5px;
			text-align:center;
			margin-bottom: 10px;
		}

		div.content div p{
			font-weight: bold;
		}

		div.content div p span{
			font-weight: normal;
			font-style: italic;
		}
	</style>
</head>
<body>
	<div class = "content">
	<?php
		function createBox($content,$width) {
			$result = '<div style="width: '.$width.'px; height: 50px;">';
			$result .= '<p>'.$content.'<span>(300x200)</span></p>';	
            $result .= '</div>';
            return $result;
		}
		
        $boxA = createBox("Box A",500);
            echo $boxA;
        $BoxB = createBox("Box B");
            echo $BoxB;
			
	?>
	</div>
</body>
</html>
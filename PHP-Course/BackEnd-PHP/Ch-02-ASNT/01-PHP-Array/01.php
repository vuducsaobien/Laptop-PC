<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<style type="text/css">
	* {
		margin: 0px;
		padding: 0px;
	}
	
	.content {
		width: 500px;
		padding: 10px;
		border: 2px solid #ddd;
		height: auto;
		margin: 10px auto;
	}
</style>
</head>
<body>
	<div class="content">
<?php
		$group = array ("1" => "Admin", "2" => "Manager", "3" => "Member", "4" => "Guest");

		$xhtml = "";
		if (!empty($group)) {
				$xhtml .='<select name="group" id="group" style="width: 200px">';
				$xhtml .='<option value="1">Admin</option>';
				$xhtml .='<option value="2">Manager</option>';
				$xhtml .='<option value="3">Member</option>';
				$xhtml .='<option value="4">Guest</option>';
				$xhtml .= '</select>';
		}
		echo $xhtml;
?>
	</div>
</body>
</html>





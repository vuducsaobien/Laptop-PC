<?php
	$connect = @mysqli_connect('localhost', 'root', '');
	
	if(!$connect) die('<h3>Fail</h3>');
	
	// INSERT
	mysqli_select_db($connect, 'manage_user');
	
	echo $query = "INSERT INTO `group`(`name`, `status`, `ordering`) VALUES 
					('Member', '1', '10'), ('Member1', '1', '10')";
	$result = mysqli_query($connect, $query);
	
	if($result){
		echo $total = mysqli_affected_rows($connect);
	}else{
		echo mysqli_error($connect);
	}
	mysqli_close($connect);
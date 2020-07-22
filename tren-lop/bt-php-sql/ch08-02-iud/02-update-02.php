<?php
	$connect = @mysqli_connect('localhost', 'root', '');
	if(!$connect) die('<h3>Fail</h3>');
	
	// UPDATE
	mysqli_select_db($connect, 'manage_user');
	
	function createUpdateSQL($data){
		$newQuery = "";
		if(!empty($data)){
			foreach($data as $key => $value){
				$newQuery .= ", `$key` = '$value'";
			}
		}
		$newQuery = substr($newQuery, 2);
		return $newQuery;
	}
	
	$data = array('status' => 0, 'ordering' => 100, 'name' => 'Manager 1');
	
	$newQuery = createUpdateSQL($data);
	$query = "UPDATE `group` SET " . $newQuery . " WHERE `id` = 1";
	
	$result = mysqli_query($connect, $query);
	
	if($result){
		echo $total = mysqli_affected_rows($connect);
	}else{
		echo mysqli_error($connect);
	}
	mysqli_close($connect);
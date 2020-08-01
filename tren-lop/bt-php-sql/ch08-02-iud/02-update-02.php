<?php
	$connect = @mysqli_connect('localhost', 'root', '');
	if(!$connect) die('<h3>Fail</h3>');
	
	// UPDATE 1 Array
	mysqli_select_db($connect, 'manage_user');
	$data = array('status' => 0, 'ordering' => 100, 'name' => 'NANCY');
	
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
	
	
	$newQuery = createUpdateSQL($data);
	// $query = "UPDATE `group` SET " . $newQuery . " WHERE `ordering` = '9'";
	$query = "UPDATE `group` SET " . $newQuery . " WHERE `ordering` = '9' AND `status` = '0'";
	$result = mysqli_query($connect, $query);
	
	if($result){
		echo $total = mysqli_affected_rows($connect);
	}else{
		echo mysqli_error($connect);
	}
	mysqli_close($connect);
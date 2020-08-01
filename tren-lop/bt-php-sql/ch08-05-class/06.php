<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
	require_once 'Database.class.php';
	
	$params		= array(
						'server' 	=> 'localhost',
						'username'	=> 'root',
						'password'	=> '',
						'database'	=> 'manage_user',
						'table'		=> 'group',
					);
	
	$database = new Database($params);
	
	$query[] 	= "SELECT * ";
	$query[] 	= "FROM `group`";
	$query[] 	= "ORDER BY `ordering` DESC";
	$query		= implode(" ", $query);

	// QUERY IUD
	// $query 	= "DELETE FROM `group` WHERE `id` = '" . $id . "'";
	// $result = mysqli_query($connect, $query);
	
	// QUERY SELECT
	// $query		= implode(" ", $query);
	// $result 		= mysqli_query($connect, $query);
	// while($row 	= mysqli_fetch_assoc($result)){
	
	// TH user viết mysqli_query($this->connect, $query);
	// => Phải viết hàm LIST RECORD để user sử dụng 
	// được cả hàm mysqli_query($this->connect, $query);
	// ở ngoài Database.class.php
	
	// mysqli_query($this->connect, $query) == $this->resultQuery
	// QUERY SELECT
	// public function query($query){
	// 	$this->resultQuery = mysqli_query($this->connect, $query);
	// 	return $this->resultQuery;
	// }
	

	$database->query($query);

	// $list = $database->listRecord();
	$list = $database->singleRecord();

	echo '<pre>';
	print_r($list);
	echo '</pre>';
	

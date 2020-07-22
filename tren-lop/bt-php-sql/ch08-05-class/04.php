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
	
	$data 	= array('status' => 1, 'ordering' => 50);
	$where	= array(
						array('ordering', 100, 'and'),
						array('status', 1)
				);
	echo '<pre>';
	print_r($where);
	echo '</pre>';
	$database->update($data, $where);
	

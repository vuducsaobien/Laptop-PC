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
	
	$data 	= array('status' => 1, 'ordering' => 7, 'name' => 'Ngoc Trinh');
	$where	= array(
						array('ordering', 0, 'and'),
						array('name', 'NANCY')
						// array('status', 0) createWhereUpdateSQL khong hoat dong
				);
	$database->update($data, $where);
	

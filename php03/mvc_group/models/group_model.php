<?php
class Group_Model extends Model{
	
	public function __construct(){
		parent::__construct();
		Session::init();
		$this->setTable('group');
	}
	
	public function listItems($options = null){

		$bbb = Session::get('searchName');
		$ccc = Session::get('searchID');

		$query[] 	= "SELECT `g`.`id`,`g`.`name`,`g`.`status`,`g`.`ordering`, COUNT(`u`.id) AS total";
		$query[] 	= "FROM `group` AS `g` LEFT JOIN `user` AS `u` ON `g`.`id` = `u`.`group_id`";
		$query[] 	= "WHERE `g`.`id` > '0' ";
		$query[] 	= "AND `g`.`name` LIKE '%$bbb%' ";

		if($ccc!=null) $query[] = "AND `g`.`id` = '$ccc' ";

		$query[] 	= "GROUP BY `g`.`id`";
		$query[] 	= "ORDER BY  `g`.`name` ASC, `g`.`id` DESC";

		// $query[] 	= "GROUP BY `g`.`id` DESC";
		echo $query		= implode(" ", $query);
		
		$result		= $this->listRecord($query);
		// $ddd = $this->validateExistRecord();
		// if($bbb=null && $ccc=null) echo 'Khoong tim thay!';

		return $result;
	}
	
	public function deleteItem($id, $options = null){
		$this->delete(array($id));
	}
}
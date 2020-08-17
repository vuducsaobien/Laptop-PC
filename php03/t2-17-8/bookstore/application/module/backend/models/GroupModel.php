<?php
class GroupModel extends Model
{

	private $_value;

	public function countItem($arrParam, $option = null)
	{
		$query[]	= "SELECT COUNT(`id`) AS `total`";
		$query[]	= "FROM `$this->table`";
		$query[]	= "WHERE `id` > 0";

		$query		= implode(" ", $query);
		$result		= $this->fetchRow($query);
		return $result['total'];
	}

	public function listItem($arrParam, $option = null)
	{
		Session::init();
		if ($option['task'] == 'index') {

			$search = '';

			$query[]	= "SELECT `id`, `name`, `group_acp`, `status`, `ordering`, `created`, `created_by`, `modified`, `modified_by`";
			$query[]	= "FROM `$this->table`";
			$query[]	= "WHERE `id` > '0'";
		}
		// $flagSearch = false;
		// $flagStatus = false;
		// $flag 		= false;

		// $a = 0;
		// $b = 0;

		// Search
		if (!empty($_GET['search_value'])) {
			$search = $_GET['search_value'];
			$query[]	= "AND `name` LIKE '%$search%'";
			$query[]	= "OR `id` LIKE '%$search%'";
			$query[]	= "OR `ordering` LIKE '%$search%'";
		}

		// Status
		if (isset($_GET['status'])) {
			$status = $_GET['status'];
			$query[]	= "AND `status` = '$status'";
		}

		// ALL
		// if($flagSearch==true){
		// 	$flag 		= false;
		// 	echo '<h3>SearchIF' . $flagSearch . '</h3>';

		// 	$query[]	= "AND `name` LIKE '%$search%'";
		// 	$query[]	= "OR `id` LIKE '%$search%'";
		// 	$query[]	= "OR `ordering` LIKE '%$search%'";

		// 	if($flagStatus==true){
		// 		$flag = true;
		// 		echo '<h3>StatusIF' . $flagStatus . '</h3>';

		// 		// $query[]	= "AND `name` LIKE '%$search%'";
		// 		// $query[]	= "OR `id` LIKE '%$search%'";
		// 		// $query[]	= "OR `ordering` LIKE '%$search%'";

		// 		$query[]	= "OR `status` = '$status'";
		// 	}else{
		// 		$flag = false;
		// 	}
		// }

		// if($flagSearch==true && $flagStatus==false ){
		// 	$query[]	= "AND `name` LIKE '%$search%'";
		// 	$query[]	= "OR `id` LIKE '%$search%'";
		// 	$query[]	= "OR `ordering` LIKE '%$search%'";
		// 	// $query[]	= "AND `status` = '$status'";
		// }

		// if($flagStatus==true && $flagSearch==false){
		// 	echo '11';
		// 	$query[]	= "AND `status` = '$status'";
		// }elseif($flagStatus==false && $flagSearch==false){
		// 	echo '0-0';
		// 	echo '<h3>StatusIF' . $flagStatus . '</h3>';
		// 	echo '<h3>StearchIF' . $flagSearch . '</h3>';
		// }




		$query		= implode(" ", $query);
		$result		= $this->fetchAll($query);
		return $result;
	}
}

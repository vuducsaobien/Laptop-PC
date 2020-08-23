<?php
class DashboardModel extends Model{

	public function countItem($arrParam, $option = null){
		if ($option['task'] == 'group') {
		$query[]	= "SELECT COUNT(`id`) AS `total`";
		$query[]	= "FROM `$this->table`";
		$query[]	= "WHERE `id` > 0";
		}
		
		$query		= implode(" ", $query);
		$result		= $this->fetchRow($query);
		return $result['total'];
	}

}
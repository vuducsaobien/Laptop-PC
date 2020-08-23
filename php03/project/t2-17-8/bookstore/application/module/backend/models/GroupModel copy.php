<?php
class GroupModel extends Model
{

	private $_columns = array('id', 'name', 'group_acp', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering');
	private $_userInfo;

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

		// SORT
		if (!empty($arrParam['sort_field']) && !empty($arrParam['sort_order'])) {
			$column		= $arrParam['sort_field'];
			$columnDir	= $arrParam['sort_order'];
			$query[]	= "ORDER BY `$column` $columnDir";
		} else {
			$query[]	= "ORDER BY `id` ASC";
		}
		




		$query		= implode(" ", $query);
		$result		= $this->fetchAll($query);
		return $result;
	}

	public function changeStatus($arrParam, $option = null)
	{
		if ($option['task'] == 'change-ajax-status') {
			$status 		= ($arrParam['status'] == 0) ? 1 : 0;
			$modified_by	= $this->_userInfo['username'];
			$modified		= date('Y-m-d', time());
			$id		= $arrParam['id'];
			$query	= "UPDATE `$this->table` SET `status` = $status, `modified` = '$modified', `modified_by` = '$modified_by'  WHERE `id` = '" . $id . "'";
			$this->query($query);

			$result = array(
				'id'		=> $id,
				'status'	=> $status,
				'link'		=> URL::createLink('backend', 'group', 'ajaxStatus', array('id' => $id, 'status' => $status))
			);
			return $result;
		}

		if ($option['task'] == 'change-ajax-group-acp') {
			$group_acp 	= ($arrParam['group_acp'] == 0) ? 1 : 0;
			$modified_by	= $this->_userInfo['username'];
			$modified		= date('Y-m-d', time());
			$id			= $arrParam['id'];
			$query		= "UPDATE `$this->table` SET `group_acp` = $group_acp, `modified` = '$modified', `modified_by` = '$modified_by'  WHERE `id` = '" . $id . "'";
			$this->query($query);

			$result = array(
				'id'		=> $id,
				'group_acp'	=> $group_acp,
				'link'		=> URL::createLink('backend', 'group', 'ajaxACP', array('id' => $id, 'group_acp' => $group_acp))
			);
			return $result;
		}

		if ($option['task'] == 'change-status') {
			$status 		= $arrParam['type'];
			$modified_by	= $this->_userInfo['username'];
			$modified		= date('Y-m-d', time());
			if (!empty($arrParam['cid'])) {
				$ids		= $this->createWhereDeleteSQL($arrParam['cid']);
				$query		= "UPDATE `$this->table` SET `status` = $status, `modified` = '$modified', `modified_by` = '$modified_by'  WHERE `id` IN ($ids)";
				$this->query($query);
				Session::set('message', array('class' => 'success', 'content' => 'Có ' . $this->affectedRows() . ' phần tử được thay đổi trạng thái!'));
			} else {
				Session::set('message', array('class' => 'error', 'content' => 'Vui lòng chọn vào phần tử muỗn thay đổi trạng thái!'));
			}
		}
	}
}

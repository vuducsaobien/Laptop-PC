<?php
class GroupModel extends Model
{

	private $_columns = array('id', 'name', 'group_acp', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering');
	private $_userInfo;

	public function __construct()
	{
		parent::__construct();
		$this->setTable(TBL_GROUP);
	}


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
		// Session::init();
		echo '<pre>';
		print_r($arrParam);
		echo '</pre>';

		$query[]	= "SELECT `id`, `name`, `group_acp`, `status`, `ordering`, `created`, `created_by`, `modified`, `modified_by`";
		$query[]	= "FROM `$this->table`";
		$query[]	= "WHERE `id` > '0'";

		$search = '';
		$flagWhere 	= false;

		// Search
		if (!empty($_GET['search_value'])) {
			$search = $_GET['search_value'];

			// Clear
			if (!empty($_GET['clear-keyword'])) {
				$search = '';
			}

			$query[]	= "AND `name` LIKE '%$search%'";
			$query[]	= "OR `id` LIKE '%$search%'";
			$query[]	= "OR `ordering` LIKE '%$search%'";
			$flagWhere 	= false;

		}

		// SELECT BOX FILTER
		// if (!empty($arrParam['bulk_action']) ) {
		// 	$bulkAction	= $arrParam['bulk_action'];
		// 	$query[]	= "AND `$sort_field` $sort_order";
		// 	$flagWhere 	= false;

		// } else {
			// $query[]	= "ORDER BY `id` DESC";
		// }


		// Status
		// if (isset($_GET['status'])) {
		// 	echo '33';
		// 	$status = $_GET['status'];
		// 	$query[]	= "AND `status` = '$status'";
		// 	$flagWhere 	= true;

		// }

		// FILTER : STATUS
		if (isset($arrParam['filter_status']) && $arrParam['filter_status'] != 'default') {
			if($flagWhere==false){
				$query[]	= "AND `status` = '" . $arrParam['filter_status'] . "'";
			}else{
				$query[]	= "WHERE `status` = '" . $arrParam['filter_status'] . "'";
				$flagWhere	= true;

			}
		}
		

		// FILTER : GROUP ACP
		if (isset($arrParam['filter_group_acp']) && $arrParam['filter_group_acp'] != 'default') {
			if($flagWhere==false){
				$query[]	= "AND `group_acp` = '" . $arrParam['filter_group_acp'] . "'";
			}else{
				$query[]	= "WHERE `group_acp` = '" . $arrParam['filter_group_acp'] . "'";
			}
		}
		
		
		// SORT
		if (!empty($arrParam['sort_field']) && !empty($arrParam['sort_order'])) {
			$sort_field	= $arrParam['sort_field'];
			$sort_order	= $arrParam['sort_order'];
			$query[]	= "ORDER BY `$sort_field` $sort_order";
		} else {
			$query[]	= "ORDER BY `id` DESC";
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
			// $modified_by	= $this->_userInfo['username'];
			// $modified		= date('Y-m-d', time());
			if (!empty($arrParam['cid'])) {
				echo '<pre style = "color: red;">';
				print_r($arrParam);
				echo '</pre>';
				// $ids		= $this->createWhereDeleteSQL($arrParam['cid']);
				// $query		= "UPDATE `$this->table` SET `status` = $status, `modified` = '$modified', `modified_by` = '$modified_by'  WHERE `id` IN ($ids)";
				// $query		= "UPDATE `$this->table` SET `status` = $status WHERE `id` IN ($ids)";

				// $this->query($query);
				// Session::set('message', array('class' => 'success', 'content' => 'Có ' . $this->affectedRows() . ' phần tử được thay đổi trạng thái!'));
			} else {
				echo 'cancel';
				// Session::set('message', array('class' => 'error', 'content' => 'Vui lòng chọn vào phần tử muỗn thay đổi trạng thái!'));
			}
		}
	}
}

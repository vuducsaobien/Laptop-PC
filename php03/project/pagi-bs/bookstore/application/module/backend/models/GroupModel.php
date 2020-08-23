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

		// Search && Clear
		if (!empty($arrParam['search_value'])) {

			// Clear
			if (!empty($arrParam['clear-keyword'])) {
				$arrParam['search_value'] = '';
			}

			$keySearch = '"%' . $arrParam['search_value'] . '%"';
			$query[]	= "AND `name` LIKE $keySearch";
			$query[]	= "OR `id` LIKE $keySearch";
			$query[]	= "OR `ordering` LIKE $keySearch";
		}

		// Status
		if (isset($arrParam['status'])) {
			$query[]	= "AND `status` = '" . $arrParam['status'] . "'"; // NOTICE $arrParam['status'] xanh lè
		}

		// FILTER : GROUP ACP
		if (isset($arrParam['filter_group_acp']) && $arrParam['filter_group_acp'] != 'default') {
			$query[]	= "AND `group_acp` = '" . $arrParam['filter_group_acp'] . "'";
		}
		

		$query		= implode(" ", $query);
		$result		= $this->fetchRow($query);
		return $result['total'];
	}


	public function listItem($arrParam, $option = null)
	{
		$query[]	= "SELECT `id`, `name`, `group_acp`, `status`, `ordering`, `created`, `created_by`, `modified`, `modified_by`";
		$query[]	= "FROM `$this->table`";
		$query[]	= "WHERE `id` > '0'";
		// echo '<pre>';
		// print_r($arrParam['pagination']);
		// echo '</pre>';

		// Search && Clear
		if (!empty($arrParam['search_value'])) {

			// Clear
			if (!empty($arrParam['clear-keyword'])) {
				$arrParam['search_value'] = '';
			}

			$keySearch = '"%' . $arrParam['search_value'] . '%"';
			$query[]	= "AND `name` LIKE $keySearch";
			$query[]	= "OR `id` LIKE $keySearch";
			$query[]	= "OR `ordering` LIKE $keySearch";
		}

		// Status
		if (isset($arrParam['status'])) {
			$query[]	= "AND `status` = '" . $arrParam['status'] . "'"; // NOTICE $arrParam['status'] xanh lè
		}

		// FILTER : GROUP ACP
		if (isset($arrParam['filter_group_acp']) && $arrParam['filter_group_acp'] != 'default') {
			$query[]	= "AND `group_acp` = '" . $arrParam['filter_group_acp'] . "'";
		}

		// SORT
		if (!empty($arrParam['sort_field']) && !empty($arrParam['sort_order'])) {
			$sort_field	= $arrParam['sort_field'];
			$sort_order	= $arrParam['sort_order'];
			$query[]	= "ORDER BY `$sort_field` $sort_order";
		} else {
			$query[]	= "ORDER BY `id` ASC";
		}

		// PAGINATION
		$pagination			= $arrParam['pagination'];
		$totalItemsPerPage	= $pagination['totalItemsPerPage'];
		if ($totalItemsPerPage > 0) {
			$position	= ($pagination['currentPage'] - 1) * $totalItemsPerPage;
			$query[]	= "LIMIT $position, $totalItemsPerPage";
		}
		


		$query		= implode(" ", $query);
		$result		= $this->fetchAll($query);
		return $result;
	}

	public function changeStatus($arrParam, $option = null)
	{
		if ($option['task'] == 'change-ajax-status') {
			// echo '<pre>';
			// print_r($arrParam);
			// echo '</pre>';
			$status 		= ($arrParam['status'] == 0) ? 1 : 0;
			// $modified_by	= $this->_userInfo['username'];
			// $modified		= date('Y-m-d', time());
			$id				= $arrParam['id'];
			$query			= "UPDATE `$this->table` SET `status` = $status  WHERE `id` = '" . $id . "'";
			$this->query($query);

			$result = array(
				'id'		=> $id,
				'status'	=> $status,
				// 'link'		=> URL::createLink('backend', 'group', 'ajaxStatus', array('id' => $id, 'status' => $status, 'type' => 'status'))
				'link'		=> URL::createLink('backend', 'group', 'ajaxStatus', array('id' => $id, 'status' => $status, 'type' => 'status'))
			);
			return $result;
		}

		if ($option['task'] == 'change-ajax-group-acp') {
			$group_acp 	 = ($arrParam['group_acp'] == 0) ? 1 : 0;
			// $modified_by = $this->_userInfo['username'];
			// $modified	 = date('Y-m-d', time());
			$id			 = $arrParam['id'];
			$query		 = "UPDATE `$this->table` SET `group_acp` = $group_acp WHERE `id` = '" . $id . "'";
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
				$ids		= $this->createWhereDeleteSQL($arrParam['cid']);
				// $query		= "UPDATE `$this->table` SET `status` = $status, `modified` = '$modified', `modified_by` = '$modified_by'  WHERE `id` IN ($ids)";
				$query		= "UPDATE `$this->table` SET `status` = $status WHERE `id` IN ($ids)";

				$this->query($query);
				// Session::set('message', array('class' => 'success', 'content' => 'Có ' . $this->affectedRows() . ' phần tử được thay đổi trạng thái!'));
			} else {
				echo 'cancel';
				// Session::set('message', array('class' => 'error', 'content' => 'Vui lòng chọn vào phần tử muỗn thay đổi trạng thái!'));
			}
		}
	}

	public function deleteItem($arrParam, $option = null)
	{
		if ($option == null) {
			if (!empty($arrParam['cid'])) {
				$ids		= $this->createWhereDeleteSQL($arrParam['cid']);
				$query		= "DELETE FROM `$this->table` WHERE `id` IN ($ids)";
				$this->query($query);
				// Session::set('message', array('class' => 'success', 'content' => 'Có ' . $this->affectedRows() . ' phần tử được xóa!'));
			} else {
				// Session::set('message', array('class' => 'error', 'content' => 'Vui lòng chọn vào phần tử muỗn xóa!'));
			}
		}
	}
}

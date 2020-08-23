<?php
class GroupModel extends Model
{

	private $_columns = array('id', 'name', 'group_acp', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering');

	public function __construct()
	{
		parent::__construct();
		$this->setTable(TBL_GROUP);
	}

	public function countItem($arrParam, $option = null)
	{

		$query[]	= "SELECT COUNT(`id`) AS `total`";
		$query[]	= "FROM `$this->table`";

		// FILTER : KEYWORD
		$flagWhere 	= false;
		if (!empty($arrParam['filter_search'])) {
			$keyword	= '"%' . $arrParam['filter_search'] . '%"';
			$query[]	= "WHERE `name` LIKE $keyword";
			$flagWhere 	= true;
		}

		// FILTER : STATUS
		if (isset($arrParam['filter_state']) && $arrParam['filter_state'] != 'default') {
			if ($flagWhere == true) {
				$query[]	= "AND `status` = '" . $arrParam['filter_state'] . "'";
			} else {
				$query[]	= "WHERE `status` = '" . $arrParam['filter_state'] . "'";
				$flagWhere	= true;
			}
		}

		// FILTER : GROUP ACP
		if (isset($arrParam['filter_group_acp']) && $arrParam['filter_group_acp'] != 'default') {
			if ($flagWhere == true) {
				$query[]	= "AND `group_acp` = '" . $arrParam['filter_group_acp'] . "'";
			} else {
				$query[]	= "WHERE `group_acp` = '" . $arrParam['filter_group_acp'] . "'";
			}
		}

		$query		= implode(" ", $query);
		$result		= $this->singleRecord($query);
		return $result['total'];
	}

	public function listItem($arrParam, $option = null)
	{
		$query[]	= "SELECT `id`, `name`, `group_acp`, `status`, `ordering`, `created`, `created_by`, `modified`, `modified_by`";
		$query[]	= "FROM `$this->table`";

		// FILTER : KEYWORD
		$flagWhere 	= false;
		if (!empty($arrParam['filter_search'])) {
			$keyword	= '"%' . $arrParam['filter_search'] . '%"';
			$query[]	= "WHERE `name` LIKE $keyword";
			$flagWhere 	= true;
		}

		// FILTER : STATUS
		if (isset($arrParam['filter_state']) && $arrParam['filter_state'] != 'default') {
			if ($flagWhere == true) {
				$query[]	= "AND `status` = '" . $arrParam['filter_state'] . "'";
			} else {
				$query[]	= "WHERE `status` = '" . $arrParam['filter_state'] . "'";
				$flagWhere	= true;
			}
		}

		// FILTER : GROUP ACP
		if (isset($arrParam['filter_group_acp']) && $arrParam['filter_group_acp'] != 'default') {
			if ($flagWhere == true) {
				$query[]	= "AND `group_acp` = '" . $arrParam['filter_group_acp'] . "'";
			} else {
				$query[]	= "WHERE `group_acp` = '" . $arrParam['filter_group_acp'] . "'";
			}
		}

		// SORT
		if (!empty($arrParam['filter_column']) && !empty($arrParam['filter_column_dir'])) {
			$column		= $arrParam['filter_column'];
			$columnDir	= $arrParam['filter_column_dir'];
			$query[]	= "ORDER BY `$column` $columnDir";
		} else {
			$query[]	= "ORDER BY `id` DESC";
		}

		// PAGINATION
		$pagination			= $arrParam['pagination'];
		$totalItemsPerPage	= $pagination['totalItemsPerPage'];
		if ($totalItemsPerPage > 0) {
			$position	= ($pagination['currentPage'] - 1) * $totalItemsPerPage;
			$query[]	= "LIMIT $position, $totalItemsPerPage";
		}

		$query		= implode(" ", $query);
		$result		= $this->listRecord($query);
		return $result;
	}

	public function changeStatus($arrParam, $option = null)
	{
		if ($option['task'] == 'change-ajax-status') {
			$status = ($arrParam['status'] == 0) ? 1 : 0;
			$id		= $arrParam['id'];
			$query	= "UPDATE `$this->table` SET `status` = $status WHERE `id` = '" . $id . "'";
			$this->query($query);

			$result = array(
				'id'		=> $id,
				'status'	=> $status,
				'link'		=> URL::createLink('admin', 'group', 'ajaxStatus', array('id' => $id, 'status' => $status))
			);
			return $result;
		}

		if ($option['task'] == 'change-ajax-group-acp') {
			$group_acp 	= ($arrParam['group_acp'] == 0) ? 1 : 0;
			$id			= $arrParam['id'];
			$query		= "UPDATE `$this->table` SET `group_acp` = $group_acp WHERE `id` = '" . $id . "'";
			$this->query($query);

			$result = array(
				'id'		=> $id,
				'group_acp'	=> $group_acp,
				'link'		=> URL::createLink('admin', 'group', 'ajaxACP', array('id' => $id, 'group_acp' => $group_acp))
			);
			return $result;
		}

		if ($option['task'] == 'change-status') {
			$status 	= $arrParam['type'];
			if (!empty($arrParam['cid'])) {
				$ids		= $this->createWhereDeleteSQL($arrParam['cid']);
				$query		= "UPDATE `$this->table` SET `status` = $status WHERE `id` IN ($ids)";
				$this->query($query);
				Session::set('message', array('class' => 'success', 'content' => 'Có ' . $this->affectedRows() . ' phần tử được thay đổi trạng thái!'));
			} else {
				Session::set('message', array('class' => 'error', 'content' => 'Vui lòng chọn vào phần tử muỗn thay đổi trạng thái!'));
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
				Session::set('message', array('class' => 'success', 'content' => 'Có ' . $this->affectedRows() . ' phần tử được xóa!'));
			} else {
				Session::set('message', array('class' => 'error', 'content' => 'Vui lòng chọn vào phần tử muỗn xóa!'));
			}
		}
	}

	public function infoItem($arrParam, $option = null)
	{
		if ($option == null) {
			$query[]	= "SELECT `id`, `name`, `group_acp`, `status`, `ordering`";
			$query[]	= "FROM `$this->table`";
			$query[]	= "WHERE `id` = '" . $arrParam['id'] . "'";
			$query		= implode(" ", $query);
			$result		= $this->singleRecord($query);
			return $result;
		}
	}

	public function saveItem($arrParam, $option = null)
	{
		if ($option['task'] == 'add') {
			$arrParam['form']['created']	= date('Y-m-d', time());
			$arrParam['form']['created_by']	= 1;
			$data	= array_intersect_key($arrParam['form'], array_flip($this->_columns));
			$this->insert($data);
			Session::set('message', array('class' => 'success', 'content' => 'Dữ liệu được lưu thành công!'));
			return $this->lastID();
		}
		if ($option['task'] == 'edit') {
			$arrParam['form']['modified']	= date('Y-m-d', time());
			$arrParam['form']['modified_by'] = 10;
			$data	= array_intersect_key($arrParam['form'], array_flip($this->_columns));
			$this->update($data, array(array('id', $arrParam['form']['id'])));
			Session::set('message', array('class' => 'success', 'content' => 'Dữ liệu được lưu thành công!'));
			return $arrParam['form']['id'];
		}
	}

	public function ordering($arrParam, $option = null)
	{
		if ($option == null) {
			if (!empty($arrParam['order'])) {
				$i = 0;
				foreach ($arrParam['order'] as $id => $ordering) {
					$i++;
					$query	= "UPDATE `$this->table` SET `ordering` = $ordering WHERE `id` = '" . $id . "'";
					$this->query($query);
				}
				Session::set('message', array('class' => 'success', 'content' => 'Có ' . $i . ' phần tử được thay đỏi  ordering!'));
			}
		}
	}
}

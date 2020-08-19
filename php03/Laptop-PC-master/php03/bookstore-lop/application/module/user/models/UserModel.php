<?php
class IndexModel extends Model
{

    private $_columns = array('id', 'name');

    public function __construct()
    {
        parent::__construct();
        $this->setTable(TBL_USER);
    }

    public function countItem($arrParam, $option = [])
    {
        if ($option['task'] == 'user') {
            $query[]    = "SELECT COUNT(`id`) AS `total`";
            $query[]    = "FROM `$this->table`";
            $query        = implode(" ", $query);
            $result        = $this->singleRecord($query);
            return $result['total'];
        }
    }

    public function listItem($arrParam, $option = null)
	{
		$query[]	= "SELECT `id`, `name`";
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

		// CREATED BY NAME LOAD MANAGE_USER
		// $this->setModel('admin', 'index');

		$query		= implode(" ", $query);
		$result		= $this->listRecord($query);
		return $result;
	}

}

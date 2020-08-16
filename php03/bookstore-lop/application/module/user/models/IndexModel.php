<?php
class IndexModel extends Model
{

    private $_columns = array('id', 'name', 'group_acp', 'created', 'created_by', 'modified', 'modified_by', 'status', 'ordering');

    public function __construct()
    {
        parent::__construct();
        $this->setTable(TBL_GROUP);
    }

    public function countItem($arrParam, $option = [])
    {
        if ($option['task'] == 'group') {
            $query[]    = "SELECT COUNT(`id`) AS `total`";
            $query[]    = "FROM `$this->table`";
            $query        = implode(" ", $query);
            $result        = $this->singleRecord($query);
            return $result['total'];
        }
    }
}

<?php
    class Group_Model extends Model{

        public function __construct()
        {
            parent::__construct();
            $this->setTable('group');
        }

        public function listItems($option = null)
        {
            $search = Helper::searchPost('searchForm');
            if(!empty($_POST['clear'])){
                $search = '';
            }
    
            $query[] 	= "SELECT `g`.`id`,`g`.`name`,`g`.`status`,`g`.`ordering`, COUNT(`u`.id) AS total";
            $query[] 	= "FROM `group` AS `g` LEFT JOIN `user` AS `u` ON `g`.`id` = `u`.`group_id`";
            $query[] 	= "WHERE `g`.`name` LIKE '%$search%' OR `g`.`id` LIKE '%$search%' ";

            $query[] 	= "GROUP BY `g`.`id`";
            $query[] 	= "ORDER BY  `g`.`name` ASC, `g`.`id` DESC";
    
            $query		= implode(" ", $query);
            
            $result		= $this->listRecord($query);
            return $result;
    
        }

        public function deleteItem($id, $options = null){
            $this->delete(array($id));
        }
    


    }
?>
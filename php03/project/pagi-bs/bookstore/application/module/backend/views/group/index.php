<?php
$module     = $this->arrParam['module'];
$controller = $this->arrParam['controller'];
$action     = $this->arrParam['action'];
$url        = "index.php?module=$module&controller=$controller&action=$action";
if (!empty($_GET['clear-keyword'])) {
    $_GET['search_value'] = '';
}

// echo '<pre>';
// print_r($this->arrParam);
// echo '</pre>';
// Count Status
// Search Status Form

$columnPost		    = $this->arrParam['sort_field'];
$orderPost		    = $this->arrParam['sort_order'];

$lblName 		    = Helper::cmsLinkSort('Name', 'name', $columnPost, $orderPost);
$lblStatus		    = Helper::cmsLinkSort('Status', 'status', $columnPost, $orderPost);
$lblGroupACP	    = Helper::cmsLinkSort('Group ACP', 'group_acp', $columnPost, $orderPost);
$lblOrdering	    = Helper::cmsLinkSort('Ordering', 'ordering', $columnPost, $orderPost);
$lblCreated		    = Helper::cmsLinkSort('Created', 'created', $columnPost, $orderPost);
$lblCreatedBy	    = Helper::cmsLinkSort('Created By', 'created_by', $columnPost, $orderPost);
$lblModified	    = Helper::cmsLinkSort('Modified', 'modified', $columnPost, $orderPost);
$lblModifiedBy	    = Helper::cmsLinkSort('Modified By', 'modified_by', $columnPost, $orderPost);
$lblID			    = Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);

// SELECT BOX GROUP ACP
$arrGroupACP		= array('default' => '- Select Group ACP -', '1' => 'Yes',  '0' => 'No');
$selectboxGroupACP	= Helper::cmsSelectbox($arrGroupACP, $this->arrParam['filter_group_acp'], 'width: unset', 'filter_group_acp', 'custom-select custom-select-sm mr-1');

// SELECT BOX STATUS
// $arrStatus		    = array('default' => '- Select Status -', '1' => 'Active',  '0' => 'Inactive');
// $selectboxStatus	= Helper::cmsSelectbox('filter_status', 'custom-select custom-select-sm mr-1', $arrStatus, $this->arrParam['filter_status'], 'width: unset');

// Pagination
// $paginationHTML		= $this->pagination->showPagination(URL::createLink($module, $controller, 'index'));
$paginationHTML		= $this->pagination->showPagination(URL::createLink($module, $controller, $action));
?>     
        
<!-- Search & Filter -->
<?php require_once 'elements/search.php' ;?>

<!-- List -->
<?php require_once 'elements/list.php' ;?>

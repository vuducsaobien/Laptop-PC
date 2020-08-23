<?php

// Count Status
// Search Status Form
echo '<pre>';
print_r($this->arrParam);
echo '</pre>';
$module     = $this->arrParam['module'];
$controller = $this->arrParam['controller'];
$action     = $this->arrParam['action'];
$url        = "index.php?module=$module&controller=$controller&action=$action";
if (!empty($_GET['clear-keyword'])) {
    $_GET['search_value'] = '';
}

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
$paginationHTML		= $this->pagination->showPagination(URL::createLink('admin', 'group', 'index'));

?>     
<!-- <div class="card-footer clearfix">
    <ul class="pagination pagination-sm m-0 float-right">
        <li class="page-item disabled"><a href="" class="page-link"><i class="fas fa-angle-double-left"></i></a></li>
        <li class="page-item disabled"><a href="" class="page-link"><i class="fas fa-angle-left"></i></a></li>
        <li class="page-item active"><a class="page-link">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
        <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>
    </ul>
</div> -->
        
<!-- Search & Filter -->
<?php require_once 'elements/search.php' ;?>

<!-- List -->
<?php require_once 'elements/list.php' ;?>

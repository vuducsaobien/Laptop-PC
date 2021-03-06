<?php

// Count Status
$active     = Helper::countStatus($this->Items, 'status', 1);
$inactive   = Helper::countStatus($this->Items, 'status', 0);
$all        = $active + $inactive;

// Search Status Form
$module     = $this->arrParam['module'];
$controller = $this->arrParam['controller'];
$action     = $this->arrParam['action'];
$url        = "index.php?module=$module&controller=$controller&action=$action";

if (!empty($_GET['clear-keyword'])) {
    $_GET['search_value'] = '';
}

echo '<pre>';
print_r($this->arrParam);
echo '</pre>';

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
$selectboxGroupACP	= Helper::cmsSelectbox('filter_group_acp', 'filter_group_acp', 'custom-select custom-select-sm mr-1', $arrGroupACP, $this->arrParam['filter_group_acp'], 'width: unset');

// SELECT BOX STATUS
$arrStatus		    = array('default' => '- Select Status -', '1' => 'Active',  '0' => 'Inactive');
$selectboxStatus	= Helper::cmsSelectbox('filter_status', 'filter_status', 'custom-select custom-select-sm mr-1', $arrStatus, $this->arrParam['filter_status'], 'width: unset');

?>     
                
<!-- Search & Filter -->
<div class="card card-info card-outline">
    
        <div class="card-header">
            <h6 class="card-title">Search & Filter</h6>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
            </div>
        </div>

        <div class="card-body">
            <div class="row justify-content-between">

                <div class="mb-1">
                    <a href="<?= $url ;?>" class="mr-1 btn btn-sm btn-info">All <span class="badge badge-pill badge-light"><?= $all ;?></span></a>
                    <a href="<?= $url ;?>&status=1" class="mr-1 btn btn-sm btn-secondary">Active <span class="badge badge-pill badge-light"><?= $active ;?></span></a>
                    <a href="<?= $url ;?>&status=0" class="mr-1 btn btn-sm btn-secondary">Inactive <span class="badge badge-pill badge-light"><?= $inactive ;?></span></a>
                </div>

                    
                <!-- DUC ADD NEW HTML TAG -->
                <form id="form_filter" name="form_filter" method="post" action="#">  
                    <fieldset id="filter-bar">
                        <div class="mb-1">
                            <?php echo  $selectboxStatus . $selectboxGroupACP;?>
                        </div>
                    </fieldset>
                </form>
                    

            <div class="mb-1">
                <form action="#" method="get">
                    <div class="input-group">

                        <input type="hidden" name="module" value="backend">
                        <input type="hidden" name="controller" value="group">
                        <input type="hidden" name="action" value="index">

                        <input type="text" class="form-control form-control-sm" name="search_value" value="<?= $_GET['search_value'];?>" style="min-width: 300px">
                        
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-sm btn-info" id="btn-search">Search</button>
                            <button type="submit" class="btn btn-sm btn-danger" id="btn-clear-search" name="clear-keyword" value="clear">Clear</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- List -->
<div class="card card-info card-outline">
    <div class="card-header">
        <h4 class="card-title">List</h4>
        <div class="card-tools">
            <a href="#" class="btn btn-tool"><i class="fas fa-sync"></i></a>
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>

    <div class="card-body">
        <!-- Control -->
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-2">
            <div class="mb-1">
                <!-- DUC ADD NEW HTML TAG -->
                <form action="#" method="post" class="table-responsive" id="form-table" name="form-table">
                <?php
                    // SELECT BOX ACTION
                    $arr = $this->arrParam['bulk_action'];
                    $arrAction		    = array('default' => '- Bulk Action -', 'trash' => 'Multi Delete',  'statusactive' => 'Multi Active', 'statusinactive' => 'Multi Inactive');
                    echo $selectboxAction	= Helper::cmsSelectbox('bulk_action', 'bulk_action', 'custom-select custom-select-sm mr-1', $arrAction, $this->arrParam['bulk_action'], 'width: unset');
                    // Button Apply
                    echo $actionBtn  = (!empty($arr)) ? $arr : 'index';

                    $linkApply          = ($actionBtn!='index') ? URL::createLink($module, $controller, $actionBtn, array('type' => '1')) : '';

                    echo $btnApply	        = Helper::cmsButton('Apply', 'bulk-apply', $linkApply, 'submit');
                ?>

                    <!-- <select id="bulk-action" name="bulk-action" class="custom-select custom-select-sm mr-1" style="width: unset">
                        <option value="" selected="">Bulk Action</option>
                        <option value="multi-delete">Multi Delete</option>
                        <option value="multi-active">Multi Active</option>
                        <option value="multi-inactive">Multi Inactive</option>
                    </select>
 -->

                    <!-- <button name="bulk-apply" id="bulk-apply" class="btn btn-sm btn-info">Apply
                        <span class="badge badge-pill badge-danger navbar-badge" style="display: none">
                        </span>
                    </button>
 -->


            </div>

            <a href="group-form.php" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add New</a>
        </div>

        <!-- List Content -->
        <!-- <form action="#" method="post" class="table-responsive" id="form-table" name="form-table"> -->
            <table class="table table-bordered table-hover text-nowrap btn-table mb-0">
                <thead>
                    <tr>
                        <th class="text-center">
                            <div class="custom-control custom-checkbox">
                                <!-- CHECK ALL -->
                                <input class="custom-control-input" type="checkbox" id="check-all" name="check-all">
                                <label for="check-all" class="custom-control-label"></label>
                            </div>
                        </th>

                        <th class="text-center"><?= $lblID ;?></th>
                        <th class="text-center"><?= $lblName ;?></th>
                        <th class="text-center"><?= $lblStatus ;?></th>
                        <th class="text-center"><?= $lblGroupACP ;?></th>
                        <th class="text-center"><?= $lblOrdering ;?></th>
                        <th class="text-center"><?= $lblCreated ;?></th>
                        <th class="text-center"><?= $lblModified ;?></th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
<?php
if(!empty($this->Items)){
    foreach($this->Items as $key => $value){
        $id 		= $value['id'];
        $ckb		= '<input id="checkbox-'.$id.'" name="cid[]" value="'.$id.'" type="checkbox"  class="custom-control-input">
                        <label for="checkbox-'.$id.'" class="custom-control-label"></label>';
        $name		= $value['name'];
        $ordering   = $value['ordering'];
        
        $created	= Helper::formatDate('d-m-Y', $value['created']);
        $createdBy  = $value['created_by'];

        $modified	= Helper::formatDate('d-m-Y', $value['modified']);
        $modifiedBy	= $value['modified_by'];
        $search 	= $_GET['search_value'];

        $linkStatus = URL::createLink('backend', 'group', 'ajaxStatus', ['id' => $id, 'status' => $value['status']]);
        $status	 	= Helper::cmsStatus($value['status'], $linkStatus, $id);
        
        $linkACP    = URL::createLink('backend', 'group', 'ajaxACP', ['id' => $id, 'group_acp' => $value['group_acp']]);
        $group_acp	= Helper::cmsGroupACP($value['group_acp'], $linkACP, $id);
        
        $resultName =  Helper::highLight($search, $value['name']);
        $resultID   = Helper::highLight($search, $value['id']);

        echo '
        <tr>
            <td class="text-center">
                <div class="custom-control custom-checkbox">
                    '.$ckb.'
                </div>
            </td>

            <td class="text-center">'.$resultID.'</td>
            <td class="text-center">'.$resultName.'</td>

            <td class="text-center">
                '.$status.'
            </td>
            
            <td class="text-center position-relative" name="groupA">'.$group_acp.'</td>


            <td class="text-center position-relative">
                <input type="number" name="chkOrdering['.$id.']" 
                value="'.$ordering.'" class="chkOrdering form-control form-control-sm m-auto text-center" style="width: 65px" id="chkOrdering['.$id.']" 
                data-id="'.$id.'" min="1">
            </td>
            
            <td class="text-center">
                <p class="mb-0 history-by"><i class="far fa-user">'.$createdBy.'</i></p>
                <p class="mb-0 history-time"><i class="far fa-clock">'.$created.'</i></p>
            </td>

            <td class="text-center modified-1">
                <p class="mb-0 history-by"><i class="far fa-user">'.$modifiedBy.'</i></p>
                <p class="mb-0 history-time"><i class="far fa-clock">'.$modified.'</i></p>
            </td>

            <td class="text-center">
                <a href="" class="rounded-circle btn btn-sm btn-info" title="Edit">
                    <i class="fas fa-pencil-alt"></i>
                </a>

                <a href="#" class="rounded-circle btn btn-sm btn-danger" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        ';
    }
}
?>
                </tbody>

            </table>
            <div>
                <input type="hidden" name="sort_field" value="">
                <input type="hidden" name="sort_order" value="">
            </div>
        </form>
    </div>

    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item disabled"><a href="" class="page-link"><i class="fas fa-angle-double-left"></i></a></li>
            <li class="page-item disabled"><a href="" class="page-link"><i class="fas fa-angle-left"></i></a></li>
            <li class="page-item active"><a class="page-link">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-double-right"></i></a></li>
        </ul>
    </div>
</div>

<?php
$active = Helper::countStatus($this->Items, 'status', 1);
$inactive = Helper::countStatus($this->Items, 'status', 0);
$all = $active + $inactive;

$module = $this->arrParam['module'];
$controller = $this->arrParam['controller'];
$action = $this->arrParam['action'];

$url = "index.php?module=$module&controller=$controller&action=$action";
echo '<pre>';
print_r($_GET);
echo '</pre>';
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

            <div class="mb-1">
                <select id="filter_groupacp" name="filter_groupacp" class="custom-select custom-select-sm mr-1" style="width: unset">
                    <option value="default" selected="">- Select Group ACP -</option>
                    <option value="false">No</option>
                    <option value="true">Yes</option>
                </select>
            </div>

            <div class="mb-1">
                <form action="">
                    <div class="input-group">

                        <input type="hidden" name="module" value="backend">
                        <input type="hidden" name="controller" value="group">
                        <input type="hidden" name="action" value="index">

                        <input type="text" class="form-control form-control-sm" name="search_value" value="<?= $_GET['search_value'];?>" style="min-width: 300px">
                        
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-sm btn-info" id="btn-search">Search</button>
                            <button type="button" class="btn btn-sm btn-danger" id="btn-clear-search">Clear</button>
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
                <select id="bulk-action" name="bulk-action" class="custom-select custom-select-sm mr-1" style="width: unset">
                    <option value="" selected="">Bulk Action</option>
                    <option value="multi-delete">Multi Delete</option>
                    <option value="multi-active">Multi Active</option>
                    <option value="multi-inactive">Multi Inactive</option>
                </select> <button id="bulk-apply" class="btn btn-sm btn-info">Apply <span class="badge badge-pill badge-danger navbar-badge" style="display: none"></span></button>
            </div>

            <a href="group-form.php" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add New</a>
        </div>

        <!-- List Content -->
        <form action="" method="post" class="table-responsive" id="form-table">
            <table class="table table-bordered table-hover text-nowrap btn-table mb-0">
                <thead>
                    <tr>
                        <th class="text-center">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="check-all">
                                <label for="check-all" class="custom-control-label"></label>
                            </div>
                        </th>

                        <th class="text-center">ID</a></th>
                        <th class="text-center">Name</a></th>
                        <th class="text-center">Status</a></th>
                        <th class="text-center">Group ACP</a></th>
                        <th class="text-center">Ordering</a></th>
                        <th class="text-center">Created</a></th>
                        <th class="text-center">Modified</a></th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!empty($this->Items)){
                            foreach($this->Items as $key => $value){
                                $id 		 = $value['id'];
                                $name		 = $value['name'];
                                $group_acp	 = $value['group_acp'];
                                $ordering    = $value['ordering'];
                                $created  	 = $value['created'];
                                $createdBy   = $value['created_by'];
                                $modified  	 = $value['modified'];
                                $modifiedBy	 = $value['modified_by'];
                                $search 	 = $_GET['search_value'];

                                // $status	 	 = Helper::cmsStatus($value['status'], URL::createLink('admin', 'group', 'ajaxStatus', array('id' => $id, 'status' => $value['status'])), $id);

                                $status	 	 = Helper::cmsGroupACP($value['status'], URL::createLink('admin', 'group', 'ajaxStatus', array('id' => $id, 'status' => $value['status'])), $id);
                                $group_acp	 = Helper::cmsGroupACP($value['group_acp'], URL::createLink('admin', 'group', 'ajaxACP', array('id' => $id, 'group_acp' => $value['group_acp'])), $id);

                                
                                $resultName  =  Helper::highLight($search, $value['name']);
                                $resultID    = Helper::highLight($search, $value['id']);

                                echo '
                                <tr>
                                    <td class="text-center">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" type="checkbox" id="checkbox-'.$id.'" name="checkbox[]" value="'.$id.'">
                                            <label for="checkbox-'.$id.'" class="custom-control-label"></label>
                                        </div>
                                    </td>

                                    <td class="text-center">'.$resultID.'</td>
                                    <td class="text-center">'.$resultName.'</td>

                                    <td class="text-center">
                                        '.$status.'
                                    </td>
                                    
                                    <td class="text-center position-relative">'.$group_acp.'</td>


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

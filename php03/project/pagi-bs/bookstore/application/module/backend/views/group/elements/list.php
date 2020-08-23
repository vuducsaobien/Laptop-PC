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

        <!-- DUC ADD NEW HTML TAG -->
        <form action="#" method="post" class="table-responsive" id="form-table" name="form-table">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-2">
                <div class="mb-1">
                    <?php
                        // SELECT BOX ACTION
                        $newAction = $this->arrParam['bulk_action'];

                        $arrAction		        = array('default' => '- Bulk Action -', 'multi-delete' => 'Multi Delete',  'multi-active' => 'Multi Active', 'multi-inactive' => 'Multi Inactive');
                        echo $selectboxAction	= Helper::cmsSelectbox($arrAction, $newAction, 'width: unset', 'bulk-action', 'custom-select custom-select-sm mr-1');

                        // Button Apply
                        $linkApply              = URL::createLink($module, $controller, $newAction, array('type' => '1'));
                        echo $btnApply	        = Helper::cmsButton('Apply', 'bulk-apply', $linkApply, 'submit');
                    ?>
                </div>
                <a href="group-form.php" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add New</a>
            </div>

            <!-- List Content -->
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
                        $search 	 = $_GET['search_value'];

                        foreach($this->Items as $key => $value){
                            $id 		 = $value['id'];
                            $ckb		 = '<input id="checkbox-'.$id.'" name="cid[]" value="'.$id.'" type="checkbox"  class="custom-control-input">
                                            <label for="checkbox-'.$id.'" class="custom-control-label"></label>';
                            $name		 = $value['name'];
                            $ordering    = $value['ordering'];
                            
                            $created	 = Helper::formatDate('d-m-Y', $value['created']);
                            $createdBy   = $value['created_by'];
                            $modified	 = Helper::formatDate('d-m-Y', $value['modified']);
                            $modifiedBy	 = $value['modified_by'];

                            $linkStatus  = URL::createLink($module, $controller, 'ajaxStatus', ['id' => $id, 'status' => $value['status']]);
                            $status	 	 = Helper::cmsAjax('status', $value['status'], $linkStatus , $id);
                            
                            $linkACP     = URL::createLink($module, $controller, 'ajaxACP', ['id' => $id, 'group_acp' => $value['group_acp']]);
                            $group_acp	 = Helper::cmsAjax('group-acp', $value['group_acp'], $linkACP, $id);
                            
                            $resultName  = Helper::highLight($search, $value['name']);
                            $resultID    = Helper::highLight($search, $value['id']);
                            
                        echo '<tr>
                                <td class="text-center">
                                    <div class="custom-control custom-checkbox">
                                        '.$ckb.'
                                    </div>
                                </td>
                                <td class="text-center">'.$resultID.'</td>
                                <td class="text-center">'.$resultName.'</td>
                                <td class="text-center">'.$status.'</td>
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
                            </tr>';
                        }
                    }
                    ?>
                </tbody>

            </table>
            <div>
                <input type="hidden" name="sort_field" value="">
                <input type="hidden" name="page" value="">

                <input type="hidden" name="sort_order" value="">
            </div>
        </form>
    </div>

    <div class="card-footer clearfix">
        <?= $paginationHTML ;?>
    </div>
</div>

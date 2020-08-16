<?php 
	// include_once 'toolbar/index.php';
	// include_once 'submenu/index.php';

	// COLUMN
	// $columnPost		= $this->arrParam['filter_column'];
	// $orderPost		= $this->arrParam['filter_column_dir'];
	// $lblName 		= Helper::cmsLinkSort('Name', 'name', $columnPost, $orderPost);
	// $lblStatus		= Helper::cmsLinkSort('Status', 'status', $columnPost, $orderPost);
	// $lblGroupACP	= Helper::cmsLinkSort('Group ACP', 'group_acp', $columnPost, $orderPost);
	// $lblOrdering	= Helper::cmsLinkSort('Ordering', 'ordering', $columnPost, $orderPost);
	// $lblCreated		= Helper::cmsLinkSort('Created', 'created', $columnPost, $orderPost);
	// $lblCreatedBy	= Helper::cmsLinkSort('Created By', 'created_by', $columnPost, $orderPost);
	// $lblModified	= Helper::cmsLinkSort('Modified', 'modified', $columnPost, $orderPost);
	// $lblModifiedBy	= Helper::cmsLinkSort('Modified By', 'modified_by', $columnPost, $orderPost);
	// $lblID			= Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);
$countActive = Helper::countStatus($this->Items, 'status', 1);
$countInactive = Helper::countStatus($this->Items, 'status', 0);
$all = $countActive + $countInactive;

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
		<div class="row">
			<div class="col-sm-12 col-md-6 mb-1">
				<a href="#" class="mr-1 btn btn-sm btn-info">All <span class="badge badge-pill badge-light"><?= $all ;?></span></a>
				<a href="#" class="mr-1 btn btn-sm btn-secondary">Active <span class="badge badge-pill badge-light"><?= $countActive ;?></span></a>
				<a href="#" class="mr-1 btn btn-sm btn-secondary">Inactive <span class="badge badge-pill badge-light"><?= $countInactive ;?></span></a>
			</div>

			<div class="col-sm-12 col-md-6 mb-1 text-right">
				<div class="input-group">
					<div class="input-group-prepend input-group-sm">
						<select class="custom-select select-search-field" style="width: unset">
							<option value="all">Search by All</option>
							<option value="id">Search by ID</option>
							<option value="name">Search by Name</option>
						</select>
					</div>

					<input type="text" class="form-control form-control-sm" name="search_value" value="">
					<div class="input-group-append">
						<button type="button" class="btn btn-sm btn-info" id="btn-search">Search</button>
						<button type="button" class="btn btn-sm btn-danger" id="btn-clear-search">Clear</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- List -->
<div class="card card-info card-outline">
	<div class="card-header">
		<h4 class="card-title">List</h4>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fas fa-minus"></i></button>
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

			<div class="mb-1">
				<select id="filter_groupacp" name="filter_groupacp" class="custom-select custom-select-sm mr-1" style="width: unset">
					<option value="default" selected="">- Group ACP -</option>
					<option value="false">No</option>
					<option value="true">Yes</option>
				</select>
			</div>

			<div class="mb-1">
				<a href="form.php" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Add New</a>
				<a href="#" class="btn btn-sm btn-info"><i class="fas fa-sync"></i> Reload</a>
			</div>
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

						<th class="text-center"><a href="javascript:sortList('id', 'desc')">ID</a></th>
						<th class="text-center"><a href="javascript:sortList('name', 'desc')">Name</a></th>
						<th class="text-center"><a href="javascript:sortList('status', 'desc')">Status</a></th>
						<th class="text-center"><a href="javascript:sortList('group_acp', 'desc')">Group ACP</a></th>
						<th class="text-center"><a href="javascript:sortList('ordering', 'desc')">Ordering</a></th>
						<th class="text-center"><a href="javascript:sortList('created', 'desc')">Created</a></th>
						<th class="text-center"><a href="javascript:sortList('modified', 'desc')">Modified</a></th>
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


							// SELECT BOX STATUS
							// $classStatus = '';
							// if($status==1){
							// 	$classStatus = 'success';
							// } else {
							// 	$classStatus = 'danger';
							// }			
							// $arrStatus			= array(1 => 'Active',  0 => 'Inactive');
							// echo $selectboxStatus	= Helper::cmsSelectbox('filter_state', 'custom-select custom-select-sm text-white bg-'.$classStatus.'', $arrStatus, $status, 'width: unset');

							$status	 = Helper::cmsStatus($value['status'], URL::createLink('admin', 'group', 'ajaxACP', array('id' => $id, 'status' => $value['status'])), $id);
							$group_acp	 = Helper::cmsGroupACP($value['group_acp'], URL::createLink('admin', 'group', 'ajaxACP', array('id' => $id, 'group_acp' => $value['group_acp'])), $id);

							echo '
							<tr>
								<td class="text-center">
									<div class="custom-control custom-checkbox">
										<input class="custom-control-input" type="checkbox" id="checkbox-'.$id.'" name="checkbox[]" value="'.$id.'">
										<label for="checkbox-'.$id.'" class="custom-control-label"></label>
									</div>
								</td>

								<td class="text-center">'.$id.'</td>
								<td class="text-center">'.$name.'</td>

								<td class="text-center">
									'.$status.'
								</td>
								
								<td class="text-center position-relative">'.$group_acp.'</td>


								<td class="text-center position-relative"><input type="number" name="chkOrdering['.$id.']" 
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

	<!-- PAGINATION -->
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


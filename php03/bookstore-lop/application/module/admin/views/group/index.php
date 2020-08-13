<?php 
	// include_once 'toolbar/index.php';
	// include_once 'submenu/index.php';

	// COLUMN
	$columnPost		= $this->arrParam['filter_column'];
	$orderPost		= $this->arrParam['filter_column_dir'];
	$lblName 		= Helper::cmsLinkSort('Name', 'name', $columnPost, $orderPost);
	$lblStatus		= Helper::cmsLinkSort('Status', 'status', $columnPost, $orderPost);
	$lblGroupACP	= Helper::cmsLinkSort('Group ACP', 'group_acp', $columnPost, $orderPost);
	$lblOrdering	= Helper::cmsLinkSort('Ordering', 'ordering', $columnPost, $orderPost);
	$lblCreated		= Helper::cmsLinkSort('Created', 'created', $columnPost, $orderPost);
	$lblCreatedBy	= Helper::cmsLinkSort('Created By', 'created_by', $columnPost, $orderPost);
	$lblModified	= Helper::cmsLinkSort('Modified', 'modified', $columnPost, $orderPost);
	$lblModifiedBy	= Helper::cmsLinkSort('Modified By', 'modified_by', $columnPost, $orderPost);
	$lblID			= Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);

	// $selectboxStatus	= Helper::cmsSelectbox('filter_state', 'inputbox', $arrStatus, $this->arrParam['filter_state'], 'width: unset');
	echo '<pre>';
	print_r($this->Items);
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
		<div class="row">
			<div class="col-sm-12 col-md-6 mb-1">
				<a href="#" class="mr-1 btn btn-sm btn-info">All <span class="badge badge-pill badge-light">15</span></a>
				<a href="#" class="mr-1 btn btn-sm btn-secondary">Active <span class="badge badge-pill badge-light">7</span></a>
				<a href="#" class="mr-1 btn btn-sm btn-secondary">Inactive <span class="badge badge-pill badge-light">8</span></a>
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
						<button type="button" class="btn btn-sm btn-danger" id="btn-clear-search">Clear</button>
						<button type="button" class="btn btn-sm btn-info" id="btn-search">Search</button>
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
						<th class="text-center"><a href="javascript:sortList('name', 'desc')">NAME</a></th>
						<th class="text-center"><a href="javascript:sortList('status', 'desc')"><?= $lblStatus; ?></a></th>
						<th class="text-center"><a href="javascript:sortList('group_acp', 'desc')"><?= $lblGroupACP; ?></a></th>
						<th class="text-center"><a href="javascript:sortList('ordering', 'desc')"><?= $lblOrdering; ?></a></th>
						<th class="text-center"><a href="javascript:sortList('created', 'desc')"><?= $lblCreated; ?></a></th>
						<th class="text-center"><a href="javascript:sortList('modified', 'desc')"><?= $lblModified; ?></a></th>
						<th class="text-center">Action</th>
					</tr>
				</thead>
				
				<tbody>
<?php
if(!empty($this->Items)){
	foreach($this->Items as $key => $value){
		
		// <td class="text-center">
		// 	<select style="width: unset" class="custom-select custom-select-sm text-white bg-success">
		// 		<option value="" >Active</option>
		// 		<option value="" selected="selected">Inactive</option>
		// 	</select>
		// </td>

		// <td class="text-center position-relative">
		// 	<a href="#" class="my-btn-state rounded-circle btn btn-sm btn-success">
		// 		<i class="fas fa-check"></i>
		// 	</a>
		// </td>


		$id 		= $value['id'];
		$name		= $value['name'];
		$status		= $value['status'];
		$group_acp	= $value['group_acp'];
		$ordering   = $value['ordering'];
		$createdBy  = $value['createdBy'];

		$classStatus = '';
		$group_acp	= Helper::cmsGroupACP($value['group_acp'], URL::createLink('admin', 'group', 'ajaxACP', array('id' => $id, 'group_acp' => $value['group_acp'])), $id);


		if($status==1){
			$classStatus = 'success';
		} else {
			$classStatus = 'danger';
		}			
		$arrStatus			= array(1 => 'Active',  0 => 'Inactive');
		$selectboxStatus	= Helper::cmsSelectbox('filter_state', 'custom-select custom-select-sm text-white bg-'.$classStatus.'', $arrStatus, $status, 'width: unset');


		if($$group_acp==1){
			$classACP = 'success';
			$iClass	  = 'fas fa-check';
		} else {
			$classACP = 'danger';
			$iClass	  = 'fas fa-minus';
		}			
		$arrStatus			= array(1 => 'Active',  0 => 'Inactive');
		$selectboxStatus	= Helper::cmsSelectbox('filter_state', 'custom-select custom-select-sm text-white bg-'.$classStatus.'', $arrStatus, $status, 'width: unset');

		// $status		= Helper::cmsStatus($value['status'], URL::createLink('admin', 'group', 'ajaxStatus', array('id' => $id, 'status' => $value['status'])), $id);
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
				'.$selectboxStatus.'
			</td>
			
			<td class="text-center position-relative">'.$group_acp.'</td>
			





			<td class="text-center position-relative"><input type="number" name="chkOrdering['.$id.']" 
				value="'.$ordering.'" class="chkOrdering form-control form-control-sm m-auto text-center" style="width: 65px" id="chkOrdering['.$id.']" 
				data-id="'.$id.'" min="1">
			</td>
			
			<td class="text-center">
				<p class="mb-0 history-by"><i class="far fa-user">'.$createdBy.'</i></p>
				<p class="mb-0 history-time"><i class="far fa-clock"> B</i></p>
			</td>

			<td class="text-center modified-1">
				<p class="mb-0 history-by"><i class="far fa-user"></i></p>
				<p class="mb-0 history-time"><i class="far fa-clock"></i></p>
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

					<!-- <tr>

						<td class="text-center position-relative"><a href="#" class="my-btn-state rounded-circle btn btn-sm btn-success"><i class="fas fa-check"></i></a></td>
						<td class="text-center position-relative"><input type="number" name="chkOrdering[2]" value="2" 
						class="chkOrdering form-control form-control-sm m-auto text-center" 
						style="width: 65px" id="chkOrdering[2]" data-id="2" min="1"></td>
						
						<td class="text-center">
							<p class="mb-0 history-by"><i class="far fa-user"></i> admin</p>
							<p class="mb-0 history-time"><i class="far fa-clock"></i> 15/07/2020 10:15:43</p>
						</td>

						<td class="text-center modified-2">
							<p class="mb-0 history-by"><i class="far fa-user"></i> admin</p>
							<p class="mb-0 history-time"><i class="far fa-clock"></i> 18/07/2020 03:01:45</p>
						</td>

						<td class="text-center">
							<a href="#" class="rounded-circle btn btn-sm btn-info" title="Edit">
								<i class="fas fa-pencil-alt"></i>
							</a>

							<a href="#" class="rounded-circle btn btn-sm btn-danger" title="Delete">
								<i class="fas fa-trash-alt"></i>
							</a>
						</td>
					</tr>

					<tr>
						<td class="text-center">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input" type="checkbox" id="checkbox-3" name="checkbox[]" value="3">
								<label for="checkbox-3" class="custom-control-label"></label>
							</div>
						</td>
						<td class="text-center">3</td>
						<td class="text-center">Member</td>
						<td class="text-center">
							<select style="width: unset" class="custom-select custom-select-sm text-white bg-success">
								<option value="" selected="">Active</option>
								<option value="">Inactive</option>
							</select></td>
						<td class="text-center position-relative"><a href="#" class="my-btn-state rounded-circle btn btn-sm btn-danger"><i class="fas fa-minus"></i></a></td>
						
						<td class="text-center position-relative"><input type="number" name="chkOrdering[3]" value="3" 
						class="chkOrdering form-control form-control-sm m-auto text-center" 
						style="width: 65px" id="chkOrdering[3]" data-id="3" min="1"></td>
						
						<td class="text-center">
							<p class="mb-0 history-by"><i class="far fa-user"></i> admin</p>
							<p class="mb-0 history-time"><i class="far fa-clock"></i> 15/07/2020 10:16:02</p>
						</td>
						<td class="text-center modified-3">
							<p class="mb-0 history-by"><i class="far fa-user"></i> manager01</p>
							<p class="mb-0 history-time"><i class="far fa-clock"></i> 18/07/2020 15:18:44</p>
						</td>
						<td class="text-center">
							<a href="#" class="rounded-circle btn btn-sm btn-info" title="Edit">
								<i class="fas fa-pencil-alt"></i>
							</a>

							<a href="#" class="rounded-circle btn btn-sm btn-danger" title="Delete">
								<i class="fas fa-trash-alt"></i>
							</a>
						</td>
					</tr>

					<tr>
						<td class="text-center">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input" type="checkbox" id="checkbox-4" name="checkbox[]" value="4">
								<label for="checkbox-4" class="custom-control-label"></label>
							</div>
						</td>
						<td class="text-center">4</td>
						<td class="text-center">Register</td>
						<td class="text-center">
							<select style="width: unset" class="custom-select custom-select-sm text-white bg-warning">
								<option value="">Active</option>
								<option value="" selected>Inactive</option>
							</select></td>
						<td class="text-center position-relative"><a href="#" class="my-btn-state rounded-circle btn btn-sm btn-danger"><i class="fas fa-minus"></i></a></td>
						<td class="text-center position-relative"><input type="number" name="chkOrdering[4]" value="4" class="chkOrdering form-control form-control-sm m-auto text-center" style="width: 65px" id="chkOrdering[4]" data-id="4" min="1"></td>
						<td class="text-center">
							<p class="mb-0 history-by"><i class="far fa-user"></i> admin</p>
							<p class="mb-0 history-time"><i class="far fa-clock"></i> 15/07/2020 10:16:24</p>
						</td>
						<td class="text-center modified-4">
							<p class="mb-0 history-by"><i class="far fa-user"></i> admin</p>
							<p class="mb-0 history-time"><i class="far fa-clock"></i> 18/07/2020 17:25:02</p>
						</td>
						<td class="text-center">
							<a href="#" class="rounded-circle btn btn-sm btn-info" title="Edit">
								<i class="fas fa-pencil-alt"></i>
							</a>

							<a href="#" class="rounded-circle btn btn-sm btn-danger" title="Delete">
								<i class="fas fa-trash-alt"></i>
							</a>
						</td>
					</tr> -->
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


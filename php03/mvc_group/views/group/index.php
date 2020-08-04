<?php
	echo '<pre>';
	print_r($_GET);
	echo '</pre>';

	echo '<pre>';
	print_r($_POST);
	echo '</pre>';
	Session::init();

	if($_POST!=null){

		$searchName = $_POST['searchName'];
		$searchID 	= $_POST['searchID'];
		$clear  = $_POST['clear'];

		if($searchName!=null) Session::set('searchName', $searchName);
		if($searchID!=null) Session::set('searchID', $searchID);

		// if($clear!=null){
		// 	Session::destroy();
		// 	header('location: index.php?controller=group&action=index');
		// }
	}


	if(!empty($this->items)){
		foreach($this->items as $value){
			$id		= $value['id'];

			$status = Helper::showIconStatus($value['status']);
			$xhtml .= '<div class="row" id="item-'.$id.'">
							<p class="w-10"><input type="checkbox" name="checkbox[]" value="'.$id.'"/></p>
							<p>'.$value['name'].'</p>
							<p class="w-10">'.$id.'</p>
							<p class="w-10">'.$status.'</p>
							<p class="w-10">'.$value['ordering'].'</p>
							<p class="w-10">'.$value['total'].'</p>
							<p class="w-10 action">
								<a href="#">Edit</a> |
								<a href="javascript:deleteItem('.$id.')">Delete</a> 
							</p>
						</div>';
		}
		$count = Helper::countStatus($this->items);
	} 
?>

<div class="content">
	<h4><?= $count  ?></h4>

	<div id="dialog-confirm" title="Thông báo!" style="display: none;">
  		<p>Bạn có chắc muốn xóa phần tử này hay không?</p>
	</div>

	<form action="#" method="post" name="form-search" id="form">
		<p class="no"><input type="text" name="searchName" placeholder="Type Name Here"/></p>
		<p class="no"><input type="text" name="searchID" placeholder="Type ID Here"/></p>

		<input type="submit" value="Search" />
		<input type="submit" name="clear" value="Clear" />
	</from>

	<div class="list">
		<div class="row head">
			<p class="w-10"><input type="checkbox" name="check-all" id="check-all"/></p>
			<p>Group Name</p>
			<p class="w-10">ID</p>
			<p class="w-10">Status</p>
			<p class="w-10">Ordering</p>
			<p class="w-10">Member</p>
			<p class="w-10 action">Action</p>
		</div>
		<?php echo $xhtml;?>
	</div>
</div>
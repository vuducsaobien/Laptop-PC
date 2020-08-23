function changeStatus(url){
	$.get(url, function(data){
		// console.log(data);
		var element		= 'a#status-' + data['id'];
		// var element		= 'a#'+data['type']+'-' + data['id'];

		var classRemove = 'fas fa-check';
		var classAdd 	= 'fas fa-minus';

		var classRemoveTwo = 'my-btn-state rounded-circle btn btn-sm btn-success';
		var classAddTwo 	= 'my-btn-state rounded-circle btn btn-sm btn-danger';

		if(data['status']==1){
			classRemove = 'fas fa-minus';
			classAdd 	= 'fas fa-check';

			classRemoveTwo = 'my-btn-state rounded-circle btn btn-sm btn-danger';
			classAddTwo 	= 'my-btn-state rounded-circle btn btn-sm btn-success';
		}
		$(element).attr('href', "javascript:changeStatus('"+data['link']+"')").removeClass(classRemoveTwo).addClass(classAddTwo);
		$(element + ' i').removeClass(classRemove).addClass(classAdd);
	}, 'json');
// });
}

function changeGroupACP(url){
	$.get(url, function(data){
		console.log(data);

		var element		 = 'a#group-acp-' + data['id'];
		var classRemove  = 'fas fa-check';
		var classAdd 	 = 'fas fa-minus';

		var classRemoveTwo = 'my-btn-state rounded-circle btn btn-sm btn-success';
		var classAddTwo 	 = 'my-btn-state rounded-circle btn btn-sm btn-danger';

		if(data['group_acp']==1){
			classRemove  = 'fas fa-minus';
			classAdd 	 = 'fas fa-check';

			classRemoveTwo = 'my-btn-state rounded-circle btn btn-sm btn-danger';
			classAddTwo 	 = 'my-btn-state rounded-circle btn btn-sm btn-success';
		}
		$(element).attr('href', "javascript:changeGroupACP('"+data['link']+"')").removeClass(classRemoveTwo).addClass(classAddTwo);
		$(element + ' i').removeClass(classRemove).addClass(classAdd);
	}, 'json');
}

function sortList(column, order){
	$('input[name=sort_field]').val(column);
	$('input[name=sort_order]').val(order);
	$('#form-table').submit();
}

function changePage(page){
	$('input[name=page]').val(page);
	$('#form-table').submit();
}


$(document).ready(function(){

	$('input[name=check-all]').change(function(){
		var checkStatus = this.checked;
		$('#form-table').find(':checkbox').each(function(){
			this.checked = checkStatus;
		});
	})
	
	// Search & Clear
	// $('#filter-bar button[name=submit-keyword]').click(function(){
	// 	$('#form-table').submit();
	// })
	
	// $('#filter-bar button[name=clear-keyword]').click(function(){
	// 	$('#filter-bar input[name=search_value]').val('');
	// 	$('#form-table').submit();
	// })

	$('#filter-bar select[name=filter_status]').change(function(){
		$('#form_filter').submit();
	})
	
	$('#filter-bar select[name=filter_group_acp]').change(function(){
		$('#form_filter').submit();
	})

});

function submitForm(url){
	var action = $('#bulk-action').val()
	console.log(action);
	var link = 'index.php?module=backend&controller=group&action=';
	switch (action){
		case 'multi-delete':
			link += 'trash';
			break;
		case 'multi-active':
			link += 'status&type=1';
			break;
		case 'multi-inactive':
			link += 'status&type=0';
			break;
	}
	$('#form-table').attr('action', link);
	$('#form-table').submit();
}



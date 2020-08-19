function changeStatus(url){
	$.get(url, function(data){
		var element		= 'a#status-' + data['id'];
		var classRemove = 'fas fa-check';
		var classAdd 	= 'fas fa-minus';

		var classRemoveA = 'my-btn-state rounded-circle btn btn-sm btn-success';
		var classAddA 	= 'my-btn-state rounded-circle btn btn-sm btn-danger';

		if(data['status']==1){
			classRemove = 'fas fa-minus';
			classAdd 	= 'fas fa-check';

			classRemoveA = 'my-btn-state rounded-circle btn btn-sm btn-danger';
			classAddA 	= 'my-btn-state rounded-circle btn btn-sm btn-success';
		}
		$(element).attr('href', "javascript:changeStatus('"+data['link']+"')").removeClass(classRemoveA).addClass(classAddA);
		$(element + ' i').removeClass(classRemove).addClass(classAdd);
	}, 'json');
}

function changeGroupACP(url){
	$.get(url, function(data){
		var element		 = 'a#group-acp-' + data['id'];
		var classRemove  = 'fas fa-check';
		var classAdd 	 = 'fas fa-minus';

		var classRemoveA = 'my-btn-state rounded-circle btn btn-sm btn-success';
		var classAddA 	 = 'my-btn-state rounded-circle btn btn-sm btn-danger';

		if(data['group_acp']==1){
			classRemove  = 'fas fa-minus';
			classAdd 	 = 'fas fa-check';

			classRemoveA = 'my-btn-state rounded-circle btn btn-sm btn-danger';
			classAddA 	 = 'my-btn-state rounded-circle btn btn-sm btn-success';
		}
		$(element).attr('href', "javascript:changeGroupACP('"+data['link']+"')").removeClass(classRemoveA).addClass(classAddA);
		$(element + ' i').removeClass(classRemove).addClass(classAdd);
	}, 'json');
}

// CMS Button
function submitForm(url){
	$('#form-apply').attr('action', url);
	console.log(url);
	$('#form-apply').submit();
	$('#form-table').submit();
}

function sortList(column, order){
	$('input[name=sort_field]').val(column);
	$('input[name=sort_order]').val(order);
	$('#form-table').submit();
}

// function changePage(page){
// 	$('input[name=filter_page]').val(page);
// 	$('#form-table').submit();
// }


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
})

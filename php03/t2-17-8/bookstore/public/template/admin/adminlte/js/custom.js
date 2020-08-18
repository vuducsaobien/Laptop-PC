function changeStatus(url){
	$.get(url, function(data){
		var element		= 'a#status-' + data[0];
		var classRemove = 'check';
		var classAdd 	= 'minus';
		console.log(data);
		if(data['status']==1){
			classRemove = 'minus';
			classAdd 	= 'check';
		}
		$(element).attr('href', "javascript:changeStatus('"+data[2]+"')");
		$(element + ' i').removeClass(classRemove).addClass(classAdd);
	}, 'json');
}

// function changeGroupACP(url){
	
// 	$.get(url, function(data){
// 		var element		= 'a#group-acp-' + data['id'];
// 		var classRemove = 'success';
// 		var classAdd 	= 'danger';
// 		if(data['group_acp']==1){
// 			classRemove = 'success';
// 			classAdd 	= 'danger';
// 		}
// 		$(element).attr('href', "javascript:changeGroupACP('"+data['link']+"')");
// 		$(element + ' span').removeClass(classRemove).addClass(classAdd);
// 	}, 'json');
// }


// function submitForm(url){
// 	$('#form-table').attr('action', url);
// 	$('#form-table').submit();
// }

// function sortList(column, order){
// 	$('input[name=filter_column]').val(column);
// 	$('input[name=filter_column_dir]').val(order);
// 	$('#form-table').submit();
// }

// function changePage(page){
// 	$('input[name=filter_page]').val(page);
// 	$('#form-table').submit();
// }


// $(document).ready(function(){
// 	$('input[name=checkall-toggle]').change(function(){
// 		var checkStatus = this.checked;
// 		$('#form-table').find(':checkbox').each(function(){
// 			this.checked = checkStatus;
// 		});
// 	})
	
// 	$('#filter-bar button[name=submit-keyword]').click(function(){
// 		$('#form-table').submit();
// 	})
	
// 	$('#filter-bar button[name=clear-keyword]').click(function(){
// 		$('#filter-bar input[name=filter_search]').val('');
// 		$('#form-table').submit();
// 	})
	
// 	$('#filter-bar select[name=filter_state]').change(function(){
// 		$('#form-table').submit();
// 	})
	
// 	$('#filter-bar select[name=filter_group_acp]').change(function(){
// 		$('#form-table').submit();
// 	})
// })

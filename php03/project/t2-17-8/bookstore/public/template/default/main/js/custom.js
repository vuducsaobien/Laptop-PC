function getUrlVar(key){
	var result = new RegExp(key + "=([^&]*)", "i").exec(window.location.search); 
	return result && unescape(result[1]) || ""; 
}

function submitForm(url){
	$('#adminForm').attr('action', url);
	$('#adminForm').submit();
}

function showRelateBooks(link){
	$("div#tab2").css('display','block');
	$("div#tab1").css('display','none');
	$("a.tab1").removeClass('active');
	$("a.tab2").addClass('active');
	
	console.log(link);
	
	$("div#tab2").load(link);
	
	return false;
}

$(document).ready(function(){
//	var controller 	= (getUrlVar('controller') == '' ) ? 'index' : getUrlVar('controller');
//	var action 		= (getUrlVar('action') == '' ) ? 'index' : getUrlVar('action');
//	var classSelect = controller + '-' + action;
//	$('#menu ul li.' + classSelect).addClass('selected');
	
	$("a#single_image").fancybox();
	
	$("a.tab1").click(function(e){
		$("div#tab1").css('display','block');
		$("div#tab2").css('display','none');
		$("a.tab2").removeClass('active');
		$("a.tab1").addClass('active');
		return false;
	});
});
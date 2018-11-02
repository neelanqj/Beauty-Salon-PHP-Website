
$(document).ready(function(){	
	
	$(".service").click(function(){
		var sID = $(this).attr('id');
		$('.details').fadeOut();
		$('#details-' + sID).fadeIn();
		$('#mobileshadow').fadeIn();
	})
	
	$(".close-btn").click(function(){
		var sID = $(this).parent().parent().attr('id');
		$('#'+sID).fadeOut();
		$('#mobileshadow').fadeOut();
	});
});
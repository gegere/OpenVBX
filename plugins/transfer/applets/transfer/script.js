$(function(){
	$('.subflow-applet input[type="radio"]').live('click', function(event) {
		var tr = $(this).closest('tr');
		
		tr.closest('table').find('tr').each(function (index, element) {
			// Set the others to off
			$(element).removeClass('on').addClass('off');
		});
		
		tr.addClass('on').removeClass('off');
	});
});

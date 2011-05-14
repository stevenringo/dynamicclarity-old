(function($) {  

	$('.options_tabs li a').live('click', function() {
		var classTab = $(this).attr('class') + '-options';
		
		$('.options_tabs li.selected').removeClass('selected');
		$(this).parent().addClass('selected');
	
		$('.shown').removeClass('shown').addClass('hidden');
		$('.' + classTab).removeClass('hidden').addClass('shown');
		
		return false;
	});
	
	$('.select:not(.categories, .pages)').live('change', function() {
		var val = $(this).val();
		if (val == '') {
			val = '-- Choose One --';
		}
		
		$(this).parent().find('span').text(val);
	});
	
	$('.categories option, .pages option').live('click', function() {
		var val = $(this).text();
		
		$(this).parent().parent().find('span').text(val);
	});

	
})(jQuery);
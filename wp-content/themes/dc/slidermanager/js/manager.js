jQuery(document).ready(function($) {
	
	// calls appendo
	$('#content').appendo({
		allowDelete: false,
		labelAdd: 'Add New Slide',
		buttonStyle: {},
		subSelect: '.slide:last'
	});
	
	// slide delete button
	$('#manager_form .slide .remove_slide').live('click', function() {
		if($('#manager_form_wrap .slide').size() == 1) {
			alert('Sorry, you need at least one slide');	
		}
		else {
			$(this).parent().parent().parent().parent().fadeOut(300, function() {
				$(this).remove();	
			})	
		}
		return false;
	});
	
	// jQuery UI sortable
	$("#content").sortable({
			placeholder: 'slide-highlight'
	});
	
	$('.slide-edit').live('click', function() {
		$(this).parent().parent().parent().parent().find('.slide-settings').slideToggle(200);
		return false;
	});
	
	$('.link-type-column .select').live('change', function() {
		var val = $(this).val();
		console.log(val);
		if (val == 'None') {
			$('.link-page, .link-custom, .link-post, .link-portfolio').hide();
		}
		
		if (val == 'Page') {
			$('.link-custom').hide();
			$('.link-post').hide();
			$('.link-portfolio').hide();
			$('.link-page').show();
		}
		
		if (val == 'Post') {
			$('.link-custom').hide();
			$('.link-page').hide();
			$('.link-portfolio').hide();
			$('.link-post').show();
		}
		
		if (val == 'Portfolio Item') {
			$('.link-custom').hide();
			$('.link-page').hide();
			$('.link-post').hide();
			$('.link-portfolio').show();
		}
		
		if (val == 'Custom Link') {
			$('.link-post').hide();
			$('.link-page').hide();
			$('.link-portfolio').hide();
			$('.link-custom').show();
		}
		
		$(this).parent().find('span').text(val);
	});
	
	$('.categories option, .pages option, .posts option, .portfolios option').live('click', function() {
		var val = $(this).text();
		
		$(this).parent().parent().find('span').text(val);
	});
	
	$('.help a').live('mouseover mouseout', function(event) {
	  if (event.type == 'mouseover') {
	    // do something on mouseover
		var x = this.offsetLeft;
		var y = this.offsetTop;
		
		var text = $(this).attr('rel');
		
		$tooltip = $('<div />').addClass('tooltip').css({
			'position' : 'absolute',
			'top' : (y - 80),
			'left' : (x - 10),
			'display' : 'none'
		});
		$tooltipBody = $('<div />').addClass('tooltip-body').text(text);
		$tooltipArrow = $('<div />').addClass('tooltip-arrow');
		
		$tooltip.append($tooltipBody).append($tooltipArrow);
		$('body').append($tooltip);
		$tooltip.fadeIn(250);
	  } else {
	    // do something on mouseout
		$('.tooltip').fadeOut(250, function() {
			$(this).remove();
		});
	  }
	});
	
	
});
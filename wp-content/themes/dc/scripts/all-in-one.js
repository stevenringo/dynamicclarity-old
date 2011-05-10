// JavaScript Document
(function($) {
// Superfish menu
$(document).ready(function(){
	
	// Clone applications to get a second collection
	var $data = $(".portfolio-content-1, .portfolio-content-3").clone();
	
	//NOTE: Only filter on the main portfolio page, not on the subcategory pages
	$('.portfolio-main-1 li, .portfolio-main-3 li').click(function(e) {
		$(".filter li").removeClass("active");	
		// Use the last category class as the category to filter by. This means that multiple categories are not supported (yet)
		var filterClass=$(this).attr('class').split(' ').slice(-1)[0];
		
		if (filterClass == 'all-projects') {
			var $filteredData = $data.find('.project');
		} else {
			var $filteredData = $data.find('.project[data-type*=' + filterClass + ']');
		}

		$(".portfolio-content-1, .portfolio-content-3").quicksand($filteredData, {
			duration: 800,
			easing: 'swing',
		}, function() {
			$("#content a img, ul#slide-pager li").hover(function() {
   	 		$(this).stop().animate({ backgroundColor: "#d0d0d0"}, 400);
    		},function() {
			$(this).stop().animate({ backgroundColor: "#f2f2f2" }, 400);
			});
			
			$("a.btn, .tag-list li a, .page-list li a").hover(function() {
   	 		$(this).stop().animate({ backgroundColor: "#d02624"}, 400);
    		},function() {
			$(this).stop().animate({ backgroundColor: "#f2f2f2" }, 400);
			});
			
			$("a[rel='colorbox']").colorbox({transition:"elastic"});
			
		});
		$(this).addClass("active"); 			
		return false;
	});
	
    $('ul.sf-menu').superfish({ 
            delay:       800,                            // one second delay on mouseout 
            animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
            speed:       'fast',                          // faster animation speed 
            autoArrows:  false,                           // disable generation of arrow mark-up 
			dropShadows:   true   						// turn on drop shadows
    }); 
	

	// Back to top
	$('a[href=#top]').click(function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });
	
	// background hover
	$("#content a img, ul#slide-pager li, input#searchsubmit").hover(function() {
   	 	$(this).stop().animate({ backgroundColor: "#d0d0d0"}, 400);
    	},function() {
		$(this).stop().animate({ backgroundColor: "#f2f2f2" }, 400);
	});
	
	$("a.btn, .tag-list li a, .page-list li a, .tagcloud a").hover(function() {
   	 	$(this).stop().animate({ backgroundColor: "#d02624"}, 400);
    	},function() {
		$(this).stop().animate({ backgroundColor: "#f2f2f2" }, 400);
	});
		
});
})(jQuery);
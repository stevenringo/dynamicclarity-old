<?php 
global $options;
		
if(is_home() or is_search() or is_single() or is_archive()) :
	/* For blog page */	
	if(function_exists('dynamic_sidebar') && dynamic_sidebar('Blog Sidebar')) :
	endif; 
else :
	/* For non-blog page */	
	if(function_exists('dynamic_sidebar') && dynamic_sidebar('Non-Blog Sidebar')) :
	endif;
endif;
	
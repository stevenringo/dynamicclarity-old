<?php

function cinch_bc_breadcrumb() {
	echo '<span class="crumb-links">';
	echo '<a href="'.get_bloginfo('url').'">Home</a>  >  ';

	if ( is_category() ) {
		echo '<a href="'.get_permalink(get_option('page_for_posts')).'">'.get_the_title(get_option('page_for_posts')).'</a>  >  ';
		wp_title('');
	}
	
	if ( is_single() ) {
		echo '<a href="'.get_permalink(get_option('page_for_posts')).'">'.get_the_title(get_option('page_for_posts')).'</a>  >  ';
	}
	
	if ( is_home() ) {
		echo get_the_title(get_option('page_for_posts'));
	}
	
	if(is_single() || is_page()) {the_title();}
	if(is_tag()){ echo "Tagged '".single_tag_title('',FALSE)."'"; }
	if(is_404()){ echo "404 - Page not Found"; }
	if(is_search()){ printf('Search Results %s', '\''.get_search_query().'\''); }
	if(is_archive()){ echo "Archives ".wp_title('', 0); }

	echo "</span>";
}
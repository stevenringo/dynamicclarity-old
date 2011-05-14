<?php

//Enable post thumbnails
add_theme_support('post-thumbnails');

//Add posts and comments to rss feed
add_theme_support('automatic-feed-links');

//Register WP Nav Menus
add_theme_support('nav-menus');
register_nav_menus(array(
	'topnav' => 'Top Navigation',
));

//Get Posts Array
global $wp_posts;
$p = get_posts('numberposts=-1');
$wp_posts = array();
foreach ($p as $post_list ) {
       $wp_posts[$post_list->ID] = array('id' => $post_list->ID,
										 'title' => $post_list->post_title
										);
}

//Get Portfolio Items Array
global $wp_portfolio_items;
$p = get_posts('numberposts=-1&post_type=portfolio_item');
$wp_portfolio_items = array();
foreach ($p as $post_list ) {
       $wp_portfolio_items[$post_list->ID] = array('id' => $post_list->ID,
										 'title' => $post_list->post_title
										);
}

//Include scripts
if(!is_admin()) {
add_action('init', 'my_load_scripts');
function my_load_scripts(){
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script('hoverintent', get_bloginfo('template_directory') . '/scripts/superfish-1.4.8/js/hoverIntent.js' );
    wp_enqueue_script('superfish', get_bloginfo('template_directory') . '/scripts/superfish-1.4.8/js/superfish.js' );
    wp_enqueue_script('tweet', get_bloginfo('template_directory') . '/scripts/tweet/jquery.tweet.js' );
    wp_enqueue_script('quicksand', get_bloginfo('template_directory') . '/scripts/quicksand/quicksand.js' );
    wp_enqueue_script('cycle', get_bloginfo('template_directory') . '/scripts/jquery-cycle/jquery.cycle.all.js' );
    wp_enqueue_script('colorbox', get_bloginfo('template_directory') . '/scripts/colorbox/jquery.colorbox.js' );
    if (!is_single()) {
    wp_enqueue_script('contact', get_bloginfo('template_directory') . '/scripts/contact_form/js/script.js' );
    }
    wp_enqueue_script('allinone', get_bloginfo('template_directory') . '/scripts/all-in-one.js' );
    //enqueue other scripts here
} 
}
//Include Theme Options
require TEMPLATEPATH . '/bcoptions/index.php';
global $options;
$options = get_option('bc_theme_options');

//Include Slider Manager
require TEMPLATEPATH . '/slidermanager/loader.php';
global $slides;
$slides = get_option('slides');

//Include Custom Write Panels
require TEMPLATEPATH . '/framework/custom-write-panels-pages.php';
require TEMPLATEPATH . '/framework/custom-write-panels-posts.php';

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Footer Area A',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widgettitle">',
		'after_title' => '</h5>',
	));	
	
	register_sidebar(array(
		'name' => 'Footer Area B',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widgettitle">',
		'after_title' => '</h5>',
	));	
	
	register_sidebar(array(
		'name' => 'Footer Area C',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widgettitle">',
		'after_title' => '</h5>',
	));	
	
	register_sidebar(array(
		'name' => 'Footer Area D',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widgettitle">',
		'after_title' => '</h5>',
	));	
	
	register_sidebar(array(
		'name' => 'Blog Sidebar',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widgettitle">',
		'after_title' => '</h5>',
		'description' => 'This sidebar will appear on all blog related pages.'
	));

	register_sidebar(array(
		'name' => 'Non-Blog Sidebar',	
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widgettitle">',
		'after_title' => '</h5>',
		'description' => 'This sidebar will appear on all non-blog related pages with a sidebar.'
	));
}

//Include Pagination Function
require TEMPLATEPATH . '/framework/pagination.php';

//Include Breadcrumb Function
require TEMPLATEPATH . '/framework/breadcrumb.php';

//Include Widgets
require TEMPLATEPATH . '/framework/widget-blog.php';
require TEMPLATEPATH . '/framework/widget-twitter.php';

//Include Shortcodes
require TEMPLATEPATH . '/framework/shortcodes.php';
add_filter('widget_text', 'do_shortcode');

//Include Comments Template
require TEMPLATEPATH . '/framework/list-comments.php';

//Include Portfolio Post type
require TEMPLATEPATH . '/framework/portfolio-posts.php';
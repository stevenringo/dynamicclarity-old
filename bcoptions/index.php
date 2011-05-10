<?php

$themename = "Cinch";

function admin_head_files() 
{	
	echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/bcoptions/assets/css/style.css" type="text/css" />';
	echo '<script src="'.get_bloginfo('template_url').'/bcoptions/assets/js/jquery.bcoptions.js" type="text/javascript"></script>';
}

add_action('admin_head', 'admin_head_files');	


add_action('admin_menu', 'make_menu');


function make_menu() {
	global $themename;
	$admin_name = $themename.' Options';
	add_menu_page($admin_name, $admin_name, 'administrator', 'theme-options', 'bc_theme_options');
}

require_once(TEMPLATEPATH . '/bcoptions/front-end/bcoptions.php'); 

global $wp_cats, $wp_pages;

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = array('id' => $category_list->cat_ID,
										 		'name' => $category_list->cat_name
												);
}


$pages = get_pages();
$wp_pages = array();
foreach ($pages as $page_list ) {
       $wp_pages[$page_list->ID] = array('id' => $page_list->ID,
										 'title' => $page_list->post_title
										);
}



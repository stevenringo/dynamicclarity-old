<?php

$new_meta_boxes_posts = 
array(
"video" => array(
"name" => "video",
"std" => "",
"title" => "Youtube Video",
"description" => "You can the video code of a Youtube video here. The video code can be found in the URL of the video, after the <strong>v=</strong>. The video will then appear on the blog pages instead of the blog image. <em>(Optional)</em>"),

);

function new_meta_boxes_posts() {
global $post, $new_meta_boxes_posts;

foreach($new_meta_boxes_posts as $meta_box) {
$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);

if($meta_box_value == "")
$meta_box_value = $meta_box['std'];

echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

echo'<h4>'.$meta_box['title'].'</h4>';

echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" size="55" /><br />';

echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
}
}

function create_meta_box_posts() {
global $theme_name;
if ( function_exists('add_meta_box') ) {
add_meta_box( 'new-meta-boxes-posts', 'Cinch Theme Options', 'new_meta_boxes_posts', 'post', 'normal', 'high' );
}
}

function save_postdata_posts( $post_id ) {
global $post, $new_meta_boxes_posts;

foreach($new_meta_boxes_posts as $meta_box) {
// Verify
if ( !wp_verify_nonce( $_POST[$meta_box['name'].'_noncename'], plugin_basename(__FILE__) )) {
return $post_id;
}

if ( 'page' == $_POST['post_type'] ) {
if ( !current_user_can( 'edit_page', $post_id ))
return $post_id;
} else {
if ( !current_user_can( 'edit_post', $post_id ))
return $post_id;
}

$data = $_POST[$meta_box['name'].'_value'];

if(get_post_meta($post_id, $meta_box['name'].'_value') == "")
add_post_meta($post_id, $meta_box['name'].'_value', $data, true);
elseif($data != get_post_meta($post_id, $meta_box['name'].'_value', true))
update_post_meta($post_id, $meta_box['name'].'_value', $data);
elseif($data == "")
delete_post_meta($post_id, $meta_box['name'].'_value', get_post_meta($post_id, $meta_box['name'].'_value', true));
}
}

   add_action('admin_menu', 'create_meta_box_posts');  
   add_action('save_post', 'save_postdata_posts');  



?>
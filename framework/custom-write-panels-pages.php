<?php
$new_meta_boxes = 
array(
"tagline" => array(
"name" => "tagline",
"std" => "",
"type" => "text",
"title" => "Page Tagline",
"description" => "Enter a tagline that will appear in the header, underneath the page title."),

);

function new_meta_boxes() {
global $post, $new_meta_boxes;

	foreach($new_meta_boxes as $meta_box) {
	$meta_box_value = get_post_meta($post->ID, $meta_box['name'].'_value', true);

	if($meta_box_value == "") {
	$meta_box_value = $meta_box['std'];
	}

	echo'<input type="hidden" name="'.$meta_box['name'].'_noncename" id="'.$meta_box['name'].'_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';

	echo'<h4>'.$meta_box['title'].'</h4>';

		switch ($meta_box['type']) {
		    case "text":
		        echo'<input type="text" name="'.$meta_box['name'].'_value" value="'.$meta_box_value.'" size="55" /><br />';
		        break;
		
		    case "select": 

		        echo '<select name="'.$meta_box['name'].'_value" style="width:240px">';
				foreach ($meta_box['options'] as $option) { 
		        echo '<option ';
				if ($meta_box_value == $option) { echo ' selected="selected"'; }
				echo '>';
				echo $option;
		        echo '</option>';
		        } 
		        echo '</select>';


		        break;
		
		    case "cats": 

		        echo '<select name="'.$meta_box['name'].'_value" style="width:240px">';
				foreach ($meta_box['options'] as $option) { 
		        echo '<option ';
				if ($meta_box_value == $option['ID']) { echo ' selected="selected"'; }
				echo ' value="'.$option['ID'].'">';
				echo $option['name'];
		        echo '</option>';
		        } 
		        echo '</select>';


		        break;
		}

	echo'<p><label for="'.$meta_box['name'].'_value">'.$meta_box['description'].'</label></p>';
	}
}

function create_meta_box() {
global $theme_name;
if ( function_exists('add_meta_box') ) {
add_meta_box( 'new-meta-boxes', 'Cinch Theme Options', 'new_meta_boxes', 'page', 'normal', 'high' );
}
}

function save_postdata( $post_id ) {
global $post, $new_meta_boxes;

foreach($new_meta_boxes as $meta_box) {
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

   add_action('admin_menu', 'create_meta_box');  
   add_action('save_post', 'save_postdata');  

?>
<?php
add_action('init', 'portfolio_items_register');

function portfolio_items_register() {
	$args = array(
    	'labels' => array(
    		'name' => 'Portfolio Items',
    		'singular_name' => 'Portfolio Item',
    		'edit_item' => 'Edit Portfolio Item',
    		'new_item' => 'New Portfolio Item',
    		'view_item' => 'View Portfolio Item',
    		'search_items' => 'Search Portfolio Items',
    		'add_new' => 'Add Portfolio Item',
    		'add_new_item' => 'Add Portfolio Item',
    		'not_found' => 'No portfolio items found',
    		'not_found_in_trash' => 'No portfolio items found in Trash'
    	),
    	'public' => true,
    	'show_ui' => true,
    	'capability_type' => 'post',
    	'hierarchical' => false,
    	'menu_position' => 5,
    	'rewrite' => true,
    	'supports' => array('title', 'editor', 'thumbnail', 'comments')
    );

	register_post_type( 'portfolio_item' , $args );
}
register_taxonomy("portfolio_category", array("portfolio_item"), array("hierarchical" => true, "label" => "Portfolio Categories", "singular_label" => "Portfolio Category", "rewrite" => true));

	/*					   
    add_action("admin_init", "portfolio_admin_init");  
    add_action('save_post', 'portfolio_save_meta');  
  
    function portfolio_admin_init(){  
         add_meta_box("portfolio-item-meta", "Portfolio Item Options", "portfolio_meta_options", "portfolio_item", "normal", "low");  
    }  
  
    function portfolio_meta_options(){  
        global $post;  
        $custom = get_post_custom($post->ID);  
        $description = $custom["description"][0];  
        $video = $custom["video"][0];  
?>  
	<h4>Portfolio Item Description</h4>	
    <textarea name="description" style="width:800px; height:100px;" type="textarea" cols="" rows=""><?php echo $description; ?></textarea><br/> 
    <p><label for="description">Enter a description for this portfolio item. It will, depending on you're portfolio settings, appear underneath the thumbnail on the overview page or underneath the full size image in the lightbox.</label></p>
    
    <h4>Video Link (optional)</h4> 
    <input class="widefat" name="video" value="<?php echo $video; ?>" style="width:400px" /> <br/> 
    <p><label for="video">If you want to display a YouTube or Vimeo video in the lightbox, paste the url here. i.e.: http://www.youtube.com/watch?v=1RTiUbUjVTU or http://vimeo.com/7161981. This is optional. You'll still need to upload a post image for the automatically generated thumbnail.</label></p> 
<?php  
    }  
  
function portfolio_save_meta(){  
    global $post;  
    update_post_meta($post->ID, "description", $_POST["description"]);  
    update_post_meta($post->ID, "video", $_POST["video"]);  
} */ 
?>
<?php

define('MANAGER_URI', get_bloginfo('stylesheet_directory') . '/slidermanager');

add_action('admin_init', 'manager_init');
add_action('admin_menu', 'admin_menu');


// slider manager wrapper
function manager_wrap() {
	global $slides, $wp_pages, $wp_portfolio_items, $wp_posts;
	
		
		if(isset($_POST['action']) && $_POST['action'] == 'save') {
			
			$slides = array();
			
			foreach($_POST['src'] as $k => $v) {
				$slides[] = array(
					'src' => $v,
					'thumb' => $_POST['thumb'][$k],
					'type' => $_POST['type'][$k],
					'page' => $_POST['page'][$k],
					'post' => $_POST['post'][$k],
					'portfolio' => $_POST['portfolio'][$k],
					'custom' => $_POST['custom'][$k]
				);
			}
			
			update_option('slides', $slides);
			
		}
		
		$slides = get_option('slides');
		
	    //echo '<pre>';
		//print_r($slides);
		//echo '</pre>';
?>

	<div class="wrap" id="manager_wrap">
	
		<div id="header">
	    	<span class="logo">&nbsp;</span>
	    	<span class="icon">&nbsp;</span>
		</div>
		
		<form action="" id="manager_form" method="post">
		
			<div id="content_wrap">
				<div class="info top-info">
					<input name="action" type="hidden" value="save" />
				</div>
				<div id="content">
				<?php if (get_option('slides')) : foreach ($slides as $slide) : ?>	
					<div class="slide">
						<div class="slide-bar">
							<div class="slide-handle">
								<span class="slide-title">Slide</span>
								<span class="slide-controls">
									<?php
									if ($slide['type'] != 'None') {
										if($slide['type'] == 'Page') { $title = get_the_title($slide['page']); }
										if($slide['type'] == 'Post') { $title = get_the_title($slide['post']); }
										if($slide['type'] == 'Portfolio Item') { $title = get_the_title($slide['portfolio']); }
										if($slide['type'] == 'Custom Link') { $title = $slide['custom']; }
									} else {
										$title = "";
									}
									?>
									<span class="slide-type"><?php echo $title; ?></span>
			
									<a href="#" title="" class="slide-edit">Edit Menu Item</a>
								</span>
							</div>
						</div>

						<div class="slide-settings" style="display:none;">
							<div class="column_left url-column">
								<label>Slide Image URL:</label>
									<input type="text" value="<?php echo $slide['src']; ?>" name="src[]" class="widefat">
									<div class="help"><a href="#" rel="Enter the URL of the image you want to use for this slide. Ideally, it should be bigger than 940x396."><img src="<?php bloginfo('template_url'); ?>/slidermanager/images/help.png" alt="Help?" /></a></div>
							</div>
							<div class="column_right thumb-column">
								<label>Slide Thumbnail <em>(optional)</em>:</label>
									<input type="text" value="<?php echo $slide['thumb']; ?>" name="thumb[]" class="widefat">
									<div class="help"><a href="#" rel="Enter the URL to a thumbnail image for this slide. If none is entered, a resized version of the main slide image will be used."><img src="<?php bloginfo('template_url'); ?>/slidermanager/images/help.png" alt="Help?" /></a></div>
							</div>
							<div class="column_left link-type-column">
								<label>Slide Hyperlink <em>(optional)</em>:</label>
								<div class="select_wrapper">
									<?php
							    	if ($slide['type'] == '') {
							    		echo '<span>None</span>';
									} else {
							    		echo '<span>'.$slide['type'].'</span>';
									}
									?>
									<select class="select" name="type[]">
								    	<option<?php if($slide['type'] == 'None') { echo ' selected="selected"'; } ?>>None</option>
								    	<option<?php if($slide['type'] == 'Page') { echo ' selected="selected"'; } ?>>Page</option>
								    	<option<?php if($slide['type'] == 'Post') { echo ' selected="selected"'; } ?>>Post</option>
								    	<option<?php if($slide['type'] == 'Portfolio Item') { echo ' selected="selected"'; } ?>>Portfolio Item</option>
								    	<option<?php if($slide['type'] == 'Custom Link') { echo ' selected="selected"'; } ?>>Custom Link</option>
									</select>
								</div>
								<div class="help"><a href="#" rel="You can link this slide to either a page, post, portfolio item or custom URL. Choose a link type here and specify your link."><img src="<?php bloginfo('template_url'); ?>/slidermanager/images/help.png" alt="Help?" /></a></div>
								<p style="padding:0"><a href="#" class="remove_slide">Remove Slide</a></p>
							</div>
							<div class="column_right link-column">
								<label>&nbsp;</label><br />
								<?php if($slide['type'] == 'Page') { $d = ' style="display:block"'; } else { $d =  ''; 	} ?>
								<div class="link-page"<?php echo $d; ?>>
									<div class="select_wrapper">
								    	<?php
								    	if ($slide['page'] == '') {
								    		echo '<span>-- Choose One --</span>';
										} else {
								    		echo '<span>'.get_the_title($slide['page']).'</span>';
										}
										?>
										<select class="select pages" name="page[]">
									    	<option value="">-- Choose One --</option>
											<?php
											foreach($wp_pages as $page) {
												if ($slide['page'] == $page['id']) {
													$s = ' selected="selected"';
												} else {
													$s = '';
												}
												echo '<option value="'.$page['id'].'"'.$s.'>'.$page['title'].'</option>';
											}
											?>
										</select>
									</div>	
								</div>
								
								<?php if($slide['type'] == 'Post') { $d = ' style="display:block"'; } else { $d =  ''; 	} ?>
								<div class="link-post"<?php echo $d; ?>>
									<div class="select_wrapper">
								    	<?php
								    	if ($slide['post'] == '') {
								    		echo '<span>-- Choose One --</span>';
										} else {
								    		echo '<span>'.get_the_title($slide['post']).'</span>';
										}
										?>
										<select class="select posts" name="post[]">
									    	<option value="">-- Choose One --</option>
											<?php
											foreach($wp_posts as $post) {
												if ($slide['post'] == $post['id']) {
													$s = ' selected="selected"';
												} else {
													$s = '';
												}
												echo '<option value="'.$post['id'].'"'.$s.'>'.$post['title'].'</option>';
											}
											?>
										</select>
									</div>	
								</div>
								
								<?php if($slide['type'] == 'Portfolio Item') { $d = ' style="display:block"'; } else { $d =  ''; 	} ?>
								<div class="link-portfolio"<?php echo $d; ?>>
									<div class="select_wrapper">
								    	<?php
								    	if ($slide['portfolio'] == '') {
								    		echo '<span>-- Choose One --</span>';
										} else {
								    		echo '<span>'.get_the_title($slide['portfolio']).'</span>';
										}
										?>
										<select class="select portfolios" name="portfolio[]">
									    	<option value="">-- Choose One --</option>
											<?php
											foreach($wp_portfolio_items as $portfolio) {
												if ($slide['portfolio'] == $portfolio['id']) {
													$s = ' selected="selected"';
												} else {
													$s = '';
												}
												echo '<option value="'.$portfolio['id'].'"'.$s.'>'.$portfolio['title'].'</option>';
											}
											?>
										</select>
									</div>	
								</div>
									
								<?php if($slide['type'] == 'Custom Link') { $d = ' style="display:block"'; } else { $d =  ''; } ?>
								<div class="link-custom"<?php echo $d; ?>>
									<input type="text" value="<?php echo $slide['custom']; ?>" name="custom[]" class="widefat">				
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; else: ?>
					<div class="slide">
						<div class="slide-bar">
							<div class="slide-handle">
								<span class="slide-title">Slide</span>
								<span class="slide-controls">
									<!--<span class="slide-type">Page</span>-->
			
									<a href="#" title="" class="slide-edit">Edit Menu Item</a>
								</span>
							</div>
						</div>

						<div class="slide-settings" style="display:none;">
							<div class="column_left url-column">
								<label>Slide Image URL: </label>
									<input type="text" value="" name="src[]" class="widefat">
									<div class="help"><a href="#" rel="Enter the URL of the image you want to use for this slide. Ideally, it should be bigger than 940x396."><img src="<?php bloginfo('template_url'); ?>/slidermanager/images/help.png" alt="Help?" /></a></div>
							</div>
							<div class="column_right thumb-column">
								<label>Slide Thumbnail <em>(optional)</em>:</label>
									<input type="text" value="" name="thumb[]" class="widefat">
									<div class="help"><a href="#" rel="Enter the URL to a thumbnail image for this slide. If none is entered, a resized version of the main slide image will be used."><img src="<?php bloginfo('template_url'); ?>/slidermanager/images/help.png" alt="Help?" /></a></div>
							</div>
							<div class="column_left link-type-column">
								<label>Slide Hyperlink <em>(optional)</em>:</label>
								<div class="select_wrapper">
									<span>None</span>
									<select class="select" name="type[]">
								    	<option selected="selected">None</option>
								    	<option>Page</option>
								    	<option>Post</option>
								    	<option>Portfolio Item</option>
								    	<option>Custom Link</option>
									</select>
								</div>
								<div class="help"><a href="#" rel="You can link this slide to either a page, post, portfolio item or custom URL. Choose a link type here and specify your link."><img src="<?php bloginfo('template_url'); ?>/slidermanager/images/help.png" alt="Help?" /></a></div>
								<p style="padding:0"><a href="#" class="remove_slide">Remove Slide</a></p>
							</div>
							<div class="column_right link-column">
								<label>&nbsp;</label><br />
								<div class="link-page">
									<div class="select_wrapper">
								    	<span>-- Choose One --</span>
										<select class="select pages" name="page[]">
									    	<option value="">-- Choose One --</option>
											<?php
											foreach($wp_pages as $page) {
												if ($slide['page'] == $page['id']) {
													$s = ' selected="selected"';
												} else {
													$s = '';
												}
												echo '<option value="'.$page['id'].'"'.$s.'>'.$page['title'].'</option>';
											}
											?>
										</select>
									</div>
								</div>
								<div class="link-post">
									<div class="select_wrapper">
								    	<span>-- Choose One --</span>
										<select class="select posts" name="post[]">
									    	<option value="">-- Choose One --</option>
											<?php
											foreach($wp_posts as $post) {
												if ($slide['post'] == $post['id']) {
													$s = ' selected="selected"';
												} else {
													$s = '';
												}
												echo '<option value="'.$post['id'].'"'.$s.'>'.$post['title'].'</option>';
											}
											?>
										</select>
									</div>
								</div>
								<div class="link-portfolio">
									<div class="select_wrapper">
								    	<span>-- Choose One --</span>
										<select class="select portfolios" name="portfolio[]">
									    	<option value="">-- Choose One --</option>
											<?php
											foreach($wp_portfolio_items as $portfolio) {
												if ($slide['portfolio'] == $portfolio['id']) {
													$s = ' selected="selected"';
												} else {
													$s = '';
												}
												echo '<option value="'.$portfolio['id'].'"'.$s.'>'.$portfolio['title'].'</option>';
											}
											?>
										</select>
									</div>
								</div>	
								<div class="link-custom">
									<input type="text" value="<?php echo $slide['custom']; ?>" name="custom[]" class="widefat">				
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				</div>
				<div class="info bottom-info">
					<input type="submit" value="<?php _e('Save All Changes') ?>" class="button-framework save-options" name="submit" id="manager_submit" />
				</div>
			</div>
						
		</form>
		
	</div>

<?php
	
}

function admin_menu() {
	add_menu_page( 'Slider Manager', 'Slider Manager', 'administrator', 'slidermanager', 'manager_wrap');
}

// slider manager init
function manager_init() {
	
	if(isset($_GET['page']) && $_GET['page'] == 'slidermanager') {
	
		// scripts
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-appendo', MANAGER_URI . '/js/jquery.appendo.js', false, '1.0', false);
		wp_enqueue_script('slider-manager', MANAGER_URI . '/js/manager.js', false, '1.0', false);
		
		// styles
		wp_enqueue_style('slider-manager', MANAGER_URI . '/css/manager.css', false, '1.0', 'all');
		
	}

}

?>
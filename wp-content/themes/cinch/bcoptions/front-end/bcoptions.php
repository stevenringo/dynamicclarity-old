<?php

function bc_theme_options() { 
	
	require 'options-file.php';
	global $bcoptions;
	global $wp_cats, $wp_pages;
	
	
	$optionname = "bc_theme_options";
	$saved_optionname = $optionname;
	$options = $newoptions = get_option($saved_optionname);
	//reset update_option($saved_optionname, "");
	if ( $_POST['save_my_options'] ) 
	{	
	
	unset($newoptions);
		//update_option($saved_optionname, "");
		while ($var = each($_POST))
		{	
			
			$newoptions[$var['key']] = stripslashes($var['value']); 


		} 	
	}
		
	if ( $options != $newoptions ) 
	{
		$options = $newoptions;

		update_option($saved_optionname, $options);		
	
	}
	
		if($options)
	{
		foreach ($options as $key => $value)
		{
			$options[$key] = empty($options[$key]) ? false : $options[$key];
		}
	}
	
	//echo '<pre>';
	//print_r($options);
	//echo '</pre>';
	
	//echo '<pre>';
	//print_r($wp_cats);
	//echo '</pre>';
?>

<div id="framework_wrap" class="wrap">
	
	<div id="header">
    	<span class="logo">&nbsp;</span>
    	<span class="icon">&nbsp;</span>
	</div>
  
	<div id="content_wrap">
		<form method="post" id="the-theme-options">
			<div class="info top-info">
				<input type="submit" value="<?php _e('Save All Changes') ?>" class="button-framework save-options" name="submit"/>
				<input name="save_my_options" type="hidden" value="1" />
			</div>

			<div id="content">
				<div id="options_tabs">
					<ul class="options_tabs">
						
						<?php
						$s = 0;
						foreach($bcoptions as $bcoptions_page) {
							echo '<li';
							if ($s == 0) {
								echo ' class="selected"';
							}
							echo '><a href="#'.$bcoptions_page['slug'].'" class="'.$bcoptions_page['slug'].'">'.$bcoptions_page['title'].'</a><span></span></li>';
							$s = 1;
						}
						?>
						
			        </ul>

					<?php
					$h = 0;
					foreach($bcoptions as $bcoptions_page) {
						echo '<div class="option_general_default '.$bcoptions_page['slug'].'-options';
						if ($h == 0) {
							echo ' shown';
						} else {
							echo ' hidden';
						}
						echo '">';
							
							foreach($bcoptions_page['options'] as $bcoption) {
								
								switch($bcoption['item_type']) {
								case 'textblock':
								?>
								<div class="option option-<?php echo $bcoption['item_type']; ?>">
									<div class="section">
										<div class="<?php echo $bcoption['item_type']; ?>">
											<h3><?php echo $bcoption['item_title']; ?></h3>
											<p><?php echo $bcoption['item_desc']; ?></p>      
										</div>
									</div>
								</div>
								<?php
								break;
								case 'input':
								?>
								<div class="option option-<?php echo $bcoption['item_type']; ?>">
									<div class="section">
										<h3><?php echo $bcoption['item_title']; ?></h3>
										<div class="element">
											<input name="<?php echo $bcoption['item_id']; ?>" id="<?php echo $bcoption['item_id']; ?>" type="text" value="<?php echo $options[$bcoption['item_id']]; ?>" />
										</div>
										<div class="description">
											<?php echo $bcoption['item_desc']; ?>
										</div>
									</div>
								</div>
								<?php
								break;
								case 'checkbox':
								?>
								<div class="option option-<?php echo $bcoption['item_type']; ?>">
									<div class="section">
										<h3><?php echo $bcoption['item_title']; ?></h3>
										<div class="element">
											<?php
												if ($options[$bcoption['item_id']] == 'yes') {
													$c = ' checked="checked"';
												} else {
													$c = '';
												}
												?>
												<input name="<?php echo $bcoption['item_id']; ?>" id="<?php echo $bcoption['item_id']; ?>" type="checkbox" value="yes"<?php echo $c; ?> />
												<label for="<?php echo $bcoption['item_id']; ?>">yes</label>

										</div>
										<div class="description">
											<?php echo $bcoption['item_desc']; ?>
										</div>
									</div>
								</div>
								<?php
								break;
								case 'radio':
								?>
								<div class="option option-<?php echo $bcoption['item_type']; ?>">
									<div class="section">
										<h3><?php echo $bcoption['item_title']; ?></h3>
										<div class="element">
											<?php
											$i = 0;
											foreach($bcoption['item_options'] as $val) {
												if ($options[$bcoption['item_id']] == $val) {
													$c = ' checked="checked"';
												} else {
													$c = '';
												}
												?>
												<input name="<?php echo $bcoption['item_id']; ?>" id="<?php echo $bcoption['item_id']; ?>_<?php echo $i; ?>" type="radio" value="<?php echo $val; ?>"<?php echo $c; ?> />
												<label for="<?php echo $bcoption['item_id']; ?>"><?php echo $val; ?></label><br />
											<?php 
											$i++;
											}
											?>
										</div>
										<div class="description">
											<?php echo $bcoption['item_desc']; ?>
										</div>
									</div>
								</div>
								<?php
								break;
								case 'select':
								?>
								<div class="option option-<?php echo $bcoption['item_type']; ?>">
									<div class="section">
										<h3><?php echo $bcoption['item_title']; ?></h3>
										<div class="element">
											<div class="select_wrapper">
										    	<?php
										    	if ($options[$bcoption['item_id']] == '') {
										    		echo '<span>-- Choose One --</span>';
												} else {
										    		echo '<span>'.$options[$bcoption['item_id']].'</span>';
												}
												?>
												<select class="select" id="<?php echo $bcoption['item_id']; ?>" name="<?php echo $bcoption['item_id']; ?>">
											    	<option value="">-- Choose One --</option>
													<?php
													foreach($bcoption['item_options'] as $val) {
														if ($options[$bcoption['item_id']] == $val) {
															$s = ' selected="selected"';
														} else {
															$s = '';
														}
														echo '<option'.$s.'>'.$val.'</option>';
													}
													?>
												</select>
											</div>
										</div>
										<div class="description">
											<?php echo $bcoption['item_desc']; ?>
										</div>
									</div>
								</div>
								<?php
								break;
								case 'textarea':
								?>
								<div class="option option-<?php echo $bcoption['item_type']; ?>">
									<div class="section">
										<h3><?php echo $bcoption['item_title']; ?></h3>
										<div class="element">
											<textarea name="<?php echo $bcoption['item_id']; ?>" id="<?php echo $bcoption['item_id']; ?>" rows="6"><?php echo $options[$bcoption['item_id']]; ?></textarea>
										</div>
										<div class="description">
											<?php echo $bcoption['item_desc']; ?>
										</div>
									</div>
								</div>
								<?php
								break;
								case 'categories':
								?>
								<div class="option option-<?php echo $bcoption['item_type']; ?>">
									<div class="section">
										<h3><?php echo $bcoption['item_title']; ?></h3>
										<div class="element">
											<div class="select_wrapper">
										    	<?php
										    	if ($options[$bcoption['item_id']] == '') {
										    		echo '<span>-- Choose One --</span>';
												} else {
										    		echo '<span>'.$wp_cats[$options[$bcoption['item_id']]]['name'].'</span>';
												}
												?>
												<select class="select categories" id="<?php echo $bcoption['item_id']; ?>" name="<?php echo $bcoption['item_id']; ?>">
											    	<option value="">-- Choose One --</option>
													<?php
													foreach($wp_cats as $cat) {
														if ($options[$bcoption['item_id']] == $cat['id']) {
															$s = ' selected="selected"';
														} else {
															$s = '';
														}
														echo '<option value="'.$cat['id'].'"'.$s.'>'.$cat['name'].'</option>';
													}
													?>
												</select>
											</div>
										</div>
										<div class="description">
											<?php echo $bcoption['item_desc']; ?>
										</div>
									</div>
								</div>
								<?php
								break;
								case 'pages':
								?>
								<div class="option option-<?php echo $bcoption['item_type']; ?>">
									<div class="section">
										<h3><?php echo $bcoption['item_title']; ?></h3>
										<div class="element">
											<div class="select_wrapper">
										    	<?php
										    	if ($options[$bcoption['item_id']] == '') {
										    		echo '<span>-- Choose One --</span>';
												} else {
										    		echo '<span>'.$wp_pages[$options[$bcoption['item_id']]]['title'].'</span>';
												}
												?>
												<select class="select pages" id="<?php echo $bcoption['item_id']; ?>" name="<?php echo $bcoption['item_id']; ?>">
											    	<option value="">-- Choose One --</option>
													<?php
													foreach($wp_pages as $page) {
														if ($options[$bcoption['item_id']] == $page['id']) {
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
										<div class="description">
											<?php echo $bcoption['item_desc']; ?>
										</div>
									</div>
								</div>
								<?php
								}
							}
							
						echo '</div>';
						$h = 1;				        
					}
					?>

				
			        <br class="clear">
				</div>
			</div>

			<div class="info bottom-info">
				<input type="submit" value="<?php _e('Save All Changes') ?>" class="button-framework save-options" name="submit"/>
			</div>
		</form>
	</div>
</div>
<?php
}
?>
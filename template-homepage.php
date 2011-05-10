<?php
/*
Template Name: Home Page
*/

global $options;
global $slides;

get_header();
?>


            <div id="main-message">
            
            	<h1><?php echo $options['homepage_tagline']; ?></h1>
                <h3><?php echo $options['homepage_subtagline']; ?></h3>
            
            </div><!-- end main message -->
        
        </div><!-- end header -->
        
       <?php if($slides) { ?> 
        <div id="featured">
        
        	<div id="slideshow">
            
				<?php
				foreach($slides as $slide) {
					if ($slide['type'] != 'None') {
						if($slide['type'] == 'Page') { $url = get_permalink($slide['page']); }
						if($slide['type'] == 'Post') { $url = get_permalink($slide['post']); }
						if($slide['type'] == 'Portfolio Item') { $url = get_permalink($slide['portfolio']); }
						if($slide['type'] == 'Custom Link') { $url = $slide['custom']; }
						echo '<a href="'.$url.'">';
					} 
					echo '<img src="'.get_bloginfo('template_url').'/timthumb.php?src='.$slide['src'].'&w=940&h=396&zc=1&q=100" alt=""  />';
					if ($slide['type'] != 'None') {
						echo '</a>';
					}
				}
				?>
            
            </div><!-- end slideshow -->
                    
        </div><!-- end featured -->
        
        <ul id="slide-pager">

			<?php
			$c = count($slides);
			$i = 0;
			foreach($slides as $slide) {
				$i++;
				if($i == 5) {
					$last = ' class="last"';
					$i = 0;
				} else {
					$last = '';
				}
				
				if ($slide['thumb'] != "") {
					echo '<li'.$last.'><a href="#"><img src="'.get_bloginfo('template_url').'/timthumb.php?src='.$slide['thumb'].'&w=156&h=70&zc=1&q=100" alt=""  /></a></li>';
				} else {
					echo '<li'.$last.'><a href="#"><img src="'.get_bloginfo('template_url').'/timthumb.php?src='.$slide['src'].'&w=156&h=70&zc=1&q=100" alt=""  /></a></li>';
				}

			}
			?>
        
        </ul><!-- end slide pager -->
      <?php } ?>    
    </div><!-- end container -->

</div><!-- end main -->

<div id="content">

	<div class="container">
    
    	<?php if($slides) { ?>
    	<div class="separator featured-separator"></div>
    	<?php } ?>
    	<div class="column-4">
        
        	<?php echo $options['home_column_1']; ?>
        
        </div><!-- end column 4 -->
        
        <div class="column-4">
        
        	<?php echo $options['home_column_2']; ?>
        
        </div><!-- end column 4 -->
        
        <div class="column-4">
        
        	<?php echo $options['home_column_3']; ?>
        
        </div><!-- end column 4 -->
        
        <div class="column-4-last">
        
        	<?php echo $options['home_column_4']; ?>
        
        </div><!-- end column 4 last -->
        
		<?php if($options['blog_on_home'] == 'yes') : ?>

        <div class="separator"></div>
        
        <div id="from-blog">
        <div class="column-3">
        
        	<h3>From the Blog</h3>
            
            <p><?php echo get_post_meta(get_option('page_for_posts'), "tagline_value", $single = true); ?></p>
        
        </div><!-- end column 3 -->
			<?php
			global $more;
			query_posts('post_type=post&posts_per_page=2');
			if (have_posts()) : 
				$i = 0;
				while (have_posts()) : the_post(); 
					$i++;
					$more = 0;
					if($i % 3 == 2) {
						$last = '-last';
					} else {
						$last = '';
					}
			?>
		        <div class="column-3<?php echo $last; ?>">
		        	<?php
					if(has_post_thumbnail()) : ?>
					<a href="<?php the_permalink() ?>">	
						<?php
						$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); 
						echo '<img src="'.get_bloginfo('template_url').'/timthumb.php?src='.$image[0].'&amp;h=155&amp;w=280&amp;q=95&amp;zc=1" alt="'.get_the_title().'" class="attachment-post-image" />';
						?>			
					</a>
					<?php endif; ?>

		        	<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

		            <?php the_excerpt(); ?>

		        </div><!-- end column 3 -->
			<?php		
				endwhile; 
		
			endif;
			wp_reset_query();
        	?>

        </div><!-- end from blog -->
    
		<?php endif; ?>

    </div><!-- end container -->

</div><!-- end content -->

<?php
get_footer();
?>
<?php
/*
Template Name: Portfolio - 3 Columns
*/

global $options;

get_header(); 
?>


            <div id="page-title">
            
            	<h1><?php the_title(); ?></h1>
                <h3><?php echo get_post_meta($wp_query->get_queried_object()->ID, "tagline_value", $single = true); ?></h3>
            
            </div><!-- end main message -->
        
        </div><!-- end header -->        
            
    </div><!-- end container -->

</div><!-- end main -->

<div id="content">

	<div class="container">
            



		    	<div class="portfolio-content-3 section content clearfix">
			
				<?php
				
				$args = array(
					'post_type' => 'portfolio_item',
					'order' => 'ASC',
					'posts_per_page' => '-1'
				);
				global $more;
				query_posts($args);

				if (have_posts()) : while (have_posts()) : the_post();
				$more = 0;
				?>

		        	<div data-id="post-<?php the_ID(); ?>" data-type="<?php $terms = get_the_terms($post->ID, 'portfolio_category'); foreach($terms as $term) {	echo str_replace('-', '', $term->slug); } ?>" class="post-<?php the_ID(); ?> <?php $terms = get_the_terms($post->ID, 'portfolio_category'); foreach($terms as $term) {	echo str_replace('-', '', $term->slug).' '; } ?> project" >

						<?php
						if(has_post_thumbnail()) : 
						$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); 
						?>
						<a href="<?php echo $image[0]; ?>" rel="colorbox">	
							<?php
							echo '<img src="'.get_bloginfo('template_url').'/timthumb.php?src='.$image[0].'&amp;h=185&amp;w=280&amp;q=95&amp;zc=1" alt="'.get_the_title().'" width="280" height="185" />';
							?>			
						</a>
						<?php endif; ?>	                
						
					<div class="details">	
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				        <?php the_content(''); ?>

		                <a href="<?php the_permalink(); ?>" class="btn">Project Details</a>
					</div>
		        </div> 

				<?php endwhile; endif; ?>

				</div> <!-- /portfolio-content -->

    </div><!-- end container -->

</div><!-- end content -->

<?php
get_footer();
?>
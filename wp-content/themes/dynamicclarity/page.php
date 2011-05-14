<?php
global $options;

get_header(); 
if (have_posts()) : while (have_posts()) : the_post();
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
    
    	<div class="column-2-fourths">
        
        	<?php the_content(); ?>
                    
        </div><!-- end column 2 thirds -->

<?php endwhile; endif; ?>
    
    	<div class="sidebar">
        
        	<?php get_sidebar(); ?>
			       
        </div><!-- end sidebar -->        
                            
    </div><!-- end container -->

</div><!-- end content -->

<?php get_footer(); ?>

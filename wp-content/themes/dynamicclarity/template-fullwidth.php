<?php
/*
Template Name: Full-width Page
*/

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
            
        	<?php the_content(); ?>      
                            
    </div><!-- end container -->

<?php endwhile; endif; ?>

</div><!-- end content -->

<?php
get_footer();
?>
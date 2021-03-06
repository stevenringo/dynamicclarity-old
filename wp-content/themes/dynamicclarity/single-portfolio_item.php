<?php
global $options;

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); 	?>


<div id="page-title">

	<h1>Portfolio</h1>
    <h3><?php the_title(); ?></h3>

</div><!-- end main message -->

</div><!-- end header -->        

</div><!-- end container -->

</div><!-- end main -->

<div id="content">

<div class="container">

<div class="column-2-fourths">
	
		<div class="blog-post" id="post-<?php the_ID(); ?>">

			<div class="meta">

		    	<span class="date"><?php the_time('F j, Y'); ?></span>

		        <small><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></small>
				
				<?php if (has_tag()) { ?>
		        <h5>Tagged:</h5>
		        <ul class="tag-list">
					<?php the_tags('<li>', '</li><li>', '</li>'); ?>
		        </ul><!-- end tag list -->
				<?php } ?>
		    </div><!-- end meta -->

		    <div class="post-body">

		    	<h3><?php the_title(); ?></h3>
				
				<?php
				if(has_post_thumbnail()) : 
				$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); 
				?>
				<a href="<?php echo $image[0]; ?>" rel="colorbox">	
					<?php
					echo '<img src="'.get_bloginfo('template_url').'/timthumb.php?src='.$image[0].'&amp;h=256&amp;w=520&amp;q=95&amp;zc=1" alt="'.get_the_title().'" class="attachment-post-image" />';
					?>			
				</a>
				<?php endif; ?>
				
		        <?php the_content(''); ?>

		    </div><!-- end post body -->

		</div><!-- end blog post -->
		

		<?php endwhile; ?>



<div class="separator"></div>

<?php comments_template(); ?>

<?php else : ?>



<?php endif; ?>
        
</div><!-- end column 2 fourths -->

<div class="sidebar">

	<?php get_sidebar(); ?>

</div><!-- end sidebar -->        
                
</div><!-- end container -->

</div><!-- end content -->

<?php get_footer(); ?>

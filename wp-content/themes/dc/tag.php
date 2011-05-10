<?php
global $options;

get_header(); ?>

<div id="page-title">

	<h1>Tagged '<?php wp_title('', true, 'left'); ?>'</h1>
    <h3><?php echo get_post_meta(get_option('page_for_posts'), "tagline_value", $single = true); ?></h3>

</div><!-- end main message -->

</div><!-- end header -->        

</div><!-- end container -->

</div><!-- end main -->

<div id="crumbs">

<div class="container">

	<?php cinch_bc_breadcrumb(); ?>

</div><!-- end container -->

</div><!-- end crumbs -->

<div id="content">

<div class="container">

<div class="column-2-fourths">
	
	
	<?php
	
	if (have_posts()) : ?>

		<?php 
		global $more;
		while (have_posts()) : the_post(); 
		$more = 0;
		?>

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

		    	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								
		        <?php the_content(''); ?>

		    </div><!-- end post body -->

		</div><!-- end blog post -->
		

		<?php endwhile; ?>



<div class="separator"></div>

<div class="pages">

	<?php bc_pagination(); ?>

</div><!-- end pages -->

<?php else : ?>



<?php endif; ?>
        
</div><!-- end column 2 fourths -->

<div class="sidebar">

	<?php get_sidebar(); ?>

</div><!-- end sidebar -->        
                
</div><!-- end container -->

</div><!-- end content -->

<?php get_footer(); ?>

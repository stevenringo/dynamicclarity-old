<?php
global $options;

get_header(); ?>

<div id="page-title">

	<h1><?php wp_title('', true, 'left'); ?></h1>
    <h3><?php echo get_post_meta($wp_query->get_queried_object()->ID, "tagline_value", $single = true); ?></h3>

</div><!-- end main message -->

</div><!-- end header -->        

</div><!-- end container -->

</div><!-- end main -->

<div id="content">

<div class="container">

<div class="column-2-fourths">
	
	
	<?php
	global $paged;
	query_posts('post_type=post&paged='.$paged);	
	
	if (have_posts()) : ?>

		<?php 
		global $more;
		while (have_posts()) : the_post(); 
		$more = 0;
		?>

		<div class="blog-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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
			
			<?php
			$video = get_post_meta($post->ID, "video_value", $single = true);
			if($video != "") {
			?>
			<iframe title="YouTube video player" width="540" height="330" src="http://www.youtube.com/embed/<?php echo $video; ?>?rel=0" frameborder="0" allowfullscreen></iframe>
			<?php
			} else {
			?>
				<?php
				if(has_post_thumbnail()) : ?>
				<a href="<?php the_permalink() ?>">	
					<?php
					$image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); 
					echo '<img src="'.get_bloginfo('template_url').'/timthumb.php?src='.$image[0].'&amp;h=256&amp;w=520&amp;q=95&amp;zc=1" alt="'.get_the_title().'" class="attachment-post-image" />';
					?>			
				</a>
				<?php endif; ?>
			<?php } ?>	
		        <?php the_content(''); ?>

		    </div><!-- end post body -->

		</div><!-- end blog post -->
		

		<?php 
		wp_link_pages();
		endwhile; ?>



<div class="separator"></div>

<div class="pages">
	
	<!-- <php previous_posts_link(); paginate_comments_links(); ?> -->
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

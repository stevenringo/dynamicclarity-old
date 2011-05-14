<?php
/*
Plugin Name: Cinch Blog Widget 
Plugin URI: http://bcproducties.com/
Description: This is a widget developed for the Cinch Theme to display the latest blog posts in the footer or sidebar.
Version: 1.0
Author: BCProducties
Author URI: http://bcproducties.com/
*/


/**
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'cinch_load_blog_widget' );

/**
 * Register our widget.
 *
 */
function cinch_load_blog_widget() {
	register_widget( 'Cinch_Blog_Widget' );
}

/**
 * BC Blog Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.
 */
class Cinch_Blog_Widget extends WP_Widget {

	/**
	 * Widget setup.
	*/
	function Cinch_Blog_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'blog-widget', 'description' => 'This is a widget developed for the Cinch Theme to display the latest blog posts in the footer or sidebar.' );

		/* Widget control settings. */
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'blog-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'blog-widget', 'Cinch Blog Widget', $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	*/
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = $instance['title'];
		$count = $instance['count'];
		$small = $instance['small'];

		/* Before widget (defined by theme). */
		echo $before_widget;
		
		/* Display the widget title if one was input (before and after defined by theme). */
		if ( $title ) {
			echo $before_title . $title . $after_title; 
		}
		
		if ( $small ) {
			$s = ' small'; 
		} else {
			$s = '';
		}

		global $more;
		query_posts('post_type=post&posts_per_page='.$count);
		if (have_posts()) : 

			while (have_posts()) : the_post(); 
				
				$more = 0;
		?>
				<div class="footer-post<?php echo $s; ?>">

		        	<div class="meta">

		               	<small><?php the_time('F j, Y'); ?><?php if (!$small) { echo '<br />'; } ?>
		                   <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></small>

		            </div><!-- end meta -->

		            <div class="post">

		               	<strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>

		                   <?php the_excerpt(); ?>

		            </div><!-- end post -->

				</div>
		<?php		
			endwhile; 
		
		endif;
		wp_reset_query();


		/* After widget (defined by theme). */
		echo $after_widget;
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for values to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['count'] = strip_tags( $new_instance['count'] );
		$instance['small'] = strip_tags( $new_instance['small'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {
		
		/* Set up some default widget settings. */
		$defaults = array( 'title' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />			
		</p>
		
		<!-- Widget Count: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('How many posts to display:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $instance['count']; ?>" class="widefat" />
		</p>
		
		<!-- Widget small: Checkbox Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'small' ); ?>"><?php _e('Small version? ', 'hybrid'); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'small' ); ?>" name="<?php echo $this->get_field_name( 'small' ); ?>" type="checkbox" <?php if($instance['small']) { echo 'checked="checked"'; } ?> />
			<br /><em>For in the sidebar or a small footer area.</em>
		</p>
	<?php
	}
}

?>
<?php
/*
Plugin Name: Cinch Twitter Widget 
Plugin URI: http://bcproducties.com/
Description: This is a widget developed for the Cinch Theme to display the latest tweets from a certain account in the footer or sidebar.
Version: 1.0
Author: BCProducties
Author URI: http://bcproducties.com/
*/


/**
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'cinch_load_twitter_widget' );

/**
 * Register our widget.
 *
 */
function cinch_load_twitter_widget() {
	register_widget( 'Cinch_Twitter_Widget' );
}

/**
 * BC Twitter Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update.
 */
class Cinch_Twitter_Widget extends WP_Widget {

	/**
	 * Widget setup.
	*/
	function Cinch_Twitter_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'twitter-widget', 'description' => 'This is a widget developed for the Cinch Theme to display the latest tweets from a certain account in the footer or sidebar.' );

		/* Widget control settings. */
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'twitter-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'twitter-widget', 'Cinch Twitter Widget', $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	*/
	function widget( $args, $instance ) {
		extract( $args );

		/* Our variables from the widget settings. */
		$title = $instance['title'];
		$count = $instance['count'];
		$name = $instance['name'];

		/* Before widget (defined by theme). */
		echo $before_widget;
		
		/* Display the widget title if one was input (before and after defined by theme). */
		if ( $title ) {
			echo $before_title . $title . $after_title; 
		}
		?>
		
		<div class="tweet"></div>
		
		<script type="text/javascript">
		// Tweet
		jQuery(".tweet").tweet({
	            username: "<?php echo $name; ?>",
	            join_text: null,
	            avatar_size: null,
	            count: <?php echo $count; ?>,
	            auto_join_text_default: "we said,", 
	            auto_join_text_ed: "we",
	            auto_join_text_ing: "we were",
	            auto_join_text_reply: "we replied to",
	            auto_join_text_url: "we were checking out",
	            loading_text: "loading tweets..."
	    });
		</script>
		
		<?php
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
		$instance['name'] = strip_tags( $new_instance['name'] );

		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form( $instance ) {
		
		/* Set up some default widget settings. */
		$defaults = array( 'title' => '', 'name' => '', 'count' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />			
		</p>
		
		<!-- Widget Name: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'name' ); ?>"><?php _e('Twitter Username:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo $instance['name']; ?>" class="widefat" />			
		</p>
		
		<!-- Widget Count: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e('How many tweets to display:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" value="<?php echo $instance['count']; ?>" class="widefat" />
		</p>

	<?php
	}
}

?>
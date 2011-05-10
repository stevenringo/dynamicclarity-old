<?php

function bc_list_comments($comment, $args, $depth) { ?>
	
	<?php $GLOBALS['comment'] = $comment; ?>

	<?php if ($depth == 1) { ?>
		
		<div class="comment" id="comment-<?php comment_ID(); ?>">
		       	<?php echo get_avatar( $comment, $size='70' );  ?>
				<strong> <?php comment_author_link(); ?> </strong>
				<small><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()); ?> | <?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'respond_id' => 'commentform'))); ?></small>		
				<?php comment_text(); ?>
		</div>
	<?php } elseif ($depth == 2) { ?>
		
		<div class="comment-inner" id="comment-<?php comment_ID(); ?>">
	       	<?php echo get_avatar( $comment, $size='70' );  ?>
			<strong> <?php comment_author_link(); ?> </strong>
			<small><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()); ?> | <?php comment_reply_link(array_merge( $args, array('reply_text' => 'Reply', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'respond_id' => 'commentform'))); ?></small>		
			<?php comment_text(); ?>
		</div>
	<?php } else { ?>

			<div class="comment-inner-inner" id="comment-<?php comment_ID(); ?>">
		       	<?php echo get_avatar( $comment, $size='70' );  ?>
				<strong> <?php comment_author_link(); ?> </strong>
				<small><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()); ?></small>		
				<?php comment_text(); ?>
			</div>
	<?php }  ?><?php	
}

?>
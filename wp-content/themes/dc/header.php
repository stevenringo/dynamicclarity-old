<?php global $options; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php bloginfo('name'); ?><?php wp_title('&raquo;', true, 'left'); ?></title>

<?php wp_head(); ?>
<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); if ( ! isset( $content_width ) ) $content_width = 900; ?>
 
<!-- favicon -->
<link rel="shortcut icon" href="" />

<!-- Stylesheets -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url'); ?>/scripts/superfish-1.4.8/css/superfish.css" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/scripts/colorbox/colorbox.css" media="screen" />

<!-- jQuery -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:regular,italic' rel='stylesheet' type='text/css'  />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Arvo:regular,bold' rel='stylesheet' type='text/css' />

<script type="text/javascript">
jQuery(document).ready(function() {
   jQuery('#slideshow').cycle({
		fx: 'uncover', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		pager: '#slide-pager',
		pagerAnchorBuilder: function(idx, slide) { 
        return '#slide-pager li:eq(' + idx + ') a'; 
    } 
	});
});
</script>

<!-- colorbox -->
<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("a[rel='colorbox']").colorbox({transition:"elastic"});
	});
</script>

<meta name="temp_url" content="<?php bloginfo('template_directory'); ?>" />

</head>

<?php
if (is_front_page()) {
	$id = 'index-main';
} else {
	$id = 'main';
}
?>

<body <?php body_class($options['theme_style']); ?>>

<div id="<?php echo $id; ?>">

	<div class="container">
    
    	<div id="header">
        
        	<div id="logo">
            
            	<a href="<?php bloginfo('url'); ?>"><img src="<?php echo $options['logo_url']; ?>" alt="<?php bloginfo('name'); ?>"  /></a>
            
            	<h1><?php bloginfo('name'); ?></h1>
                <small><?php bloginfo('description'); ?></small>
            
            </div><!-- end logo -->
            
            <div id="menu">
            
				<?php
				$args = array('theme_location' => 'topnav',
							  'container' => '',
							  'menu_id' => 'nav',
							  'menu_class' => 'sf-menu');
				wp_nav_menu($args); 
				?>

            
            </div><!-- end menu -->
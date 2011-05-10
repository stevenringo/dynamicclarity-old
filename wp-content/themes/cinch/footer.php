<?php global $options; ?>

<div id="footer">

	<div class="container">
    
    	<div class="wrapper">
	
	
			<?php 
			  	$structure = $options['footer_structure']; 

				switch ($structure) {
				case '3 Columns (6-3-3)':
					?>

			    	<div class="column-2">
						<?php 
						if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area A')) :
						endif;
						?>
			        </div><!-- end column 2 -->        

			    	<div class="column-4">
						<?php 
						if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area B')) :
						endif;
						?>
			        </div><!-- end column 4 -->        

			        <div class="column-4-last">
						<?php 
						if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area C')) :
						endif;
						?>
			        </div><!-- end column 4 last -->


				<?php
				break;

				case '3 Columns (3-6-3)':
					?>

			    	<div class="column-4">
						<?php 
						if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area A')) :
						endif;
						?>
			        </div><!-- end column 4 -->        

			    	<div class="column-2">
						<?php 
						if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area B')) :
						endif;
						?>
			        </div><!-- end column 2 -->        

			        <div class="column-4-last">
						<?php 
						if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area C')) :
						endif;
						?>
			        </div><!-- end column 4 last -->


				<?php
				break;

				case '3 Columns (3-3-6)':
					?>

			        <div class="column-4">
						<?php 
						if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area A')) :
						endif;
						?>
			        </div><!-- end column 4 -->

			    	<div class="column-4">
						<?php 
						if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area B')) :
						endif;
						?>
			        </div><!-- end column 4 -->        

			        <div class="column-2-last">
						<?php 
						if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area C')) :
						endif;
						?>
			        </div><!-- end column 2 last -->


				<?php
				break;

				case '2 Columns (6-6)':
					?>

			    	<div class="column-2">
						<?php 
						if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area A')) :
						endif;
						?>
			        </div><!-- end column 2 -->        

			        <div class="column-2-last">
						<?php 
						if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area B')) :
						endif;
						?>
			        </div><!-- end column 2 last -->


				<?php
				break;

				case '4 Columns (3-3-3-3)':
					?>

			    	<div class="column-4">
						<?php 
						if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area A')) :
						endif;
						?>
			        </div><!-- end column 4 -->        

			        <div class="column-4">
						<?php 
						if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area B')) :
						endif;
						?>
			        </div><!-- end column 4 -->

			    	<div class="column-4">
						<?php 
						if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area C')) :
						endif;
						?>
			        </div><!-- end column 4 -->        

			        <div class="column-4-last">
						<?php 
						if(function_exists('dynamic_sidebar') && dynamic_sidebar('Footer Area D')) :
						endif;
						?>
			        </div><!-- end column 4 last -->

				<?php
				break;

				default:
				?>
		    	<div class="column-2">

		        	<h5>From the Blog</h5>

		            <div class="footer-post">

		            	<div class="meta">

		                	<small>March 19, 2011<br />
		                    <a href="#">3 Comments</a></small>

		                </div><!-- end meta -->

		                <div class="post">

		                	<strong><a href="#">The Seaside Stories - Tshirt Design</a></strong>

		                    <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 
		                    Phasellus venenatis mattis nisi. Nunc mattis orci vel arcu. Etiam odio...</p>

		                </div><!-- end post -->

		            </div><!-- end footer post -->

		            <div class="footer-post">

		            	<div class="meta">

		                	<small>March 18, 2011<br />
		                    <a href="#">11 Comments</a></small>

		                </div><!-- end meta -->

		                <div class="post">

		                	<strong><a href="#">The Seaside Stories - Tshirt Design</a></strong>

		                    <p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 
		                    Phasellus venenatis mattis nisi. Nunc mattis orci vel arcu. Etiam odio...</p>

		                </div><!-- end post -->

		            </div><!-- end footer post -->

		        </div><!-- end column 2 -->

		    	<div class="column-4">

		        	<h5>Twitter</h5>

		            <div class="tweet"></div>

		        </div><!-- end column 4 -->        

		        <div class="column-4-last">

		        	<a href="#"><img src="images/footer-logo.png" width="87" height="36" alt="" id="footer-logo"  /></a>

		            <p>Cinch is a site template suitable for businesses, applications, and portfolios. It comes with six color schemes to choose from, as well
		            as a filterable portfolio, and extensive documentation. Buy Cinch now!</p>

		        </div><!-- end column 4 last -->

				<?php
				break;
			}   
			  ?>
	

        </div><!-- end wrapper -->
                
        <div id="copyright">
        
        	<p><?php echo $options['copyright_notice']; ?></p>
            
            <div id="back-top">
            
				<?php
				if ($options['facebook_link'] != "" && $options['twitter_link'] != "") {
					$links = 'You can also find me on <a href="'.$options['twitter_link'].'">Twitter</a> &amp; <a href="'.$options['facebook_link'].'">Facebook</a>.';
				} elseif ($options['facebook_link'] != "") {
					$links = 'You can also find me on <a href="'.$options['facebook_link'].'">Facebook</a>.';
				} elseif ($options['twitter_link'] != "") {
					$links = 'You can also find me on <a href="'.$options['twitter_link'].'">Twitter</a>.';
				} else {
					$links = '';
				}
				
				?>

            	<p><?php echo $links; ?> <a href="#top">Back to top</a></p>
            
            </div><!-- end back top -->
                    
        </div><!-- end copyright -->
    
    </div><!-- end container -->

</div><!-- end footer -->
<?php 
wp_footer();
echo $options['google_analytics'];
?>
</body>
</html>

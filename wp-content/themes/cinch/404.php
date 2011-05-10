<?php
global $options;

get_header(); 
?>


            <div id="page-title">
            
            	<h1>404 Not Found</h1>
                <h3>Apologies, but the page you requested could not be found. Perhaps searching will help.</h3>
            
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
            
		<div class="column-4">
			<h5>Search</h5>
			<?php 
			get_search_form();
			?>
        </div><!-- end column 4 -->        

        <div class="column-4">
			<div class="widget">
				<h5>Categories</h5>
				<ul>
					<?php 
					wp_list_categories(array('title_li' => ''));
					?>
				</ul>        
			</div>
		</div><!-- end column 4 -->

    	<div class="column-4">
			<div class="widget">
				<h5>Archives</h5>
				<ul>
					<?php 
					wp_get_archives(array('title_li' => ''));
					?>
				</ul>        
			</div>
        </div><!-- end column 4 -->        

        <div class="column-4-last">
			<div class="widget">
				<h5>Links</h5>
				<ul>
					<?php 
					wp_list_bookmarks(array('title_li' => '', 'title_before' => '', 'title_after' => ''));
					?>
				</ul>        
			</div>
        </div><!-- end column 4 last -->
                            
    </div><!-- end container -->


</div><!-- end content -->

<?php
get_footer();
?>
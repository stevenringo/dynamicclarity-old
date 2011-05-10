<?php
/**
 *  Cinch Theme: Shortcodes
 */

/*** Dropcap Shortcode ***/
function dropcap( $atts, $content = null ) { 
    return '<span class="dropcap">'.$content.'</span>';
}
add_shortcode('dropcap', 'dropcap');

/*** Blockquote Shortcode ***/
function blockquote( $atts, $content = null ) { 
	$type = '';
	if ($atts['type'] == 'left') {
		$type = '-left';
	}
	if ($atts['type'] == 'right') {
		$type = '-right';
	}
    return '<span class="quote'.$type.'">'.$content.'</span>';
}
add_shortcode('blockquote', 'blockquote');

/*** Button Shortcode ***/
function button( $atts, $content = null ) { 
	$atts = shortcode_atts(array(  
    	"text" => '',
  		"link" => '#',
		"style" => 'gold'
	    ), $atts);
    return '<span class="'.$atts['style'].'-btn"><a href="'.$atts['link'].'">'.$atts['text'].'</a></span>';
}
add_shortcode('button', 'button');

/*** Notification Shortcode ***/
function notification( $atts, $content = null ) { 
	$atts = shortcode_atts(array(  
    	"text" => 'This is a notification box...',
		"type" => 'neutral'
	    ), $atts);
    return '<span class="'.$atts['type'].'-box">'.$atts['text'].'</span>';
}
add_shortcode('notification', 'notification');

/*** Separator Shortcode ***/
function separator( $atts, $content = null ) { 
    return '<div class="separator"></div>';
}
add_shortcode('separator', 'separator');

/*** Code Shortcode ***/
function code( $atts, $content = null ) { 
    return '<code>'.$content.'</code>';
}
add_shortcode('code', 'code');

/*** Price Table Shortcodes ***/
function pricing_table( $atts, $content = null ) { 
    return '<table class="table-styling"><tbody>'.do_shortcode($content).'</tbody></table>';
}
add_shortcode('pricing_table', 'pricing_table');

function pricing_table_row( $atts, $content = null ) { 
    return '<tr>'.do_shortcode($content).'</tr>';
}
add_shortcode('pricing_table_row', 'pricing_table_row');

function title_cell( $atts, $content = null ) { 
	$atts = shortcode_atts(array(  
    	"text" => ''  
	    ), $atts);
    return '<th>'.$atts['text'].'</th>';
}
add_shortcode('title_cell', 'title_cell');

function price_cell( $atts, $content = null ) { 
	$atts = shortcode_atts(array(  
    	"price" => '',
  		"period" => ''
	    ), $atts);
    return '<td class="price-value"><span>'.$atts['price'].'</span> '.$atts['period'].'</td>';
}
add_shortcode('price_cell', 'price_cell');

function option_cell( $atts, $content = null ) { 
    return '<td>'.$content.'</td>';
}
add_shortcode('option_cell', 'option_cell');

function purchase_cell( $atts, $content = null ) { 
	$atts = shortcode_atts(array(  
        "link" => '#',
    	"text" => 'Select Plan'  
	    ), $atts);
    return '<td class="purchase-cell"><span class="gold-btn"><a href="'.$atts['link'].'">'.$atts['text'].'</td>';
}
add_shortcode('purchase_cell', 'purchase_cell');

/*** Column Shortcodes ***/
function column_1( $atts, $content = null ) { 
    return '<div class="column-1">'.do_shortcode($content).'</div>';
}
add_shortcode('column_1', 'column_1');

function column_2( $atts, $content = null ) { 
    return '<div class="column-2">'.do_shortcode($content).'</div>';
}
add_shortcode('column_2', 'column_2');

function column_2_last( $atts, $content = null ) { 
    return '<div class="column-2-last">'.do_shortcode($content).'</div>';
}
add_shortcode('column_2_last', 'column_2_last');

function column_3( $atts, $content = null ) { 
    return '<div class="column-3">'.do_shortcode($content).'</div>';
}
add_shortcode('column_3', 'column_3');

function column_3_last( $atts, $content = null ) { 
    return '<div class="column-3-last">'.do_shortcode($content).'</div>';
}
add_shortcode('column_3_last', 'column_3_last');

function column_4( $atts, $content = null ) { 
    return '<div class="column-4">'.do_shortcode($content).'</div>';
}
add_shortcode('column_4', 'column_4');

function column_4_last( $atts, $content = null ) { 
    return '<div class="column-4-last">'.do_shortcode($content).'</div>';
}
add_shortcode('column_4_last', 'column_4_last');

function column_5( $atts, $content = null ) { 
    return '<div class="column-5">'.do_shortcode($content).'</div>';
}
add_shortcode('column_5', 'column_5');

function column_5_last( $atts, $content = null ) { 
    return '<div class="column-5-last">'.do_shortcode($content).'</div>';
}
add_shortcode('column_5_last', 'column_5_last');

function column_6( $atts, $content = null ) { 
    return '<div class="column-6">'.do_shortcode($content).'</div>';
}
add_shortcode('column_6', 'column_6');

function column_6_last( $atts, $content = null ) { 
    return '<div class="column-6-last">'.do_shortcode($content).'</div>';
}
add_shortcode('column_6_last', 'column_6_last');

function column_2_thirds( $atts, $content = null ) { 
    return '<div class="column-2-thirds">'.do_shortcode($content).'</div>';
}
add_shortcode('column_2_thirds', 'column_2_thirds');

function column_2_thirds_last( $atts, $content = null ) { 
    return '<div class="column-2-thirds-last">'.do_shortcode($content).'</div>';
}
add_shortcode('column_2_thirds_last', 'column_2_thirds_last');

function column_2_fourths( $atts, $content = null ) { 
    return '<div class="column-2-fourths">'.do_shortcode($content).'</div>';
}
add_shortcode('column_2_fourths', 'column_2_fourths');

function column_2_fourths_last( $atts, $content = null ) { 
    return '<div class="column-2-fourths-last">'.do_shortcode($content).'</div>';
}
add_shortcode('column_2_fourths_last', 'column_2_fourths_last');

//Contact Form Shortcode
function contactform( $atts, $content = null ) { 
	$atts = shortcode_atts(array(  
        "to" => '',
    	"subject" => 'Contact from Website'  
	    ), $atts);
    return '<form method="post" action="scripts/contact_form/sendEmail.php">
		<div id="container">

			<div id="contact-form">
				<input type="hidden" name="to" value="'.$atts['to'].'" id="to" /><input type="hidden" name="subject" value="'.$atts['subject'].'" id="subject" />
				<p><small>Name:</small> <input type="text" name="name" id="name" /></p>
				<p><small>Email Address:</small> <input type="text" name="email" id="email" /></p>
				<p><small>Your message:</small> <textarea name="comments" id="comments" rows="12" cols="10"></textarea></p>
				<p><input type="submit" name="submit" id="submit" value="Send Message" /></p>
				<ul id="response"><li></li></ul>
			</div><!--end contact-form -->

		</div><!-- end container -->
	</form>';
}
add_shortcode('contactform', 'contactform');
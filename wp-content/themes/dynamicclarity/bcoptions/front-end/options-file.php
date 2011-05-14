<?php

global $bcoptions;



$bcoptions = array(
	array(
		'title' => 'Cinch Options',
		'slug' => 'cinch',
		'options' => array(
		array(
			'item_id' => 'logo_url',
			'item_title' => 'Logo',
			'item_desc' => 'Enter the URL of your logo. It will appear in the header of every page',
			'item_type' => 'input'
			),
		array(
			'item_id' => 'theme_style',
			'item_title' => 'Choose a theme style',
			'item_desc' => 'Please select one of the six color schemes that come with this theme.',
			'item_type' => 'select',
			'item_options' => array('red', 'green', 'navyblue', 'aquablue', 'orange', 'teal')
			),
		array(
			'item_id' => 'footer_structure',
			'item_title' => 'Choose a footer structure',
			'item_desc' => 'What column structure would you like to use in the footer. Each of those columns can be populated with widget on the Widgets page. If you choose a 3 column structure, those columns are represented by widget area Footer Area A, Footer Area B and Footer Area C from left to right. If you choose a 2 column structure, those columns are represented by widget area Footer Area A and Footer Area B from left to right. If you choose a 4 column structure, those columns are represented by widget area Footer Area A, Footer Area B, Footer Area C and Footer Area D from left to right. If none is set, the default 6-3-3 structure will be shown with static filler content.',
			'item_type' => 'select',
			'item_options' => array('3 Columns (6-3-3)', '3 Columns (3-6-3)', '3 Columns (3-3-6)', '2 Columns (6-6)', '4 Columns (3-3-3-3)')
			),
		array(
			'item_id' => 'copyright_notice',
			'item_title' => 'Copyright Notice',
			'item_desc' => 'Enter the copyright text that you\'d like to display in the footer. ',
			'item_type' => 'input'
			),
		array(
			'item_id' => 'facebook_link',
			'item_title' => 'Facebook Profile',
			'item_desc' => 'Here you can enter the link to your Facebook profile. It will appear in the bottom-right corner of the footer, together with your Twitter link.',
			'item_type' => 'input'
			),
		array(
			'item_id' => 'twitter_link',
			'item_title' => 'Twitter Profile',
			'item_desc' => 'Here you can enter the link to your Twitter profile. It will appear in the bottom-right corner of the footer, together with your Facebook link.',
			'item_type' => 'input'
			),
		array(
			'item_id' => 'google_analytics',
			'item_title' => 'Google Analytics',
			'item_desc' => 'Enter your google analytics code here. <em>(Optional)</em>',
			'item_type' => 'textarea'
			),
		)
	),
	array(
		'title' => 'Homepage Options',
		'slug' => 'homepage',
		'options' => array(
		array(
			'item_id' => 'homepage_tagline',
			'item_title' => 'Homepage Tagline',
			'item_desc' => 'Enter a tagline or slogan that will appear above the slider on the homepage.',
			'item_type' => 'input'
			),
		array(
			'item_id' => 'homepage_subtagline',
			'item_title' => 'Homepage Subtagline',
			'item_desc' => 'Enter a subtagline that will appear above the slider on the homepage, right underneath your main tagline.',
			'item_type' => 'input'
			),
		array(
			'item_id' => 'home_column_1',
			'item_title' => 'Home Column 1',
			'item_desc' => 'Add the content of the first column on the homepage here. You can use HTML in here: h3-tags for headers, a-tags for links and a-tags with a class of "btn" for nice button os seens on the live preview.',
			'item_type' => 'textarea'
			),
		array(
			'item_id' => 'home_column_2',
			'item_title' => 'Home Column 2',
			'item_desc' => 'Add the content of the second column on the homepage here. You can use HTML in here: h3-tags for headers, a-tags for links and a-tags with a class of "btn" for nice button os seens on the live preview.',
			'item_type' => 'textarea'
			),
		array(
			'item_id' => 'home_column_3',
			'item_title' => 'Home Column 3',
			'item_desc' => 'Add the content of the third column on the homepage here. You can use HTML in here: h3-tags for headers, a-tags for links and a-tags with a class of "btn" for nice button os seens on the live preview.',
			'item_type' => 'textarea'
			),
		array(
			'item_id' => 'home_column_4',
			'item_title' => 'Home Column 4',
			'item_desc' => 'Add the content of the fourth column on the homepage here. You can use HTML in here: h3-tags for headers, a-tags for links and a-tags with a class of "btn" for nice button os seens on the live preview.',
			'item_type' => 'textarea'
			),
		array(
			'item_id' => 'blog_on_home',
			'item_title' => 'Show latest blog posts on homepage',
			'item_desc' => 'Check This box if you want to show the latest blog posts beneath the columns on the homepage.',
			'item_type' => 'checkbox'
			),
		)
	),
);



/*
$bcoptions = array(
	array(
		'title' => 'Main Options',
		'slug' => 'main',
		'options' => array(
		array(
			'item_id' => 'textblock',
			'item_title' => 'Textblock',
			'item_desc' => 'Here is a textblock with HTML in it. You can use this space to transition to the next section or subsection within a tab on the Theme Options page. It\'s use is strictly for the admin UI and is not for the front-end of the web site.',
			'item_type' => 'textblock'
			),
		array(
			'item_id' => 'input',
			'item_title' => 'Input',
			'item_desc' => 'You can save a simple string here. Maybe a link to feedburner or your Twitter username. ',
			'item_type' => 'input'
			),
		array(
			'item_id' => 'checkbox',
			'item_title' => 'Checkbox',
			'item_desc' => 'You could ask a question with a checkbox. For example, do you want to activate asynchronous Google analytics? ',
			'item_type' => 'checkbox'
			),
		array(
			'item_id' => 'radio',
			'item_title' => 'Radio',
			'item_desc' => 'You could ask a question with a radio input. For example, do you want to activate asynchronous Google analytics? ',
			'item_type' => 'radio',
			'item_options' => array('yes', 'no')
			),
		array(
			'item_id' => 'select',
			'item_title' => 'Select',
			'item_desc' => 'Use this to list different theme styles or choose some other important setting. ',
			'item_type' => 'select',
			'item_options' => array('yes', 'no', 'lolol')
			),
		array(
			'item_id' => 'textarea',
			'item_title' => 'Textarea',
			'item_desc' => 'Here users can add custom code or text for use in your theme. ',
			'item_type' => 'textarea'
			),
		array(
			'item_id' => 'categories',
			'item_title' => 'Categories',
			'item_desc' => 'Choose from a list of categories and save as a single category ID for use in a function or loop.',
			'item_type' => 'categories'
			),
		array(
			'item_id' => 'pages',
			'item_title' => 'Pages',
			'item_desc' => 'Choose from a list of pages and save as a single page ID for use in a function or loop. ',
			'item_type' => 'pages'
			)
		)
	),
	array(
		'title' => 'Slider Options',
		'slug' => 'slider',
		'options' => array(
		array(
			'item_id' => 'second_textblock',
			'item_title' => 'Second Textblock',
			'item_desc' => 'This is to show that it is possible to have different option pages, with different options.',
			'item_type' => 'textblock'
			),
		)
	),
);
*/
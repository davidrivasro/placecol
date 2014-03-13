<?php
/*********************************************
* General Options
*********************************************
*/
$this->admin_option(array('General', 1),
	'Title', 'maintitle', 
	'text', 'beauty <span>center</span>', 
	array('help' => 'Change the color of title from Theme Colors tab', 'display'=>'extended')
);
$this->admin_option('General',
	'Logo Image', 'logo', 
	'imageupload', get_template_directory_uri() . "/images/logo.png", 
	array('help' => 'Use logo as image intead of text title. Delete the title text if using image.', 'display'=>'extended')
);
$this->admin_option('General', 
	'Favicon', 'favicon', 
	'imageupload', get_template_directory_uri() . "/images/favicon.ico", 
	array('help' => '')
);
$this->admin_option('General',
	'Enable top Admin Bar on frontend', 'enable_adminbar', 
	'select', 'disable',
	array('help'=>'Enable the admin top bar for the front end pages', 'display'=>'inline', 'options'=>array('enable' => 'Enable', 'disable' => 'Disable'))
);
$this->admin_option('General',
	'Enable comments on pages', 'enable_page_comments', 
	'select', 'disable',
	array('help'=>'Enable comments on pages', 'display'=>'inline', 'options'=>array('enable' => 'Enable', 'disable' => 'Disable'))
);
$this->admin_option('General',
	'Use Left or Right sidebar on pages and blog', 'enable_sidebar_position', 
	'select', 'left',
	array('help'=>'This will change the position of the sidebar to the left or right', 'display'=>'inline', 'options'=>array('right' => 'Right', 'left' => 'Left'))
);
$this->admin_option('General',
	'Twitter Username', 'twitter_username', 
	'text', 'famousthemes', 
	array('help' => 'Will be used in Twitter custom widget', 'display'=>'inline')
);
$this->admin_option('General',
	'Tweets number', 'twitter_nr', 
	'text', '1', 
	array('help' => 'Number of tweets to show', 'display'=>'inline')
);
$this->admin_option('General',
	'Twitter join text', 'twitter_join_text', 
	'text', 'we were', 
	array('help' => 'Twitter text for simple tweet', 'display'=>'inline')
);
$this->admin_option('General',
	'Twitter join text for urls', 'twitter_join_text_url', 
	'text', 'we were checking out', 
	array('help' => 'Twitter text for urls', 'display'=>'inline')
);
$this->admin_option('General',
	'Twitter join text for reply', 'twitter_join_text_reply', 
	'text', 'we reply', 
	array('help' => 'Twitter text for reply', 'display'=>'inline')
);

$this->admin_option('General',
	'Custom CSS', 'custom_css', 
	'textarea', '', 
	array('help' => '')
);

$this->admin_option('General',
	'Footer Text', 'footer_text', 
	'textarea', 'Beauty Center | Premium Wordpress Theme by <a href="http://famousthemes.com">Famous Themes</a> <br /> Photos by <a href="http://antondemin.ru/" target="_blank">antondemin.ru</a>', 
	array('help' => '')
);

$this->admin_option('General',
	'Analytics Code', 'analytics_code', 
	'textarea', '', 
	array('help' => '')
);
/*********************************************
* Backgound
*********************************************
*/
$this->admin_option(array('Background', 2),
	'Html Background Color', 'html_bg_color', 
	'colorpicker', '',
	array('help' => 'Main Website Background CSS Color. Used only when you don-t want to use images. Clear the below fields if you want to use only a CSS color as background.', 'display'=>'extended')
);
$this->admin_option('Background',
	'Html Background Image', 'html_bg_image', 
	'imageupload', '',
	array('help' => 'Main Website Html Background image. This will stay under the Body image used. Best to use is a texture or pattern', 'display'=>'extended')
);
$this->admin_option('Background',
	'Html Background Image Repeat', 'html_bg_image_repeat', 
	'select', '',
	array('help'=>'', 'display'=>'inline', 'options'=>array('repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y', 'no-repeat' => 'no-repeat', '' => 'no-repeat'))
);
$this->admin_option('Background',
	'Html Background Image Repeat Position', 'html_bg_image_repeat_position', 
	'select', '',
	array('help'=>'', 'display'=>'inline', 'options'=>array('' => 'none', 'top' => 'top', 'right' => 'right', 'left' => 'left', 'bottom' => 'bottom'))
);
$this->admin_option('Background',
	'Body Background Image', 'body_bg_image', 
	'imageupload', '',
	array('help' => 'Main Website Body Background image. This will stay on top of the Html image used. Best to use is a texture or pattern', 'display'=>'extended')
);
$this->admin_option('Background',
	'Body Background Image Repeat', 'body_bg_image_repeat', 
	'select', '',
	array('help'=>'', 'display'=>'inline', 'options'=>array('repeat' => 'repeat', 'repeat-x' => 'repeat-x', 'repeat-y' => 'repeat-y', 'no-repeat' => 'no-repeat', '' => 'no-repeat'))
);
$this->admin_option('Background',
	'Body Background Image Repeat Position', 'body_bg_image_repeat_position', 
	'select', '',
	array('help'=>'', 'display'=>'inline', 'options'=>array('' => 'none', 'top' => 'top', 'right' => 'right', 'left' => 'left', 'bottom' => 'bottom'))
);
/*********************************************
* Slider
*********************************************
*/
$this->admin_option(array('Slider', 3),
	'Enable Home Slider', 'show_home_slider', 
	'select', 'enable',
	array('help'=>'', 'display'=>'inline', 'options'=>array('enable' => 'Enable', 'disable' => 'Disable'))
);
$this->admin_option('Slider',
	'Enable Home Slider caption', 'show_home_slider_caption', 
	'select', 'enable',
	array('help'=>'', 'display'=>'inline', 'options'=>array('enable' => 'Enable', 'disable' => 'Disable'))
);
$this->admin_option('Slider',
	'Enable Home Slider navigation', 'show_home_slider_navigation', 
	'select', 'true',
	array('help'=>'', 'display'=>'inline', 'options'=>array('true' => 'true', 'false' => 'false'))
);
$this->admin_option('Slider',
	'Enable Home Slider Hover link', 'enable_slider_hover_link', 
	'select', 'enable',
	array('help'=>'', 'display'=>'inline', 'options'=>array('enable' => 'Enable', 'disable' => 'Disable'))
);
$this->admin_option('Slider',
	'Slider animation', 'slider_animation', 
	'select', 'fade',
	array('help'=>'', 'display'=>'inline', 'options'=>array('fade' => 'fade', 'slide' => 'slide'))
);
$this->admin_option('Slider',
	'Slideshow speed', 'slideshowspeed', 
	'text', '7000',
	array('help' => 'Set the speed of the slideshow cycling, in milliseconds.', 'display'=>'inline')
);
$this->admin_option('Slider',
	'Animation speed', 'animationspeed', 
	'text', '600',
	array('help' => 'Set the speed of animations, in milliseconds.', 'display'=>'inline')
);
/*********************************************
* Theme Colors
*********************************************
*/
$this->admin_option(array('Colors', 4),
	'Main color style', 'main_color', 
	'select', 'purple', 
	array('help'=>'', 'display'=>'inline', 'options'=>array('purple' => 'purple', 'blue' => 'blue', 'green' => 'green', 'gray' => 'grayscale', 'orange' => 'orange'))
);
$this->admin_option('Colors', 
	'Main links color', 'links_colors', 
	'colorpicker', '', 
	array('help' => 'This will replace all pink default color used all over the demo page', 'display'=>'inline')
);

$this->admin_option('Colors',
	'Logo title color', 'title_color', 
	'colorpicker', 'ffffff', 
	array('display' => 'inline')
);
$this->admin_option('Colors', 
	'Logo title span color', 'title_span_color', 
	'colorpicker', '', 
	array('help' => 'If use span in the title you can make it another color', 'display'=>'inline')
);
$this->admin_option('Colors', 
	'Drop down menu bg color', 'dropdown_color', 
	'colorpicker', '', 
	array('help' => 'The color of the drop down menu', 'display'=>'inline')
);
$this->admin_option('Colors', 
	'Mobile Menu Background color', 'mobile_menu_bg_color', 
	'colorpicker', '', 
	array('help' => 'This color will be available for the menu background when the resolution is smaller down to a mobile device. Will replace the color scheme color you have selected.', 'display'=>'inline')
);
$this->admin_option('Colors', 
	'Slider Caption Background color', 'slidercaption_bgcolor', 
	'colorpicker', '', 
	array('help' => 'The background color of the slider caption.', 'display'=>'inline')
);
$this->admin_option('Colors', 
	'Lists bullet', 'lists_bullet', 
	'imageupload', '',  
	array('help' => 'The bullet icon used on lists', 'display'=>'inline')
);

/*********************************************
* Social Icons
*********************************************
*/
$this->admin_option(array('Social icons', 5),
	'RSS icon', 'icon_rss', 
	'imageupload', get_template_directory_uri() . "/images/social_icons/icon_rss.png", 
	array('help' => 'Remove if you do not want to display this icon', 'display'=>'inline')
);
$this->admin_option('Social icons',
	'RSS icon URL', 'url_rss', 
	'text', '', 
	array('help' => '')
);
$this->admin_option('Social icons', 
	'Twitter icon', 'icon_twitter', 
	'imageupload', get_template_directory_uri() . "/images/social_icons/icon_twitter.png",  
	array('help' => 'Remove if you do not want to display this icon', 'display'=>'inline')
);
$this->admin_option('Social icons',
	'Twitter icon URL', 'url_twitter', 
	'text', '', 
	array('help' => '')
);
$this->admin_option('Social icons', 
	'Facebook icon', 'icon_facebook', 
	'imageupload', get_template_directory_uri() . "/images/social_icons/icon_facebook.png",  
	array('help' => 'Remove if you do not want to display this icon', 'display'=>'inline')
);
$this->admin_option('Social icons',
	'Facebook icon URL', 'url_facebook', 
	'text', '', 
	array('help' => '')
);
$this->admin_option('Social icons', 
	'Google icon', 'icon_google', 
	'imageupload', get_template_directory_uri() . "/images/social_icons/icon_google.png",  
	array('help' => 'Remove if you do not want to display this icon', 'display'=>'inline')
);
$this->admin_option('Social icons',
	'Google icon URL', 'url_google', 
	'text', '', 
	array('help' => '')
);

$this->admin_option('Social icons', 
	'Social icon', 'freeicon_1', 
	'imageupload', '',  
	array('help' => 'Upload your social icon', 'display'=>'inline')
);
$this->admin_option('Social icons',
	'Social icon URL', 'freeicon_1_url', 
	'text', '', 
	array('help' => 'Add your social icon url')
);
$this->admin_option('Social icons', 
	'Social icon', 'freeicon_2', 
	'imageupload', '',  
	array('help' => 'Upload your social icon', 'display'=>'inline')
);
$this->admin_option('Social icons',
	'Social icon URL', 'freeicon_2_url', 
	'text', '', 
	array('help' => 'Add your social icon url')
);
$this->admin_option('Social icons', 
	'Social icon', 'freeicon_3', 
	'imageupload', '',  
	array('help' => 'Upload your social icon', 'display'=>'inline')
);
$this->admin_option('Social icons',
	'Social icon URL', 'freeicon_3_url', 
	'text', '', 
	array('help' => 'Add your social icon url')
);
$this->admin_option('Social icons', 
	'Social icon', 'freeicon_4', 
	'imageupload', '',  
	array('help' => 'Upload your social icon', 'display'=>'inline')
);
$this->admin_option('Social icons',
	'Social icon URL', 'freeicon_4_url', 
	'text', '', 
	array('help' => 'Add your social icon url')
);
$this->admin_option('Social icons', 
	'Social icon', 'freeicon_5', 
	'imageupload', '',  
	array('help' => 'Upload your social icon', 'display'=>'inline')
);
$this->admin_option('Social icons',
	'Social icon URL', 'freeicon_5_url', 
	'text', '', 
	array('help' => 'Add your social icon url')
);
/*********************************************
* Widgets
*********************************************
*/
$this->admin_option(array('Widgets', 6),
	'Enable Footer Widget Area', 'show_widget_area_footer', 
	'select', 'enable',
	array('help'=>'', 'display'=>'inline', 'options'=>array('enable' => 'Enable', 'disable' => 'Disable'))
);
/*********************************************
* Photos page Options
*********************************************
*/
$this->admin_option(array('Photos Page', 7),
	'Photos page main title', 'portfolio_maintitle', 
	'text', 'Our Photo <span>Gallery</span>', 
	array('help' => '')
);
$this->admin_option('Photos Page',
	'Filter View All text', 'viewall', 
	'text', 'View all', 
	array('help' => '')
);
$this->admin_option('Photos Page',
	'Enable sidebar on photos page', 'enable_photos_sidebar', 
	'select', 'true',
	array('help'=>'Use Sidebar Photos in Widgets section to add your widgets', 'display'=>'inline', 'options'=>array('true' => 'true', 'false' => 'false'))
);
$this->admin_option('Photos Page',
	'Photos per page', 'perpage', 
	'text', '9', 
	array('help' => 'Download WP_PageNavi Plugin at: http://wordpress.org/extend/plugins/wp-pagenavi/ - Page Navigation Will Appear If Plugin Is Installed', 'display'=>'inline')
);
/*********************************************
* Contact Options
*********************************************
*/
$this->admin_option(array('Contact Page', 8),
	'Enable Contact Form', 'show_contact_form', 
	'select', 'enable',
	array('help'=>'', 'display'=>'inline', 'options'=>array('enable' => 'Enable', 'disable' => 'Disable'))
);
$this->admin_option('Contact Page',
	'Contact form title', 'contact_form_title', 
	'text', 'Contact form', 
	array('help' => '')
);
$this->admin_option('Contact Page',
	'Contact email', 'contactemail', 
	'text', '', 
	array('help' => '')
);
$this->admin_option('Contact Page',
	'Enable phone input option', 'show_contact_phone', 
	'select', 'disable', 
	array('help'=>'', 'display'=>'inline', 'options'=>array('enable' => 'Enable', 'disable' => 'Disable'))
);
$this->admin_option('Contact Page',
	'Enable another custom input option', 'show_contact_custom', 
	'select', 'disable', 
	array('help'=>'', 'display'=>'inline', 'options'=>array('enable' => 'Enable', 'disable' => 'Disable'))
);
$this->admin_option('Contact Page',
	'Custom input option label', 'show_contact_custom_label', 
	'text', '', 
	array('help' => '')
);
$this->admin_option('Contact Page',
	'Contact subject title', 'contactsubject', 
	'text', 'Contact subject title', 
	array('help' => '')
);
$this->admin_option('Contact Page',
	'Contact succes message', 'contactsucces', 
	'text', 'Your message has been sent. Thank you!', 
	array('help' => 'Do not use single or double quotes in the text.', 'display'=>'inline')
);

/*********************************************
* Reset Options
*********************************************
*/
$this->admin_option(array('Reset', 9), 
'Reset Theme Options - W-P-L-O-C-K-E-R-.-C-O-M', 'reset_options', 
'content', '
<div id="admin_reset_options" style="margin-bottom:40px; display:none;"></div>
<div style="margin-bottom:40px;"><a class="admin-button-reset" onclick="if (confirm(\'All the saved settings will be lost! Do you really want to continue?\')) { admincore_form(\'admin_options&do=reset\', \'fpForm\',\'admin_reset_options\',\'true\'); } return false;">Reset Options Now</a></div>', 
array('help' => '<span style="color:red; margin:0 0 40px 0; display:block;"><strong>Note:</strong> All the previous saved settings will be lost!</span>', 'display'=>'extended-top')
);

?>
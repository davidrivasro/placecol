<?php
/*------------------------------FULL WIDTH SHORTCODES--------------------*/

function fullcontent( $atts, $content = null)
{
 extract(shortcode_atts(array(
        'title'      => '',
        ), $atts));
   return '<div class="left_full shortcode"><h1>'.$title.'</h1><p>'.do_shortcode($content) .'</p></div>';
}
add_shortcode('fullcontent', 'fullcontent');

function halfcontent( $atts, $content = null)
{
 extract(shortcode_atts(array(
        'title'      => '',
        ), $atts));
   return '<div class="left12 shortcode"><h2>'.$title.'</h2><p>'.do_shortcode($content) .'</p></div>';
}
add_shortcode('halfcontent', 'halfcontent');

function twothirdscontent( $atts, $content = null)
{
 extract(shortcode_atts(array(
        'title'      => '',
        ), $atts));
   return '<div class="left23 shortcode"><h2>'.$title.'</h2><p>'.do_shortcode($content) .'</p></div>';
}
add_shortcode('twothirdscontent', 'twothirdscontent');

function twothirdscontentimg( $atts, $content = null)
{
 extract(shortcode_atts(array(
        'title'      => '',
		'thumburl'      => '',
		'moreurl'      => '',
        ), $atts));
   return '<div class="left23"><h2>'.$title.'</h2><div class="left_round_thumb"><img src="'.$thumburl.'" alt="" title="" /></div><p>'.do_shortcode($content) .'</p><a href="'.$moreurl.'" class="more">read more</a></div>';
}
add_shortcode('twothirdscontentimg', 'twothirdscontentimg');        

/*------------------------------IMAGES SHORTCODES--------------------*/

function onethirdscontent( $atts, $content = null)
{
 extract(shortcode_atts(array(
        'title'      => '',
        ), $atts));
   return '<div class="left13 shortcode"><h2>'.$title.'</h2><p>'.do_shortcode($content) .'</p></div>';
}
add_shortcode('onethirdscontent', 'onethirdscontent');

function quartercontent( $atts, $content = null)
{
 extract(shortcode_atts(array(
        'title'      => '',
        ), $atts));
   return '<div class="left14 shortcode"><h3>'.$title.'</h3><p>'.do_shortcode($content) .'</p></div>';
}
add_shortcode('quartercontent', 'quartercontent');

/*------------------------------VIDEO SHORTCODES--------------------*/
function service( $atts, $content = null)
{
 extract(shortcode_atts(array(
 		'title'      => '',
		'price'      => '',
		'special'      => '',
        ), $atts));
   return '<div class="service_row"><div class="service_row_content"><div class="service_price'.$special.'">'.$price.'</div><div class="service_right"><h3>'.$title.'</h3><p>'.do_shortcode($content) .'</p></div><div class="clear"></div></div></div>';
}
add_shortcode('service', 'service');
            
/*------------------------------VIDEO SHORTCODES--------------------*/

function video( $atts, $content = null)
{
 extract(shortcode_atts(array(
 		'title'      => '',
        ), $atts));
   return '<div class="videocontainer"><iframe src="'.do_shortcode($content) .'" frameborder="0" width="400" height="225" webkitAllowFullScreen allowfullscreen></iframe></div>';
}
add_shortcode('video', 'video');

function icon( $atts, $content = null)
{
 extract(shortcode_atts(array(
 		'title'      => '',
		'iconurl'      => '',
		'iconlink'      => '',
        ), $atts));
   return '<div class="contact_info_row"><div class="icon_link"><a href="'.$iconlink.'" title="'.$title.'" class="icon_link_img"><img src="'.$iconurl.'" alt="" title="" border="0"/></a></div><p><strong>'.$title.'</strong>'.do_shortcode($content) .'</p></div>';
}
add_shortcode('icon', 'icon');

/*------------------------------MAP SHORTCODES--------------------*/

function googlemap($atts, $content = null) {
extract(shortcode_atts(array(
"width" => '100%',
"height" => '250',
), $atts));
return '<div class="gmap"><iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.do_shortcode($content) .'&output=embed"></iframe></div>';
}
add_shortcode("googlemap", "googlemap");


/*------------------------------BUTTONS SHORTCODES--------------------*/

function button($atts, $content = null) {
extract(shortcode_atts(array(
"color" => '',
"title" => '',
'buttonlink' => '',
), $atts));
return '<div class="button_divider shortcode"><div class="button"><a href="'.$buttonlink.'" class="'.$color.'">'.$title.'</a></div><p>'.do_shortcode($content) .'</p></div>';
}
add_shortcode("button", "button");

?>

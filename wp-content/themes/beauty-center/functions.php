<?php
/*----------------------------------------------------------------------*/
/* Include Files */
/*----------------------------------------------------------------------*/
require_once (get_template_directory() . '/admin/core.php');
require_once(get_template_directory() . '/admin/post-options.php');
require_once(get_template_directory() . '/admin/slider-options.php');
require_once(get_template_directory() . '/admin/portfolio-post-type.php');
require_once(get_template_directory() . '/admin/shortcodes.php');
require_once(get_template_directory() . '/admin/widgets/category-posts.php');
require_once(get_template_directory() . '/admin/widgets/widget-flickr.php');
require_once(get_template_directory() . '/admin/widgets/widget-twitter.php');
require_once(get_template_directory() . '/admin/widgets/widget-text.php');
require_once(get_template_directory() . '/admin/widgets/widget-testimonial.php');
$famoustheme = new Admincore();
$famoustheme->theme_name = 'Beauty Center';
$famoustheme->load();
add_theme_support( 'automatic-feed-links' );
if ( ! isset( $content_width ) ) $content_width = 900;
if($famoustheme->get_option('enable_adminbar') == 'disable') {
add_filter( 'show_admin_bar', '__return_false' );
}

function theme_styles() {
    global $famoustheme;
    $themecolor=$famoustheme->get_option('main_color');
    wp_enqueue_style( 'main-style', get_stylesheet_uri() );
	wp_enqueue_style( 'prettyPhoto', get_template_directory_uri() . '/css/prettyPhoto.css' );
	wp_enqueue_style( 'custom-color-style', get_template_directory_uri() . '/css/'.$themecolor.'.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_styles' );

function theme_ie_styles()
{
	global $wp_styles;
	wp_register_style('ie-only', get_template_directory_uri() . '/css/ie.css', false, '1', false);
	$wp_styles->add_data('ie-only', 'conditional', 'IE');
	wp_enqueue_style('ie-only');
}
add_action( 'wp_enqueue_scripts', 'theme_ie_styles' );


function mytheme_fonts() {
$protocol = is_ssl() ? 'https' : 'http';
wp_enqueue_style( 'mytheme-dosis', "$protocol://fonts.googleapis.com/css?family=Dosis:200' rel='stylesheet' type='text/css" );}
add_action( 'wp_enqueue_scripts', 'mytheme_fonts' );


function theme_scripts() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script('prettyPhoto', get_template_directory_uri().'/scripts/jquery.prettyPhoto.js', false, '1', true);
    wp_enqueue_script('menu', get_template_directory_uri().'/scripts/menu.js', false, '1', true);
	wp_enqueue_script('fitvids', get_template_directory_uri().'/scripts/jquery.fitvids.js', false, '1', true);
	wp_enqueue_script('quicksand', get_template_directory_uri().'/scripts/jquery.quicksand.js', false, '1', true);
	wp_enqueue_script('custom', get_template_directory_uri().'/scripts/custom.quicksand.js', false, '1', true);
	wp_enqueue_script('tweet', get_template_directory_uri().'/admin/twitter/jquery.tweet.js', false, '1', true);
	wp_enqueue_script('flexslider', get_template_directory_uri().'/scripts/jquery.flexslider-min.js', false, '1', true);
	wp_enqueue_script('effects', get_template_directory_uri().'/scripts/effects.js', false, '1', true);
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

function add_this_script_footer(){ ?>

<script type="text/javascript">
var main_menu=new main_menu.dd("main_menu");
main_menu.init("main_menu","menuhover");
$(".videocontainer").fitVids();
</script>

<?php } 

add_action('wp_footer', 'add_this_script_footer', 20);

function slider_initialize() { ?>
<script type="text/javascript" charset="utf-8">
jQuery(window).load(function() {
$('.flexslider').flexslider({
animation: "<?php global $famoustheme; $famoustheme->option('slider_animation'); ?>",
directionNav: <?php $famoustheme->option('show_home_slider_navigation'); ?>,
slideshowSpeed: <?php $famoustheme->option('slideshowspeed'); ?>,           
animationSpeed: <?php $famoustheme->option('animationspeed'); ?>  
});
});
</script>
<?php }
add_action( 'wp_footer', 'slider_initialize' );


function html_widget_title( $title ) {
//HTML tag opening/closing brackets
$title = str_replace( '[', '<', $title );
$title = str_replace( '[/', '</', $title );
$title = str_replace( 'span]', 'span>', $title );
$title = str_replace( '[/', '</', $title );
// bold -- changed from 's' to 'strong' because of strikethrough code
$title = str_replace( 'strong]', 'strong>', $title );
$title = str_replace( 'b]', 'b>', $title );
// italic
$title = str_replace( 'em]', 'em>', $title );
$title = str_replace( 'i]', 'i>', $title );

return $title;
}
add_filter( 'widget_title', 'html_widget_title' );
/*----------------------------------------------------------------------*/
/* Remove images atributes to make them 100% width */
/*----------------------------------------------------------------------*/
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
// Removes attached image sizes as well
add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

/*----------------------------------------------------------------------*/
/* Register main menu */
/*----------------------------------------------------------------------*/
add_action('init', 'theme_register_menu');
function theme_register_menu() {
    if (function_exists('register_nav_menus')) {
		register_nav_menus( array(
		'theme-main-menu' => 'Main Menu',
		'theme-main-fmenu' => 'Footer Menu'
		) );
    }
}
function theme_default_menu() {
    echo '<ul id="main_menu">';
    if ('page' != get_option('show_on_front')) {
        echo '<li><a href="'. home_url() . '/">Home</a></li>';
    }
    wp_list_pages('title_li=');
    echo '</ul>';
}
/*----------------------------------------------------------------------*/
/* Create custom post types */
/*----------------------------------------------------------------------*/
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'slider',
	array(
	  'labels' => array(
		'name' => __( 'Home slider','admincore' ),
		'add_new_item' => __('Add New Slide','admincore'),
		'singular_name' => __( 'Slider item','admincore' )
	  ),
	  'public' => true,
	  'menu_icon' => get_template_directory_uri().'/scripts/images/element_slideshow.gif',
	  'supports' => array( 'title', 'page-attributes', 'excerpt', 'thumbnail')
	)
	);
}
post_type_supports( $postype, $feature );
/*----------------------------------------------------------------------*/
/* Add shortcode buttons */
/*----------------------------------------------------------------------*/
add_action('init', 'add_button');
function add_button() {  
   if ( current_user_can('edit_posts') &&  current_user_can('edit_pages') )  
   {  
	 add_filter('mce_external_plugins', 'add_plugin');  
	 add_filter('mce_buttons', 'register_button');  
   }  
}    
function register_button($buttons) {  
   array_push($buttons, "fullcontent", "halfcontent", "twothirdscontent", "twothirdscontentimg", "onethirdscontent", "quartercontent", "service", "video", "icon", "googlemap", "button");  
   return $buttons;  
} 
function add_plugin($plugin_array) {  
   $plugin_array['fullcontent'] = get_template_directory_uri().'/scripts/customcodes.js';
   $plugin_array['halfcontent'] = get_template_directory_uri().'/scripts/customcodes.js';
   $plugin_array['twothirdscontent'] = get_template_directory_uri().'/scripts/customcodes.js';
   $plugin_array['twothirdscontentimg'] = get_template_directory_uri().'/scripts/customcodes.js';
   $plugin_array['onethirdscontent'] = get_template_directory_uri().'/scripts/customcodes.js';
   $plugin_array['quartercontent'] = get_template_directory_uri().'/scripts/customcodes.js';
   $plugin_array['service'] = get_template_directory_uri().'/scripts/customcodes.js';
   $plugin_array['video'] = get_template_directory_uri().'/scripts/customcodes.js';
   $plugin_array['icon'] = get_template_directory_uri().'/scripts/customcodes.js';
   $plugin_array['googlemap'] = get_template_directory_uri().'/scripts/customcodes.js';
   $plugin_array['button'] = get_template_directory_uri().'/scripts/customcodes.js';
   return $plugin_array;  
}  
/*----------------------------------------------------------------------*/
/* Home exerpt used for posts on home page */
/*----------------------------------------------------------------------*/
add_filter('the_excerpt', 'home_excerpts');
function home_excerpts($content = false) {
            global $post;
            $mycontent = $post->post_excerpt;
 
            $mycontent = $post->post_content;
            $mycontent = strip_shortcodes($mycontent);
            $mycontent = str_replace(']]>', ']]&gt;', $mycontent);
            $mycontent = strip_tags($mycontent);
            $excerpt_length = 7;
            $words = explode(' ', $mycontent, $excerpt_length + 1);
            if(count($words) > $excerpt_length) :
                array_pop($words);
                array_push($words, '...');
                $mycontent = implode(' ', $words);
            endif;
            $mycontent = '<p>' . $mycontent . '</p>';
// Make sure to return the content
    return $mycontent;
}
function blog_excerpts($content = false) {
            global $post;
            $mycontent = $post->post_excerpt;
 
            $mycontent = $post->post_content;
            $mycontent = strip_shortcodes($mycontent);
            $mycontent = str_replace(']]>', ']]&gt;', $mycontent);
            $mycontent = strip_tags($mycontent);
            $excerpt_length = 50;
            $words = explode(' ', $mycontent, $excerpt_length + 1);
            if(count($words) > $excerpt_length) :
                array_pop($words);
                array_push($words, '...');
                $mycontent = implode(' ', $words);
            endif;
            $mycontent = '<p>' . $mycontent . '</p>';
// Make sure to return the content
    return $mycontent;
}
function test_excerpts($content = false) {
            global $post;
            $mycontent = $post->post_excerpt;
 
            $mycontent = $post->post_content;
            $mycontent = strip_shortcodes($mycontent);
            $mycontent = str_replace(']]>', ']]&gt;', $mycontent);
            $mycontent = strip_tags($mycontent);
            $excerpt_length = 4;
            $words = explode(' ', $mycontent, $excerpt_length + 1);
            if(count($words) > $excerpt_length) :
                array_pop($words);
                array_push($words, '...');
                $mycontent = implode(' ', $words);
            endif;
            $mycontent = '<p>' . $mycontent . '</p>';
// Make sure to return the content
    return $mycontent;
}
/*----------------------------------------------------------------------*/
/* Limit title */
/*----------------------------------------------------------------------*/
function limit_title($title, $n){
if ( strlen ($title) > $n )
{
echo substr(the_title('', '', FALSE), 0, $n) . '';
}
else { the_title(); }
}
/*----------------------------------------------------------------------*/
/* Register Home Bottom Widgets */
/*----------------------------------------------------------------------*/
register_sidebar( array(
	'name' => __( 'Footer widget left','admincore'),
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
) );
register_sidebar( array(
	'name' => __( 'Footer widget center','admincore'),
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
) );
register_sidebar( array(
	'name' => __( 'Footer widget right','admincore'),
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
) );
/*----------------------------------------------------------------------*/
/* Register Sidebar Widgets*/
/*----------------------------------------------------------------------*/
register_sidebar( array(
	'name' => __( 'Sidebar Pages','admincore'),
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
) );
register_sidebar( array(
	'name' => __( 'Sidebar Photos','admincore'),
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
) );
register_sidebar( array(
	'name' => __( 'Sidebar Blog','admincore'),
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
) );
register_sidebar( array(
	'name' => __( 'Sidebar Contact','admincore'),
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
) );
// Cambiar texto de "read more"
function be_excerpt_more( $more ) {
  return 'Ver más ...';
}
add_filter( 'excerpt_more', 'be_excerpt_more' );
?>
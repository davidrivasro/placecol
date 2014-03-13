<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<?php global $famoustheme; ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<?php $famoustheme->hook('head'); ?>
</head>
<body <?php body_class(); ?>> 
  
  
<div id="main_container">
    
    <div class="header">
    
    <div class="logo">
	<?php if ($famoustheme->display('logo')) { ?> 
     <div class="logo_image"><a href="<?php echo home_url(); ?>"><img src="<?php $famoustheme->option('logo'); ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" /></a></div>
    <?php } else { }?> 
    <?php if ($famoustheme->display('maintitle')) { ?> 
     <h1><a href="<?php echo home_url(); ?>"><?php $famoustheme->option('maintitle'); ?></a></h1>
    <?php } else { }?> 
    </div>
    
	<a class="show_menu" href="#"><?php _e('menu','admincore'); ?></a>
    <a class="hide_menu" href="#"><?php _e('close menu','admincore'); ?></a>
    
    <div class="menu">                                                                   
		<?php
        if (function_exists('wp_nav_menu')) {
        wp_nav_menu( array( 'theme_location' => 'theme-main-menu', 'fallback_cb' => 'theme_default_menu', 'container_class' => 'menucontainer', 'menu_id' => 'main_menu', 'menu_class' => 'main_menu') );
        }
        else {
        theme_default_menu();
        }
        ?>
     </div>
    
    </div>

<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

/*
Template Name: Links
*/
?>

<?php get_header(); ?>
<div id="page_content">
<h2><?php _e( 'Links:', 'admincore' ); ?></h2>

<div class="left_full">


<ul>
<?php wp_list_bookmarks(); ?>
</ul>
</div>

<div class="clear"></div>
</div>

<?php get_footer(); ?>

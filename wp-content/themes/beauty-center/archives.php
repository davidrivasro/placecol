<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

    <div id="page_content">
     
        <div class="left_full">

        <h1>Archives by Month:</h1>
        <ul>
        <?php wp_get_archives('type=monthly'); ?>
        </ul>

        <h1>Archives by Subject:</h1>
        <ul>
         <?php wp_list_categories(); ?>
        </ul>
        
        </div>
    
    <div class="clear"></div>  
    </div>

<?php get_footer(); ?>

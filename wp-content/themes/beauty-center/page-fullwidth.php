<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Page full width
*/
get_header(); ?>

<div id="page_content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    

        
        <div class="postfull">
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                 <div class="entry">
                    <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
                 </div>
            </div>
        </div>
     
    
    <div class="left23"><?php if($famoustheme->get_option('enable_page_comments') == 'enable') { ?> <?php comments_template(); ?> <?php } else {}?>  </div>
    <?php endwhile; endif; ?>
    <div class="clear"></div>
</div>

<?php get_footer(); ?>

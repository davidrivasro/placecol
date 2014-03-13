<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<div id="page_content">
    
        
        <div class="right_content <?php if($famoustheme->get_option('enable_sidebar_position') == 'left') { ?>right_content_sl<?php } else { ?>right_content_sr<?php }?>">

	   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
       <h2><?php the_title(); ?></h2>

        
            <div class="post">
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry">
                        <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
            
                        <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
            
                    </div>
                </div>
         
            </div>
        <?php if($famoustheme->get_option('enable_page_comments') == 'enable') { ?> <?php comments_template(); ?> <?php } else {}?>  
        <?php endwhile; endif; ?>    
            
        </div>
        <?php get_template_part ('sidebar_pages'); ?>
        <div class="clear"></div>
</div> 
<?php get_footer(); ?>





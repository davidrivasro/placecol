<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<div id="page_content">
    
        
        <div class="right_content <?php if($famoustheme->get_option('enable_sidebar_position') == 'left') { ?>right_content_sl<?php } else { ?>right_content_sr<?php }?>">
    
	     <?php if (have_posts()) : while (have_posts()) : the_post(); ?>              
                 
        <div class="post" id="post-<?php the_ID(); ?>">            
            

            <h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
             <div class="entry">
               <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
             </div>
            <div class="post_comments"><?php the_date('d-m-y') ?> | <?php comments_popup_link('0', '1', '%'); ?> comments | in <?php the_category(', ') ?></div>
			<?php if( has_tag() ) { ?>
            <div class="post_tags">
            <?php the_tags(); ?> 
            </div>
            <?php } ?>


        </div>           
	    <?php comments_template(); ?>

	    <?php endwhile; else: ?>
        <p>Sorry, no posts matched your criteria.</p>

	   <?php endif; ?>
    
    </div>

    
    <?php get_sidebar(); ?>
<div class="clear"></div>
</div> 
    
<?php get_footer(); ?>
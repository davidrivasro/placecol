<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Home page
*/
get_header(); ?>


  <?php if($famoustheme->get_option('show_home_slider') == 'enable') { ?>		
    
  <div class="slider_container">
        <div class="slide_frame"></div>
		<div class="flexslider">
	    <ul class="slides">
             <?php query_posts(array( 'post_type' => 'slider', 'orderby' => 'menu_order', 'order' => 'ASC', 'showposts' => '9999'));?> 
             
            <?php if (have_posts()) : ?>
            

                    <?php while (have_posts()) : the_post(); ?>
    
                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <li>
                    <?php if($famoustheme->get_option('enable_slider_hover_link') == 'enable') { ?> <a href="<?php echo get_post_meta($post->ID, "slider_item_url", $single = true); ?>"> <?php } ?>    
                    <img class="slide_frame_png" src="<?php echo get_template_directory_uri(); ?>/images/frame_bg_png.png" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                    <?php if($famoustheme->get_option('enable_slider_hover_link') == 'enable') { ?> </a><?php } ?>
                    <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                    
                    <?php $my_excerpt = get_the_excerpt(); if ( $my_excerpt != '' ) { ?>
                    <div class="flex-caption">
                    <div class="caption_title_line">
                    <h2>
                    <?php if($famoustheme->get_option('enable_slider_hover_link') == 'enable') { ?>
                    <a href="<?php echo get_post_meta($post->ID, "slider_item_url", $single = true); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                    <?php } ?>
					<?php the_title(); ?>
                    <?php if($famoustheme->get_option('enable_slider_hover_link') == 'enable') { ?> </a> <?php } ?>
                    </h2>
                    <p><?php echo $my_excerpt; ?>
                    </p></div>
                    </div>
                    <?php } ?>                    
                    </li>
                    <?php endif; ?>
                          
                    <?php endwhile; ?>                          

            <?php endif; ?> 
             
             
	    </ul>
	  </div>
   </div>
   
   <?php } else {}?> 
   <?php wp_reset_query(); // Reset the Query Loop?>
   <div class="home_underslider">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="entry">
            <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
            </div>
        </div>
        <?php endwhile; endif; ?>
   <div class="clear"></div>         
   </div>
   
   <div class="clear"></div> 

<?php get_footer(); ?>

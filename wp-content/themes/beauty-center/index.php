<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<div id="page_content">


  <div class="right_content <?php if($famoustheme->get_option('enable_sidebar_position') == 'left') { ?>right_content_sl<?php } else { ?>right_content_sr<?php }?>">

	  <?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	  <h2><?php _e( 'Latest Posts', 'admincore' ); ?></h2>

    	
		<?php while (have_posts()) : the_post(); ?>
			<?php $image_id = get_post_thumbnail_id();
            $image_url = wp_get_attachment_image_src($image_id,'large', true);
            ?>           
               
        <div class="post_content" id="post-<?php the_ID(); ?>">
        
		   <?php if ( has_post_thumbnail() ) { ?>

            <div class="post_left">
            <div class="center_round_thumb">
            <a href="<?php the_permalink() ?>" rel="" title="<?php the_title_attribute(); ?>">
            <img src="<?php echo $image_url[0]; ?>" width="150" alt="" class="thumb150"/>
            </a>
            </div>            
            <div class="post_date"><?php the_time('d') ?>.<?php the_time('m') ?></div>
            </div> 
            
            <div class="post_right">
            <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
             <div class="entry">
               <?php echo blog_excerpts(); ?>
             </div>
            <div class="post_comments"><?php comments_popup_link('0', '1', '%'); ?> | <?php the_category(', ') ?></div>
            <a href="<?php the_permalink() ?>" class="read_more"><?php _e( 'read more', 'admincore' ); ?></a>
            </div>           

          <?php } else {?>
            <div class="post_date_nothumb"><?php the_time('d') ?>.<?php the_time('m') ?></div>
            
            <div class="post_right_nothumb">
            <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
             <div class="entry">
               <?php echo blog_excerpts(); ?>
             </div>
            <div class="post_comments"><?php comments_popup_link('0', '1', '%'); ?> | <?php the_category(', ') ?></div>
            <a href="<?php the_permalink() ?>" class="read_more"><?php _e( 'read more', 'admincore' ); ?></a>
            </div> 
          <?php } ?>
              
            

        </div>   
                  

            
            
		<?php endwhile; ?>

		<div class="navigation">
            <div class="blog_next"><?php previous_posts_link(__('Newer Entries &raquo;', "admincore")) ?></div>
			<div class="blog_prev"><?php next_posts_link(__('&laquo; Older Entries', "admincore")) ?></div>			
		</div>
        
		<?php else :
        
        if ( is_category() ) { // If this is a category archive
            printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
        } else if ( is_date() ) { // If this is a date archive
            echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
        } else if ( is_author() ) { // If this is a category archive
            $userdata = get_userdatabylogin(get_query_var('author_name'));
            printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
        } else {
            echo("<h2 class='center'>No posts found.</h2>");
        }
        get_search_form();
        
        endif;
        ?>

		</div> 
        
        <?php get_sidebar(); ?>

<div class="clear"></div>
</div> 
<?php get_footer(); ?>
<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

<div id="page_content">
  <div class="right_content <?php if($famoustheme->get_option('enable_sidebar_position') == 'left') { ?>right_content_sl<?php } else { ?>right_content_sr<?php }?>">
  
	<?php if (have_posts()) : ?>
    
        <h2><?php _e( 'Search Results', 'admincore' ); ?></h2>

        
			<?php while (have_posts()) : the_post(); ?>
            
                
                    <div class="post_content" id="post-<?php the_ID(); ?>">
                    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                    <?php echo blog_excerpts(); ?>        
                    </div>
           
            <?php endwhile; ?>
  
            <div class="navigation">
                <div class="blog_next"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
                <div class="blog_prev"><?php next_posts_link('&laquo; Older Entries') ?></div>    
            </div>
            <?php else : ?>
            
            <h2 class="center">No posts found. Try a different search?</h2>
            <?php get_search_form(); ?>
        
        
        
    <?php endif; ?>

	</div>

  <?php get_template_part ('sidebar_pages'); ?>
<div class="clear"></div>
</div> 
 
<?php get_footer(); ?>

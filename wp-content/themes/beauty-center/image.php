<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

<div id="page_content">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   <div class="postfull">
   
			<div class="attachment_image">	
            <h2><?php the_title(); ?></h2>			
					
<a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image($post->ID, 'medium'); ?></a>
<div class="gallery-caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt(); // this is the "caption" ?></div>
	
			</div>
  </div>

<div class="clear"></div>
	<?php endwhile; else: ?>

		<p>Sorry, no attachments matched your criteria.</p>

<?php endif; ?>

</div>

<?php get_footer(); ?>

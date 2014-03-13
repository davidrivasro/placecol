<?php
/*
Template Name: Photo Album
*/
get_header(); ?>
    <div id="page_content">
    <?php if($famoustheme->get_option('enable_photos_sidebar') == 'true') { ?>
        <div class="right_content_gallery <?php if($famoustheme->get_option('enable_sidebar_position') == 'left') { ?>right_content_gallery_sl<?php } else { ?>right_content_gallery_sr<?php }?>">
    <?php } else { ?>
        <div class="right_content_gallery_full">
    <?php }?>    
        <h2><?php $famoustheme->option('portfolio_maintitle'); ?></h2>
			   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div id="post-<?php the_ID(); ?>">
                                <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                        </div>
               <?php endwhile; endif; ?>

    
				<ul class="filter_portfolio"> 
					<li class="segment-1 selected"><a href="javascript:void(0)" data-value="all"><?php $famoustheme->option('viewall'); ?></a></li>
					<?php
						// Get the taxonomy
						$terms = get_terms('filter', $args);
						// set a count to the amount of categories in our taxonomy
						$count = count($terms); 
						// set a count value to 0
						$i=0;
						// test if the count has any categories
						if ($count > 0) {
							// break each of the categories into individual elements
							foreach ($terms as $term) {
								// increase the count by 1
								$i++;
								
								// rewrite the output for each category
								$term_list .= '<li class="segment-'. $i .'"><a href="javascript:void(0)" data-value="' . $term->slug . '">' . $term->name . '</a></li>';
								
								// if count is equal to i then output blank
								if ($count != $i)
								{
									$term_list .= '';
								}
								else 
								{
									$term_list .= '';
								}
							}
							// print out each of the categories in our new format
							echo $term_list;
						}
					?>
				</ul>

				<ul class="portfolio_items">
					<?php 
						// Set the page to be pagination
						$paged = get_query_var('paged') ? get_query_var('paged') : 1;
						$perpage = $famoustheme->get_option("perpage");
						
						// Query Out Database
						$wpbp = new WP_Query(array( 'post_type' => 'portfolio', 'posts_per_page' => $perpage, 'paged' => $paged ) ); 
					?>
					
					<?php
						// Begin The Loop
						if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post(); 
					?>
					
					<?php 
						// Get The Taxonomy 'Filter' Categories
						$terms = get_the_terms( get_the_ID(), 'filter' ); 
					?>
					
					<?php 
					$large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' ); 
					$large_image = $large_image[0]; 
					?>

					
							<?php
								//Apply a data-id for unique indentity, 
								//and loop through the taxonomy and assign the terms to the portfolio item to a data-type,
								// which will be referenced when writing our Quicksand Script
							?>
							<li class="right13 <?php foreach ($terms as $term) { echo strtolower(preg_replace('/\s+/', '-', $term->name)). ''; }?>" data-id="id-<?php echo $count; ?>">
								
									<?php 
										// Check if wordpress supports featured images, and if so output the thumbnail
										if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) : 
									?>
										
        <div class="center_round_thumb">
             <img src="<?php echo $large_image; ?>" alt="" height="150" width="150" class="thumb150" />
        <div class="zoom"><a rel="prettyPhoto[gallery]" <?php $my_excerpt = get_the_excerpt(); if ( $my_excerpt != '' ) { ?> title="<?php echo $my_excerpt; ?>" <?php } ?> href="<?php echo get_post_meta($post->ID, "slideshow_large_image_url", $single = true); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/zoom.png" alt="" title="" /></a></div>
        </div> 
        <h3><a rel="prettyPhoto[gallerytitles]" <?php $my_excerpt = get_the_excerpt(); if ( $my_excerpt != '' ) { ?> title="<?php echo $my_excerpt; ?>" <?php } ?> href="<?php echo get_post_meta($post->ID, "slideshow_large_image_url", $single = true); ?>"><?php echo get_the_title(); ?></a></h3>
								
									<?php endif; ?>	
				
									
							</li>            
					
					<?php $count++; // Increase the count by 1 ?>		
					<?php endwhile; endif; // END the Wordpress Loop ?>
					<?php wp_reset_query(); // Reset the Query Loop?>
			
				</ul>
				
				
				<?php
					/* 
					 * Download WP_PageNavi Plugin at: http://wordpress.org/extend/plugins/wp-pagenavi/
					 * Page Navigation Will Appear If Plugin Installed or Fall Back To Default Pagination
					*/		
					if(function_exists('wp_pagenavi'))
					{				 
						wp_pagenavi(array( 'query' => $wpbp ) );
						wp_reset_postdata();	// avoid errors further down the page
					}
				?>
	<?php if($famoustheme->get_option('enable_page_comments') == 'enable') { ?> <?php comments_template(); ?> <?php } else {}?>  
	</div>
    
	<?php if($famoustheme->get_option('enable_photos_sidebar') == 'true') { get_template_part ('sidebar_photos'); } else { }?>
   
    <div class="clear"></div>     
    </div>
    
<?php get_footer(); ?>
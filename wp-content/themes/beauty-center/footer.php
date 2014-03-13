<?php global $famoustheme; ?>

       <?php if($famoustheme->get_option('show_widget_area_footer') == 'enable') { ?>
       <div class="home_bottom">     
            <div class="left13 fdivider"> 
             <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer widget left') ) : ?>
             <p class="widget_area_text"><strong>Home widget bottom left</strong><br /><br /> You can add widgets here from Admin->Appearance->Widgets <br /><br /> Enable or Disable this widget area from<br /> Theme Options -> Widgets</p>
            <?php endif;?>
			</div>
   
            <div class="left13 fdivider"> 
             <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer widget center') ) : ?>
             <p class="widget_area_text"><strong>Home widget bottom center</strong><br /><br /> You can add widgets here from Admin->Appearance->Widgets <br /><br /> Enable or Disable this widget area from<br /> Theme Options -> Widgets</p>
            <?php endif;?>
			</div>
       
     
            <div class="left13 fdivider_last"> 
             <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer widget right') ) : ?>
             <p class="widget_area_text"><strong>Home widget bottom right</strong><br /><br /> You can add widgets here from Admin->Appearance->Widgets <br /><br /> Enable or Disable this widget area from<br /> Theme Options -> Widgets</p>
            <?php endif;?>
			</div>
        </div>
       <?php } else {}?> 
   
   <div class="footer">
       <div class="footer_text">
       <?php $famoustheme->option('footer_text'); ?>
       </div>
       <div class="footer_menu">
			<?php
            if (function_exists('wp_nav_menu')) {
            wp_nav_menu( array( 'theme_location' => 'theme-main-fmenu', 'fallback_cb' => 'theme_default_menu', 'container_class' => 'footermenu', 'menu_id' => 'main_menu_footer', 'menu_class' => 'main_menu_footer') );
            }
            else {
            theme_default_menu();
            }
            ?>
       </div>
       <div class="clear"></div>
       
   </div>
    
</div>
<script type="text/javascript" charset="utf-8">
//<![CDATA[
<!-- 
var $ = jQuery.noConflict();
<?php if ($famoustheme->display('twitter_username')) { ?>
jQuery(function($){
$(".tweet").tweet({
modpath: '<?php echo get_template_directory_uri(); ?>/admin/twitter/',
join_text: "auto",
username: "<?php $famoustheme->option('twitter_username'); ?>",
count: <?php $famoustheme->option('twitter_nr'); ?>,
auto_join_text_default: "we said,",
auto_join_text_ed: "we",
auto_join_text_ing: "<?php $famoustheme->option('twitter_join_text'); ?>",
auto_join_text_reply: "<?php $famoustheme->option('twitter_join_text_reply'); ?>",
auto_join_text_url: "<?php $famoustheme->option('twitter_join_text_url'); ?>",
loading_text: "loading tweets..."
});
});
<?php }?>
// -->
//]]>
</script>
<?php $famoustheme->option('analytics_code'); ?>
<?php wp_footer(); ?>
</body>
</html>

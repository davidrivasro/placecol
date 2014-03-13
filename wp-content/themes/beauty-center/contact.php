<?php
/*
Template Name: Contact
*/
get_header(); ?>

<!-- form validation scripts -->
<script src="<?php echo get_template_directory_uri(); ?>/scripts/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript">
//<![CDATA[
<!--
	// initialize form validation
	jQuery(document).ready(function() {
		$("#CommentForm").validate({
			submitHandler: function(form) {
				// form is valid, submit it
				ajaxContact(form);
				return false;
			}
		});
	});
// -->
//]]>
</script>
    <div id="page_content">
    
       <div class="right_content <?php if($famoustheme->get_option('enable_sidebar_position') == 'left') { ?>right_content_sl<?php } else { ?>right_content_sr<?php }?>">
        
        
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h2><?php the_title(); ?></h2>
           <div class="post">
           <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry">
                    <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
                    </div>
                    
                
                                
                    <!-- Contact form -->                                        
                    <?php if($famoustheme->get_option('show_contact_form') == 'enable') { ?>
                    <div class="form_content">
                    <h3 class="form_subtitle"><?php $famoustheme->option('contact_form_title'); ?></h3>
                    <div id="Note"></div>
                    <div class="form">
                    <form class="cmxform" id="CommentForm" method="post" action="">
                         <div class="form_top">
                            <div class="form_row_half">
                                <input id="ContactName" name="ContactName" class="form_input required" placeholder="<?php _e( 'Your Name', 'admincore' ); ?>" />
                            </div>                            
                            <div class="form_row_half">
                                <input id="ContactEmail" name="ContactEmail" class="form_input required email" placeholder="<?php _e( 'Your Email', 'admincore' ); ?>" />
                            </div>
                            <?php if($famoustheme->get_option('show_contact_phone') == 'enable') { ?>
                            <div class="form_row">
                                <input id="ContactPhone" name="ContactPhone" class="form_input" placeholder="<?php _e( 'Phone', 'admincore' ); ?>"/>
                            </div> 
                            <?php } else {}?>
                            <?php if($famoustheme->get_option('show_contact_custom') == 'enable') { ?>
                            <div class="form_row">
                                <input id="ContactCustom" name="ContactCustom" class="form_input" placeholder="<?php $famoustheme->option('show_contact_custom_label'); ?>"/>
                            </div> 
                            <?php } else {}?>
                            <div class="form_row">
  
                                <textarea id="ContactComment" name="ContactComment" class="form_textarea required" rows="10" cols="4" placeholder="<?php _e( 'Your Message', 'admincore' ); ?>"></textarea>
                            </div>
                         </div>
                            <div class="form_bottom">
                                <input type="submit" name="submit" class="form_submit" id="submit" value="<?php _e( 'Send', 'admincore' ); ?>" />
                                <input class="" type="hidden" name="to" value="<?php echo $famoustheme->get_option("contactemail");?>" />
                                <input class="" type="hidden" name="customlabel" value="<?php echo $famoustheme->get_option("show_contact_custom_label");?>" />
                                <input class="" type="hidden" name="subject" value="<?php echo $famoustheme->get_option("contactsubject");?>" />
                                <div id="loader" style="display:none;"><img src="<?php echo get_template_directory_uri(); ?>/images/loader.gif" alt="Loading..." id="LoadingGraphic" /></div>
                            </div>
                    </form>
                    </div>
                    </div>                   
                    
                    
                    <?php } else {}?> 
               </div>     
             </div>
        
        </div>
        <?php get_template_part ('sidebar_contact'); ?>
        <div class="clear"></div> 
</div>   
        <?php endwhile; endif; ?>
    
<script type="text/javascript">  
//<![CDATA[
<!--      
	function ajaxContact(theForm) {
		var $ = jQuery;
        $('#loader').fadeIn();
        var formData = $(theForm).serialize(),
			note = $('#Note');
        $.ajax({
            type: "POST",
            url: "<?php echo get_template_directory_uri(); ?>/contact-send.php",
            data: formData,
            success: function(response) {
				if ( note.height() ) {			
					note.fadeIn('fast', function() { $(this).hide(); });
				} else {
					note.hide();
				}
				$('#LoadingGraphic').fadeOut('fast', function() {
					if (response === 'success') {
						$(theForm).animate({opacity: 0},'fast');
					}
					// Message Sent? Show the 'Thank You' message and hide the form
				result = '';
					c = '';
					if (response === 'success') { 
						result = '<?php echo $famoustheme->get_option("contactsucces"); ?>';
						c = 'success';
					} else {
						result = response;
						c = 'error';

					}
					note.removeClass('success').removeClass('error').text('');
					var i = setInterval(function() {
						if ( !note.is(':visible') ) {

							note.html(result).addClass(c).slideDown('fast');
							clearInterval(i);
						}

					}, 40);    
				}); // end loading image fadeOut
            }
        });

        return false;
    }
// -->
//]]>
</script>  
<?php get_footer(); ?>
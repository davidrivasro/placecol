<?php
/*---------------------POST EXTRA OPTIONS FOR IMAGES--------------------*/
function com_save_meta($postId)
{

	if(isset($_POST['slideshow_large_image_url']) )
    {
    	update_post_meta($postId, 'slideshow_large_image_url', $_POST['slideshow_large_image_url']); 
    }
}
add_action('save_post', 'com_save_meta');

function com_post_meta()
{
    if(isset($_REQUEST['post']) && is_numeric($_REQUEST['post']))
    {
        $post = (int)$_REQUEST['post'];
        $post = get_post($post);
		
		$slideshow_large_image_url = get_post_meta($post->ID, 'slideshow_large_image_url', true);
    }

?>
    
    <div style="padding:10px;float:left;" id="slideshow_large_image">
    
     <label style="width:200px; float: left; padding-top:6px;">Lightbox image</label>
     
     <div style="float:left;">
     	<div>
        <input class="admin-text admincore_image_upload_slideshow_large_image_url" type="text" name="slideshow_large_image_url" value="<?php echo  $slideshow_large_image_url; ?>"/>
        <a id="admincore_image_upload_slideshow_large_image_url" class="admin_imageupload" >Upload Now</a>
        </div>
        <em style="padding:5px 0px; display:block;">The big image that will show in the popup</em>
		<div style="clear:both; padding:10px 0 0 0;">
        <?php if(!empty($slideshow_large_image_url)) { ?>
        <img src="<?php echo $slideshow_large_image_url; ?>" width="300" alt="<?php the_title(); ?>" />
        <?php }?>
		</div>

     </div>
     
    </div>
    <div class="clear"></div> 
    
    <div style="padding:10px;float:left; font-size:14px;">
    
     <ol>
     <li>Use the main title text input as the photo title</li>
     <li>Use the <strong>"Excerpt"</strong> input to add <strong>the details text</strong> that will apear on the popup window (not required)</li>
     <li>Use the <strong>"Lightbox image"</strong> to add the big image that will show in the popup</li>
     <li>Use the <strong>"Featured Image"</strong> option from the rigth sidebar to add the photo small thumb. The corect size is <strong>width: 150px</strong> and <strong>height 150px</strong>. You can use the WordPress image editor option to crop your images if you don't have any other image cropping software</li>
     <li>Use the "Filter" option in the right sidebar to add the image category. You can select only one category for an image. And the category will act as filter on the main photos page. Add only normal characters in the titles of the categories, and do not edit the slug after creating them.</li>
     </ol>
     
     
    </div>
    <div class="clear"></div>  
     
    
<?php
}
function com_register_meta_box()
{
    add_meta_box('custom_meta', __('Photo Custom Options','admincore'), 'com_post_meta', 'portfolio', 'normal', 'high');
}
add_action('admin_init', 'com_register_meta_box');

?>
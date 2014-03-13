<?php
class Widget_textcontent extends WP_Widget {

	function Widget_textcontent()
    {
		$widget_ops = array( 'classname'=>'widget_textcontent', 'description'=>__('Custom text widget for home page and sidebars','admincore'));
		$this->WP_Widget('com-bigad', __('Custom text widget with image','admincore'), $widget_ops);
	}

	function widget($args, $instance)
    {
        extract( $args );
        $title = apply_filters('widget_title', empty($instance['title'] ) ? __('','admincore') : $instance['title']);
		$test_content = sanitize_text_field($instance['test_content']);
		$thumb_url = esc_url($instance['thumb_url']);
		$thumb_more_url = esc_url($instance['thumb_more_url']);
		$more_url = esc_url($instance['more_url']);
		$show_social_icons = esc_attr($instance['show_social_icons']);
        global $famoustheme;
        echo $before_widget;
		?>
        <div class="widget_text">
        <?php
        if($title)
        {
            echo $before_title . $title . $after_title;
        }

        ?>
        <?php if($thumb_url) { ?>
        <div class="center_round_thumb">
        <?php if($thumb_more_url) { ?><a href="<?php echo $thumb_more_url; ?>"><?php  }  ?> 
        <img src="<?php echo $thumb_url; ?>" alt="<?php echo $title; ?>" class="thumb150" />
       <?php if($thumb_more_url) { ?> </a> <?php  }  ?>
        </div> 
        <?php  }  ?> 

        
        <p><?php echo $test_content; ?></p>
        
				 <?php if ($show_social_icons == "yes") { ?>
                       <ul class="social_icons">
                  <?php if ($famoustheme->display('icon_rss')) { ?><li><a target="_blank" href="<?php $famoustheme->option('url_rss'); ?>"><img src="<?php $famoustheme->option('icon_rss'); ?>" alt="" title="" /></a></li><?php } ?>
                  <?php if ($famoustheme->display('icon_twitter')) { ?><li><a target="_blank" href="<?php $famoustheme->option('url_twitter'); ?>"><img src="<?php $famoustheme->option('icon_twitter'); ?>" alt="" title="" /></a></li><?php } ?>
                  <?php if ($famoustheme->display('icon_facebook')) { ?><li><a target="_blank" href="<?php $famoustheme->option('url_facebook'); ?>"><img src="<?php $famoustheme->option('icon_facebook'); ?>" alt="" title="" /></a></li><?php } ?>
                  <?php if ($famoustheme->display('icon_google')) { ?><li><a target="_blank" href="<?php $famoustheme->option('url_google'); ?>"><img src="<?php $famoustheme->option('icon_google'); ?>" alt="" title="" /></a></li><?php } ?>
                  
                  <?php if ($famoustheme->display('freeicon_1')) { ?><li><a target="_blank" href="<?php $famoustheme->option('freeicon_1_url'); ?>"><img src="<?php $famoustheme->option('freeicon_1'); ?>" alt="" title="" /></a></li><?php } ?>
                  <?php if ($famoustheme->display('freeicon_2')) { ?><li><a target="_blank" href="<?php $famoustheme->option('freeicon_2_url'); ?>"><img src="<?php $famoustheme->option('freeicon_2'); ?>" alt="" title="" /></a></li><?php } ?>
                  <?php if ($famoustheme->display('freeicon_3')) { ?><li><a target="_blank" href="<?php $famoustheme->option('freeicon_3_url'); ?>"><img src="<?php $famoustheme->option('freeicon_3'); ?>" alt="" title="" /></a></li><?php } ?>
                  <?php if ($famoustheme->display('freeicon_4')) { ?><li><a target="_blank" href="<?php $famoustheme->option('freeicon_4_url'); ?>"><img src="<?php $famoustheme->option('freeicon_4'); ?>" alt="" title="" /></a></li><?php } ?>
                  <?php if ($famoustheme->display('freeicon_5')) { ?><li><a target="_blank" href="<?php $famoustheme->option('freeicon_5_url'); ?>"><img src="<?php $famoustheme->option('freeicon_5'); ?>" alt="" title="" /></a></li><?php } ?>
                       </ul>
               <?php } ?>
        
        <?php if($more_url) { ?>
        <a href="<?php echo $more_url; ?>" class="read_more"><?php _e('read more','admincore'); ?></a> 
        <?php  }  ?> 
         
		</div>
        <?php
        echo $after_widget;
	}

	function update($new_instance, $old_instance)
    {
		$instance = $old_instance;
		$instance['title'] = esc_attr($new_instance['title']);
		$instance['test_content'] = sanitize_text_field($new_instance['test_content']);
		$instance['thumb_url'] = esc_url($new_instance['thumb_url']);
		$instance['thumb_more_url'] = esc_url($new_instance['thumb_more_url']);
		$instance['show_social_icons'] = esc_attr($new_instance['show_social_icons']);
		$instance['more_url'] = esc_url($new_instance['more_url']);
		return $instance;
	}

	function form($instance)
    {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'test_content' => '', 'thumb_url' => '', 'thumb_more_url' => '', 'more_url' => '', 'show_social_icons' => '') );
		$title = esc_attr( $instance['title'] );
		$test_content = sanitize_text_field( $instance['test_content'] );
		$thumb_url = esc_url( $instance['thumb_url'] );
		$thumb_more_url = esc_url( $instance['thumb_more_url'] );
		$more_url = esc_url( $instance['more_url'] );
		$show_social_icons = esc_attr( $instance['show_social_icons'] );
        ?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:','admincore' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('test_content'); ?>"><?php _e( 'Text content:','admincore' ); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('test_content'); ?>" name="<?php echo $this->get_field_name('test_content'); ?>" rows="2" cols="20"><?php echo $test_content; ?> </textarea></p>
        
        <p><label for="<?php echo $this->get_field_id('thumb_url'); ?>"><?php _e( 'Thumb Source URL:','admincore' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('thumb_url'); ?>" name="<?php echo $this->get_field_name('thumb_url'); ?>" type="text" value="<?php echo $thumb_url; ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id('thumb_more_url'); ?>"><?php _e( 'Thumb Link URL:','admincore' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('thumb_more_url'); ?>" name="<?php echo $this->get_field_name('thumb_more_url'); ?>" type="text" value="<?php echo $thumb_more_url; ?>" /></p>
         
        <p><label for="<?php echo $this->get_field_id('show_social_icons'); ?>"><?php _e( 'Show Social icons:','admincore' ); ?></label>
                        <select id="<?php echo $this->get_field_id('order_by'); ?>" name="<?php echo $this->get_field_name('show_social_icons'); ?>">
                            <option value="yes" <?php selected('yes', $instance['show_social_icons']); ?> >Yes (Default)</option>
                            <option value="no" <?php selected('no', $instance['show_social_icons']); ?> >No </option>
                        </select>
        
        
        </p>
        
        <p><label for="<?php echo $this->get_field_id('more_url'); ?>"><?php _e( 'More link:','admincore' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('more_url'); ?>" name="<?php echo $this->get_field_name('more_url'); ?>" type="text" value="<?php echo $more_url;?>" /></p>
        
        <p>"Thumb Source URL" must be the file URL code of the image you are uploading in Media section to use here. Use the image at 150x150 px size. It will automatically create the round corners from CSS.</p>
        <p>"Thumb Link URL" must be the adress URL added to link the image to what ever you want, a page, a website...etc</p>
        <p>In "Text content" you can add text, lists, and HTML elements</p>
        <p>If "More link" is added, a "read more" button will apear at the end, if is not added will not apear.</p>
        
        <?php
	}
}
register_widget('Widget_textcontent');
?>
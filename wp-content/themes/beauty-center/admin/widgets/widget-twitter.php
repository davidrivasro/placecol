<?php
class Widget_twitter extends WP_Widget {

	function Widget_twitter()
    {
		$widget_ops = array( 'classname'=>'widget_twitter', 'description'=>__('Custom Twitter widget for home page and sidebars','admincore'));
		$this->WP_Widget('com-bigadt', __('Custom Twitter widget','admincore'), $widget_ops);
	}

	function widget($args, $instance)
    {
        extract( $args );
        $title = apply_filters('widget_title', empty($instance['title'] ) ? __('','admincore') : $instance['title']);
        $thumb_url = esc_url( $instance['thumb_url'] );
        echo $before_widget;
		?>       
        
        <div class="twitter_widget">
        <?php
        if($title)
        {
            echo $before_title . $title . $after_title;
        }

        ?> 
        <?php if($thumb_url) { ?>
        <div class="center_round_thumb">
        <img src="<?php echo $thumb_url; ?>" alt="twitter" class="thumb150" />
        </div>  
        <?php  }  ?> 
     
        <div class="tweet"></div> 
         
		</div>
        <?php
        echo $after_widget;
	}

	function update($new_instance, $old_instance)
    {
		$instance = $old_instance;
		$instance['title'] = esc_attr($new_instance['title']);
		$instance['thumb_url'] = esc_url($new_instance['thumb_url']);
		return $instance;
	}

	function form($instance)
    {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'thumb_url' => '') );
		$title = esc_attr( $instance['title'] );
		$thumb_url = esc_url( $instance['thumb_url'] );
        ?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:','admincore' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id('thumb_url'); ?>"><?php _e( 'Twitter icon/thumb URL:','admincore' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('thumb_url'); ?>" name="<?php echo $this->get_field_name('thumb_url'); ?>" type="text" value="<?php echo $thumb_url; ?>" /></p>
 
        <p>Twitter username must be introduced from the custom admin panel in General tab.</p>
        <p>"Twitter icon/thumb URL" must be the file URL code of the icon/image you are uploading in Media section to use here. Use the image at 150x150 px size. It will automatically create the round corners from CSS.</p>

        <?php
	}
}
register_widget('Widget_twitter');
?>
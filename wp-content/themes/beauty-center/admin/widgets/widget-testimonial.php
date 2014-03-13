<?php
class Widget_testimonialcontent extends WP_Widget {

	function Widget_testimonialcontent()
    {
		$widget_ops = array( 'classname'=>'widget_testimonialcontent', 'description'=>__('Custom testimonial widget','admincore'));
		$this->WP_Widget('com-bigadab', __('Custom testimonial widget','admincore'), $widget_ops);
	}

	function widget($args, $instance)
    {
        extract( $args );
        $title = apply_filters('widget_title', empty($instance['title'] ) ? __('','admincore') : $instance['title']);
		$test_content = sanitize_text_field($instance['test_content']);
		$test_author = esc_attr($instance['test_author']);
		$more_url = esc_url($instance['more_url']);

        echo $before_widget;
		?>     
        
        <div class="custom_widget">
        <?php
        if($title)
        {
            echo $before_title . $title . $after_title;
        }

        ?>
        <div class="testimonial"><p><?php echo $test_content; ?> <strong><a href="<?php echo $more_url; ?>"><?php echo $test_author; ?></a></strong></p></div>
		</div>        
        <?php
        echo $after_widget;
	}

	function update($new_instance, $old_instance)
    {
		$instance = $old_instance;
		$instance['title'] = esc_attr($new_instance['title']);
		$instance['test_content'] = sanitize_text_field($new_instance['test_content']);
		$instance['test_author'] = esc_attr($new_instance['test_author']);
		$instance['more_url'] = esc_url($new_instance['more_url']);
		return $instance;
	}

	function form($instance)
    {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'test_content' => '', 'test_author' => '', 'more_url' => '') );
		$title = esc_attr( $instance['title'] );
		$test_content = sanitize_text_field( $instance['test_content'] );
		$test_author = esc_attr( $instance['test_author'] );
		$more_url = esc_url( $instance['more_url'] );
        ?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:','admincore' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

        <p><label for="<?php echo $this->get_field_id('test_content'); ?>"><?php _e( 'Testimonial content:','admincore' ); ?></label>
		<textarea class="widefat" id="<?php echo $this->get_field_id('test_content'); ?>" name="<?php echo $this->get_field_name('test_content'); ?>" rows="2" cols="20"><?php echo $test_content; ?></textarea></p>

        <p><label for="<?php echo $this->get_field_id('test_author'); ?>"><?php _e( 'Author name:','admincore' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('test_author'); ?>" name="<?php echo $this->get_field_name('test_author'); ?>" type="text" value="<?php echo $test_author; ?>" /></p>
        
        <p><label for="<?php echo $this->get_field_id('more_url'); ?>"><?php _e( 'Author link:','admincore' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('more_url'); ?>" name="<?php echo $this->get_field_name('more_url'); ?>" type="text" value="<?php echo $more_url; ?>" /></p>
        <?php
	}
}
register_widget('Widget_testimonialcontent');
?>
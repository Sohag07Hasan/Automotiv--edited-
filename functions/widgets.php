<?php


// enable widgets
if ( function_exists('register_sidebar') ) {

register_sidebar(array('name'=>'Left Sidebar',
	'before_widget' => "<div class='sidebarwidget'>",
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3 >',
));

register_sidebar(array('name'=>'Right Sidebar',
	'before_widget' => "<div class='sidebarwidget'>",
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3 >',
));

register_sidebar(array('name'=>'Under Slideshow 1',
	'before_widget' => "<div>",
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3 >',
));

register_sidebar(array('name'=>'Under Slideshow 2',
	'before_widget' => "<div>",
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3 >',
));

register_sidebar(array('name'=>'Footer 1',
	'before_widget' => "<div>",
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3 >',
));

register_sidebar(array('name'=>'Footer 2',
	'before_widget' => "<div>",
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3 >',
));

register_sidebar(array('name'=>'Footer 3',
	'before_widget' => "<div>",
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3 >',
));

register_sidebar(array('name'=>'Footer 4',
	'before_widget' => "<div>",
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3 >',
));


}	


/**
 * Contact Widget Class
 */
class Contact_Widget extends WP_Widget {
    /** constructor */
    function Contact_Widget() {
		global $themename;
		$widget_ops = array('classname' => 'contact-widget', 'description' => __( "Quickly add contact info to your sidebar (e.g. address, phone #, email).") );
		$control_ops = array('width' => 400, 'height' => 200);
		$this->WP_Widget('contact', __('Contact Us'), $widget_ops, $control_ops);
    }

    function widget($args, $instance) {
        extract( $args );
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Contact Info') : $instance['title'], $instance, $this->id_base);
		$name = $instance['name'];
		$address = $instance['address'];
		$city = $instance['city'];
		$state = $instance['state'];
		$zip = $instance['zip'];
		$phone = $instance['phone'];
		$email = $instance['email'];
	    ?>
	
            <?php echo $before_widget; ?>

			<?php echo $before_title . $title . $after_title; ?>
			
			<?php if ( $name ) : ?>
			<span class="contact_widget_name"><?php echo $name; ?></span><br /> <?php endif; ?>

			<?php if ( $address ) : ?>
			<span class="contact_widget_address"><?php echo $address; ?></span><br /> <?php endif; ?>

			<?php if ( $city ) : ?>
			<span class="contact_widget_city"><?php echo $city; ?></span><br />
			<span class="contact_widget_statezip"><?php echo $state; ?>&nbsp; <?php echo $zip; ?></span><br /><?php endif; ?>



			<?php if ( $phone ) : ?>
			<span class="contact_widget_phone"><?php echo $phone; ?></span><br /> <?php endif; ?>

			<?php if ( $email ) : ?>
			<span class="contact_widget_email"><a href="mailto:<?php echo $email ?>" rel="<?php echo nospam($email); ?>" class="email_widget">Email</a></span><br /> <?php endif; ?>

            <?php echo $after_widget;
	    }


    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['name'] = strip_tags($new_instance['name']);
		$instance['address'] = strip_tags($new_instance['address']);
		$instance['city'] = strip_tags($new_instance['city']);
		$instance['state'] = strip_tags($new_instance['state']);
		$instance['zip'] = strip_tags($new_instance['zip']);
		$instance['phone'] = strip_tags($new_instance['phone']);
		$instance['email'] = strip_tags($new_instance['email']);
			
        return $instance;
    }

    function form($instance) {				
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$name = isset($instance['name']) ? esc_attr($instance['name']) : '';
		$address = isset($instance['address']) ? esc_attr($instance['address']) : '';
		$city = isset($instance['city']) ? esc_attr($instance['city']) : '';
		$state = isset($instance['state']) ? esc_attr($instance['state']) : '';
		$zip = isset($instance['zip']) ? esc_attr($instance['zip']) : '';
		$phone = isset($instance['phone']) ? esc_attr($instance['phone']) : '';
		$email = isset($instance['email']) ? esc_attr($instance['email']) : '';
        ?>

		<p><label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('name'); ?>">Name:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('name'); ?>" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo $name; ?>" /></p>

		<p><label for="<?php echo $this->get_field_name('address'); ?>">Address:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo $address; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('city'); ?>">City:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('city'); ?>" name="<?php echo $this->get_field_name('city'); ?>" type="text" value="<?php echo $city; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('state'); ?>">State:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('state'); ?>" name="<?php echo $this->get_field_name('state'); ?>" type="text" value="<?php echo $state; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('zip'); ?>">Zip:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('zip'); ?>" name="<?php echo $this->get_field_name('zip'); ?>" type="text" value="<?php echo $zip; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id('phone'); ?>">Phone:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" type="text" value="<?php echo $phone; ?>" /></p>

		<p><label for="<?php echo $this->get_field_name('email'); ?>">Email:</label>
		<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" /></p>

        <?php
    }

}



// register widget classess
add_action('widgets_init', create_function('', 'return register_widget("Contact_Widget");'));

?>
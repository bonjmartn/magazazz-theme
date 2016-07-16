<?php 

// register social widget
function register_social_widget_footer() {
    register_widget( 'social_widget_footer' );
}
add_action( 'widgets_init', 'register_social_widget_footer' );


/**
 * Adds social_widget_footer widget.
 */
class social_widget_footer extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  function __construct() {
    parent::__construct(
      'social_widget_footer', // Base ID
      __( 'Social Icons Footer', 'magazazz-free' ), // Name
      array( 'description' => __( 'Social Icons for the Footer', 'magazazz-free' ), ) // Args
    );
  }

  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    if ( ! empty( $instance['title'] ) ) {
      echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
    }
 
    $facebook = $instance['facebook'];
    $twitter = $instance['twitter'];
    $pinterest = $instance['pinterest'];
    $instagram = $instance['instagram'];
    $googleplus = $instance['googleplus'];
    $tumblr = $instance['tumblr'];
    $youtube = $instance['youtube'];
    $linkedin = $instance['linkedin'];

    if ( ! empty( $instance['facebook'] ) ) {
      echo sprintf( '<a href="' . $facebook . '"><i class="fa fa-facebook"></i></a> <a href="' . $facebook . '">Facebook</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
    }

    if ( ! empty( $instance['twitter'] ) ) {
      echo sprintf( '<a href="' . $twitter . '"><i class="fa fa-twitter"></i></a> <a href="' . $twitter . '">Twitter</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
    }

    if ( ! empty( $instance['pinterest'] ) ) {
      echo sprintf( '<a href="' . $pinterest . '"><i class="fa fa-pinterest"></i></a> <a href="' . $pinterest . '">Pinterest</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
    }

    if ( ! empty( $instance['instagram'] ) ) {
      echo sprintf( '<a href="' . $instagram . '"><i class="fa fa-instagram"></i></a> <a href="' . $instagram . '">Instagram</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
    }

    if ( ! empty( $instance['googleplus'] ) ) {
      echo sprintf( '<a href="' . $googleplus . '"><i class="fa fa-google-plus"></i></a> <a href="' . $googleplus . '">Google+</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
    }

    if ( ! empty( $instance['tumblr'] ) ) {
      echo sprintf( '<a href="' . $tumblr . '"><i class="fa fa-tumblr"></i></a> <a href="' . $tumblr . '">tumblr</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
    }

    if ( ! empty( $instance['youtube'] ) ) {
      echo sprintf( '<a href="' . $youtube . '"><i class="fa fa-youtube"></i></a> <a href="' . $youtube . '">YouTube</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
    }

    if ( ! empty( $instance['linkedin'] ) ) {
      echo sprintf( '<a href="' . $linkedin . '"><i class="fa fa-linkedin"></i></a> <a href="' . $linkedin . '">LinkedIn</a>');
    }

    echo $args['after_widget'];
  }

  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Follow Us', 'magazazz-free' );
    $facebook = ! empty( $instance['facebook'] ) ? $instance['facebook'] : __( '', 'magazazz-free' );
    $twitter = ! empty( $instance['twitter'] ) ? $instance['twitter'] : __( '', 'magazazz-free' );
    $pinterest = ! empty( $instance['pinterest'] ) ? $instance['pinterest'] : __( '', 'magazazz-free' );
    $instagram = ! empty( $instance['instagram'] ) ? $instance['instagram'] : __( '', 'magazazz-free' );
    $googleplus = ! empty( $instance['googleplus'] ) ? $instance['googleplus'] : __( '', 'magazazz-free' );
    $tumblr = ! empty( $instance['tumblr'] ) ? $instance['tumblr'] : __( '', 'magazazz-free' );
    $youtube = ! empty( $instance['youtube'] ) ? $instance['youtube'] : __( '', 'magazazz-free' );
    $linkedin = ! empty( $instance['linkedin'] ) ? $instance['linkedin'] : __( '', 'magazazz-free' );
    ?>


    <p>
    <label for="<?php echo $this->get_field_id('facebook_field'); ?>"><?php _e('Enter the URL for your Facebook page', 'magazazz-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('facebook_field'); ?>" name="<?php echo $this->get_field_name('facebook_field'); ?>" type="text" 
    value="<?php echo esc_attr( $facebook ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('twitter_field'); ?>"><?php _e('Enter the URL for your Twitter profile', 'magazazz-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('twitter_field'); ?>" name="<?php echo $this->get_field_name('twitter_field'); ?>" type="text" 
    value="<?php echo esc_attr( $twitter ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('pinterest_field'); ?>"><?php _e('Enter the URL for your Pinterest page', 'magazazz-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('pinterest_field'); ?>" name="<?php echo $this->get_field_name('pinterest_field'); ?>" type="text" 
    value="<?php echo esc_attr( $pinterest ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('instagram_field'); ?>"><?php _e('Enter the URL for your Instagram profile', 'magazazz-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('instagram_field'); ?>" name="<?php echo $this->get_field_name('instagram_field'); ?>" type="text" 
    value="<?php echo esc_attr( $instagram ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('googleplus_field'); ?>"><?php _e('Enter the URL for your Google Plus profile', 'magazazz-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('googleplus_field'); ?>" name="<?php echo $this->get_field_name('googleplus_field'); ?>" type="text" 
    value="<?php echo esc_attr( $googleplus ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('tumblr_field'); ?>"><?php _e('Enter the URL for your Tumblr page', 'magazazz-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('tumblr_field'); ?>" name="<?php echo $this->get_field_name('tumblr_field'); ?>" type="text" 
    value="<?php echo esc_attr( $tumblr ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('youtube_field'); ?>"><?php _e('Enter the URL for your YouTube page', 'magazazz-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('youtube_field'); ?>" name="<?php echo $this->get_field_name('youtube_field'); ?>" type="text" 
    value="<?php echo esc_attr( $youtube ); ?>" />
    </p>

    <p>
    <label for="<?php echo $this->get_field_id('linkedin_field'); ?>"><?php _e('Enter the URL for your LinkedIn profile', 'magazazz-free'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('linkedin_field'); ?>" name="<?php echo $this->get_field_name('linkedin_field'); ?>" type="text" 
    value="<?php echo esc_attr( $linkedin ); ?>" />
    </p>

    <?php 
  }

  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['title'] = strip_tags( $new_instance['title'] );
    $instance['facebook'] = strip_tags( $new_instance['facebook_field'] );
    $instance['twitter'] = strip_tags( $new_instance['twitter_field'] );
    $instance['pinterest'] = strip_tags( $new_instance['pinterest_field'] );
    $instance['instagram'] = strip_tags( $new_instance['instagram_field'] );
    $instance['googleplus'] = strip_tags( $new_instance['googleplus_field'] );
    $instance['tumblr'] = strip_tags( $new_instance['tumblr_field'] );
    $instance['youtube'] = strip_tags( $new_instance['youtube_field'] );
    $instance['linkedin'] = strip_tags( $new_instance['linkedin_field'] );
    return $instance;
  }

} // class social_widget_footer

?>
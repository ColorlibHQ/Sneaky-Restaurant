<?php
/**
 * @version  1.0
 * @package  Repair
 *
 */
 
 
/**************************************
*Creating Newsletter Widget
***************************************/
 
class repair_newsletter_widget extends WP_Widget {


    function __construct() {

        parent::__construct(
        // Base ID of your widget
        'sneakyrestaurant_newsletter',


        // Widget name will appear in UI
        esc_html__( '[ Repair ] Newsletter Form', 'sneakyrestaurant' ),

        // Widget description
        array( 'description' => esc_html__( 'Add footer newsletter signup form.', 'sneakyrestaurant' ), )
        );

    }

    // This is where the action happens
    public function widget( $args, $instance ) {
        
    $title 		= apply_filters( 'widget_title', $instance['title'] );
    $actionurl 	= apply_filters( 'widget_actionurl', $instance['actionurl'] );
    $desc 		= apply_filters( 'widget_desc', $instance['desc'] );

    // mc validation
    wp_enqueue_script( 'mc-validate');

    // before and after widget arguments are defined by themes
    echo wp_kses_post( $args['before_widget'] );
    if ( ! empty( $title ) )
    echo wp_kses_post( $args['before_title'] . $title . $args['after_title'] );


    ?>

    <div id="mc_embed_signup" class="newsletter">

        <?php 
        if( $desc ){
            echo '<p>'.esc_html( $desc ).'</p>';
        }
        ?>
 
        <form action="<?php echo esc_url( $actionurl ); ?>" id="mc-embedded-subscribe-form" method="post">
            <div class="form-group">
                <input type="email" class="form-control" name="EMAIL" placeholder="<?php esc_html_e( 'Email address', 'sneakyrestaurant' ); ?>" required>
                <button class="sideabr_news_submit btn bb-btn" type="submit">
                    <span class="ti-arrow-right"></span>
                </button>
            </div>
            <button class="button rounded-0 primary-bg text-white w-100" type="submit"><?php echo esc_html__( 'Subscribe', 'sneakyrestaurant' ); ?></button>
            <div class="info"></div>
        </form>

    </div>

    <?php
    echo wp_kses_post( $args['after_widget'] );
    }
		
    // Widget Backend 
    public function form( $instance ) {
        
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }else {
            $title = esc_html__( 'Newsletter', 'sneakyrestaurant' );
        }


        //	Action Url
        if ( isset( $instance[ 'actionurl' ] ) ) {
            $actionurl = $instance[ 'actionurl' ];
        }else {
            $actionurl = '';
        }

        //	Text Area
        if ( isset( $instance[ 'desc' ] ) ) {
            $desc = $instance[ 'desc' ];
        }else {
            $desc = '';
        }


        // Widget admin form
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' ,'sneakyrestaurant'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'actionurl' ) ); ?>"><?php esc_html_e( 'Action URL:' ,'sneakyrestaurant'); ?></label>
            <p class="description"><?php esc_html_e( 'Enter here your MailChimp action URL.' ,'sneakyrestaurant'); ?> </p>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'actionurl' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'actionurl' ) ); ?>" type="text" value="<?php echo esc_attr( $actionurl ); ?>" />

        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_html_e( 'Short Description:' ,'sneakyrestaurant'); ?></label> 
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>"><?php echo esc_textarea( $desc ); ?></textarea>
        </p>

    <?php 
    }

	
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {

        $instance = array();
        $instance['title'] 	  = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['actionurl'] = ( ! empty( $new_instance['actionurl'] ) ) ? strip_tags( $new_instance['actionurl'] ) : '';
        $instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';

        return $instance;

    }

} // Class repair_newsletter_widget ends here


// Register and load the widget
function repair_newsletter_load_widget() {
	register_widget( 'repair_newsletter_widget' );
}
add_action( 'widgets_init', 'repair_newsletter_load_widget' );
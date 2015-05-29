<?php
define ("PUBEXCHANGE_WIDGET_BASE_ID","pubexchange");
class WP_Widget_PubExchange extends WP_Widget {

    private static $counter;
    function __construct() {
        $widget_ops = array('classname' => 'widget_pubexchange', 'description' => __( "A pubexchange widget for your site.") );
        parent::__construct( PUBEXCHANGE_WIDGET_BASE_ID, _x( 'PubExchange Widget', 'PubExchange Widget' ), $widget_ops );
        $this->plugin_directory = plugin_dir_path(__FILE__);
    }

    function widget( $args, $instance ) {
        if (!isset(WP_Widget_PubExchange::$counter)){
            WP_Widget_PubExchange::$counter = 1;
        }
        else{
            WP_Widget_PubExchange::$counter = WP_Widget_PubExchange::$counter + 1;
        }
        if (trim($instance['widget_id']) == ''){
            return;
        }
        extract($args);

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        echo $before_widget;

        if ( $title ){
            echo $before_title . $title . $after_title;
        }

        $widget_id = ! empty( $instance['widget_id'] ) ? $instance['widget_id'] : '';
        echo '<div id="pubexchange_'.$widget_id.'"></div>';
        echo $after_widget;
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance );
        $widget_id = esc_attr( $instance['widget_id'] );
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('widget_id'); ?>"><?php _e('Widget ID:'); ?>
                <input class="widefat" id="<?php echo $this->get_field_id('widget_id'); ?>" name="<?php echo $this->get_field_name('widget_id'); ?>" type="text" value="<?php echo esc_attr($widget_id); ?>" />
            </label>
        </p>
    <?php
    }

    function update( $new_instance, $old_instance ) {

        // canceling save if the field is empty
        if (strip_tags($new_instance['widget_id']) == ""){
            return false;
	    }

        $instance = $old_instance;
        $instance['widget_id'] = strip_tags($new_instance['widget_id']);

        return $instance;
    }
}
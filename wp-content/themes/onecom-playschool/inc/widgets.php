<?php

/**
 *   ########### Social Icons widget ###########
 * */
if (!class_exists('one_social_widget')) {

    class one_social_widget extends WP_Widget {

        function __construct() {

            parent::__construct(
                    'one_social_widget', // Base ID
                    __('Social Icons', OC_TEXT_DOMAIN), // Name
                    array('description' => __('Displays social icons list.', OC_TEXT_DOMAIN),) // Args
            );
        }

        public function widget($args, $instance) {
            global $widget_default_color;
            $widget_default_color = true;

            $widget_id = $args['widget_id'] ?? '';
            // Our variables from the widget settings
            $title = $instance['title'];

            ob_start();
            echo $args['before_widget'];

            if (!empty($instance['title'])) {
                echo $args['before_title'] . $title . $args['after_title'];
            }

            if (empty($instance['icon_default_color']) || $instance['icon_default_color'] === 'off') {
                if (!empty($instance['icon_color'])) {
                    echo '
                        <style>
                            html #' . $widget_id . ' .oct-social-icons ul li > a svg * {
                                fill : ' . $instance['icon_color'] . '
                            }
                        </style>';
                }
                if (!empty($instance['icon_hover_color'])) {
                    echo '
                        <style>
                        html #' . $widget_id . ' .oct-social-icons ul li:hover > a svg * {
                            fill : ' . $instance['icon_hover_color'] . '
                        }
                        </style>';
                }
                $widget_default_color = false;
            }

            /* Include social media links */
            include(THM_DIR_PATH . '/template-parts/social-icons.php');
            echo $args['after_widget'];
            ob_end_flush();
        }

        public function form($instance) {
            $title = !empty($instance['title']) ? $instance['title'] : '';

            $icon_color = $icon_hover_color = $icon_default_color = '';

            $skin_customize_on_off = ot_get_option('skin_customize_on_off');
            if ($skin_customize_on_off == 'on') {
                $icon_color = ot_get_option('skin_customize_social_color');
                $icon_hover_color = ot_get_option('skin_customize_social_hover_color');
            }

            $icon_color = !empty($instance['icon_color']) ? $instance['icon_color'] : $icon_color;
            $icon_hover_color = !empty($instance['icon_hover_color']) ? $instance['icon_hover_color'] : $icon_hover_color;
            $icon_default_color = !empty($instance['icon_default_color']) ? $instance['icon_default_color'] : $icon_default_color;
            ?>
            <p>
                <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', OC_TEXT_DOMAIN); ?>:</label>
                <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>">
            </p>
            <table class="form-table">
                <tr>
                    <td style="width:45%"><label for="<?php echo $this->get_field_id('icon_default_color'); ?>"><?php _e('Social Icon Default Colors', OC_TEXT_DOMAIN); ?>:</label></td>
                    <td><input class="one-social-default-checkbox" id="<?php echo $this->get_field_id('icon_default_color'); ?>" name="<?php echo $this->get_field_name('icon_default_color'); ?>" type="checkbox" <?php checked('on', esc_attr($icon_default_color)); ?> /></td>
                </tr>
                <tr class="toggle-tr">
                    <td style="vertical-align:top"><label for="<?php echo $this->get_field_id('icon_color'); ?>"><?php _e('Icon Color', OC_TEXT_DOMAIN); ?>:</label></td>
                    <td><input class="widefat colorpicker onecom_widget_colorpicker" id="<?php echo $this->get_field_id('icon_color'); ?>" name="<?php echo $this->get_field_name('icon_color'); ?>" type="text" value="<?php echo esc_attr($icon_color); ?>" /></td>
                </tr>
                <tr class="toggle-tr">
                    <td style="vertical-align:top"><label for="<?php echo $this->get_field_id('icon_hover_color'); ?>"><?php _e('Icon Hover Color', OC_TEXT_DOMAIN); ?>:</label></td>
                    <td><input class="widefat colorpicker onecom_widget_colorpicker" id="<?php echo $this->get_field_id('icon_hover_color'); ?>" name="<?php echo $this->get_field_name('icon_hover_color'); ?>" type="text" value="<?php echo esc_attr($icon_hover_color); ?>" /></td>
                </tr>
                <tr class="toggle-tr">
                    <td colspan="2">
                        <p class="description"><?php _e('If colors are not set, skin colors will be applied.', OC_TEXT_DOMAIN); ?></p>
                    </td>
                </tr>
            </table>

            <p><span class="dashicons dashicons-external"></span> <a href="<?php echo menu_page_url('octheme_settings', false) . '#section_social_links'; ?>" target="_blank"><?php _e('Manage Social Icons', OC_TEXT_DOMAIN) ?></a></p>
            <br/>
            <?php
        }

        public function update($new_instance, $old_instance) {
            $instance = array();
            $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';
            $instance['icon_color'] = (!empty($new_instance['icon_color']) ) ? strip_tags($new_instance['icon_color']) : '';
            $instance['icon_hover_color'] = (!empty($new_instance['icon_hover_color']) ) ? strip_tags($new_instance['icon_hover_color']) : '';
            $instance['icon_default_color'] = (!empty($new_instance['icon_default_color']) ) ? strip_tags($new_instance['icon_default_color']) : '';
            return $instance;
        }

    }

}

add_action('load-widgets.php', 'one_color_picker_load');

function one_color_picker_load() {
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
}

/**
* Social widget
**/
if( ! class_exists( 'one_icon_box_widget' ) ) {
    class one_icon_box_widget extends WP_Widget {

        function __construct() {

            /*Add Widget scripts*/
            add_action('admin_enqueue_scripts', array($this, 'scripts'));

            parent::__construct(
                'one_icon_box_widget', // Base ID
                __( 'Icon Box', OC_TEXT_DOMAIN ), // Name
                array( 'description' => __( 'Display information with icon.', OC_TEXT_DOMAIN ), ) // Args
            );
        }

        public function scripts() {
	        if(get_current_screen()->base == 'widgets' || is_customize_preview()){
		        wp_enqueue_script( 'media-upload' );
	        }
            wp_enqueue_media();
            wp_enqueue_script('our_admin', THM_DIR_URI . '/inc/admin.js', array('jquery'));
        }

        public function widget( $args, $instance ) {
            // Our variables from the widget settings
            $title = ( isset( $instance['title'] ) ) ? $instance['title'] : '';
            $heading = ( isset( $instance['heading'] ) ) ? $instance['heading'] : '';
            $icon = ( isset( $instance['icon'] ) ) ? $instance['icon'] : '';
            $icon_alignment = ( isset( $instance['icon_alignment'] ) ) ? $instance['icon_alignment'] : 'top';
            $icon_size = ( isset( $instance['icon_size'] ) ) ? $instance['icon_size'] : '';
            $description = ( isset( $instance['description'] ) ) ? $instance['description'] : '';

            ob_start();
            echo $args['before_widget'];

            if ( ! empty( $title ) ) {
                echo $args['before_title'] . $title . $args['after_title'];
            }

            $image_src = wp_get_attachment_image_src( $icon, 'full' );
            if( ! empty( $image_src ) && strlen( $image_src[ 0 ] ) ){
                $icon = $image_src[ 0 ];
            }

            echo do_shortcode( '[oc_icon_box title="'.$heading.'" icon="'.$icon.'" icon_align="'.$icon_alignment.'" icon_size="'.$icon_size.'"]'.$description.'[/oc_icon_box]' );
            
            echo $args['after_widget'];
            ob_end_flush();
        }

        public function form( $instance ) {
            $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
            $icon = ! empty( $instance['icon'] ) ? $instance['icon'] : '';
            $heading = ! empty( $instance['heading'] ) ? $instance['heading'] : '';
            $description = ! empty( $instance['description'] ) ? $instance['description'] : '';
            $icon_size = ! empty( $instance['icon_size'] ) ? $instance['icon_size'] : '25px';
            $icon_alignment = ! empty( $instance[ 'icon_alignment' ] ) ? $instance[ 'icon_alignment' ] : '';
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title', OC_TEXT_DOMAIN ); ?>:</label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'icon' ); ?>"><?php _e( 'Icon', OC_TEXT_DOMAIN ); ?>:</label><br>
                <input class="widefat" id="<?php echo $this->get_field_id( 'icon' ); ?>" name="<?php echo $this->get_field_name( 'icon' ); ?>" type="text" value="<?php echo $icon; ?>" style="width:55%" />
                <button style="width:42%" class="upload_image_button button alignright"><?php _e( 'Upload Icon', OC_TEXT_DOMAIN ); ?></button>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'heading' ); ?>"><?php _e( 'Heading', OC_TEXT_DOMAIN ); ?>:</label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'heading' ); ?>" name="<?php echo $this->get_field_name( 'heading' ); ?>" type="text" value="<?php echo esc_attr( $heading ); ?>">
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'description' ); ?>"><?php _e( 'Description', OC_TEXT_DOMAIN ); ?>:</label>
                <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>"><?php echo esc_attr( $description ); ?></textarea>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'icon_alignment' ); ?>"><?php _e( 'Icon Alignment', OC_TEXT_DOMAIN ); ?>:</label>
                <select class="widefat" id="<?php echo $this->get_field_id( 'icon_alignment' ); ?>" name="<?php echo $this->get_field_name( 'icon_alignment' ); ?>">
                    <option value="top" <?php echo selected( $icon_alignment, 'top' ); ?>><?php _e( 'Top', OC_TEXT_DOMAIN ); ?></option>
                    <option value="left" <?php echo selected( $icon_alignment, 'left' ); ?>><?php _e( 'Left', OC_TEXT_DOMAIN ); ?></option>
                    <option value="right" <?php echo selected( $icon_alignment, 'right' ); ?>><?php _e( 'Right', OC_TEXT_DOMAIN ); ?></option>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'icon_size' ); ?>"><?php _e( 'Icon Size', OC_TEXT_DOMAIN ); ?>:</label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'icon_size' ); ?>" name="<?php echo $this->get_field_name( 'icon_size' ); ?>" type="text" value="<?php echo esc_attr( $icon_size ); ?>">
            </p>
            <?php
        }

        public function update( $new_instance, $old_instance ) {
            $instance = array();
            $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
            $instance['icon'] = ( ! empty( $new_instance['icon'] ) ) ? strip_tags( $new_instance['icon'] ) : '';
            $instance['heading'] = ( ! empty( $new_instance['heading'] ) ) ? strip_tags( $new_instance['heading'] ) : '';
            $instance['description'] = ( ! empty( $new_instance['description'] ) ) ?  $new_instance['description'] : '';
            $instance['icon_size'] = ( ! empty( $new_instance['icon_size'] ) ) ? strip_tags( $new_instance['icon_size'] ) : '';
            $instance['icon_alignment'] = ( ! empty( $new_instance['icon_alignment'] ) ) ? strip_tags( $new_instance['icon_alignment'] ) : '';
            return $instance;
        }
    }
}

/**
* Register widgets
**/
add_action( 'widgets_init', 'one_theme_register_widgets' );
function one_theme_register_widgets() {
    register_widget("one_social_widget");
    register_widget("one_icon_box_widget");
}

?>
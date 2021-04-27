<?php

if ( !class_exists( 'FiveEmo_WP_Admin' ) ) {

    class FiveEmo_WP_Admin
    {
        /**
         * Static property to hold our singleton instance
         *
         */
        static $instance = false;

        function __construct() {
            add_action( 'admin_init', [ $this, 'admin_init' ] );
            add_action( 'admin_menu', [ $this, 'admin_menu' ] );
        }

        /**
         * If an instance exists, this returns it.  If not, it creates one and
         * retuns it.
         *
         * @return FiveEmo_WP_Admin
         */

        public static function getInstance() {
            if ( !self::$instance )
                self::$instance = new self;
            return self::$instance;
        }

        function admin_menu() {
            // add_options_page(
            //     '5 Emotions Settings',
            //     '5 Emotions',
            //     'manage_options',
            //     'five-emo-wp',
            //     'five_emo_render_settings_page'
            // );
        }

        function admin_init() {

            // register_setting(
            //     'five_emo_wp_settings',
            //     'five_emo_wp_settings');

            // add_settings_section(
            //     'section_general',
            //     'Section General',
            //     'five_emo_section_one_text',
            //     'five-emo-wp'
            // );

            // add_settings_field(
            //     'fiveemo_objectid',
            //     'Object ID',
            //     'nelio_render_objectid',
            //     'five-emo-wp',
            //     'section_general'
            // );

            // add_settings_field(
            //     'fiveemo_mode',
            //     'Mode',
            //     'nelio_render_mode',
            //     'five-emo-wp',
            //     'section_general'
            // );

            // add_settings_field(
            //     'fiveemo_width',
            //     'Width',
            //     'nelio_render_width',
            //     'five-emo-wp',
            //     'section_general'
            // );

            // add_settings_field(
            //     'fiveemo_height',
            //     'Height',
            //     'nelio_render_height',
            //     'five-emo-wp',
            //     'section_general'
            // );

            // register_setting( 
            //     'general', 
            //     'fiveemo_objectid', 
            //     array(
            //         'type' => 'string', 
            //         'description' => __( 'Your one and only object ID. Sign in to get one. This is mandatory.', 'five-emo-wp' ), 
            //         'show_in_rest' => true ) 
            // );

            // register_setting( 
            //     'general',
            //     'fiveemo_mode',
            //     array(
            //         'type' => 'string', 
            //         'description' => __( "This plugin can be displayed in different modes. Valid modes are 'popup' , 'iframe' or 'kiosk'.", 'five-emo-wp' ), 
            //         'show_in_rest' => true ) 
            // );

            // register_setting( 
            //     'general',
            //     'fiveemo_width',
            //     array(
            //         'type' => 'string', 
            //         'description' => __( "The width of the frame in iframe mode or kiosk mode.", 'five-emo-wp' ), 
            //         'show_in_rest' => true ) 
            // );

            // register_setting( 
            //     'general',
            //     'fiveemo_height',
            //     array(
            //         'type' => 'string', 
            //         'description' => __( "The height of the frame in iframe mode or kiosk mode.", 'five-emo-wp' ), 
            //         'show_in_rest' => true ) 
            // );
        }
    }
}

// Instantiate our class
// $FiveEmo_WP_Admin = FiveEmo_WP_Admin::getInstance();

?>
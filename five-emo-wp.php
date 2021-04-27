<?php
/*
Plugin Name: 5 Emotions
Plugin URI:  https://www.5emotions.de/
Description: Embed 5 Emotions into your wordpress website
Version:     1.1
Author:      5 Emotions
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: five-emo-wp
Domain Path: /languages
*/

require_once __DIR__ . '/includes/five-emo-widget.php';

if ( is_admin() ) {
    // we are in admin mode
    require_once __DIR__ . '/admin/five-emo-wp-admin.php';
}

if ( !class_exists( 'FiveEmo_WP' ) ) {

    class FiveEmo_WP
    {
        /**
         * Static property to hold our singleton instance
         *
         */
        static $instance = false;

        function __construct() {
            add_action( 'init', [ $this, 'init' ] );
        }

        /**
         * If an instance exists, this returns it.  If not, it creates one and
         * retuns it.
         *
         * @return FiveEmo_WP
         */

        public static function getInstance() {
            if ( !self::$instance )
                self::$instance = new self;
            return self::$instance;
        }

        function init() {
            wp_enqueue_script( 'fiveemo-script-remote', 'https://www.5emotions.de/api/js', array( 'jquery' ), '', true );
            add_filter('script_loader_tag', [ $this, 'script_filter' ] , 10, 2);
        }

        function script_filter($tag, $handle) {
            # add script handles to the array below
            $scripts_to_defer = array('fiveemo-script-remote');
        
            foreach($scripts_to_defer as $defer_script) {
                if ($defer_script === $handle) {

                    $rep = " async defer onload='initFiveEmo()' src";
                    if ( is_admin() ) {
                        $rep = " async defer src";
                    }
                    return str_replace(" src", $rep, $tag);
                }
            }
            return $tag;
        }
    }
}

// Instantiate our class
$FiveEmo_WP = FiveEmo_WP::getInstance();
?>
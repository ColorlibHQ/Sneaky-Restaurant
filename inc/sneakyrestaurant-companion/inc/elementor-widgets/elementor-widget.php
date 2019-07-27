<?php
if( !defined( 'WPINC' ) ){
    die;
}
/**
 * @Packge     : sneakyrestaurant Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */


// Make sure the same class is not loaded twice in free/premium versions.
if ( !class_exists( 'sneakyrestaurant_El_Widgets' ) ) {
    /**
     * Main sneakyrestaurant Elementor Widgets Class
     *
     *
     * @since 1.7.0
     */
    final class sneakyrestaurant_El_Widgets {
        /**
         * sneakyrestaurant Companion Core Version
         *
         * Holds the version of the plugin.
         *
         * @since 1.7.0
         * @since 1.7.1 Moved from property with that name to a constant.
         *
         * @var string The plugin version.
         */
        const  VERSION = '1.0' ;
        /**
         * Minimum Elementor Version
         *
         * Holds the minimum Elementor version required to run the plugin.
         *
         * @since 1.7.0
         * @since 1.7.1 Moved from property with that name to a constant.
         *
         * @var string Minimum Elementor version required to run the plugin.
         */
        const  MINIMUM_ELEMENTOR_VERSION = '1.7.0';
        /**
         * Minimum PHP Version
         *
         * Holds the minimum PHP version required to run the plugin.
         *
         * @since 1.7.0
         * @since 1.7.1 Moved from property with that name to a constant.
         *
         * @var string Minimum PHP version required to run the plugin.
         */
        const  MINIMUM_PHP_VERSION = '5.4' ;
        /**
         * Instance
         *
         * Holds a single instance of the `Press_Elements` class.
         *
         * @since 1.7.0
         *
         * @access private
         * @static
         *
         * @var Press_Elements A single instance of the class.
         */
        private static  $_instance = null ;

        /**
         * Instance
         *
         * Ensures only one instance of the class is loaded or can be loaded.
         *
         * @since 1.7.0
         *
         * @access public
         * @static
         *
         * @return Press_Elements An instance of the class.
         */
        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }
            return self::$_instance;
        }

        /**
         * Clone
         *
         * Disable class cloning.
         *
         * @since 1.7.0
         *
         * @access protected
         *
         * @return void
         */
        public function __clone() {
            // Cloning instances of the class is forbidden
            _doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'sneakyrestaurant' ), '1.7.0' );
        }

        /**
         * Wakeup
         *
         * Disable unserializing the class.
         *
         * @since 1.7.0
         *
         * @access protected
         *
         * @return void
         */
        public function __wakeup() {
            // Unserializing instances of the class is forbidden.
            _doing_it_wrong( __FUNCTION__, esc_html__( 'Cheatin&#8217; huh?', 'sneakyrestaurant' ), '1.7.0' );
        }

        /**
         * Constructor
         *
         * Initialize the sneakyrestaurant elementor widgets.
         *
         * @since 1.7.0
         *
         * @access public
         */
        public function __construct() {
           
            $this->init_hooks();
            do_action( 'press_elements_loaded' );
        }


        /**
         * Init Hooks
         *
         * Hook into actions and filters.
         *
         * @since 1.7.0
         *
         * @access private
         */
        private function init_hooks() {
            add_action( 'init', [ $this, 'init' ] );
        }


        /**
         * Init sneakyrestaurant Elementor Widget
         *
         * Load the plugin after Elementor (and other plugins) are loaded.
         *
         * @since 1.0.0
         * @since 1.7.0 The logic moved from a standalone function to this class method.
         *
         * @access public
         */
        public function init() {

            if ( !did_action( 'elementor/loaded' ) ) {
                add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
                return;
            }

            // Check for required Elementor version

            if ( !version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
                add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
                return;
            }

            // Check for required PHP version

            if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
                add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
                return;
            }

            // Add new Elementor Categories
            add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_category' ] );
            add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'register_widget_styles' ] );
            add_action( 'elementor/frontend/after_register_styles', [ $this, 'register_widget_styles' ] );
            add_action( 'elementor/editor/before_enqueue_scripts', [ $this, 'register_widget_styles' ] );

            // Register New Widgets
            add_action( 'elementor/widgets/widgets_registered', [ $this, 'on_widgets_registered' ] );

            // sneakyrestaurant Companion enqueue style and scripts
            add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_element_widgets_scripts' ] );

        }

        /**
         * Admin notice
         *
         * Warning when the site doesn't have Elementor installed or activated.
         *
         * @since 1.1.0
         * @since 1.7.0 Moved from a standalone function to a class method.
         *
         * @access public
         */
        public function admin_notice_missing_main_plugin() {
            $message = sprintf(
            /* translators: 1: Elementor */
                esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'sneakyrestaurant' ),
                '<strong>' . esc_html__( 'sneakyrestaurant Theme', 'sneakyrestaurant' ) . '</strong>',
                '<strong>' . esc_html__( 'Elementor', 'sneakyrestaurant' ) . '</strong>'
            );
            printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
        }

        /**
         * Admin notice
         *
         * Warning when the site doesn't have a minimum required Elementor version.
         *
         * @since 1.1.0
         * @since 1.7.0 Moved from a standalone function to a class method.
         *
         * @access public
         */
        public function admin_notice_minimum_elementor_version() {
            $message = sprintf(
            /* translators: 1: Elementor 2: Required Elementor version */
                esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'sneakyrestaurant' ),
                '<strong>' . esc_html__( 'sneakyrestaurant', 'sneakyrestaurant' ) . '</strong>',
                '<strong>' . esc_html__( 'Elementor', 'sneakyrestaurant' ) . '</strong>',
                self::MINIMUM_ELEMENTOR_VERSION
            );
            printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
        }

        /**
         * Admin notice
         *
         * Warning when the site doesn't have a minimum required PHP version.
         *
         * @access public
         */
        public function admin_notice_minimum_php_version() {
            $message = sprintf(
            /* translators: 1: PHP 2: Required PHP version */
                esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'sneakyrestaurant' ),
                '<strong>' . esc_html__( 'sneakyrestaurant', 'sneakyrestaurant' ) . '</strong>',
                '<strong>' . esc_html__( 'PHP', 'sneakyrestaurant' ) . '</strong>',
                self::MINIMUM_PHP_VERSION
            );
            printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );
        }

        /**
         * Add new Elementor Categories
         *
         * Register new widget categories for sneakyrestaurant widgets.
         *
         * @access public
         */
        public function add_elementor_category() {

            \Elementor\Plugin::instance()->elements_manager->add_category( 'sneakyrestaurant-elements', [
                'title' => __( 'sneakyrestaurant Elements', 'sneakyrestaurant' ),
            ], 1 );

        }

        /**
         * Enqueue Widgets Scripts
         *
         * Enqueue custom scripts required to run sneakyrestaurant elementor widgets.
         *
         * @access public
         */
        public function enqueue_element_widgets_scripts() {

            // googlr map api key
            $apiKey  = sneakyrestaurant_opt('sneakyrestaurant_map_apikey');


            /******************
                Enqueue Css
            ******************/
            wp_enqueue_style( 'owl-carousel', SNEAKYRESTAURANT_COMPANION_EW_DIR_URL . 'assets/css/owl.carousel.css', array(), '2.2.0', 'all' );
            wp_enqueue_style( 'magnific-popup', SNEAKYRESTAURANT_COMPANION_EW_DIR_URL . 'assets/css/magnific-popup.css',  array(), '3.7.0', 'all' );


            /*****************
                Enqueue Js
            ******************/

            

            // ajaxchimp js
            wp_enqueue_script( 'jquery-ajaxchimp', SNEAKYRESTAURANT_COMPANION_EW_DIR_URL . 'assets/js/jquery.ajaxchimp.min.js', array('jquery'), '1.0', true );

            // sneakyrestaurant companion main js
            wp_enqueue_script( 'sneakyrestaurant', SNEAKYRESTAURANT_COMPANION_EW_DIR_URL . 'assets/js/sneakyrestaurant-companion-main.js', array( 'jquery', 'jquery-ui-datepicker' ), '1.0', true );


            // googleapis js
            wp_register_script( 'maps-googleapis', '//maps.googleapis.com/maps/api/js?key='.esc_attr( $apiKey ) );

            // sneakyrestaurant map custom js
            wp_register_script( 'sneakyrestaurant-map-custom', SNEAKYRESTAURANT_COMPANION_EW_DIR_URL . 'assets/js/map-custom.js', array('jquery'), '1.0', true );


            wp_localize_script( 'sneakyrestaurant', 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' )) );
           
        }
 
        /**
         * Register Widget Styles
         *
         * Register custom styles required to run sneakyrestaurant.
         *
         * @access public
         */
        public function register_widget_styles() {
            // Typing Effect
            wp_enqueue_style( 'sneakyrestaurant-companion-elementor-edit', SNEAKYRESTAURANT_COMPANION_EW_DIR_URL . 'assets/css/elementor-edit.css' );
        }


        /**
         * Register New Widgets
         *
         * Include sneakyrestaurant Companion widgets files and register them in Elementor.
         *
         * @since 1.0.0
         * @since 1.7.1 The method moved to this class.
         *
         * @access public
         */
        public function on_widgets_registered() {
            $this->include_widgets();
            $this->register_widgets();
        }

        /**
         * Include Widgets Files
         *
         * Load sneakyrestaurant companion widgets files.
         *
         * @since 1.0.0
         * @since 1.7.1 The method moved to this class.
         *
         * @access private
         */
        private function include_widgets() {
            
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/banner.php';
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/section-heading.php';
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/about.php';
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/contact.php';
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/services.php';
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/features.php';
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/testimonial.php';
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/clients.php';
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/blog.php';
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/contact-section.php';
            
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/food.php';
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/cta.php';
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/info.php';
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/gallery.php';
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/team-member.php';
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/tabs.php';
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/pricing.php';
            require_once SNEAKYRESTAURANT_COMPANION_EW_DIR_PATH . 'widgets/search-package.php';

        }

        /**
         * Register Widgets
         *
         * Register sneakyrestaurant companion widgets.
         *
         * @since 1.0.0
         * @since 1.7.1 The method moved to this class.
         *
         * @access private
         */
        private function register_widgets() {
            //  Register elements widgets   
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\sneakyrestaurant_Banner() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\sneakyrestaurant_sh() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\sneakyrestaurant_About() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\sneakyrestaurant_Contact() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\sneakyrestaurant_Services() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\sneakyrestaurant_Features() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\sneakyrestaurant_Testimonial() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\sneakyrestaurant_Clients() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\sneakyrestaurant_Blog() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\sneakyrestaurant_Contact_Section() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\Sneakyrestaurant_search_package() );

            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\sneakyrestaurant_Food() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\sneakyrestaurant_Cta() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\sneakyrestaurant_Info() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\sneakyrestaurant_Gallery() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\Sneakyrestaurant_Team_Member() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\Sneakyrestaurant_tabs() );
            \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \sneakyrestaurantelementor\Widgets\sneakyrestaurant_Pricing() );


        }

    }
}
// Make sure the same function is not loaded twice in free/premium versions.



if ( !function_exists( 'sneakyrestaurant_el_widgets_load' ) ) {
    /**
     * Load sneakyrestaurant elementor widget
     *
     * Main instance of Press_Elements.
     *
     * @since 1.0.0
     * @since 1.7.0 The logic moved from this function to a class method.
     */
    function sneakyrestaurant_el_widgets_load() {
        return sneakyrestaurant_El_Widgets::instance();
    }

    // Run sneakyrestaurant elementor widget
    sneakyrestaurant_el_widgets_load();
}


add_action( 'wp_enqueue_scripts', function() {
    wp_dequeue_style('elementor-global');
});
<?php
/**
 * Class for managing the template files for the Portfolio Plugin
 */

class TT_Templater {

    public static $instance = null;

    private function __construct() {
        add_action('template_include', array($this, 'tt_portfolio_load_tpl') ,1);
    }

    /**
     * TT_Templater class getter
     * @return object A singleton instance of TT_Templater
     */
    public static function get_instance() {
        if ( is_null(self::$instance )) {
            self::$instance = new TT_Templater;
        }else {
            return self::$instance;
        }
    }

    /**
     * Load the template for the Portfolio CPT
     */
    function tt_portfolio_load_tpl( $template ) {
        if ( is_singular( 'portfolio') ) {
            // Get the template path
            $template = plugin_dir_path(__FILE__) . 'templates/portfolio-template.php';
            return $template;
        }else {
            return $template;
        }
    }
}

TT_Templater::get_instance();
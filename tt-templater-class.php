<?php
/**
 * Class for managing the template files for the Portfolio Plugin
 */

class TT_Templater {

    public function __construct() {
        add_action('template_include', array($this, 'tt_portfolio_load_tpl') ,1);
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

new TT_Templater();
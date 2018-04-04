<?php
/*
Plugin Name: Themetacular Portfolio
Plugin URI: http://www.themetacular.com/plugins/tt-portfolio
Description: Portfolio Custom Post Type for Themetacular Wordpress themes.
Version: 1.0.0
Author: Themetacular
Author URI: http://www.themetacular.com
Text Domain: Portfolio
Domain Path: /
*/

/* Portfolio Custom Post Type -------------------------------------*/
require plugin_dir_path( __FILE__ ) . 'tt-portfolio-cpt.php';

/* Portfolio Metabox ----------------------------------------------*/
require plugin_dir_path( __FILE__ ) . 'tt-portfolio-metabox.php';

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
add_action('template_include', 'tt_portfolio_load_tpl',1);

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

/* Portfolio Templater Class --------------------------------------*/
require plugin_dir_path( __FILE__ ) . 'tt-templater-class.php';

/* Load the admin CSS styles --------------------------------------*/
function tt_portfolio_admin_css() {
    $path = plugin_dir_path(__FILE__) . 'styles/tt-portfolio-admin-style.css';
    wp_register_style( 'tt-portfolio-admin-css', $path, array(), false, $media = 'all' );
    wp_enqueue_style( 'tt-portfolio-admin-css');
}
add_action('admin_head', 'tt_portfolio_admin_css');
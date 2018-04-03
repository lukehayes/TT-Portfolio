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

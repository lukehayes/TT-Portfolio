<?php
/*
Plugin Name: Themetacular Portfolio
Plugin URI: http://www.themetacular.com/plugins/tt-portfolio
Description: Portfolio functionality for Themetacular Wordpress themes.
Version: 0.1.0
Author: Themetacular
Author URI: http://www.themetacular.com
Text Domain: Portfolio
Domain Path: /
*/

ob_start();

/* Portfolio Custom Post Type -------------------------------------*/
require plugin_dir_path( __FILE__ ) . 'tt-portfolio-cpt.php';

/* Portfolio Metabox ----------------------------------------------*/
require plugin_dir_path( __FILE__ ) . 'tt-portfolio-metabox.php';

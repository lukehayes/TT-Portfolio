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

function tt_portfolio_load_tpl( $template ) { 

    $file = plugin_dir_path(__FILE__) . 'templates/portfolio-template.php';
    $template = $file;
    var_dump($template);
    var_dump(locate_template(plugin_dir_path(__FILE__) . 'templates/portfolio-template.php', true));
    return $template;

    // if ( is_singular('portfolio') ) {
    //     var_dump("Is Single");
    //     $template =  locate_template(plugin_dir_path(__FILE__) . 'tempaltes/portfolio-template.php');
    // }else {
    //     var_dump("Is not");
    //     return $template;
    // }


    // return $template;

    // if ( is_singular('Portfolio') ) {
    //     var_dump("YEs");
    //     $template = locate_template( plugin_dir_path(__FILE__) . 'templates/portfolio-template.php' );
    //     return $template;
    // }else {
    //     var_dump("NO");
    //     return $template;
    // }

}
add_action('template_include', 'tt_portfolio_load_tpl',1);

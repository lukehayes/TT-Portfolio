<?php
/**
 * Build the Portfolio Custom Post Type.
 */

/**
 * Registers a new post type
 * @uses $wp_post_types Inserts new post type object into the list
 *
 * @param string  Post type key, must not exceed 20 characters
 * @param array|string  See optional args description above.
 * @return object|WP_Error the registered post type object, or an error object
 */
function tt_register_portolio_cpt() {

    $labels = array(
        'name'               => esc_html( 'Portfolio Items', 'tt_portfolio' ),
        'singular_name'      => esc_html( 'Portfolio Item', 'tt_portfolio' ),
        'add_new'            => esc_html_x( 'Add New Portfolio Item', 'tt_portfolio', 'tt_portfolio' ),
        'add_new_item'       => esc_html( 'Add New Portfolio Item', 'tt_portfolio' ),
        'edit_item'          => esc_html( 'Edit Portfolio Item', 'tt_portfolio' ),
        'new_item'           => esc_html( 'New Portfolio Item', 'tt_portfolio' ),
        'view_item'          => esc_html( 'View Portfolio Item', 'tt_portfolio' ),
        'search_items'       => esc_html( 'Search Portfolio Items', 'tt_portfolio' ),
        'not_found'          => esc_html( 'No Portfolio Items found', 'tt_portfolio' ),
        'not_found_in_trash' => esc_html( 'No Portfolio Items found in Trash', 'tt_portfolio' ),
        'parent_item_colon'  => esc_html( 'Parent Portfolio:', 'tt_portfolio' ),
        'menu_name'          => esc_html( 'Portfolio', 'tt_portfolio' ),
    );

    $args = array(
        'labels'              => $labels,
        'hierarchical'        => false,
        'description'         => 'The Themetacular Portfolio Custom Post Type',
        'taxonomies'          => array(),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => null,
        'menu_icon'           => null,
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'has_archive'         => true,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => true,
        'capability_type'     => 'post',
        'supports'            => array(
            'title',
            'editor'
        ),
    );

    register_post_type( 'portfolio', $args );
}

add_action( 'init', 'tt_register_portolio_cpt' );

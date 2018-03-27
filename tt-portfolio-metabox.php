<?php
/**
 * Register the meta boxes for the Portfolio Custom Post Type
 */

/**
 * Add the portfolio metabox the the custom post type
 */
function tt_add_portfolio_metabox() {
    add_meta_box(
        'tt_portfolio_metabox',
        'Portfolio Information',
        'tt_build_metabox_html',
        'portfolio',
        $context = 'normal',
        $priority = 'high',
        $callback_args = null );
}
add_action('add_meta_boxes', 'tt_add_portfolio_metabox');

function tt_build_metabox_html( $post ) {
    ?>
    <p class="howto">Additional information about the client, like a name/brand.</p>
    <label for="tt_portfolio_mb_client">Client: </label>
    <input type="text" name="tt_portfolio_mb_client" class="regular-text" placeholder="The name of the client the work is for perhaps?">

    <p class="howto">When the work was completed.</p>
    <label for="tt_portfolio_mb_date">Date: </label>
    <input type="text" name="tt_portfolio_mb_date" class="regular-text" placeholder="Could be year, month etc...">
    <?php
}

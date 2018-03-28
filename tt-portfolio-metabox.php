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
        var_dump($_POST);
        var_dump($_REQUEST);
        var_dump(get_post_meta('tt_portfolio_mb_client'));
        var_dump($_POST['tt_portfolio_mb_client']);
    ?>
    <table class="form-table">
        <tr>
            <h4>Add additonal information about your portfolio item here:</h4>
        </tr>
        <tr>
            <th class="row-title">
                <label for="tt_portfolio_mb_client">Client: </label>
                <input type="text" id="tt_portfolio_mb_client" name="tt_portfolio_mb_client" class="regular-text" placeholder="The name of the client the work is for perhaps?">
            </th>
        </tr>

        <tr>
            <th class="row-title">
                <?php wp_nonce_field( basename( __FILE__ ), 'tt_portfolio_mb_client' ); ?>
                <label for="tt_portfolio_mb_date">Date: </label>
                <input type="text" name="tt_portfolio_mb_date" class="regular-text" placeholder="Could be year, month etc...">
            </th>
        </tr>

    </table>
    <?php
}

function tt_save_mb_values($post_id, $post) {

    // Is the post an Auto Draft?
    if( isset($post->post_status) && 'auto-draft' == $post->post_status ) return;

    // Are we in the middle of autosating?
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Is the current user allowed here?
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;
}
add_action('save_post', 'tt_save_mb_values', 10, 2);

<?php
/**
 * Register the meta boxes for the Portfolio Custom Post Type
 */

/**
 * Define the inputs in an array to keep things dry
 */
function tt_get_input_fields() {
    return [
        'Client' => 'tt_portfolio_mb_client',
        'Date' => 'tt_portfolio_mb_date'
    ];
}

/**
 * Add the portfolio metabox the the custom post type
 */
function tt_add_portfolio_metabox($inputs) {
    add_meta_box(
        'tt_portfolio_metabox',
        'Portfolio Information',
        'tt_build_metabox_html',
        'portfolio',
        $context = 'normal',
        $priority = 'high',
        $data = tt_get_input_fields()
    );
}
add_action('add_meta_boxes', 'tt_add_portfolio_metabox', 10, 2);

/**
 * Callback to build the Portfolio CPT metabox HTML
 */
function tt_build_metabox_html( $post, $args ) {
    ?>
    <table class="form-table">
        <tr>
            <h4>Add additonal information about your portfolio item here:</h4>
        </tr>

        <?php wp_nonce_field( basename(__FILE__), 'tt_portfolio_mb_nonce' ); ?>

        <?php foreach ($args['args'] as $key => $value): ?>
            <tr>
                <th class="row-title">
                    <label for="tt_portfolio_mb_client"><?php echo $key ?>: </label>
                    <input type="text" id="<?php esc_attr_e( $value, 'tt-portfolio' ); ?>" name="<?php esc_attr_e($value, 'tt-portfolio'); ?>" class="regular-text" placeholder="The name of the datdatework is for perhaps?" value="<?php esc_html_e(get_post_meta($post->ID, $value, true)); ?>">
                </th>
            </tr>
        <?php endforeach ?>
    </table>
    <?php
}

function tt_save_mb_values($post_id, $post ) {

    $inputs = tt_get_input_fields();

    // Is the post an Auto Draft?
    if( ! isset($post->post_status) && 'auto-draft' == $post->post_status ) return;

    // Are we in the middle of autosating?
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Is the current user allowed here?
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    // Check our nonce
    if ( !isset( $_POST['tt_portfolio_mb_nonce'] ) || !wp_verify_nonce( $_POST['tt_portfolio_mb_nonce'], basename( __FILE__ ) ) ){
        return;
    }

    // Has the input value been set?
    foreach ($inputs as $key => $value) {
        // If so, update the value
        if( isset($_POST[ $value ]) ) {
            update_post_meta( $post_id, $value, $_POST[ $value ] );
        }
    }

}
add_action('save_post_portfolio', 'tt_save_mb_values', 10, 2);

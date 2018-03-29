<?php
/**
 * Register the meta boxes for the Portfolio Custom Post Type
 */


$inputs = [
    'client' => 'tt_portfolio_mb_client',
    'date' => 'tt_portfolio_mb_date'
];

/**
 * Add the portfolio metabox the the custom post type
 */
function tt_add_portfolio_metabox($inputs) {
    global $inputs;
    add_meta_box(
        'tt_portfolio_metabox',
        'Portfolio Information',
        'tt_build_metabox_html',
        'portfolio',
        $context = 'normal',
        $priority = 'high');
}
add_action('add_meta_boxes', 'tt_add_portfolio_metabox', 10, 2);

function tt_build_metabox_html( $post, $inputs ) {
    global $inputs;
        echo "Meta";
        var_dump(get_post_meta($post->ID, $inputs['client'] ));
        var_dump(get_post_meta($post->ID, $inputs['date'] ));
        echo "Post <br/>";
        var_dump($_POST);
        var_dump($_REQUEST);
    ?>

    <table class="form-table">
        <tr>
            <h4>Add additonal information about your portfolio item here:</h4>
        </tr>
        <tr>
            <th class="row-title">
                <label for="tt_portfolio_mb_client">Client: </label>
                <input type="text" id="<?php echo $inputs['client'] ?>" name="<?php echo $inputs['client'] ?>" class="regular-text" placeholder="The name of the datdatework is for perhaps?" value="<?php echo get_post_meta($post->ID, $inputs['client'], true); ?>">
            </th>
        </tr>
        <tr>
            <th class="row-title">
                <label for="tt_portfolio_mb_client">Date: </label>
                <input type="text" id="<?php echo $inputs['date'] ?>" name="<?php echo $inputs['date'] ?>" class="regular-text" placeholder="When the work was completed" value="<?php echo get_post_meta($post->ID, $inputs['date'], true); ?>">
            </th>
        </tr>
    </table>
    <?php
}

function tt_save_mb_values($post_id, $post, $inputs) {

    global $inputs;
    // Is the post an Auto Draft?
    if( ! isset($post->post_status) && 'auto-draft' == $post->post_status ) return;

    // Are we in the middle of autosating?
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Is the current user allowed here?
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;

    // Has the input value been set?
    if( isset($_POST[ $inputs['client'] ]) ) {
        update_post_meta( $post_id, $inputs['client'], $_POST[ $inputs['client'] ] );
    }

    // Has the input value been set?
    if( isset($_POST[ $inputs['date'] ]) ) {
        update_post_meta( $post_id, $inputs['date'], $_POST[ $inputs['date'] ] );
    }

    // Check the nonce
    // if ( empty($_POST[tt_portfolio_mb_client_nonce]) || ! wp_verify_nonce( $_POST[tt_portfolio_mb_client_nonce], basename(__FILE__) ) ) return;

    // if ( ! array_key_exists($inputs['client'], $_POST)) return;
}
add_action('save_post_portfolio', 'tt_save_mb_values', 10, 3);

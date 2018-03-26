<?php
/**
 * Register the meta boxes for the Portfolio Custom Post Type
 */

/**
 * Add the portfolio metabox the the custom post type
 */
function tt_add_portfolio_metabox() {
    add_meta_box( 'tt_portfolio_metabox', 'Portfolio Information', 'tt_build_metabox_html', 'portfolio', $context = 'advanced', $priority = 'default', $callback_args = null );
}
add_action('add_meta_boxes', 'tt_add_portfolio_metabox');

function tt_build_metabox_html() {
      ?>
    <label for="wporg_field">Description for this field</label>
    <select name="wporg_field" id="wporg_field" class="postbox">
        <option value="">Select something...</option>
        <option value="something">Something</option>
        <option value="else">Else</option>
    </select>
    <?php
}

<?php
/**
 * Sejoli
 *
 * @package     AutomatorWP\Integrations\Sejoli
 * @author      AutomatorWP <contact@automatorwp.com>, Ruben Garcia <rubengcdev@gmail.com>
 * @since       1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

// Includes
// require_once SEJOLI_AUTOMATORWP_DIR . 'includes/filters.php';
// require_once SEJOLI_AUTOMATORWP_DIR . 'includes/functions.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/tags/tags.php';

// Triggers
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/new-order.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/confirm-payment.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/update-status-order.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/order-subscription-first-time.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/order-subscription-regular.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/order-subscription-tryout.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/new-commission.php';

// require_once plugin_dir_path( __FILE__ ) . 'triggers/login.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/visit-site.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/view-post.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/view-post-category.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/view-post-tag.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/view-page.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/view-post-type.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/view-post-taxonomy.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/publish-post.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/publish-post-category.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/publish-post-tag.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/publish-page.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/publish-post-type.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/publish-post-taxonomy.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/delete-post.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/delete-post-type.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/delete-post-taxonomy.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/post-type-status.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/comment-post.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/comment-post-category.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/comment-post-tag.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/comment-page.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/comment-post-type.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/comment-post-taxonomy.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/post-updated.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/post-type-updated.php';
// require_once plugin_dir_path( __FILE__ ) . 'triggers/post-taxonomy-updated.php';

// Anonymous Triggers
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/anonymous-new-order.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/anonymous-confirm-payment.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/anonymous-order-subscription-first-time.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/anonymous-order-subscription-regular.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/anonymous-order-subscription-tryout.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/anonymous-new-commission.php';

// Actions
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/actions/update-user-into-usergroup.php';

/**
 * Registers this integration
 *
 * @since 1.0.0
 */
function automatorwp_register_sejoli_automatorwp_integration() {

    automatorwp_register_integration( 'sejoli', array(
        'label' => 'Sejoli',
        'icon'  => SEJOLI_AUTOMATORWP_URL . 'admin/sejoli/assets/img/sejoli-logo.jpg',
    ) );

}
add_action( 'automatorwp_init', 'automatorwp_register_sejoli_automatorwp_integration', 1 );
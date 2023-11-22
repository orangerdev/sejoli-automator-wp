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
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/tags/tags.php';

// Triggers
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/new-order.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/confirm-payment.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/update-status-order.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/order-subscription-first-time.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/order-subscription-regular.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/order-subscription-tryout.php';
require_once SEJOLI_AUTOMATORWP_DIR . 'admin/sejoli/triggers/new-commission.php';

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
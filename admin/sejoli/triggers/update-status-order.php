<?php
/**
 * Sejoli Update Status
 *
 * @package     AutomatorWP\Integrations\Sejoli\Triggers\Update_Status_Order
 * @author      Sejoli <admin@sejoli.co.id>
 * @since       1.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

class Sejoli_AutomatorWP_Update_Status_Order extends AutomatorWP_Integration_Trigger {

    public $integration = 'sejoli';
    public $trigger     = 'sejoli_automatorwp_update_status_order';

    /**
     * Register the trigger
     *
     * @since 1.0.0
     */
    public function register() {

        automatorwp_register_trigger( $this->trigger, array(
            'integration'       => $this->integration,
            'label'             => __( 'If there is a change in order status', 'sejoli-automatorwp' ),
            'select_option'     => __( 'If there is a change in order status', 'sejoli-automatorwp' ),
            'edit_label'        => __( 'If there is a change in order status', 'sejoli-automatorwp' ),
            'log_label'         => __( 'If there is a change in order status', 'sejoli-automatorwp' ),
            'action'            => 'sejoli/order/update-status',
            'function'          => array( $this, 'listener' ),
            'priority'          => 999,
            'accepted_args'     => 2,
            'options'           => array(
                // No options
            ),
            'tags' => array_merge(
                automatorwp_sejoli_order_tags(),
            )
        ) );

    }

    /**
     * Trigger listener
     *
     * @since 1.0.0
     *
     * @param int $args New update status order data created
     */
    public function listener( $args ) {

        if ( is_user_logged_in() ) :

            if ( empty( $args ) ) :

                return false;

            else:

                $respond = sejolisa_get_order([
                    'ID' => $args['ID']
                ]);

                $order_id     = $respond['orders']['ID'];
                $user_id      = $respond['orders']['user_id'];
                $product_id   = $respond['orders']['product_id'];
                $order_status = $respond['orders']['status'];

                if( false !== $respond['valid'] && isset( $respond['orders'] ) && isset( $order_id ) ) :

                    automatorwp_trigger_event( array(
                        'trigger'      => $this->trigger,
                        'user_id'      => $user_id,
                        'post_id'      => $product_id,
                        'order_id'     => $order_id,
                        'order_status' => $order_status,
                    ) );

                    return true;

                else:

                    return false;

                endif;

            endif;

        else:
            
            return false;

        endif;

    }

    /**
     * User deserves check
     *
     * @since 1.0.0
     *
     * @param bool      $deserves_trigger   True if user deserves trigger, false otherwise
     * @param stdClass  $trigger            The trigger object
     * @param int       $user_id            The user ID
     * @param array     $event              Event information
     * @param array     $trigger_options    The trigger's stored options
     * @param stdClass  $automation         The trigger's automation object
     *
     * @return bool                          True if user deserves trigger, false otherwise
     */
    public function user_deserves_trigger( $deserves_trigger, $trigger, $user_id, $event, $trigger_options, $automation ) {

        // Don't deserve if post is not received
        if( ! isset( $event['post_id'] ) ) :

            return false;

        endif;

        $post = isset($trigger_options['post']) ? $trigger_options['post'] : '';

        // Don't deserve if post doesn't match with the trigger option
        if( ! automatorwp_posts_matches( $event['post_id'], $post ) ) :

            return false;

        endif;

        return $deserves_trigger;

    }

    /**
     * Register the required hooks
     *
     * @since 1.0.0
     */
    public function hooks() {

        // Log meta data
        add_filter( 'automatorwp_user_completed_trigger_log_meta', array( $this, 'log_meta' ), 10, 6 );

        parent::hooks();

    }

    /**
     * Trigger custom log meta
     *
     * @since 1.0.0
     *
     * @param array     $log_meta           Log meta data
     * @param stdClass  $trigger            The trigger object
     * @param int       $user_id            The user ID
     * @param array     $event              Event information
     * @param array     $trigger_options    The trigger's stored options
     * @param stdClass  $automation         The trigger's automation object
     *
     * @return array
     */
    function log_meta( $log_meta, $trigger, $user_id, $event, $trigger_options, $automation ) {

        // Bail if action type don't match this action
        if( $trigger->type !== $this->trigger ) :
            
            return $log_meta;
        
        endif;

        $log_meta['order_id'] = ( isset( $event['order_id'] ) ? $event['order_id'] : 0 );

        return $log_meta;

    }

}

new Sejoli_AutomatorWP_Update_Status_Order();
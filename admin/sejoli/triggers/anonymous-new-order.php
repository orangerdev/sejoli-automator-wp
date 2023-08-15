<?php
/**
 * Sejoli Anonymous New Order
 *
 * @package     AutomatorWP\Integrations\Sejoli\Triggers\Anonymous_New_Order
 * @author      Sejoli <admin@sejoli.co.id>
 * @since       1.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

class Sejoli_AutomatorWP_Anonymous_New_Order extends AutomatorWP_Integration_Trigger {

    public $integration = 'sejoli';
    public $trigger     = 'sejoli_automatorwp_anonymous_new_order';

    /**
     * Register the trigger
     *
     * @since 1.0.0
     */
    public function register() {

        automatorwp_register_trigger( $this->trigger, array(
            'integration'       => $this->integration,
            'anonymous'         => true,
            'label'             => __( 'If there is a new order', 'sejoli-automatorwp' ),
            'select_option'     => __( 'If there is a new order', 'sejoli-automatorwp' ),
            'edit_label'        => __( 'If there is a new order', 'sejoli-automatorwp' ),
            'log_label'         => __( 'If there is a new order', 'sejoli-automatorwp' ),
            'action'            => 'sejoli/thank-you/render',
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
     * @param int $order New order data created
     */
    public function listener( $order ) {

        if ( !is_user_logged_in() ) :

            $order_id          = $order['ID'];
            $user_id           = $order['user_id'];
            $subscription_type = $order['type'];
            $product_id        = $order['product_id'];
            $product_type      = $order['product']->type;
            $order_total       = $order['grand_total'];

            // Bail if not is an anonymous purchase
            if( $user_id !== 0 ) {
                return;
            }

            if ( empty( $order ) && empty( $order_id ) ) :

                return false;

            else:

                if( $product_type === 'physical' || $product_type === 'digital' ) :

                    automatorwp_trigger_event( array(
                        'trigger'     => $this->trigger,
                        'user_id'     => $user_id,
                        'post_id'     => $product_id,
                        'order_id'    => $order_id,
                        'order_total' => $order_total,
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
     * Anonymous deserves check
     *
     * @since 1.0.0
     *
     * @param bool      $deserves_trigger   True if anonymous deserves trigger, false otherwise
     * @param stdClass  $trigger            The trigger object
     * @param array     $event              Event information
     * @param array     $trigger_options    The trigger's stored options
     * @param stdClass  $automation         The trigger's automation object
     *
     * @return bool                         True if anonymous deserves trigger, false otherwise
     */
    public function anonymous_deserves_trigger( $deserves_trigger, $trigger, $event, $trigger_options, $automation ) {

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
        add_filter( 'automatorwp_anonymous_completed_trigger_log_meta', array( $this, 'log_meta' ), 10, 6 );

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
    function log_meta( $log_meta, $trigger, $event, $trigger_options, $automation ) {

        // Bail if action type don't match this action
        if( $trigger->type !== $this->trigger ) :
            
            return $log_meta;
        
        endif;

        $log_meta['order_id'] = ( isset( $event['order_id'] ) ? $event['order_id'] : 0 );

        return $log_meta;

    }

}

new Sejoli_AutomatorWP_Anonymous_New_Order();
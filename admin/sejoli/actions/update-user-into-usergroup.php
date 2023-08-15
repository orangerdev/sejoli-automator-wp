<?php
/**
 * Sejoli Update User Into User Group
 *
 * @package     AutomatorWP\Integrations\Sejoli\Actions\Update_User_Into_User_Group
 * @author      Sejoli <admin@sejoli.co.id>
 * @since       1.0.0
 */
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

class AutomatorWP_Sejoli_Update_User_Into_User_Group extends AutomatorWP_Integration_Action {

    public $integration = 'sejoli';
    public $action      = 'sejoli_automatorwp_update_user_into_user_group';

    /**
     * The new inserted user ID
     *
     * @since 1.0.0
     *
     * @var int|WP_Error $user_id
     */
    public $user_id = 0;

    /**
     * The post meta
     *
     * @since 1.0.0
     *
     * @var array $user_meta
     */
    public $user_group = 0;

    /**
     * The action result
     *
     * @since 1.0.0
     *
     * @var array $result
     */
    public $result = array();

    /**
     * Register the trigger
     *
     * @since 1.0.0
     */
    public function register() {

        automatorwp_register_action( $this->action, array(
            'integration'       => $this->integration,
            'label'             => __( 'Update a user into user group', 'sejoli-automatorwp' ),
            'select_option'     => __( 'Update a <strong>user</strong> into <strong>user group</strong>', 'sejoli-automatorwp' ),
            /* translators: %1$s: User Group. */
            'edit_label'        => sprintf( __( 'Update a user into user group: %1$s', 'sejoli-automatorwp' ), '{usergroup}' ),
            /* translators: %1$s: User Group. */
            'log_label'         => sprintf( __( 'Update a user into user group: %1$s', 'sejoli-automatorwp' ), '{usergroup}' ),
            'options'           => array(
                    'usergroup' => automatorwp_utilities_post_option( array(
                        'name'               => __( 'User Group:', 'sejoli-automatorwp' ),
                        'option_none_label'  => __( 'Choosen a User Group', 'sejoli-automatorwp' ),
                        'option_none'        => true,
                        'option_custom'      => false,
                        'option_custom_desc' => __( 'User Group', 'sejoli-automatorwp' ),
                        'post_type'          => 'sejoli-user-group',
                    ) ),
                )
            ),
        );

    }

    /**
     * Action execution function
     *
     * @since 1.0.0
     *
     * @param stdClass  $action             The action object
     * @param int       $user_id            The user ID
     * @param array     $action_options     The action's stored options (with tags already passed)
     * @param stdClass  $automation         The action's automation object
     */
    public function execute( $action, $user_id, $action_options, $automation ) {

        // Shorthand
        $get_user_group   = $action_options['post'];
        $this->result     = array();
        $this->user_id    = absint( $user_id );
        $this->user_group = absint( $get_user_group );
        $user             = get_userdata( $this->user_id );

        // Bail if could not find the user
        if( ! $user ) :
            
            $this->result[] = sprintf( __( 'User not found by the ID %1$s.', 'sejoli-automatorwp' ), $this->user_id );
            
            return;
        
        endif;

        if( !empty( $user_id ) && !empty( $get_user_group ) ) :
            
            $update_user_group = sejolisa_update_user_group( $user_id, intval( $get_user_group ), true );
            if ( is_wp_error( $update_user_group ) ) :
                $this->result[] = sprintf( __( 'Failed to update user, reason: %1$s', 'sejoli-automatorwp' ), $update_user_group->get_error_message() );
            endif;
        
        endif;

    }

}

new AutomatorWP_Sejoli_Update_User_Into_User_Group();
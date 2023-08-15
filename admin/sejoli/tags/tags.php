<?php
/**
 * Tags
 *
 * @package     AutomatorWP\Integrations\Sejoli\Tags
 * @author      Sejoli <admin@sejoli.co.id>
 * @since       1.0.0
 */

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

/**
 * Order tags
 *
 * @since 1.0.0
 *
 * @return array
 */
function automatorwp_sejoli_order_tags() {

    $order_tags = array(
        'sejoli_tags_order_id' => array(
            'label'     => __( 'ID Order', 'sejoli-automatorwp' ),
            'type'      => 'integer',
            'preview'   => '123',
        ),
        'sejoli_tags_invoice_number' => array(
            'label'    => __( 'Nomor Invoice', 'sejoli-automatorwp' ),
            'type'     => 'integer',
            'preview'  => '#123',
        ),
        'sejoli_tags_product_name' => array(
            'label'     => __( 'Nama Produk', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => __( 'Product 1', 'sejoli-automatorwp' ),
        ),
        'sejoli_tags_product_variant' => array(
            'label'     => __( 'Variasi Produk', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => __( 'Color: Blue', 'sejoli-automatorwp' ),
        ),
        'sejoli_tags_quantity' => array(
            'label'     => __( 'QTY', 'sejoli-automatorwp' ),
            'type'      => 'integer',
            'preview'   => '1',
        ),
        'sejoli_tags_buyer_name' => array(
            'label'     => __( 'Nama Pembeli', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => __( 'Buyer', 'sejoli-automatorwp' ),
        ),
        'sejoli_tags_buyer_email' => array(
            'label'     => __( 'Email Pembeli', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => __( 'buyer@yourmail.com', 'sejoli-automatorwp' ),
        ),
        'sejoli_tags_buyer_phone' => array(
            'label'     => __( 'No. Telepon Pembeli', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => '08687687685',
        ),
        'sejoli_tags_buyer_address' => array(
            'label'     => __( 'Alamat Pembeli', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => __( 'Jl. Sejoli No. 777', 'sejoli-automatorwp' ),
        ),
        'sejoli_tags_order_date' => array(
            'label'     => __( 'Tanggal Order', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => date( 'Y-m-d H:i:s' ),
        ),
        'sejoli_tags_order_status' => array(
            'label'     => __( 'Status Order', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => 'Completed',
        ),
        'sejoli_tags_order_total' => array(
            'label'     => __( 'Total Order', 'sejoli-automatorwp' ),
            'type'      => 'float',
            'preview'   => '123.456',
        ),
        'sejoli_tags_affiliate_name' => array(
            'label'     => __( 'Nama Affiliasi', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => __( 'Sejoli', 'sejoli-automatorwp' ),
        ),
        'sejoli_tags_affiliate_email' => array(
            'label'     => __( 'Email Affiliasi', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => __( 'affiliate@yourmail.com', 'sejoli-automatorwp' ),
        ),
        'sejoli_tags_affiliate_phone' => array(
            'label'     => __( 'No. Telepon Affiliasi', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => '087867565765',
        ),
        'sejoli_tags_affiliate_tier' => array(
            'label'     => __( 'Tier Affiliasi', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => 'Tier 1',
        ),
        'sejoli_tags_affiliate_commission' => array(
            'label'     => __( 'Komisi Affiliasi', 'sejoli-automatorwp' ),
            'type'      => 'float',
            'preview'   => '123.450',
        ),
        'sejoli_tags_coupon_code' => array(
            'label'     => __( 'Kupon', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => 'KUPONSEJOLI',
        ),
        'sejoli_tags_payment_gateway' => array(
            'label'     => __( 'Metode Pembayaran', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => 'BCA',
        ),
        'sejoli_tags_shipping_method' => array(
            'label'     => __( 'Metode Pengiriman', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => 'JNE REG',
        ),
        'sejoli_tags_airwaybill' => array(
            'label'     => __( 'No. Resi', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => '764875638465868435',
        ),
        'sejoli_tags_subscription_expires' => array(
            'label'     => __( 'Waktu Berakhir Berlangganan', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => date( 'Y-m-d H:i:s' ),
        ),
        'sejoli_tags_license_code' => array(
            'label'     => __( 'Lisensi', 'sejoli-automatorwp' ),
            'type'      => 'text',
            'preview'   => '8798982394687685486876874',
        ),
    );

    /**
     * Filter order tags
     *
     * @since 1.0.0
     *
     * @param array $tags
     *
     * @return array
     */
    return apply_filters( 'automatorwp_sejoli_order_tags', $order_tags );

}

/**
 * Custom trigger tag replacement
 *
 * @since 1.0.0
 *
 * @param string    $replacement    The tag replacement
 * @param string    $tag_name       The tag name (without "{}")
 * @param stdClass  $trigger        The trigger object
 * @param int       $user_id        The user ID
 * @param string    $content        The content to parse
 * @param stdClass  $log            The last trigger log object
 *
 * @return string
 */
function automatorwp_sejoli_get_trigger_tag_replacement( $replacement, $tag_name, $trigger, $user_id, $content, $log ) {

    $trigger_args = automatorwp_get_trigger( $trigger->type );

    // Bail if no order ID attached
    if( ! $trigger_args ) :
        
        return $replacement;
    
    endif;

    // Bail if trigger is not from this integration
    if( $trigger_args['integration'] !== 'sejoli' ) :
        
        return $replacement;
    
    endif;

    $tags = array_keys( automatorwp_sejoli_order_tags() );

    // Bail if not order tags found
    if( ! in_array( $tag_name, $tags ) ) :
        
        return $replacement;
    
    endif;

    $order_id = (int) automatorwp_get_log_meta( $log->id, 'order_id', true );

    // Bail if no order ID attached
    if( $order_id === 0 ) :

        return $replacement;
    
    endif;

    $params = array(
        'ID' => $order_id
    );

    $get_order = sejolisa_get_order( $params );
    $order     = $get_order['orders'];

    $get_affiliate_tier = array_column( $order['product']->affiliate, 'fee', 'tier' );
    $affiliate_tier     = implode('', array_map(
        function( $v, $k ) { 
            return sprintf( "Tier (%s) = %s \n", $k, sejolisa_price_format( $v ) ); 
        },
        $get_affiliate_tier,
        array_keys( $get_affiliate_tier )
    ));

    $get_commission = sejolisa_get_commissions([
        'order_id' => $order['ID']
    ]);

    $affiliate_commission = implode('', array_map(
        function( $entry ) {
            return sprintf( "Tier (%s) = %s, Komisi = %s \n", $entry->tier, $entry->affiliate_name, sejolisa_price_format( $entry->commission ) ); 
        }, 
        $get_commission['commissions'],
        array_keys( $get_commission['commissions'] )
    ));

    global $wpdb;

    $subscription_expired = $wpdb->get_results( "
        SELECT end_date 
        FROM {$wpdb->prefix}sejolisa_subscriptions
        WHERE order_id = '".$order['ID']."'
    ", ARRAY_A );

    $get_license  = sejolisa_get_license_by_order( $order['ID'] );
    $license_code = 0;
    if( false !== $get_license['valid'] ) :

        $license_code = $get_license['licenses']['code'];

    endif;

    $product_variant = isset( $order['meta_data']['variants']['0']['label'] ) ? isset( $order['meta_data']['variants']['0']['label'] ) : '';
    $order_status    = sejolisa_get_status_log( $order['status'] );
    $order_courier   = isset( $order['courier'] ) ? $order['courier'] : '';
    $subscription_expired_date = !empty( $subscription_expired ) ? $subscription_expired[0]['end_date'] : '';

    $airwaybill = '0';
    if( $order['status'] === 'shipping' ) :

        if( isset( $order['meta_data']['shipping_data']['resi_number'] ) ) :

            $airwaybill = $order['meta_data']['shipping_data']['resi_number'];

        endif;

    endif;

    // Bail if order can't be found
    if( ! $order ) :

        return $replacement;

    endif;

    $function_name = str_replace( 'sejoli_tags_', '', $tag_name );

    // Format values for some tags
    switch( $tag_name ) {

        case 'sejoli_tags_order_id':
        case 'sejoli_tags_invoice_number':
            $replacement = $order['ID'];
            break;
       
        case 'sejoli_tags_product_name':
            $replacement = $order['product_name'];
            break;
        
        case 'sejoli_tags_product_variant':
            $replacement = $product_variant;
            break;
        
        case 'sejoli_tags_quantity':
            $replacement = $order['quantity'];
            break;
        case 'sejoli_tags_buyer_name':
            $replacement = $order['user_name'];
            break;
        
        case 'sejoli_tags_buyer_email':
            $replacement = $order['user_email'];
            break;
        
        case 'sejoli_tags_buyer_phone':
            $replacement = $order['user']->data->meta->phone;
            break;
        
        case 'sejoli_tags_buyer_address':
            $replacement = $order['user']->data->meta->address;
            break;
        
        case 'sejoli_tags_order_date':
            $replacement = $order['created_at'];
            break;
        
        case 'sejoli_tags_order_status':
            $replacement = $order_status;
            break;
        
        case 'sejoli_tags_order_total':
            $replacement = sejolisa_price_format($order['grand_total']);
            break;
        
        case 'sejoli_tags_affiliate_name':
            $replacement = $order['affiliate_name'];
            break;
        
        case 'sejoli_tags_affiliate_email':
            $replacement = $order['affiliate']->data->user_email;
            break;
        
        case 'sejoli_tags_affiliate_phone':
            $replacement = $order['affiliate']->data->meta->phone;
            break;
        
        case 'sejoli_tags_affiliate_tier':
            $replacement = $affiliate_tier;
            break;
        
        case 'sejoli_tags_affiliate_commission':
            $replacement = $affiliate_commission;
            break;
        
        case 'sejoli_tags_coupon_code':
            $replacement = $order['coupon_code'];
            break;
        
        case 'sejoli_tags_payment_gateway':
            $replacement = $order['payment_info']['bank'] .' - '. $order['payment_info']['owner'] .' - '. $order['payment_info']['account_number'];
            break;
        
        case 'sejoli_tags_shipping_method':
            $replacement = $order_courier;
            break;
        
        case 'sejoli_tags_airwaybill':
            $replacement = $airwaybill;
            break;
        
        case 'sejoli_tags_subscription_expires':
            $replacement = $subscription_expired_date;
            break;
        
        case 'sejoli_tags_license_code':
            $replacement = $license_code;
            break;
            
    }

    return $replacement;

}
add_filter( 'automatorwp_get_trigger_tag_replacement', 'automatorwp_sejoli_get_trigger_tag_replacement', 10, 6 );

/**
 * Order meta tag replacement
 *
 * @since 1.0.0
 *
 * @param string    $replacement    The tag replacement
 * @param string    $tag_name       The tag name (without "{}")
 * @param stdClass  $trigger        The trigger object
 * @param int       $user_id        The user ID
 * @param string    $content        The content to parse
 * @param stdClass  $log            The last trigger log object
 *
 * @return string
 */
function automatorwp_sejoli_get_order_meta_tag_replacement( $replacement, $tag_name, $trigger, $user_id, $content, $log ) {

    $trigger_args = automatorwp_get_trigger( $trigger->type );

    // Bail if no order ID attached
    if( ! $trigger_args ) :

        return $replacement;
    
    endif;

    // Bail if trigger is not from this integration
    if( $trigger_args['integration'] !== 'sejoli' ) :

        return $replacement;
    
    endif;

    $order_id = (int) automatorwp_get_log_meta( $log->id, 'order_id', true );

    // Bail if no order ID attached
    if( $order_id === 0 ) :

        return $replacement;
    
    endif;

    $meta_key = explode( ':', $tag_name );

    // Bail if meta key can't be found
    if( ! isset( $meta_key[1] ) ) :

        return $replacement;
    
    endif;

    $meta_key = $meta_key[1];

    $replacement = get_post_meta( $order_id, $meta_key, true );

    return $replacement;

}
add_filter( 'automatorwp_get_trigger_tag_replacement', 'automatorwp_sejoli_get_order_meta_tag_replacement', 10, 6 );
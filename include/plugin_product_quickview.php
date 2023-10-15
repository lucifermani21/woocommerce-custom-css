<?php 

/** WooCommerce product Quick View option with BootStrap 5 Modal **/

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

class WOO_CUSTOM_QUICKVIEW{
    public function custom_hooks(){
        add_action( 'wp_enqueue_scripts', array( $this, 'MS_add_bootstrap5' ) );
    }
    public function MS_add_bootstrap5(){
        $enable_woo_theme_bootstrap5 = get_option( 'woo_theme_bootstrap5' );
        if( $enable_woo_theme_bootstrap5 == 'yes' ){
            $version = '5.3.2';
            wp_enqueue_script( 'MS_bootstrap_bundle', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/'.$version.'/js/bootstrap.bundle.min.js', array(), $version, array( 'in_footer'  => true ) );	        
            wp_register_style( 'MS_bootstrap_css', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/'.$version.'/css/bootstrap.min.css', array(), $version, 'all' );
            wp_enqueue_style( 'MS_bootstrap_css' );
        }
    }

}
$obj = new WOO_CUSTOM_QUICKVIEW;
$obj->custom_hooks();
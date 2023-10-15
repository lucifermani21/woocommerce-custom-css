<?php 

/** WooCommerce product Quick View option with BootStrap 5 Modal **/

if ( ! defined( 'ABSPATH' ) ) {
    die;
}

class WOO_CUSTOM_QUICKVIEW{
    public function custom_hooks(){
        add_action( 'wp_enqueue_scripts', array( $this, 'MS_add_bootstrap5' ) );
        add_action( 'woocommerce_after_shop_loop_item', array( $this, 'MS_custom_quickview' ), 10 );
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
    public function MS_custom_quickview(){
        global $product;?>
        <a href="#" class="button custom_quick_view mb-3 w-50 mx-auto d-block" data-bs-toggle="modal" data-bs-target="#quickview_<?php $product->id;?>">Quick View</a>
        <div class="modal fade" id="quickview_<?php $product->id;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body border border-0">
                        <div class="p-3">
                            
                        </div>
                    </div>
                    <div class="modal-footer border border-0"></div>
                </div>
            </div>
        </div>
        <?php 
    }

}
$obj = new WOO_CUSTOM_QUICKVIEW;
$obj->custom_hooks();
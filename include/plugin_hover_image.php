<?php 

/** WooCommerce Product image hover Effect **/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class WOO_IMAGE_HOVER{

    function WooCommerinit(){
        add_action( 'woocommerce_init' , array( $this, 'MS_productimage_remove_add_hook' ) );
    }
    public function MS_productimage_remove_add_hook(){
        $woo_product_img_hovr = get_option( 'woo_product_img_hovr' );
        if( $woo_product_img_hovr === 'yes' ){
            remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
            add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'MS_woocommerce_thumbnail_callback' ), 10 );
        }
    }

    public function MS_woocommerce_thumbnail_callback( $size = 'shop_catalog' ){
        global $post;
		echo '<div id="product_'.$post->ID.'" class="woo_pro_img pro_'.$post->ID.'">';
		if ( has_post_thumbnail( $post->ID ) ):       
            echo get_the_post_thumbnail( $post->ID, $size, array( 'class' => 'img-fluid product-img', 'alt' => get_the_title() ) ); 
        else:
            echo  '<img src="'. woocommerce_placeholder_img_src() .'" class="img-fluid product-img" alt="'.get_the_title().'" />';
		endif;
        $product = new WC_product($post->ID);
        $product_gallery_image = isset( $product->get_gallery_image_ids()[0] ) ? $product->get_gallery_image_ids()[0] : '';
        if ( $product_gallery_image ) {
            echo wp_get_attachment_image( $product_gallery_image, $size, '', array( 'class' => 'img-fluid product-img_2', 'alt' => get_the_title() ) ) ;
        } else{
            echo get_the_post_thumbnail( $post->ID, $size, array( 'class' => 'img-fluid product-img_1', 'alt' => get_the_title() ) ); 
        }
		echo '</div>';
    }
}
$obj = new WOO_IMAGE_HOVER;
$obj->WooCommerinit();
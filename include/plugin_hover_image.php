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
        $product_gallery_image = wc_get_product()->get_gallery_image_ids();
        $image_id = isset( $product_gallery_image[1] ) ? $product_gallery_image[1] : '';
        if ( $image_id ) {
            echo wp_get_attachment_image( $image_id, $size, '', array( 'class' => 'img-fluid product-img', 'alt' => get_the_title() ) ) ;
        } else{
            echo get_the_post_thumbnail( $post->ID, $size, array( 'class' => 'img-fluid product-img_2', 'alt' => get_the_title() ) ); 
        }
		echo '</div>';
    }
}
$obj = new WOO_IMAGE_HOVER;
$obj->WooCommerinit();
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
			//add_action( 'wp_head', array( $this, 'MS_hover_image_CSS' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'MS_hover_scripts' ) );
            remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
            add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'MS_woocommerce_thumbnail_callback' ), 10 );
        }
    }
	
	public function MS_hover_scripts(){
		$plugin_URL = plugins_url( '/js/custom-pluign-script.js' , __FILE__ );
		$version = filemtime( plugin_dir_path(__FILE__) . '/js/custom-pluign-script.js' );
		wp_enqueue_script( 'custom_plugin_js', $plugin_URL, array(), $version, true );
	}
	
	public function MS_hover_image_CSS(){
		echo "<style type='text/css'>
		.woo_pro_img {position: relative;}
		.woo_pro_img img{transition: all 0.25s linear;z-index: 0;}
		.woo_pro_img img + img{	position: absolute;	left: 0;top: 0;	opacity: 0;	z-index:1;}
		.woo_pro_img:hover img + img{opacity: 1;}
		</style>";
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
            echo wp_get_attachment_image( $product_gallery_image, $size, '', array( 'class' => 'img-fluid product_img_2', 'alt' => get_the_title() ) ) ;
        } else{
            echo get_the_post_thumbnail( $post->ID, $size, array( 'class' => 'img-fluid product_img_2', 'alt' => get_the_title() ) ); 
        }
		echo '</div>';
    }
}
$obj = new WOO_IMAGE_HOVER;
$obj->WooCommerinit();

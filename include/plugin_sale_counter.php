<?php 

/** WooCommerce Product image hover Effect **/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class WOO_SALE_COUNTER
{
	public function MS_sale_hooks()
	{
		add_action( 'wp_enqueue_scripts', array( $this, 'MS_sale_counter_scripts' ) );
		add_action('woocommerce_before_add_to_cart_form', array( $this, 'MS_sale_counter_shop_detail_page' ) );
		//add_action( 'woocommerce_after_shop_loop_item', array( $this, 'MS_sale_loop_shop_page' ), 10 );
		
	}
	public function MS_sale_counter_scripts()
	{
		$plugin_URL = plugins_url( '/js/custom-sale-counter.js' , __FILE__ );
		$version = filemtime( plugin_dir_path(__FILE__) . '/js/custom-sale-counter.js' );
		wp_enqueue_script( 'custom_salecounter_js', $plugin_URL, array(), $version, true );
	}
	
	public function sale_timer_html( $ed, $et ){
		echo '<div class="countdown" data-sale="'.$ed.' '.$et.'"><span id="days"></span><span id="hours"></span><span id="minutes"></span><span id="seconds"></span></div>';
	}
	
	public function MS_sale_counter_shop_detail_page(){
		global $product;
		$sale_start_date = get_post_meta( $product->get_id(), '_sale_price_dates_from', true );
		$sale_end_date = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );
		
		$date_format = apply_filters( 'woocommerce_sale_price_end_date_format', 'M j, Y' );
		$start_date = date_i18n( $date_format, $sale_start_date );
        $end_date = date_i18n( $date_format, $sale_end_date );
		$end_time = '23:59:00';
		$this->sale_timer_html( $end_date, $end_time );
	}
}
$obj = new WOO_SALE_COUNTER;
$obj->MS_sale_hooks();

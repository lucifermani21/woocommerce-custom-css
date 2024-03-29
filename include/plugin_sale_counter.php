<?php 

/** WooCommerce Product image hover Effect **/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
class WOO_SALE_COUNTER
{
	public function MS_sale_hooks()
	{
		$sale_counter_loop = get_option( 'woo_shop_sale_counter' );
		$sale_counter_detail_page = get_option( 'woo_product_detail_sale_counter' );
		if( ( $sale_counter_loop == 'yes' ) || ( $sale_counter_detail_page == 'yes' ) ){
			add_action( 'wp_enqueue_scripts', array( $this, 'MS_sale_counter_scripts' ) );
		}
		if( $sale_counter_loop == 'yes' ){
			add_action( 'woocommerce_after_shop_loop_item', array( $this, 'MS_sale_loop_shop_page' ), 10 );
		}
		if( $sale_counter_detail_page == 'yes' ){
			add_action('woocommerce_before_add_to_cart_form', array( $this, 'MS_sale_counter_shop_detail_page' ) );
		}		
	}
	public function MS_sale_counter_scripts()
	{
		$plugin_URL = plugins_url( '/js/custom-sale-counter.js' , __FILE__ );
		$version = filemtime( plugin_dir_path(__FILE__) . '/js/custom-sale-counter.js' );
		wp_enqueue_script( 'custom_salecounter_js', $plugin_URL, array(), $version, true );
	}
	
	public function sale_starttimer_html( $ed, $et ){
		echo '<strong>Sale Start:</strong> <div class="countdown" data-sale="'.$ed.' '.$et.'"><span id="days"></span><span id="hours"></span><span id="minutes"></span><span id="seconds"></span></div>';
	}
	public function sale_endtimer_html( $ed, $et ){
		echo '<strong>Sale End:</strong> <div class="countdown" data-sale="'.$ed.' '.$et.'"><span id="days"></span><span id="hours"></span><span id="minutes"></span><span id="seconds"></span></div>';
	}
	
	public function MS_sale_counter_shop_detail_page(){
		global $product;
		$sale_start_date = get_post_meta( $product->get_id(), '_sale_price_dates_from', true );
		$sale_end_date = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );		
		$date_format = apply_filters( 'woocommerce_sale_price_end_date_format', 'M j, Y' );
		$start_date = date_i18n( $date_format, $sale_start_date );
        $end_date = date_i18n( $date_format, $sale_end_date );
		$end_time = ( $sale_start_date && $sale_end_date ) != '' ? '23:59:00' : '00:00:00';
		$current_date = date( 'M j, Y' );

		if( ( !empty( $sale_start_date ) ) && ( !empty( $sale_end_date ) ) ){
			if( ( ($start_date > $current_date ) && ( $start_date != $current_date ) ) && !empty( $start_date ) && ( $end_date != $current_date ) && ( $start_date != $end_date ) && ( $sale_start_date != '' ) ){
				$this->sale_starttimer_html( $start_date, $end_time );
			}elseif( ( $sale_end_date ) != '' ) {
				$this->sale_endtimer_html( $end_date, $end_time );
			}
		}
	}

	public function MS_sale_loop_shop_page(){
		global $product;
		$sale_start_date = get_post_meta( $product->get_id(), '_sale_price_dates_from', true );
		$sale_end_date = get_post_meta( $product->get_id(), '_sale_price_dates_to', true );		
		$date_format = apply_filters( 'woocommerce_sale_price_end_date_format', 'M j, Y' );
		$start_date = date_i18n( $date_format, $sale_start_date );
        $end_date = date_i18n( $date_format, $sale_end_date );
		$end_time = ( $sale_start_date && $sale_end_date ) != '' ? '23:59:00' : '00:00:00';
		$current_date = date( 'M j, Y' );
		//var_dump( $sale_end_date );
		if( ( !empty( $start_date ) ) && ( !empty( $end_date ) ) ){
			if( ( $start_date != $current_date ) && !empty( $start_date ) && ( $end_date != $current_date ) && ( $start_date != $end_date ) && ( $sale_start_date != '' ) ){
				$this->sale_starttimer_html( $start_date, $end_time );
			}elseif( ( $sale_end_date ) != '' ){
				$this->sale_endtimer_html( $end_date, $end_time );
			}
		}
	}
}
$obj = new WOO_SALE_COUNTER;
$obj->MS_sale_hooks();

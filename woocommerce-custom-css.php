<?php
/**
* Plugin Name: WooCommerce Custom Theme Options
* Plugin URI: https://github.com/lucifermani21/woocommerce-custom-css.git
* Description: WooCommerce custom theme CSS variables with SASS and another pages edit options with WooCommerce Support. Product Image Hover Effect add option and Quick View option avilable.
* Version: 3.0.2
* Author: Manpreet Singh
* Author URI: https://github.com/lucifermani21/woocommerce-custom-css.git
**/

if ( ! defined( 'ABSPATH' ) ) {
     die;
}
define( 'CUSTOM_SETTING_VERSION', '2.5.1' );
define( 'CUSTOM_SETTING_TEXT_DOMAIN', 'woocommerce-custom-css' );
define( 'CUSTOM_DIR__NAME', dirname( __FILE__ ) );
define( 'CUSTOM_EDITING__URL', plugin_dir_url( __FILE__ ) );
define( 'CUSTOM_EDITING__DIR', plugin_dir_path( __FILE__ ) );
define( 'CUSTOM_SETTING_PLUGIN', __FILE__ );
define( 'CUSTOM_SETTING_PLUGIN_BASENAME', plugin_basename( CUSTOM_SETTING_PLUGIN ) );

if( is_plugin_active( 'woocommerce/woocommerce.php' ) ){
    include_once CUSTOM_EDITING__DIR .  '/include/class-WOO-CSS.php';
    include_once CUSTOM_EDITING__DIR .  '/include/plugin_setting_class.php';
	include_once CUSTOM_EDITING__DIR .  '/include/plugin_custom_functions.php';
    include_once CUSTOM_EDITING__DIR .  '/include/plugin_hooks_setting.php';
	include_once CUSTOM_EDITING__DIR .  '/include/plugin_css_setting.php';
    include_once CUSTOM_EDITING__DIR .  '/include/plugin_hover_image.php';
    //include_once CUSTOM_EDITING__DIR .  '/include/plugin_product_quickview.php';
}

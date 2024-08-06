<?php
/**
* Plugin Name: WooCommerce Custom Theme Options
* Plugin URI: https://github.com/lucifermani21/woocommerce-custom-css.git
* Description: WooCommerce Support addon for custom themes. The plugin have SASS, WooCommerce Hooks, Hover image, Sale Counter and another settings.
* Version: 2.5.2
* Author: Manpreet Singh
**/

if ( ! defined( 'ABSPATH' ) ) {
     die;
}
define( 'CUSTOM_SETTING_VERSION', '2.5.2' );
define( 'CUSTOM_SETTING_TEXT_DOMAIN', 'woocommerce-custom-css' );
define( 'CUSTOM_DIR__NAME', dirname( __FILE__ ) );
define( 'CUSTOM_EDITING__URL', plugin_dir_url( __FILE__ ) );
define( 'CUSTOM_EDITING__DIR', plugin_dir_path( __FILE__ ) );
define( 'CUSTOM_SETTING_PLUGIN', __FILE__ );
define( 'CUSTOM_SETTING_PLUGIN_BASENAME', plugin_basename( CUSTOM_SETTING_PLUGIN ) );

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) 
{
	include_once CUSTOM_EDITING__DIR .  '/include/class-WOO-CSS.php';
	include_once CUSTOM_EDITING__DIR .  '/include/plugin_setting_class.php';
	include_once CUSTOM_EDITING__DIR .  '/include/plugin_custom_functions.php';
	include_once CUSTOM_EDITING__DIR .  '/include/plugin_hooks_setting.php';
	include_once CUSTOM_EDITING__DIR .  '/include/plugin_css_setting.php';
	//include_once CUSTOM_EDITING__DIR .  '/include/plugin_sale_counter.php';
	include_once CUSTOM_EDITING__DIR .  '/include/plugin_hover_image.php';
	//include_once CUSTOM_EDITING__DIR .  '/include/plugin_product_quickview.php';
} else {
	add_action( 'admin_notices', 'MS_admin_notice_warning' );
	function MS_admin_notice_warning() 
	{
		echo '<div class="notice notice-error"><p><strong>Error:</strong> Please note, the WooCommerce plugin is not active.</p></div>'; 
	}	
}

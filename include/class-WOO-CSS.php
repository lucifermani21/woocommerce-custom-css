<?php 
/** WooCommerce Custom Settings plugin classes **/
if( !class_exists( 'WOOCSS' ). false ){
	class WOOCSS{		
		
		private $plugin_name = 'woo-custom-css';
		private $setting_page = 'Woo CSS Settings';
		private $setting_page_link = 'woo-custom-css-setting-link';
		
		function __construct(){
			$this->hooks();
		}
		
		public function hooks(){			
			add_filter( 'plugin_action_links', array( $this, 'custom_add_action_plugin' ), 10, 2 );
			add_action( 'admin_enqueue_scripts', array( $this, 'MS_enqueue_custom_admin_style_script' ) );
			//add_action( 'admin_menu', array( $this, 'admin_menu_page') );
		}
		
		public function MS_enqueue_custom_admin_style_script(){
			$file_version = '6.65.7';
			wp_enqueue_style( 'codemirror_css', plugins_url('codemirror/codemirror.min.css',__FILE__ ), array(), $file_version, false );
			wp_enqueue_script( 'codemirror_js', plugins_url('codemirror/codemirror.min.js',__FILE__ ), array(), $file_version, false );
		}
		
		public function custom_add_action_plugin( $plugin_link, $plugin_file ){
			if ( $plugin_file != CUSTOM_SETTING_PLUGIN_BASENAME ) {
				return $plugin_link;
			}			
			$settings_link = sprintf( __( '<a href="%s" target="_blank">Custom Settings</a>', 'woocommerce-custom-css' ), esc_url( admin_url( 'admin.php?page=wc-settings&tab=woo-custom-settings' ) ) );;
			
			array_unshift( $plugin_link, $settings_link );
			return $plugin_link;
		}
		
		public function admin_menu_page(){
			add_submenu_page(
				'woocommerce',
				__($this->setting_page, $this->plugin_name),
				__($this->setting_page, $this->plugin_name),
				'manage_woocommerce',
				$this->setting_page_link,
				array($this, 'plugin_custom_css_setting_page'),
				null
			);
		}
		
		public function plugin_custom_css_setting_page(){
			require( CUSTOM_EDITING__DIR . '../plugin-templates/woo_custom_setting.php' );
		}
	
		function activation(){
			flush_rewrite_rules();    
		}
		
		function deactivation(){
			flush_rewrite_rules();
		}  
	}
}

$woo_custom_set = new WOOCSS();
register_activation_hook( __FILE__ , array( $woo_custom_set, 'activation' ) );
register_deactivation_hook( __FILE__ , array( $woo_custom_set, 'deactivation' ) );
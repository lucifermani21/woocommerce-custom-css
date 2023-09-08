<?php 

/** WooCommerce Custom Settings sections **/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if( !class_exists( 'MS_Custom_WooCommerce_Settings_Page' ) ){
    class MS_Custom_WooCommerce_Settings_Page{
        public function __construct() {

            $this->id = 'woo-custom-settings';
            $this->label = __( 'Woo Custom Settings', 'woocommerce-custom-settings-plugin' );

            // Add the tab to the tabs array
            add_filter( 'woocommerce_settings_tabs_array', array( $this, 'add_settings_page' ), 99 );
            // Add new section to the page
            add_action( 'woocommerce_sections_' . $this->id, array( $this, 'output_sections' ) );    
            // Add settings
            add_action( 'woocommerce_settings_' . $this->id, array( $this, 'output' ) );    
            // Process/save the settings
            add_action( 'woocommerce_settings_save_' . $this->id, array( $this, 'save' ) );

        }

        public static function add_settings_page( $settings_tabs ) {
			$settings_tabs['woo-custom-settings'] = __( 'Woo Custom Settings', 'woocommerce-custom-settings-plugin' );
			return $settings_tabs;
		}

        public function get_sections() {
            $sections = array(
                '' => __( 'General', 'woocommerce-custom-settings-plugin' ),
                'woocustom-settingtab' => __( 'Theme Hooks Settings', 'woocommerce-custom-settings-plugin' ),
                'product-page-css' => __( 'Product/Categories Page CSS', 'woocommerce-custom-settings-plugin' ),
                'cart-page-css' => __( 'Cart Page CSS', 'woocommerce-custom-settings-plugin' ),
                'checkout-page-css' => __( 'Checkout Page CSS', 'woocommerce-custom-settings-plugin' ),
                'extra-settings' => __( 'Extra CSS', 'woocommerce-custom-settings-plugin' ),
            );    
            return apply_filters( 'woocommerce_get_sections_' . $this->id, $sections );
        }
        public function output_sections() {
            global $current_section;    
            $sections = $this->get_sections();    
            if ( empty( $sections ) || 1 === sizeof( $sections ) ) {
                return;
            }    
            echo '<ul class="subsubsub">';    
            $array_keys = array_keys( $sections );    
            foreach ( $sections as $id => $label ) {
                echo '<li><a href="' . admin_url( 'admin.php?page=wc-settings&tab=' . $this->id . '&section=' . sanitize_title( $id ) ) . '" class="' . ( $current_section == $id ? 'current' : '' ) . '">' . $label . '</a> ' . ( end( $array_keys ) == $id ? '' : '|' ) . ' </li>';
            }    
            echo '</ul><br class="clear" />';
        }
        /** https://github.com/woocommerce/woocommerce/blob/fb8d959c587ee95f543e682e065192553b3cc7ec/includes/admin/class-wc-admin-settings.php#L246 **/
        public function get_settings() {
            global $current_section;    
            $settings = array();
                if ( $current_section == '' ) {
					// General Tab
					include( CUSTOM_EDITING__DIR. '/plugin-templates/custom_general_setting.php' );

				} elseif ( $current_section == 'woocustom-settingtab' ) { 
					// Products and Categoires page Hooks
					include( CUSTOM_EDITING__DIR. '/plugin-templates/custom_hooks_setting.php' );

				} elseif ( $current_section == 'product-page-css' ) { 
					// Products and Categoires page CSS settings
					include( CUSTOM_EDITING__DIR. '/plugin-templates/custom_productpage_setting.php' );

				} elseif ( $current_section == 'cart-page-css' ) { 
					// Cart page CSS settings
					include( CUSTOM_EDITING__DIR. '/plugin-templates/custom_cartpage_setting.php' );
					
				} elseif ( $current_section == 'checkout-page-css' ) { 
					// Checkout page CSS settings
					include( CUSTOM_EDITING__DIR. '/plugin-templates/custom_checkoutpage_setting.php' );
				} elseif ( $current_section == 'extra-settings' ) { 
					// Checkout page CSS settings
					include( CUSTOM_EDITING__DIR. '/plugin-templates/custom_extra_setting.php' );
				}else{
					echo "Noting Found...";
				}    
            return apply_filters( 'woocommerce_get_settings_' . $this->id, $settings );
        }
    
        /** Output the settings **/
        public function output() {
            $settings = $this->get_settings();
            WC_Admin_Settings::output_fields( $settings );
        }
    
        /** Process save **/
        public function save() {    
            global $current_section;
            $settings = $this->get_settings();
            WC_Admin_Settings::save_fields( $settings );
            if ( $current_section ) {
                do_action( 'woocommerce_update_options_' . $this->id . '_' . $current_section );
            }
        }
    }
}
new MS_Custom_WooCommerce_Settings_Page;

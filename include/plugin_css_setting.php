<?php 
/** WooCommerce Custom CSS Setting **/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( !class_exists( 'MS_Custom_CSS_Setting' ) ){
    class MS_Custom_CSS_Setting{
		
		function plugin_CSS_hooks(){
			add_action( 'wp_enqueue_scripts', array( $this, 'custom_plugin_min_css' ) );
			$this->MS_SASS_css_compiler();
		}
		
		public function custom_plugin_min_css(){
			$plugin_URL = plugins_url( '/css/woocommerce.min.css' , __FILE__ );
			//$version = filemtime( plugins_url( '/css/woocommerce.min.css' , __FILE__ ) );
			$version = '0.0.5';
			wp_register_style( 'woocustommincss', $plugin_URL , array('woocommerce-general'), $version , 'all' );
			wp_enqueue_style( 'woocustommincss', 'plugin_custom');
		}
		
		public function MS_SASS_css_compiler(){
			//Plugin custom Varibales
			$plugin_css_variables = array(
				'$product_title_text' => get_option( 'product_title_text' ),
				'$product_title_size' => get_option( 'product_title_size', '15' )."px",
				'$product_price_text' => get_option( 'product_price_text' ),
				'$product_price_size' => get_option( 'product_price_size', '13' )."px",
				'$product_box_bor' => get_option( 'product_box_bor', '0' )."px",
				'$product_box_bor_radis' => get_option( 'product_box_bor_radis', '0' )."%",
				'$product_box_bor_colr' => get_option( 'product_box_bor_colr' ),
				'$product_box_shadow' => get_option( 'product_box_shadow' ),
				'$btn_clr' => get_option( 'btn_clr' ),
				'$btn_txt_clr' => get_option( 'btn_txt_clr' ),
				'$btn_hclr' => get_option( 'btn_hclr' ),
				'$btn_htxt_clr' => get_option( 'btn_htxt_clr' ),
				'$btn_font_size' => get_option( 'btn_font_size', '14' )."px",
				'$btn_bor_radius' => get_option( 'btn_bor_radius', '0' )."%",
				'$table_border_size' => get_option( 'table_border_size', '1' )."px",
				'$table_bor_clr' => get_option( 'table_bor_clr' ),
				'$table_hbg_clr' => get_option( 'table_hbg_clr' ),
				'$table_htext_clr' => get_option( 'table_htext_clr' ),
				'$table_text_clr' => get_option( 'table_text_clr' ),
				'$field_bordr_clr' => get_option( 'field_bordr_clr' ),
			);
			
			$contentVar = "";
			foreach($plugin_css_variables as $k=>$v){
				if($v != "")
					$contentVar .= $k." : ".$v.";".chr(13);
			}
			file_put_contents(dirname( __FILE__ ). '/css/_variables_dynamic.scss',$contentVar);
			
			// ScssPhp Compiler 
			require_once 'sass/vendor/scssphp/scssphp/scss.inc.php' ;
			$compiler = new ScssPhp\ScssPhp\Compiler();
		 
			$source_scss = dirname( __FILE__ ). '/css/woocommerce.scss';
			$scssContents = file_get_contents( $source_scss );			
			$import_path = dirname( __FILE__ ). '/css';			
			$compiler->addImportPath($import_path);			
			$target_css = dirname( __FILE__ ). '/css/woocommerce.min.css';
			
			$compiler->setOutputStyle(\ScssPhp\ScssPhp\OutputStyle::COMPRESSED);
			
			$compiler->setVariables($plugin_css_variables); 
			$css = $compiler->compile($scssContents);
			//var_dump( '<pre>', $css );exit;
			if (!empty($css) && is_string($css)) {				
				file_put_contents( $target_css, $css );
			}
		}
		
    } 
}
$obj = new MS_Custom_CSS_Setting;
$ovj->plugin_CSS_hooks();

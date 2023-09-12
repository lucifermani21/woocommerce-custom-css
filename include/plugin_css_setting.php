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
			/*WooCommerce CSS*/
			$plugin_URL = plugins_url( '/css/woocommerce.min.css' , __FILE__ );
			$version = filemtime( plugin_dir_path(__FILE__) . '/css/woocommerce.min.css' );
			wp_register_style( 'woocustommincss', $plugin_URL , array('woocommerce-general'), $version , 'all' );
			wp_enqueue_style( 'woocustommincss', 'plugin_custom');

			/*Get admin Custom CSS*/
			$option_style_css = get_option( 'custom_woocommerce_css' );			
			file_put_contents(dirname( __FILE__ ). '/css/custom_style.css',$option_style_css);
			$plugin_URL = plugins_url( '/css/custom_style.css' , __FILE__ );
			$version = filemtime( plugin_dir_path(__FILE__) . '/css/custom_style.css' );
			wp_register_style( 'custom_style', $plugin_URL , array('woocommerce-general'), $version , 'all' );
			wp_enqueue_style( 'custom_style', 'plugin_custom');
		}

		public function get_option_size_data( $option_value ){
			$option_value = get_option( $option_value );
			$unite_value = isset( $option_value['unit'] ) ? $option_value['unit'] : 'px';
			$size_value = isset( $option_value['size'] ) ? $option_value['size'] : '0'.$unite_value;			
			return $size_value.$unite_value;
		}
		
		public function get_option_dimension_data( $option_value ){
			$option_value = get_option( $option_value );
			$unite_value = isset( $option_value['unit'] ) ? $option_value['unit'] : 'px';
			$top_value = isset( $option_value['top'] ) ? $option_value['top'].$unite_value : '0'.$unite_value;
			$right_value = isset( $option_value['right'] ) ? $option_value['right'].$unite_value : '0'.$unite_value;
			$bottom_value = isset( $option_value['bottom'] ) ? $option_value['bottom'].$unite_value : '0'.$unite_value;
			$left_value = isset( $option_value['left'] ) ? $option_value['left'].$unite_value : '0'.$unite_value;		
			return $top_value.' '.$right_value.' '.$bottom_value.' '.$left_value;
		}
		
		public function get_option_border_data( $option_value ){
			$option_value = get_option( $option_value );
			$unite_value = isset( $option_value['unit'] ) ? $option_value['unit'] : 'px';
			$bordr_value = isset( $option_value['bordr'] ) ? $option_value['bordr'] : 'none';
			$size_value = isset( $option_value['size'] ) ? $option_value['size'].$unite_value : '0'.$unite_value;
			$colorpick_value = isset( $option_value['colorpick'] ) ? $option_value['colorpick'] : '#000000';	
			return $bordr_value.' '.$size_value.' '.$colorpick_value;
		}
		
		public function MS_SASS_css_compiler(){
			//Plugin custom Varibales
			$plugin_css_variables = array(
				'$product_title_text' => get_option( 'product_title_text' ),
				'$product_title_size' => $this->get_option_size_data('product_title_size'),
				'$product_price_text' => get_option( 'product_price_text' ),
				'$product_price_size' => $this->get_option_size_data('product_price_size'),
				'$product_box_bor' => $this->get_option_border_data('product_box_bor'),
				'$product_box_bor_radis' => $this->get_option_dimension_data('product_box_bor_radis'),
				'$product_box_pading' => $this->get_option_dimension_data('product_box_pading'),
				'$product_box_shadow' => get_option( 'product_box_shadow' ),
				'$product_btn_padding' => $this->get_option_dimension_data( 'product_btn_padding' ),
				'$btn_clr' => get_option( 'btn_clr' ),
				'$btn_txt_clr' => get_option( 'btn_txt_clr' ),
				'$btn_hclr' => get_option( 'btn_hclr' ),
				'$btn_htxt_clr' => get_option( 'btn_htxt_clr' ),
				'$btn_font_size' => $this->get_option_size_data('btn_font_size'),
				'$btn_bor_radius' => $this->get_option_dimension_data('btn_bor_radius'),
				'$table_border_size' => $this->get_option_size_data( 'table_border_size'),
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
			if (!empty($css) && is_string($css)) {				
				file_put_contents( $target_css, $css );
			}
		}
		
    } 
}
$obj = new MS_Custom_CSS_Setting;
$obj->plugin_CSS_hooks();
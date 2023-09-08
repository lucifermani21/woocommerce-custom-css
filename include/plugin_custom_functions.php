<?php 
/** Plugin Custom Functions **/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( !class_exists( 'MS_Custom_Functions' ) ){
    class MS_Custom_Functions{
		function __construct(){
			add_action( 'woocommerce_admin_field_ms_size' , array( $this, 'MS_size_cutsom_type' ) );
			add_action( 'woocommerce_admin_field_ms_dimension' , array( $this, 'MS_dimension_cutsom_type' ) );
			add_action( 'woocommerce_admin_field_ms_border' , array( $this, 'MS_border_cutsom_type' ) );
			add_action( 'woocommerce_admin_field_ms_css_editor' , array( $this, 'MS_css_editor_cutsom_type' ) );
		}
		
		public function MS_size_cutsom_type( $value ){		
		    $description = \WC_Admin_Settings::get_field_description( $value );
			$option_value = $this->option_value_array_size( \WC_Admin_Settings::get_option( $value['id'], $value['default'] ) );
			?>
			<tr valign="top">
				<th scope="row" class="titledesc">
					<label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?></label>
					<?php echo $description['tooltip_html'];?>
				</th>
				<td class="forminp forminp-<?php echo sanitize_title( $value['type'] ) ?>">
					 <input
							name="<?php echo esc_attr( $value['id'] ); ?>[size]"
                    		id="<?php echo esc_attr( $value['id'] ); ?>_size"
                    		type="number"
                    		style="<?php echo esc_attr( $value['css'] ); ?>"
                    		value="<?php echo esc_attr( $option_value['size'] != '' ? $option_value['size'] : '0' ); ?>"
                    		class="<?php echo esc_attr( $value['class'] ); ?>"
							min="0"
					/>
					<select name="<?php echo esc_attr( $value['id'] ); ?>[unit]" title="<?php echo esc_html( $value['title'] ); ?>" style="width:60px;line-height:inherit;">
						<?php foreach ( $this->drodown_units() as $key => $val )
								echo '<option value="'.$key.'" '.selected( in_array( $key, $option_value ), true, false ).'>'.$val.'</option>';?>
					</select>
					<?php echo $description['description']; ?>
				</td>
			</tr>
			<?php 
		}
		
		public function option_value_array_size( $raw_value ){
			$value = wp_parse_args( (array) $raw_value, [
				'size' => '',
				'unit' => 'px',
			] );
			$value['size'] = isset( $value['size'] ) ? $value['size'] : '';
			if ( ! array_key_exists( $value['unit'], $this->drodown_units() ) ) {
				$value['unit'] = 'px';
			}
			return $value;
		}
		
		public function MS_dimension_cutsom_type( $value ){		
		    $description = \WC_Admin_Settings::get_field_description( $value );
			$option_value = $this->option_value_array_dimension( \WC_Admin_Settings::get_option( $value['id'], $value['default'] ) );
			?>
			<tr valign="top">
				<th scope="row" class="titledesc">
					<label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?></label>
					<?php echo $description['tooltip_html'];?>
				</th>
				<td class="forminp forminp-<?php echo sanitize_title( $value['type'] ) ?>">
					 <input
							name="<?php echo esc_attr( $value['id'] ); ?>[top]"
                    		id="<?php echo esc_attr( $value['id'] ); ?>_top"
                    		type="number"
                    		style="<?php echo esc_attr( $value['css'] ); ?>"
                    		value="<?php echo esc_attr( $option_value['top'] != '' ? $option_value['top'] : '0' ); ?>"
                    		class="<?php echo esc_attr( $value['class'] ); ?>"
							min="0"
					/>
					<input
							name="<?php echo esc_attr( $value['id'] ); ?>[right]"
                    		id="<?php echo esc_attr( $value['id'] ); ?>_right"
                    		type="number"
                    		style="<?php echo esc_attr( $value['css'] ); ?>"
                    		value="<?php echo esc_attr( $option_value['right'] != '' ? $option_value['right'] : '0' ); ?>"
                    		class="<?php echo esc_attr( $value['class'] ); ?>"
							min="0"
					/>
					<input
							name="<?php echo esc_attr( $value['id'] ); ?>[bottom]"
                    		id="<?php echo esc_attr( $value['id'] ); ?>_bottom"
                    		type="number"
                    		style="<?php echo esc_attr( $value['css'] ); ?>"
                    		value="<?php echo esc_attr( $option_value['bottom'] != '' ? $option_value['bottom'] : '0' ); ?>"
                    		class="<?php echo esc_attr( $value['class'] ); ?>"
							min="0"
					/>
					<input
							name="<?php echo esc_attr( $value['id'] ); ?>[left]"
                    		id="<?php echo esc_attr( $value['id'] ); ?>_left"
                    		type="number"
                    		style="<?php echo esc_attr( $value['css'] ); ?>"
                    		value="<?php echo esc_attr( $option_value['left'] != '' ? $option_value['left'] : '0' ); ?>"
                    		class="<?php echo esc_attr( $value['class'] ); ?>"
							min="0"
					/>
					<select name="<?php echo esc_attr( $value['id'] ); ?>[unit]" title="<?php echo esc_html( $value['title'] ); ?>" style="width:60px;line-height:inherit;">
						<?php foreach ( $this->drodown_units() as $key => $val )
								echo '<option value="'.$key.'" '.selected( in_array( $key, $option_value ), true, false ).'>'.$val.'</option>';?>
					</select>
					<?php echo $description['description']; ?>
					<br/>
					<span class="description">
						<span style="display: inline-block; width: 60px;">Top</span>
						<span style="display: inline-block; width: 55px;">Right</span>
						<span style="display: inline-block; width: 60px;">Bottom</span>
						<span style="display: inline-block; width: 60px;">Left</span>
					</span>
				</td>
			</tr>
			<?php
		}
		
		public function option_value_array_dimension( $raw_value ){
			$value = wp_parse_args( (array) $raw_value, [
				'top' => '',
				'right' => '',
				'bottom' => '',
				'left' => '',
				'unit' => 'px',
			] );
			$value['top'] = isset( $value['top'] ) ? $value['top'] : '';
			$value['right'] = isset( $value['right'] ) ? $value['right'] : '';
			$value['bottom'] = isset( $value['bottom'] ) ? $value['bottom'] : '';
			$value['left'] = isset( $value['left'] ) ? $value['left'] : '';
			if ( ! array_key_exists( $value['unit'], $this->drodown_units() ) ) {
				$value['unit'] = 'px';
			}
			return $value;
		}
		
		public function MS_border_cutsom_type( $value ){		
		    $description = \WC_Admin_Settings::get_field_description( $value );
			$option_value = $this->option_value_array_border( \WC_Admin_Settings::get_option( $value['id'], $value['default'] ) );
			?>
			<tr valign="top">
				<th scope="row" class="titledesc">
					<label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?></label>
					<?php echo $description['tooltip_html'];?>
				</th>
				<td class="forminp forminp-<?php echo sanitize_title( $value['type'] ) ?>">
					<select name="<?php echo esc_attr( $value['id'] ); ?>[bordr]" title="<?php echo esc_html( $value['title'] ); ?>" style="width:100px;line-height:inherit;">
						<?php foreach ( $this->drodown_border_type() as $key => $val )
								echo '<option value="'.$key.'" '.selected( in_array( $key, $option_value ), true, false ).'>'.$val.'</option>';?>
					</select>
					<input
							name="<?php echo esc_attr( $value['id'] ); ?>[size]"
                    		id="<?php echo esc_attr( $value['id'] ); ?>_size"
                    		type="number"
                    		style="<?php echo esc_attr( $value['css'] ); ?>"
                    		value="<?php echo esc_attr( $option_value['size'] != '' ? $option_value['size'] : '0' ); ?>"
                    		class="<?php echo esc_attr( $value['class'] ); ?>"
							min="0"
					/>
					<select name="<?php echo esc_attr( $value['id'] ); ?>[unit]" title="<?php echo esc_html( $value['title'] ); ?>" style="width:60px;line-height:inherit;">
						<?php foreach ( $this->drodown_units() as $key => $val )
								echo '<option value="'.$key.'" '.selected( in_array( $key, $option_value ), true, false ).'>'.$val.'</option>';?>
					</select>
					<span class="colorpickpreview" style="background: <?php echo esc_attr( $option_value['colorpick'] ); ?>">&nbsp;</span>
					<input
						name="<?php echo esc_attr( $value['id'] ); ?>[colorpick]"
						id="<?php echo esc_attr( $value['id'] ); ?>_colorpick"
						type="text"
						dir="ltr"
						style="width:7em;"
						class="<?php echo esc_attr( $value['class'] ); ?>colorpick"
						value="<?php echo esc_attr( $option_value['colorpick'] ); ?>"
						/>
					<div id="colorPickerDiv_<?php echo esc_attr( $value['id'] ); ?>" class="colorpickdiv" style="z-index: 100;background:#eee;border:1px solid #ccc;position:absolute;display:none;"></div>
					<?php echo $description['description']; ?>
				</td>
			</tr>
			<?php 
		}
		
		public function option_value_array_border( $raw_value ){
			$value = wp_parse_args( (array) $raw_value, [
				'bordr' => 'solid',
				'size' => '',
				'colorpick' => '',				
				'unit' => 'px',
			] );
			$value['colorpick'] = isset( $value['colorpick'] ) ? $value['colorpick'] : '';
			$value['size'] = isset( $value['size'] ) ? $value['size'] : '';
			if ( ! array_key_exists( $value['bordr'], $this->drodown_units() ) ) {
				$value['bordr'] = 'solid';
			}
			if ( ! array_key_exists( $value['unit'], $this->drodown_units() ) ) {
				$value['unit'] = 'px';
			}
			return $value;
		}
		
		public function MS_css_editor_cutsom_type( $value ){		
		    $description = \WC_Admin_Settings::get_field_description( $value );
			$option_value = (array)\WC_Admin_Settings::get_option( $value['id'], $value['default'] );
			?>
			<tr valign="top">
				<th scope="row" class="titledesc">
					<label for="<?php echo esc_attr( $value['id'] ); ?>"><?php echo esc_html( $value['title'] ); ?></label>
					<?php echo $description['tooltip_html'];?>
				</th>
				<td class="forminp forminp-<?php echo sanitize_title( $value['type'] ) ?>">
					<textarea
						wrap="hard"
						name="<?php echo esc_attr( $value['id'] ); ?>"
						id="<?php echo esc_attr( $value['id'] ); ?>"
						style="<?php echo esc_attr( $value['css'] ); ?>"
						class="<?php echo esc_attr( $value['class'] ); ?>"
					><?php echo esc_attr( $option_value[0] ); ?></textarea>
					<?php echo $description['description']; ?>
				</td>
			</tr>
			<script type="text/javascript">
			(function ($) {
				var codeMirror = CodeMirror.fromTextArea(document.getElementById("<?php echo esc_attr( $value['id'] ); ?>"), {
					'mode': 'text/css',
					'lineNumbers': true,
					'lineWrapping': true,
					'indentUnit': 0,
					'cm-tab-extra-space-remove': true,					
				});
				codeMirror.focus();
			})(jQuery);
			</script>
			<?php
		}		
 
		/* Units Dropdown */
		public function drodown_units(){
			$custom_unites = [
				'px'  => __( 'px', CUSTOM_SETTING_TEXT_DOMAIN ),
				'em'  => __( 'em', CUSTOM_SETTING_TEXT_DOMAIN ),
				'rem' => __( 'rem', CUSTOM_SETTING_TEXT_DOMAIN ),
				'%'   => __( '%', CUSTOM_SETTING_TEXT_DOMAIN ),
			];
			$units = apply_filters( 'ms_size_dimension_units', $custom_unites );
			return is_array( $units ) && ! empty( $units ) ? $units : [];
		}
		
		/* Border Type Dropdown */
		public function drodown_border_type(){
			$custom_border_type = [
				'solid'  => __( 'solid', CUSTOM_SETTING_TEXT_DOMAIN ),
				'none'   => __( 'none', CUSTOM_SETTING_TEXT_DOMAIN ),
				'hidden'   => __( 'hidden', CUSTOM_SETTING_TEXT_DOMAIN ),
				'dotted'  => __( 'dotted', CUSTOM_SETTING_TEXT_DOMAIN ),
				'dashed' => __( 'dashed', CUSTOM_SETTING_TEXT_DOMAIN ),
				'double'   => __( 'double', CUSTOM_SETTING_TEXT_DOMAIN ),
				'groove'   => __( 'groove', CUSTOM_SETTING_TEXT_DOMAIN ),
				'ridge'   => __( 'ridge', CUSTOM_SETTING_TEXT_DOMAIN ),
				'inset'   => __( 'inset', CUSTOM_SETTING_TEXT_DOMAIN ),
				'outset'   => __( 'outset', CUSTOM_SETTING_TEXT_DOMAIN ),				
			];
			$border_type = apply_filters( 'ms_border_type', $custom_border_type );
			return is_array( $border_type ) && ! empty( $border_type ) ? $border_type : [];
		}		
	}
}
new MS_Custom_Functions();

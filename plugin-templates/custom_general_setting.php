<?php 
$settings = array(                  
	array(
		'title' => __( 'General Settings', 'woocommerce-custom-settings-plugin' ),
		'type' => 'title',
		'desc' =>  __( 'General Shop page and theme options...', 'woocommerce-custom-settings-plugin' ),
		'id' => 'woocommerce_general_settings'
	),
	array(
		'title' => __( 'Theme Support', 'woocommerce-custom-settings-plugin' ),
		'desc' => __( 'Add Theme Support.', 'woocommerce-custom-settings-plugin' ),
		'id' => 'theme_support',
		'default'  => 'no',
		'type' => 'checkbox',                   
		//'desc_tip' => false,
		'checkboxgroup'   => 'start',
		'show_if_checked' => 'option',
	),
	array(
		'desc' => __( 'Add Product Gallery Zoom.', 'woocommerce-custom-settings-plugin' ),
		'id' => 'gallery_zoom',
		'default'  => 'no',
		'type' => 'checkbox',                   
		//'desc_tip' => false,
		'checkboxgroup'   => '',
		'show_if_checked' => 'yes',
		'autoload'        => false,
	),
	array(
		'desc' => __( 'Add Product Gallery Lightbox.', 'woocommerce-custom-settings-plugin' ),
		'id' => 'gallery_lightbox',
		'default'  => 'no',
		'type' => 'checkbox',                   
		//'desc_tip' => false,
		'checkboxgroup'   => '',
		'show_if_checked' => 'yes',
		'autoload'        => false,
	),
	array(
		'desc' => __( 'Add Product Gallery Slider.', 'woocommerce-custom-settings-plugin' ),
		'id' => 'gallery_slider',
		'default'  => 'no',
		'type' => 'checkbox',                   
		//'desc_tip' => false,
		'show_if_checked' => 'yes',
		'checkboxgroup'   => 'end',
		'autoload'        => false,
	),	
	array(
		'type' => 'sectionend',
		'id' => 'woocommerce_general_settings'
	),
);
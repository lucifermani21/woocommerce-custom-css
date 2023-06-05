<?php 
$settings = array(
	array(
		'title' => __( 'Checkout CSS Options', 'woocommerce-custom-settings-plugin' ),
		'type'  => 'title',
		'desc'  => '',
		'id'    => 'checkout_css_options',
	),				
	array(
		'title'    => __( 'Form Field Border Color', 'woocommerce-custom-settings-plugin' ),
		'desc'     => __( 'Select color for buttons background color. The defalut color added by the WooCommerce CSS.', 'woocommerce-custom-settings-plugin' ),
		'id'       => 'field_bordr_clr',
		'type'     => 'color',
		'css'      => 'width:6em;',
		'default'  => '#000000',
		'autoload' => false,
		'desc_tip' => true,
	),
	array(
		'type' => 'sectionend',
		'id'   => 'checkout_css_options',
	),
);
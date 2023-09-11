<?php 
$settings = array(
	array(
		'title' => __( 'Hooks Options', 'woocommerce-custom-settings-plugin' ),
		'type'  => 'title',
		'desc'  => 'WooCommerce Hooks options for the Custom Theme.',
		'id'    => 'hooks_options',
	),
	array(
		'title' => __( 'Shop Page Hooks', 'woocommerce-custom-settings-plugin' ),
		'type' => 'title',
		'desc' =>  __( '', 'woocommerce-custom-settings-plugin' ),
		'id' => 'woocommerce_shop_page_settings'
	),
	
	array(
		'title' => __( 'Woo Breadcrumb', 'woocommerce-custom-settings-plugin' ),
		'desc' => __( 'Hide WooCommerce Breadcrumb from shop page.', 'woocommerce-custom-settings-plugin' ),
		'id' => 'woo_breadcrumb',
		'default'  => 'no',
		'type' => 'checkbox',                   
		//'desc_tip' => false,
	),
	array(
		'title' => __( 'Woo Default Sidebar', 'woocommerce-custom-settings-plugin' ),
		'desc' => __( 'Hide WooCommerce Sidebar from shop page.', 'woocommerce-custom-settings-plugin' ),
		'id' => 'woo_sidebar',
		'default'  => 'no',
		'type' => 'checkbox',                   
		//'desc_tip' => false,
	),
	array(
		'title' => __( 'Woo Related products', 'woocommerce-custom-settings-plugin' ),
		'desc' => __( 'Hide WooCommerce Related products from product detail page.', 'woocommerce-custom-settings-plugin' ),
		'id' => 'woo_related_pro',
		'default'  => 'no',
		'type' => 'checkbox',                   
		//'desc_tip' => false,
	),
	array(
		'title' => __( 'Enable WordPress Gutenberg Editor', 'woocommerce-custom-settings-plugin' ),
		'desc' => __( 'If you want to use WordPress Gutenberg Editor for the product edit section.', 'woocommerce-custom-settings-plugin' ),
		'id' => 'post_type_gutenberg_editor',
		'default'  => 'no',
		'type' => 'checkbox',                
		//'desc_tip' => true,
	),	
	array(
		'title' => __( 'Add HTML After Header', 'woocommerce-custom-settings-plugin' ),
		'desc' => __( 'Please note this is only working when "Theme support" is enabled.', 'woocommerce-custom-settings-plugin' ),
		'id' => 'html_after_header',
		'default'  => '<div class="container">',
		'type' => 'textarea',                   
		'desc_tip' => true,
	),
	array(
		'title' => __( 'Add HTML Before Footer', 'woocommerce-custom-settings-plugin' ),
		'desc' => __( 'Please note this is only working when "Theme support" is enabled.', 'woocommerce-custom-settings-plugin' ),
		'id' => 'html_before_footer',
		'default'  => '</div>',
		'type' => 'textarea',                   
		'desc_tip' => true,
	),
	array(
		'type' => 'sectionend',
		'id' => 'woocommerce_shop_page_settings'
	),	
	array(
		'title' => __( 'Products and Categery page Settings', 'woocommerce-custom-settings-plugin' ),
		'type' => 'title',
		'desc' =>  __( '', 'woocommerce-custom-settings-plugin' ),
		'id' => 'woocommerce_shop_settings'
	),	
	array(
		'title'    => __( 'Simple Product button', 'woocommerce-custom-settings-plugin' ),
		'desc'     => __( 'Here you can change the add to cart button text for Simple products. The default text is "Add To Cart"', 'woocommerce-custom-settings-plugin' ),
		'id'       => 'simple_pro_btn',
		'placeholder'  => 'Add To Cart',
		'default'  => '',
		'type'     => 'text',
		'desc_tip' => true,
	),
	array(
		'title'    => __( 'Variables Product button', 'woocommerce-custom-settings-plugin' ),
		'desc'     => __( 'Here you can change the add to cart button text for Variable products. The default text is "Select Options"', 'woocommerce-custom-settings-plugin' ),
		'id'       => 'variable_pro_btn',
		'placeholder'  => 'Select Options',
		'default'  => '',
		'type'     => 'text',
		'desc_tip' => true,
	),
	array(
		'title'    => __( 'External Product button', 'woocommerce-custom-settings-plugin' ),
		'desc'     => __( 'Here you can change the add to cart button text for External products. The default text is "Read More"', 'woocommerce-custom-settings-plugin' ),
		'id'       => 'external_pro_btn',
		'placeholder'  => 'Buy product',
		'default'  => '',
		'type'     => 'text',
		'desc_tip' => true,
	),
	array(
		'title'    => __( 'Grouped Product button', 'woocommerce-custom-settings-plugin' ),
		'desc'     => __( 'Here you can change the add to cart button text for Grouped products. The default text is "Read More"', 'woocommerce-custom-settings-plugin' ),
		'id'       => 'grouped_pro_btn',
		'placeholder'  => 'View products',
		'default'  => '',
		'type'     => 'text',
		'desc_tip' => true,
	),
	array(
		'title'    => __( 'Related Product Text', 'woocommerce-custom-settings-plugin' ),
		'desc'     => __( 'Here you can change the related products heading text. The default text is "Related Products"', 'woocommerce-custom-settings-plugin' ),
		'id'       => 'related_product_text',
		'placeholder'  => 'Related Products',
		'default'  => '',
		'type'     => 'text',
		'desc_tip' => true,
	),
	/*array(
		'title'    => __( 'Product Page View Cart Button', 'woocommerce-custom-settings-plugin' ),
		'desc'     => __( 'Here you can change the Add to Cart product top message note. The default text is "View Cart"', 'woocommerce-custom-settings-plugin' ),
		'id'       => 'cart_mass_note',
		'placeholder'  => 'View Cart',
		'default'  => '',
		'type'     => 'text',
		'desc_tip' => true,
	),
	array(
		'title'    => __( 'Product Added to Cart Message', 'woocommerce-custom-settings-plugin' ),
		'desc'     => __( 'Here you can change the Add to Cart product top message note. The default text is "Product has been added to your basket."', 'woocommerce-custom-settings-plugin' ),
		'id'       => 'cart_mass_note',
		'placeholder'  => 'has been added to your basket.',
		'default'  => '',
		'type'     => 'text',
		'desc_tip' => true,
	),*/
	array(
		'type' => 'sectionend',
		'id' => 'woocommerce_shop_settings'
	),	
	array(
		'title' => __( 'Cart Page Setting Hooks', 'woocommerce-custom-settings-plugin' ),
		'type'  => 'title',
		'desc'  => '',
		'id'    => 'cart_settin_options',
	),
	array(
		'title'    => __( 'Before Table Text', 'woocommerce-custom-settings-plugin' ),
		'desc'     => __( 'Add text before cart table form. Using HTML format.', 'woocommerce-custom-settings-plugin' ),
		'id'       => 'table_before_text',
		'type'     => 'textarea',
		'desc_tip' => true,
	),
	array(
		'title'    => __( 'Cart Title Text', 'woocommerce-custom-settings-plugin' ),
		'desc'     => __( 'Add cart heading text.', 'woocommerce-custom-settings-plugin' ),
		'id'       => 'cart_h_text',
		'type'     => 'text',
		'desc_tip' => true,
	),
	array(
		'title'    => __( 'Cart Empty Return to Shop button text', 'woocommerce-custom-settings-plugin' ),
		'desc'     => __( 'Here you can change the cart page return to shop page button text. The default text is "Cart Totals"', 'woocommerce-custom-settings-plugin' ),
		'id'       => 'cartpagereturn_to_shop_text',
		'placeholder'  => 'Return to shop',
		'default'  => '',
		'type'     => 'text',
		'desc_tip' => true,
	),
	array(
		'type' => 'sectionend',
		'id'   => 'cart_settin_options',
	),
	/*array(
		'title' => __( 'Cart Page', 'woocommerce-custom-settings-plugin' ),
		'type' => 'title',
		'desc' =>  __( '', 'woocommerce-custom-settings-plugin' ),
		'id' => 'woocommerce_cart_page_settings'
	),
	array(
		'title'    => __( 'Cart Total Heading Text', 'woocommerce-custom-settings-plugin' ),
		'desc'     => __( 'Here you can change the cart total heading text. The default text is "Cart Totals"', 'woocommerce-custom-settings-plugin' ),
		'id'       => 'cart_total_text',
		'placeholder'  => 'Cart Totals',
		'default'  => '',
		'type'     => 'text',
		'desc_tip' => true,
	),
	array(
		'title'    => __( 'Checkout Button Text', 'woocommerce-custom-settings-plugin' ),
		'desc'     => __( 'Here you can change the proceed to checkout button text. The default text is "Proceed to checkout"', 'woocommerce-custom-settings-plugin' ),
		'id'       => 'Proceed_checkout_text',
		'placeholder'  => 'Proceed to checkout',
		'default'  => '',
		'type'     => 'text',
		'desc_tip' => true,
	),
	array(
		'type' => 'sectionend',
		'id' => 'woocommerce_cart_page_settings'
	),*/
	array(
		'title' => __( 'Checkout Page Hooks', 'woocommerce-custom-settings-plugin' ),
		'type' => 'title',
		'desc' =>  __( '', 'woocommerce-custom-settings-plugin' ),
		'id' => 'woocommerce_checkout_page_settings'
	),
	array(
		'title'    => __( 'Message thankyou order received text', 'woocommerce-custom-settings-plugin' ),
		'desc'     => __( 'Here you can change the checkout after payment Thankyou message text.', 'woocommerce-custom-settings-plugin' ),
		'id'       => 'checkbox_message_thankyou_order_received_text',
		'placeholder'  => 'Thank you. Your order has been received.',
		'default'  => '',
		'type'     => 'text',
		'desc_tip' => true,
	),
	array(
		'type' => 'sectionend',
		'id' => 'woocommerce_checkout_page_settings'
	),
	array(
		'type' => 'sectionend',
		'id'   => 'hooks_options',
	),
);
<?php
//Add theme setup
if ( ! function_exists( 'mosgutenberg_setup' ) ) :
	function mosgutenberg_setup() {
		add_theme_support('title-tag'); 	
		add_theme_support('post-thumbnails');
		add_theme_support( 'woocommerce' );
	    add_theme_support( 'wc-product-gallery-zoom' );
	    add_theme_support( 'wc-product-gallery-lightbox' );
	    add_theme_support( 'wc-product-gallery-slider' );
		//add_image_size( string $name, int $width, int $height, bool|array $crop = false );
		//add_image_size( 'max-size', '1920', '1920', false );

		load_theme_textdomain( 'theme', get_template_directory() . '/languages' );
		register_nav_menus( array(
			//'mainmenu' => esc_html__('Main Menu', 'mosgutenberg'),
			'mobilemenu' => esc_html__('Mobile Menu', 'mosgutenberg'),
		));
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		));
		add_theme_support( 'post-formats', array(
			'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery', 'chat',
		));
	}
endif;
add_action( 'after_setup_theme', 'mosgutenberg_setup' );
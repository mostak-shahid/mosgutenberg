<?php

function mosgetweb_enqueue_scripts() {
	wp_enqueue_script( 'jquery' );	
	wp_register_style( 'google-font', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Oxygen:300,400,700' );
	wp_enqueue_style( 'google-font' );
	wp_register_style( 'font-awesome.min', get_template_directory_uri() . '/fonts/font-awesome-4.7.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'font-awesome.min' );

//	wp_register_style( 'bootstrap.min', get_template_directory_uri() .  '/css/bootstrap.min.css' );
	wp_register_style( 'bootstrap.min', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' );
	wp_enqueue_style( 'bootstrap.min' );
//	wp_register_script('bootstrap.min', get_template_directory_uri() .  '/js/bootstrap.bundle.min.js', 'jquery');
	wp_register_script('bootstrap.min', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js', 'jquery');
	wp_enqueue_script( 'bootstrap.min' );


	wp_register_style( 'animate.min', get_template_directory_uri() .  '/plugins/wow/animate.min.css' );
	wp_enqueue_style( 'animate.min' );
	wp_register_script('wow.min', get_template_directory_uri() . '/plugins/wow/wow.min.js', 'jquery');
	wp_enqueue_script( 'wow.min' );
	
	


	wp_register_style( 'silkcss', get_template_directory_uri() . '/css/slick.css' );	
	wp_enqueue_style( 'silkcss' );	
	wp_register_script('silkjs', get_template_directory_uri() . '/js/slick.min.js', 'jquery');
	wp_enqueue_script( 'silkjs' );	
	
	wp_register_style( 'jquery.fancybox.min', get_template_directory_uri() . '/plugins/fancybox/fancyapps/fancybox.css' );
	wp_enqueue_style( 'jquery.fancybox.min' );
	wp_register_script('jquery.fancybox.min', get_template_directory_uri() . '/plugins/fancybox/fancyapps/fancybox.umd.js', 'jquery');
	wp_enqueue_script( 'jquery.fancybox.min' );

	wp_register_script('jquery.lazy.min', get_template_directory_uri() . '/plugins/jquery.lazy-master/jquery.lazy.min.js', 'jquery');
	wp_enqueue_script( 'jquery.lazy.min' );

	wp_register_script('jPages.min', get_template_directory_uri() . '/plugins/jPages/jPages.min.js', 'jquery');
	wp_enqueue_script( 'jPages.min' );

	wp_register_style( 'style', get_template_directory_uri() .  '/style.css', array('bootstrap.min', 'animate.min', 'jquery.fancybox.min'));
	wp_enqueue_style( 'style' );
		
	wp_register_script('main.min', get_template_directory_uri() . '/js/main.js', 'jquery');
	wp_enqueue_script( 'main.min' );

}
add_action( 'wp_enqueue_scripts', 'mosgetweb_enqueue_scripts' );
function mosgetweb_admin_enqueue_scripts(){
	wp_register_style( 'font-awesome.min', get_template_directory_uri() . '/fonts/font-awesome-4.7.0/css/font-awesome.min.css' );
	wp_register_style( 'custom-admin', get_template_directory_uri() . '/css/custom-admin.css' );
	wp_enqueue_style( 'font-awesome.min' );
	wp_enqueue_style( 'custom-admin' );

	wp_enqueue_media();
	wp_register_script('custom-admin', get_template_directory_uri() . '/js/custom-admin.js', 'jquery');
	wp_enqueue_script('custom-admin');


}
add_action( 'admin_enqueue_scripts', 'mosgetweb_admin_enqueue_scripts' );
function mosgetweb_common_enqueue_scripts(){
	wp_register_script('ajax', get_template_directory_uri() . '/js/ajax.js', 'jquery');
	wp_enqueue_script('ajax');
	wp_localize_script( 'ajax', 'mos_ajax_object',
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		)
	);
}
add_action( 'admin_enqueue_scripts', 'mosgetweb_common_enqueue_scripts' );
add_action( 'wp_enqueue_scripts', 'mosgetweb_common_enqueue_scripts' );

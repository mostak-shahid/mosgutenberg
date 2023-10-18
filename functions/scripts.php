<?php

function mosgutenberg_enqueue_scripts() {    
    wp_register_script('bootstrap.min', get_template_directory_uri() .  '/plugins/bootstrap-5.2.3/js/bootstrap.bundle.min.js', 'jquery');
    wp_enqueue_script( 'bootstrap.min' );   

    wp_register_style( 'bootstrap.min', get_template_directory_uri() .  '/plugins/bootstrap-5.2.3/css/bootstrap.min.css' );
    wp_enqueue_style( 'bootstrap.min' ); 
    
    if (carbon_get_theme_option( 'mos_plugin_jquery' ) == 'on') {
	   wp_enqueue_script('jquery');	
    }
    
    if (carbon_get_theme_option( 'mos_plugin_fontawesome' ) == 'on') {
        wp_register_style('font-awesome.min', get_template_directory_uri() . '/fonts/font-awesome-4.7.0/css/font-awesome.min.css');
        wp_enqueue_style('font-awesome.min');
    }
    
    if (carbon_get_theme_option( 'mos_plugin_fancybox' ) == 'on') {
        wp_register_style('jquery.fancybox.min', get_template_directory_uri() . '/plugins/fancybox/fancyapps/fancybox.css');
        wp_enqueue_style('jquery.fancybox.min');
        wp_register_script('jquery.fancybox.min', get_template_directory_uri() . '/plugins/fancybox/fancyapps/fancybox.umd.js', 'jquery');
        wp_enqueue_script('jquery.fancybox.min');    
    }
    
    if (carbon_get_theme_option( 'mos_plugin_isotop' ) == 'on') {
        wp_register_script('isotope', get_template_directory_uri() . '/plugins/isotop/isotope.pkgd.js', 'jquery');
        wp_enqueue_script('isotope');    
    }
    
    if (carbon_get_theme_option( 'mos_plugin_jpages' ) == 'on') {
        wp_register_script('jPages.min', get_template_directory_uri() . '/plugins/jPages/jPages.min.js', 'jquery');
        wp_enqueue_script('jPages.min');
    }
    if (carbon_get_theme_option( 'mos_plugin_lazyload' ) == 'on') {
        wp_register_script('jquery.lazy.min', get_template_directory_uri() . '/plugins/jquery.lazy-master/jquery.lazy.min.js', 'jquery');
        wp_enqueue_script('jquery.lazy.min');
    }
    if (carbon_get_theme_option( 'mos_plugin_table_shrinker' ) == 'on') {
        wp_register_style('jquery.table-shrinker', get_template_directory_uri() . '/plugins/jquery.table-shrinker/jquery.table-shrinker.css');
        wp_enqueue_style('jquery.table-shrinker'); 
        wp_register_script('jquery.table-shrinker', get_template_directory_uri() . '/plugins/jquery.table-shrinker/jquery.table-shrinker.js', 'jquery');
        wp_enqueue_script( 'jquery.table-shrinker' );
    }
    if (carbon_get_theme_option( 'mos_plugin_owlcarousel' ) == 'on') {
        wp_register_style('owl.carousel.min', get_template_directory_uri() . '/plugins/owlcarousel/owl.carousel.min.css');
        wp_enqueue_style('owl.carousel.min'); 
        wp_register_style('owl.theme.default.min', get_template_directory_uri() . '/plugins/owlcarousel/owl.theme.default.min.css');
        wp_enqueue_style('owl.theme.default.min');       
        wp_register_script('owl.carousel.min', get_template_directory_uri() . '/plugins/owlcarousel/owl.carousel.min.js', 'jquery');
        wp_enqueue_script('owl.carousel.min');
    }
    if (carbon_get_theme_option( 'mos_plugin_slick' ) == 'on') {    
        wp_register_style( 'slick', get_template_directory_uri() . '/plugins/slick/slick/slick.css' );		
        wp_enqueue_style( 'slick' );
        wp_register_style( 'slick-theme', get_template_directory_uri() . '/plugins/slick/slick/slick-theme.css' );
        wp_enqueue_style( 'slick-theme' );	
        wp_register_script('slick', get_template_directory_uri() . '/plugins/slick/slick/slick.min.js', 'jquery');
        wp_enqueue_script( 'slick' );
    }
    if (carbon_get_theme_option( 'mos_plugin_wow' ) == 'on') {
        wp_register_script('wow.min', get_template_directory_uri() . '/plugins/wow/wow.min.js', 'jquery');
        wp_enqueue_script('wow.min');
    }
    if (carbon_get_theme_option( 'mos_plugin_animate' ) == 'on') {
        wp_register_style('animate', get_template_directory_uri() . '/assets/css/animate.css');	
        wp_enqueue_style('animate');	
    }    
    if (carbon_get_theme_option( 'jquery_counterup' ) == 'on') {
        wp_register_script('waypoints.min', get_template_directory_uri() . '/plugins/jquery.counterup/waypoints.min.js', 'jquery');
        wp_enqueue_script('waypoints.min');
        wp_register_script('jquery.counterup.min', get_template_directory_uri() . '/plugins/jquery.counterup/jquery.counterup.min.js', 'jquery');
        wp_enqueue_script('jquery.counterup.min');
    }
    
    $additionals = carbon_get_theme_option( 'mos_plugin_additional' );
    if ($additionals && sizeof($additionals)) {
        $n = 1;
        foreach($additionals as $additional) {
            $prefix = '';
            $id = 'additional-file-'.$additional['type'].'-'.$n;
            if ($additional['from'] == 'parent') $prefix = get_template_directory_uri();
            elseif ($additional['from'] == 'child') $prefix = get_stylesheet_directory_uri();
            else $prefix = '';
            
            if ($additional['type'] == 'style') {
                wp_register_style( $id, $prefix . $additional['source'], '', '1.0.0' );
                wp_enqueue_style( $id );
            } else {
                wp_register_script($id, $prefix . $additional['source'], 'jquery');
                wp_enqueue_script( $id );                
            }
            $n++;
        }
    }
    
    wp_register_style( 'hc-offcanvas-nav', get_template_directory_uri() . '/plugins/hc-mobilenav/src/scss/hc-offcanvas-nav.css' );		
    wp_enqueue_style( 'hc-offcanvas-nav' );
    wp_register_style( 'hc-offcanvas-nav.carbon', get_template_directory_uri() . '/plugins/hc-mobilenav/src/scss/hc-offcanvas-nav.carbon.css' );		
    //wp_enqueue_style( 'hc-offcanvas-nav.carbon' );
    wp_register_script( 'hc-offcanvas-nav', get_template_directory_uri() . '/plugins/hc-mobilenav/dist/hc-offcanvas-nav.js', 'jquery', '', true );
    wp_enqueue_script( 'hc-offcanvas-nav' );

	wp_register_style( 'style', get_template_directory_uri() .  '/style.css');
	wp_enqueue_style( 'style' );
		
	wp_register_script('main.min', get_template_directory_uri() . '/js/main.js', 'jquery', '', true);
	wp_enqueue_script( 'main.min' );

}
add_action( 'wp_enqueue_scripts', 'mosgutenberg_enqueue_scripts' );
function mosgutenberg_admin_enqueue_scripts(){
    wp_enqueue_script('jquery');	
    /*Editor*/
    wp_enqueue_script( 'ace', get_template_directory_uri() . '/plugins/jquery-ace/ace/ace.js', array('jquery') );
    wp_enqueue_script( 'theme-twilight', get_template_directory_uri() . '/plugins/jquery-ace/ace/theme-twilight.js', array('jquery') );
    wp_enqueue_script( 'mode-html', get_template_directory_uri() . '/plugins/jquery-ace/ace/mode-html.js', array('jquery') );
    wp_enqueue_script( 'mode-css', get_template_directory_uri() . '/plugins/jquery-ace/ace/mode-css.js', array('jquery') );
    wp_enqueue_script( 'mode-javascript', get_template_directory_uri() . '/plugins/jquery-ace/ace/mode-javascript.js', array('jquery') );
    wp_enqueue_script( 'jquery-ace.min', get_template_directory_uri() . '/plugins/jquery-ace/jquery-ace.js', array('jquery') );
    /*Editor*/


	wp_register_style( 'font-awesome.min', get_template_directory_uri() . '/fonts/font-awesome-4.7.0/css/font-awesome.min.css' );
	wp_register_style( 'custom-admin', get_template_directory_uri() . '/css/custom-admin.css' );
	wp_enqueue_style( 'font-awesome.min' );
	wp_enqueue_style( 'custom-admin' );

	wp_enqueue_media();
    
	wp_register_script('custom-admin', get_template_directory_uri() . '/js/custom-admin.js', 'jquery');
	wp_enqueue_script('custom-admin');


}
add_action( 'admin_enqueue_scripts', 'mosgutenberg_admin_enqueue_scripts' );
function mosgutenberg_common_enqueue_scripts(){
	wp_register_script('ajax', get_template_directory_uri() . '/js/ajax.js', 'jquery');
	wp_enqueue_script('ajax');
	wp_localize_script( 'ajax', 'mos_ajax_object',
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		)
	);
}
add_action( 'admin_enqueue_scripts', 'mosgutenberg_common_enqueue_scripts' );
add_action( 'wp_enqueue_scripts', 'mosgutenberg_common_enqueue_scripts' );

add_action('wp_head', 'mosgutenberg_header_scripts', 999);
function mosgutenberg_header_scripts(){
    ?>    
    <style id="mosgutenberg-custom-css-inline-css">
    :root {
        --mos-body-bg: <?php echo carbon_get_theme_option( 'mos_body_bg' )?carbon_get_theme_option( 'mos_body_bg' ):'#fff'?>;       
        --mos-primary-color: <?php echo carbon_get_theme_option( 'mos_primary_color' )?carbon_get_theme_option( 'mos_primary_color' ):'#00f5eb'?>;            
        --mos-secondary-color: <?php echo carbon_get_theme_option( 'mos_secondary_color' )?carbon_get_theme_option( 'mos_secondary_color' ):'#21fff6'?>;            
        --mos-content-color: <?php echo carbon_get_theme_option( 'mos_content_color' )?carbon_get_theme_option( 'mos_content_color' ):'#212529'?>;       
    }   
    
    body {
            background-color: <?php echo carbon_get_theme_option('mos_body_bg') ? 'var(--mos-body-bg)' : 'var(--bs-body-bg)' ?>;
            color: <?php echo carbon_get_theme_option('mos_content_color') ? 'var(--mos-content-color)' : 'var(--bs-body-color)' ?>;
        }
        <?php if(carbon_get_theme_option('mos_wrapper_bg') && carbon_get_theme_option('mos-site-layout') != 'wide-layout') : ?>
        #body-container {
            background-color: <?php echo carbon_get_theme_option('mos_wrapper_bg') ?>;
        }
        <?php endif?>
        a {color: <?php echo carbon_get_theme_option('mos_link_color') ? carbon_get_theme_option('mos_link_color') : 'var(--bs-link-color)' ?>;}
        a:hover {color: <?php echo carbon_get_theme_option('mos_link_hover_color') ? carbon_get_theme_option('mos_link_hover_color') : 'var(--bs-link-hover-color)' ?>;}
        <?php $header_background=carbon_get_theme_option('mos-header-background');

        ?>.main-header {
            <?php if(carbon_get_theme_option('mos-header-content-color')): ?> color: <?php echo carbon_get_theme_option('mos-header-content-color') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-header-padding')): ?> padding: <?php echo carbon_get_theme_option('mos-header-padding') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-header-margin')): ?> margin: <?php echo carbon_get_theme_option('mos-header-margin') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-header-border')): ?> border: <?php echo carbon_get_theme_option('mos-header-border') ?>; <?php endif?> <?php if(@$header_background && sizeof($header_background)): ?> <?php foreach($header_background as $value): ?>
                <?php foreach($value as $key=> $val): ?> <?php if ($key !='background-image'&& $key !='_type'): ?> <?php echo $val? $key . ':'. $val . ';':''?> <?php elseif ($key=='background-image'): ?> <?php echo $val ? $key . ':url('. wp_get_attachment_url($val) . ');':''?> <?php endif?> <?php endforeach?> <?php endforeach?> <?php endif?>
        }

        <?php if(carbon_get_theme_option('mos-header-link-color')) : ?>.main-header a {
            color: <?php echo carbon_get_theme_option('mos-header-link-color') ?>
        }

        <?php endif?><?php if(carbon_get_theme_option('mos-header-link-color-hover')) : ?>.main-header a:hover {
            color: <?php echo carbon_get_theme_option('mos-header-link-color-hover') ?>
        }

        <?php endif?><?php $footer_background=carbon_get_theme_option('mos-footer-background');

        ?>.footer {
            <?php if(carbon_get_theme_option('mos-footer-content-color')): ?> color: <?php echo carbon_get_theme_option('mos-footer-content-color') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-footer-padding')): ?> padding: <?php echo carbon_get_theme_option('mos-footer-padding') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-footer-margin')): ?> margin: <?php echo carbon_get_theme_option('mos-footer-margin') ?>; <?php endif?> <?php if(carbon_get_theme_option('mos-footer-border')): ?> border: <?php echo carbon_get_theme_option('mos-footer-border') ?>; <?php endif?> <?php if(@$footer_background && sizeof($footer_background)): ?> <?php foreach($footer_background as $value): ?>
                <?php foreach($value as $key=> $val): ?> <?php if ($key !='background-image'&& $key !='_type'): ?> <?php echo $val? $key . ':'. $val . ';':''?> <?php elseif ($key=='background-image'): ?> <?php echo $val ? $key . ':url('. wp_get_attachment_url($val) . ');':''?> <?php endif?> <?php endforeach?> <?php endforeach?> <?php endif?>
        }

        <?php if(carbon_get_theme_option('mos-footer-link-color')) : ?>.footer a {
            color: <?php echo carbon_get_theme_option('mos-footer-link-color') ?>
        }

        <?php endif?><?php if(carbon_get_theme_option('mos-footer-link-color-hover')) : ?>.footer a:hover {
            color: <?php echo carbon_get_theme_option('mos-footer-link-color-hover') ?>
        }

        <?php endif?>  
        <?php if (carbon_get_theme_option('mos-site-layout') == 'boxed-layout' && carbon_get_theme_option('mos-site-width')) : ?>
        .boxed-layout {
            width: 100%;
            max-width: <?php echo carbon_get_theme_option('mos-site-width') ?>px;
            margin-left: auto;
            margin-right: auto;
        } 
        <?php endif?>  
    </style>
    <?php
}
add_action('wp_footer', 'mosgutenberg_footer_scripts', 999);
function mosgutenberg_footer_scripts(){
    ?>    
    <script type="text/javascript" id="mosgutenberg-custom-js-inline-js">  
        <?php if (carbon_get_theme_option( 'mos_plugin_wow' ) == 'on') : ?>
        new WOW().init();
        <?php endif?>
        jQuery(document).ready(function($) {                  
            var Nav = new hcOffcanvasNav("#mobile-nav", {
                disableAt: false,
                customToggle: ".toggle",
                levelOpen: "expand", //overlap, expand, false
                levelSpacing: 40,
                navTitle: "All Categories",
                levelTitles: true,
                levelTitleAsBack: true,
                pushContent: "#container",
                labelClose: false,
                position: "right", //left, right, top, bottom
                theme: "carbon",
                closeOnClick: true,
                disableBody: true,
                insertClose: true,
                insertBack: true,
            });
            <?php if (carbon_get_theme_option( 'mos_plugin_owlcarousel' ) == 'on') : ?>                 
                $('body').find('.mos-owl-carousel').each(function( e ) {            
                    var oc = $(this);
                    var ocOptions = oc.data('carousel-options');
                    var defaults = {
                        loop: true,
                        nav: false,
                        autoplay: true,
                    }
                    oc.owlCarousel($.extend(defaults, ocOptions));
                });            
            <?php endif?>
            <?php if (carbon_get_theme_option( 'mos_plugin_slick' ) == 'on') : ?>
                $('.mos-slick').slick();
            <?php endif?>
            <?php if (carbon_get_theme_option( 'jquery_counterup' ) == 'on') : ?>
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });
            <?php endif?>
        });
    </script>
    <?php 
}

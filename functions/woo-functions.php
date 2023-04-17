<?php
/**
 * Remove the title
 */
add_filter( 'woocommerce_show_page_title', 'hide_shop_page_title' ); 
function hide_shop_page_title( $title ) {
   if ( is_shop() ) $title = false;
   return $title;
}
/**
 * Remove the breadcrumbs 
 */
add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
// remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_result_count', 20 );
// remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );


add_action('woocommerce_sidebar', function() {mos_element_wrapper_start('section', 'mos-woocommerce-page', 'woocommerce-page page-content');}, 1);
add_action('woocommerce_sidebar', function(){echo 'Test';}, 2);
add_action('woocommerce_sidebar', function() {mos_element_wrapper_end('section', 'mos-woocommerce-page', 'woocommerce-page page-content');}, 3);
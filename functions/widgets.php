<?php
//Add widgets area
function mosgetweb_widgets_init(){
	register_sidebar(array(
		'id' => 'sidebar',
		'name' => __('Sidebar for Post', 'mosgetweb'),
		//'description' => __('Add widgets here to appear in your Left SideBar', 'mosgetweb'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'after_widget' => '</div>'
	));	
	register_sidebar(array(
		'id' => 'sidebar-page',
		'name' => __('Sidebar for Page', 'mosgetweb'),
		//'description' => __('Add widgets here to appear in your Left SideBar', 'mosgetweb'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'after_widget' => '</div>'
	));
	register_sidebar(array(
		'id' => 'sidebar-shop',
		'name' => __('Sidebar for Shop', 'mosgetweb'),
		//'description' => __('Add widgets here to appear in your Left SideBar', 'mosgetweb'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
		'after_widget' => '</div>'
	));	
	register_sidebar(array(
		'id' => 'footer_1',
		'name' => __('Footer Widget 1', 'mosgetweb'),
		'description' => __('Add widgets here to appear in your Footer Widget 1', 'mosgetweb'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		'after_widget' => '</div>'
	));	
	register_sidebar(array(
		'id' => 'footer_2',
		'name' => __('Footer Widget 2', 'mosgetweb'),
		'description' => __('Add widgets here to appear in your Footer Widget 2', 'mosgetweb'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		'after_widget' => '</div>'
	));	
	register_sidebar(array(
		'id' => 'footer_3',
		'name' => __('Footer Widget 3', 'mosgetweb'),
		'description' => __('Add widgets here to appear in your Footer Widget 3', 'mosgetweb'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		'after_widget' => '</div>'
	));	
	register_sidebar(array(
		'id' => 'footer_4',
		'name' => __('Footer Widget 4', 'mosgetweb'),
		'description' => __('Add widgets here to appear in your Footer Widget 4', 'mosgetweb'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		'after_widget' => '</div>'
	));	
	register_sidebar(array(
		'id' => 'footer_5',
		'name' => __('Footer Widget 5', 'mosgetweb'),
		'description' => __('Add widgets here to appear in your Footer Widget 5', 'mosgetweb'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		'after_widget' => '</div>'
	));	
	register_sidebar(array(
		'id' => 'footer_6',
		'name' => __('Footer Widget 6', 'mosgetweb'),
		'description' => __('Add widgets here to appear in your Footer Widget 6', 'mosgetweb'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		'after_widget' => '</div>'
	));	
	register_sidebar(array(
		'id' => 'footer_7',
		'name' => __('Footer Widget 7', 'mosgetweb'),
		'description' => __('Add widgets here to appear in your Footer Widget 7', 'mosgetweb'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		'after_widget' => '</div>'
	));	
	register_sidebar(array(
		'id' => 'footer_8',
		'name' => __('Footer Widget 8', 'mosgetweb'),
		'description' => __('Add widgets here to appear in your Footer Widget 8', 'mosgetweb'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		'after_widget' => '</div>'
	));		

}
add_action('widgets_init', 'mosgetweb_widgets_init');

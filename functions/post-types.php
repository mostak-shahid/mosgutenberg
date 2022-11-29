<?php
function mos_custom_post_types() {
	/**
	 * Post Type: Projects.
	 */
	$labels = [
		"name" => esc_html__( "Projects", "mosgutenberg" ),
		"singular_name" => esc_html__( "Project", "mosgutenberg" ),
	];
	$args = [
		"label" => esc_html__( "Projects", "mosgutenberg" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "project", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];
	register_post_type( "project", $args );
}
add_action( 'init', 'mos_custom_post_types' );


function mos_custom_taxonomy() {
	/**
	 * Taxonomy: Categories.
	 */
	$labels = [
		"name" => esc_html__( "Categories", "mosgutenberg" ),
		"singular_name" => esc_html__( "Category", "mosgutenberg" ),
	];	
	$args = [
		"label" => esc_html__( "Categories", "mosgutenberg" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'project_category', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "project_category",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "project_category", [ "project" ], $args );
	/**
	 * Taxonomy: Tags.
	 */
	$labels = [
		"name" => esc_html__( "Tags", "mosgutenberg" ),
		"singular_name" => esc_html__( "Tag", "mosgutenberg" ),
	];	
	$args = [
		"label" => esc_html__( "Tags", "mosgutenberg" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => false,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'project_tag', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "project_tag",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "project_tag", [ "project" ], $args );
}
add_action( 'init', 'mos_custom_taxonomy' );
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

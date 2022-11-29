<?php 




// Add class to a tag 
function add_additional_class_on_a($classes, $item, $args)
{
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}

add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);

// Register Relevant Services
add_action('init', 'create_post_type_services');
function create_post_type_services() {
    $labels = array(
        'name' => 'Services',
        'all_items' => 'All Item',
        'singular_name' => 'Add New Item',
    );

    $args = array(
        'labels' => $labels,
        'publicly_queryable' => true,
        'show_in_menu' => true,
        'exclude_from_search' => true,
        'menu_position' => null,
        'public' => true,
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-comments',
        'has_archive' => true,
        'query_var' => true,
        'show_ui' => true,
        'menu_position' => 18,
        'menu_icon' => 'dashicons-admin-customizer',
        'description' => 'Description for Signature Dishes',
        'query_var' => true,
        'can_export' => true,
        'show_in_nav_menus' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('services', $args);
}
function create_services_taxonomies() {
    $labels = array(
        'name' => _x('Categories', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Categories'),
    );

    $args = array(
        'hierarchical' => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'categories'),
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );

    register_taxonomy('services_categories', array('services'), $args);
}

add_action('init', 'create_services_taxonomies');


// Register Client stories
add_action('init', 'create_post_type_client_stories');
function create_post_type_client_stories() {
    $labels = array(
        'name' => 'Client stories',
        'all_items' => 'All Item',
        'singular_name' => 'Add New Item',
    );

    $args = array(
        'labels' => $labels,
        'publicly_queryable' => true,
        'show_in_menu' => true,
        'exclude_from_search' => true,
        'menu_position' => null,
        'public' => true,
        'menu_class' => 'wp-menu-image dashicons-before dashicons-admin-comments',
        'has_archive' => true,
        'query_var' => true,
        'show_ui' => true,
        'menu_position' => 18,
        'menu_icon' => 'dashicons-admin-comments',
        'description' => 'Description for Signature Dishes',
        'query_var' => true,
        'can_export' => true,
        'show_in_nav_menus' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail')
    );
    register_post_type('client_stories', $args);
}
function create_client_stories_taxonomies() {
    $labels = array(
        'name' => _x('Categories', 'taxonomy general name'),
        'singular_name' => _x('Category', 'taxonomy singular name'),
        'search_items' => __('Search Categories'),
        'all_items' => __('All Categories'),
        'parent_item' => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item' => __('Edit Category'),
        'update_item' => __('Update Category'),
        'add_new_item' => __('Add New Category'),
        'new_item_name' => __('New Category Name'),
        'menu_name' => __('Categories'),
    );

    $args = array(
        'hierarchical' => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'client_stories'),
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );

    register_taxonomy('client_stories', array('services'), $args);
}

add_action('init', 'create_client_stories_taxonomies');
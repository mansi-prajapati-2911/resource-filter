<?php
// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Resources', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Resource', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Resources', 'text_domain' ),
		'name_admin_bar'        => __( 'Resource', 'text_domain' ),
		'archives'              => __( 'Resource Archives', 'text_domain' ),
		'attributes'            => __( 'Resource Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Resource:', 'text_domain' ),
		'all_items'             => __( 'All Resources', 'text_domain' ),
		'add_new_item'          => __( 'Add New Resource', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Resource', 'text_domain' ),
		'edit_item'             => __( 'Edit Resource', 'text_domain' ),
		'update_item'           => __( 'Update Resource', 'text_domain' ),
		'view_item'             => __( 'View Resource', 'text_domain' ),
		'view_items'            => __( 'View Resources', 'text_domain' ),
		'search_items'          => __( 'Search Resource', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Resource', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Resource', 'text_domain' ),
		'items_list'            => __( 'Resources list', 'text_domain' ),
		'items_list_navigation' => __( 'Resources list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Resources list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Resource', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'resource', $args );

}
add_action( 'init', 'custom_post_type', 0 );



// Register Custom Taxonomy
function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Resource Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Resource Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Resource Type', 'text_domain' ),
		'all_items'                  => __( 'All Resource Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Resource Type', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Resource Type:', 'text_domain' ),
		'new_item_name'              => __( 'New Resource Type Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Resource Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Resource Type', 'text_domain' ),
		'update_item'                => __( 'Update Resource Type', 'text_domain' ),
		'view_item'                  => __( 'View Resource Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Resource Types with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Resource Types', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Resource Types', 'text_domain' ),
		'search_items'               => __( 'Search Resource Types', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Resource Types', 'text_domain' ),
		'items_list'                 => __( 'Resource Type list', 'text_domain' ),
		'items_list_navigation'      => __( 'Resource Types list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'resource_type', array( 'resource' ), $args );



    $labels = array(
		'name'                       => _x( 'Resource Topics', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Resource Topic', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Resource Topic', 'text_domain' ),
		'all_items'                  => __( 'All Resource Topics', 'text_domain' ),
		'parent_item'                => __( 'Parent Resource Topic', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Resource Topic:', 'text_domain' ),
		'new_item_name'              => __( 'New Resource Topic Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Resource Topic', 'text_domain' ),
		'edit_item'                  => __( 'Edit Resource Topic', 'text_domain' ),
		'update_item'                => __( 'Update Resource Topic', 'text_domain' ),
		'view_item'                  => __( 'View Resource Topic', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate Resource Topics with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove Resource Topics', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Resource Topics', 'text_domain' ),
		'search_items'               => __( 'Search Resource Topics', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No Resource Topics', 'text_domain' ),
		'items_list'                 => __( 'Resource Topic list', 'text_domain' ),
		'items_list_navigation'      => __( 'Resource Topics list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'resource_topic', array( 'resource' ), $args );

}
add_action( 'init', 'custom_taxonomy', 0 );
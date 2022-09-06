<?php
// Advocacy Post Type

add_action( 'init', 'advocacy_register_post_type' );
function advocacy_register_post_type() {
	$args = [
		'label'  => esc_html__( 'Advocacy', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Advocacy', 'cbtu' ),
			'name_admin_bar'     => esc_html__( 'Advocacy', 'cbtu' ),
			'add_new'            => esc_html__( 'Add Advocacy Article', 'cbtu' ),
			'add_new_item'       => esc_html__( 'Add new Advocacy Article', 'cbtu' ),
			'new_item'           => esc_html__( 'New Advocacy Article', 'cbtu' ),
			'edit_item'          => esc_html__( 'Edit Advocacy Article', 'cbtu' ),
			'view_item'          => esc_html__( 'View Advocacy Article', 'cbtu' ),
			'update_item'        => esc_html__( 'View Advocacy Article', 'cbtu' ),
			'all_items'          => esc_html__( 'Advocacy', 'cbtu' ),
			'search_items'       => esc_html__( 'Search Advocacy Articles', 'cbtu' ),
			'parent_item_colon'  => esc_html__( 'Parent Advocacy Article', 'cbtu' ),
			'not_found'          => esc_html__( 'No Advocacy Article found', 'cbtu' ),
			'not_found_in_trash' => esc_html__( 'No Advocacy Article found in Trash', 'cbtu' ),
			'name'               => esc_html__( 'Advocacy', 'cbtu' ),
			'singular_name'      => esc_html__( 'Advocacy', 'cbtu' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => true,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-megaphone',
		'menu_position'       => 5,
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'custom-fields',
			'revisions',
			'excerpt', // post excerpt
		],
		'rewrite' => true
	];

	register_post_type( 'advocacy', $args );
}
function advocacy_taxonomies() {
    $labels = array(
        'name'              => _x( 'Advocacy Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Advocacy Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

    $args = array(
		'labels'                        => $labels,
		'show_admin_column'             => true,
		'show_in_rest'					=> true,
		'public'                        => true,
		'hierarchical'                  => true,
		'show_ui'                       => true,
		'show_in_nav_menus'             => true,
		'args'                          => array( 'orderby' => 'term_order' ),
		'query_var'                     => true
            
    );

    register_taxonomy( 'advocacy_categories', array( 'advocacy' ), $args );
}
add_action( 'init', 'advocacy_taxonomies', 0 );

/**
 * Major Projects CPT
 */

add_action( 'init', 'major_proj_register_post_type' );
function major_proj_register_post_type() {
	$args = [
		'label'  => esc_html__( 'Major Projects', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Major Projects', 'cbtu' ),
			'name_admin_bar'     => esc_html__( 'Major Project', 'cbtu' ),
			'add_new'            => esc_html__( 'Add Major Project', 'cbtu' ),
			'add_new_item'       => esc_html__( 'Add new Major Project', 'cbtu' ),
			'new_item'           => esc_html__( 'New Major Project', 'cbtu' ),
			'edit_item'          => esc_html__( 'Edit Major Project', 'cbtu' ),
			'view_item'          => esc_html__( 'View Major Project', 'cbtu' ),
			'update_item'        => esc_html__( 'View Major Project', 'cbtu' ),
			'all_items'          => esc_html__( 'Major Projects', 'cbtu' ),
			'search_items'       => esc_html__( 'Search Major Projects', 'cbtu' ),
			'parent_item_colon'  => esc_html__( 'Parent Major Project', 'cbtu' ),
			'not_found'          => esc_html__( 'No Major Projects found', 'cbtu' ),
			'not_found_in_trash' => esc_html__( 'No Major Projects found in Trash', 'cbtu' ),
			'name'               => esc_html__( 'Major Projects', 'cbtu' ),
			'singular_name'      => esc_html__( 'Major Project', 'cbtu' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => true,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-hammer',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'custom-fields',
			'revisions',
			'excerpt', // post excerpt
		],
		'rewrite' => true
	];

	register_post_type( 'major-projects', $args );
}
function major_proj_taxonomies() {
    $labels = array(
        'name'              => _x( 'Major Projects Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Major Projects Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
	);
	
	$args = array(
		'labels'                        => $labels,
		'show_admin_column'             => true,
		'show_in_rest'					=> true,
		'public'                        => true,
		'hierarchical'                  => true,
		'show_ui'                       => true,
		'show_in_nav_menus'             => true,
		'args'                          => array( 'orderby' => 'term_order' ),
		'query_var'                     => true
            
    );

    register_taxonomy( 'major_proj_categories', array( 'major-projects' ), $args );
}
add_action( 'init', 'major_proj_taxonomies', 0 );
/**
 * Workforce Development CPT
 */

add_action( 'init', 'wd_register_post_type' );
function wd_register_post_type() {
	$args = [
		'label'  => esc_html__( 'Workforce Development', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Workforce Development', 'cbtu' ),
			'name_admin_bar'     => esc_html__( 'Workforce Development Article', 'cbtu' ),
			'add_new'            => esc_html__( 'Add Workforce Development Article', 'cbtu' ),
			'add_new_item'       => esc_html__( 'Add new Workforce Development Article', 'cbtu' ),
			'new_item'           => esc_html__( 'New Workforce Development Article', 'cbtu' ),
			'edit_item'          => esc_html__( 'Edit Workforce Development Article', 'cbtu' ),
			'view_item'          => esc_html__( 'View Workforce Development Article', 'cbtu' ),
			'update_item'        => esc_html__( 'View Workforce Development Article', 'cbtu' ),
			'all_items'          => esc_html__( 'Workforce Development', 'cbtu' ),
			'search_items'       => esc_html__( 'Search Workforce Development', 'cbtu' ),
			'parent_item_colon'  => esc_html__( 'Parent Workforce Development Article', 'cbtu' ),
			'not_found'          => esc_html__( 'No Workforce Development found', 'cbtu' ),
			'not_found_in_trash' => esc_html__( 'No Workforce Development found in Trash', 'cbtu' ),
			'name'               => esc_html__( 'Workforce Development', 'cbtu' ),
			'singular_name'      => esc_html__( 'Workforce Development Article', 'cbtu' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => true,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-welcome-learn-more',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'custom-fields',
			'revisions',
			'excerpt', // post excerpt
		],
		'rewrite' => true
	];

	register_post_type( 'workforce-dev', $args );
}

function workforce_dev_taxonomies() {
    $labels = array(
        'name'              => _x( 'Workforce Development Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Workforce Development Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

	$args = array(
		'labels'                        => $labels,
		'show_admin_column'             => true,
		'show_in_rest'					=> true,
		'public'                        => true,
		'hierarchical'                  => true,
		'show_ui'                       => true,
		'show_in_nav_menus'             => true,
		'args'                          => array( 'orderby' => 'term_order' ),
		'query_var'                     => true
            
    );

    register_taxonomy( 'workforce_dev_categories', array( 'workforce-dev' ), $args );
}
add_action( 'init', 'workforce_dev_taxonomies', 0 );

/**
 * Insights Library CPT
 */
add_action( 'init', 'insight_lib_cpt' );
function insight_lib_cpt() {
	$args = [
		'label'  => esc_html__( 'Insights Library', 'cbtu' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Insights Library', 'cbtu' ),
			'name_admin_bar'     => esc_html__( 'Insights', 'cbtu' ),
			'add_new'            => esc_html__( 'Add Insight Article', 'cbtu' ),
			'add_new_item'       => esc_html__( 'Add new Insight Article', 'cbtu' ),
			'new_item'           => esc_html__( 'New Insight Article', 'cbtu' ),
			'edit_item'          => esc_html__( 'Edit Insight Article', 'cbtu' ),
			'view_item'          => esc_html__( 'View Insight Article', 'cbtu' ),
			'update_item'        => esc_html__( 'View Insight Article', 'cbtu' ),
			'all_items'          => esc_html__( 'Insights Library', 'cbtu' ),
			'search_items'       => esc_html__( 'Search Insights Library', 'cbtu' ),
			'parent_item_colon'  => esc_html__( 'Parent Insight Article', 'cbtu' ),
			'not_found'          => esc_html__( 'No Insight Article found', 'cbtu' ),
			'not_found_in_trash' => esc_html__( 'No Insights Article found in Trash', 'cbtu' ),
			'name'               => esc_html__( 'Insights Library', 'cbtu' ),
			'singular_name'      => esc_html__( 'Insight', 'cbtu' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => true,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 8,
		'menu_icon'           => 'dashicons-lightbulb',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
		],
		// 'taxonomies' => [
		// 	'category',
		// 	'tag',
		// ],
		'rewrite' => true
	];

	register_post_type( 'insights-library', $args );
}

function insight_lib_taxonomies() {
    $labels = array(
        'name'              => _x( 'Insights Library Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Insights Library Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

	$args = array(
		'labels'                        => $labels,
		'show_admin_column'             => true,
		'show_in_rest'					=> true,
		'public'                        => true,
		'hierarchical'                  => true,
		'show_ui'                       => true,
		'show_in_nav_menus'             => true,
		'args'                          => array( 'orderby' => 'term_order' ),
		'query_var'                     => true
            
    );

    register_taxonomy( 'insight_lib_categories', array( 'insights-library' ), $args );
}
add_action( 'init', 'insight_lib_taxonomies', 0 );

/**
 * Member News CPT
 */
add_action( 'init', 'member_news_cpt' );
function member_news_cpt() {
	$args = [
		'label'  => esc_html__( 'Member News', 'cbtu' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Member News', 'cbtu' ),
			'name_admin_bar'     => esc_html__( 'Member News', 'cbtu' ),
			'add_new'            => esc_html__( 'Add Member News', 'cbtu' ),
			'add_new_item'       => esc_html__( 'Add new Member News', 'cbtu' ),
			'new_item'           => esc_html__( 'New Member News', 'cbtu' ),
			'edit_item'          => esc_html__( 'Edit Member News', 'cbtu' ),
			'view_item'          => esc_html__( 'View Member News', 'cbtu' ),
			'update_item'        => esc_html__( 'View Member News', 'cbtu' ),
			'all_items'          => esc_html__( 'Member News', 'cbtu' ),
			'search_items'       => esc_html__( 'Search Member News', 'cbtu' ),
			'parent_item_colon'  => esc_html__( 'Parent Member News', 'cbtu' ),
			'not_found'          => esc_html__( 'No Member News found', 'cbtu' ),
			'not_found_in_trash' => esc_html__( 'No Member News found in Trash', 'cbtu' ),
			'name'               => esc_html__( 'Member News', 'cbtu' ),
			'singular_name'      => esc_html__( 'Member News', 'cbtu' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type' 	  => array( 'member-news-item', 'member-news' ),
		'map_meta_cap'        => true,
		'hierarchical'        => true,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 8,
		'menu_icon'           => 'dashicons-admin-post',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
			'author',
		],
		'taxonomies' => [
			'member_news_category'
		],
		'rewrite' => true
	];

	register_post_type( 'member-news', $args );
}

function member_news_taxonomies() {
    $labels = array(
        'name'              => _x( 'Member News Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Member News Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

	$args = array(
		'labels'                        => $labels,
		'show_admin_column'             => true,
		'show_in_rest'					=> true,
		'public'                        => true,
		'hierarchical'                  => true,
		'show_ui'                       => true,
		'show_in_nav_menus'             => true,
		'args'                          => array( 'orderby' => 'term_order' ),
		'query_var'                     => true,
        'capabilities' => array(
			'manage_terms' => 'manage_member_news_category',
			'edit_terms' =>   'edit_member_news_category',
			'delete_terms' => 'delete_member_news_category',
			'assign_terms' => 'assign_member_news_category',
		)
    );

    register_taxonomy( 'member_news_category', array( 'member-news' ), $args );
}
add_action( 'init', 'member_news_taxonomies', 0 );

/**
 * Member Resources CPT
 */
add_action( 'init', 'member_resources_cpt' );
function member_resources_cpt() {
	$args = [
		'label'  => __( 'Member Resources', 'cbtu' ),
		'labels' => [
			'menu_name'          => __( 'Member Resources', 'cbtu' ),
			'name_admin_bar'     => __( 'Member Resources', 'cbtu' ),
			'add_new'            => __( 'Add Member Resource', 'cbtu' ),
			'add_new_item'       => __( 'Add New Member Resource', 'cbtu' ),
			'new_item'           => __( 'New Member Resource', 'cbtu' ),
			'edit_item'          => __( 'Edit Member Resource', 'cbtu' ),
			'view_item'          => __( 'View Member Resource', 'cbtu' ),
			'update_item'        => __( 'View Member Resource', 'cbtu' ),
			'all_items'          => __( 'Member Resources', 'cbtu' ),
			'search_items'       => __( 'Search Member Resources', 'cbtu' ),
			'parent_item_colon'  => __( 'Parent Member Resources', 'cbtu' ),
			'not_found'          => __( 'No Member Resources found', 'cbtu' ),
			'not_found_in_trash' => __( 'No Member Resources found in Trash', 'cbtu' ),
			'name'               => __( 'Member Resources', 'cbtu' ),
			'singular_name'      => __( 'Member Resource', 'cbtu' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type' 	  => array( 'member-resource', 'member-resources' ),
		'map_meta_cap' 		  => true,
		'hierarchical'        => true,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 8,
		'menu_icon'           => 'dashicons-admin-post',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
		],
		'taxonomies' => [
			'member_resources_category'
		],
		'rewrite' => true
	];

	register_post_type( 'member-resources', $args );
}

function member_resources_taxonomies() {
    $labels = array(
        'name'              => _x( 'Member Resources Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Member Resources Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
    );

	$args = array(
		'labels'                        => $labels,
		'show_admin_column'             => true,
		'show_in_rest'					=> true,
		'public'                        => true,
		'hierarchical'                  => true,
		'show_ui'                       => true,
		'show_in_nav_menus'             => true,
		'args'                          => array( 'orderby' => 'term_order' ),
		'query_var'                     => true,
		'capabilities' => array(
			'manage_terms' => 'manage_member_resources_category',
			'edit_terms' =>   'edit_member_resources_category',
			'delete_terms' => 'delete_member_resources_category',
			'assign_terms' => 'assign_member_resources_category',
		)
    );

    register_taxonomy( 'member_resources_category', array( 'member-resources' ), $args );
}
add_action( 'init', 'member_resources_taxonomies', 0 );

/**
 * Affiliates CPT
 */
add_action( 'init', 'affiliates_register_post_type' );
function affiliates_register_post_type() {
	$args = [
		'label'  => esc_html__( 'Affiliates', 'cbtu' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Affiliates', 'cbtu' ),
			'name_admin_bar'     => esc_html__( 'Affiliates', 'cbtu' ),
			'add_new'            => esc_html__( 'Add Affiliate', 'cbtu' ),
			'add_new_item'       => esc_html__( 'Add new Affiliate', 'cbtu' ),
			'new_item'           => esc_html__( 'New Affiliate', 'cbtu' ),
			'edit_item'          => esc_html__( 'Edit Affiliate', 'cbtu' ),
			'view_item'          => esc_html__( 'View Affiliate', 'cbtu' ),
			'update_item'        => esc_html__( 'View Affiliate', 'cbtu' ),
			'all_items'          => esc_html__( 'Affiliates', 'cbtu' ),
			'search_items'       => esc_html__( 'Search Affiliates', 'cbtu' ),
			'parent_item_colon'  => esc_html__( 'Parent Affiliate', 'cbtu' ),
			'not_found'          => esc_html__( 'No Affiliates found', 'cbtu' ),
			'not_found_in_trash' => esc_html__( 'No Affiliates found in Trash', 'cbtu' ),
			'name'               => esc_html__( 'Affiliates', 'cbtu' ),
			'singular_name'      => esc_html__( 'Affiliate', 'cbtu' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => true,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-post',
		'supports' => [
			'title',
			'author',
			'editor',
			'thumbnail',
			'custom-fields',
			'revisions',
			'excerpt', // post excerpt
		],
		'rewrite' => true
	];

	register_post_type( 'affiliates', $args );
}
function affiliates_taxonomies() {
    $labels = array(
        'name'              => _x( 'Affiliates Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Affiliates Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
	);
	
	$args = array(
		'labels'                        => $labels,
		'show_admin_column'             => true,
		'show_in_rest'					=> true,
		'public'                        => true,
		'hierarchical'                  => true,
		'show_ui'                       => true,
		'show_in_nav_menus'             => true,
		'args'                          => array( 'orderby' => 'term_order' ),
		'query_var'                     => true
            
    );

    register_taxonomy( 'affiliates_categories', array( 'affiliates' ), $args );
}
add_action( 'init', 'affiliates_taxonomies', 0 );

/**
 * Team CPT
 */
add_action( 'init', 'team_register_post_type' );
function team_register_post_type() {
	$args = [
		'label'  => esc_html__( 'Team', 'cbtu' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Team', 'cbtu' ),
			'name_admin_bar'     => esc_html__( 'Team', 'cbtu' ),
			'add_new'            => esc_html__( 'Add Team', 'cbtu' ),
			'add_new_item'       => esc_html__( 'Add new Team', 'cbtu' ),
			'new_item'           => esc_html__( 'New Team', 'cbtu' ),
			'edit_item'          => esc_html__( 'Edit Team', 'cbtu' ),
			'view_item'          => esc_html__( 'View Team', 'cbtu' ),
			'update_item'        => esc_html__( 'View Team', 'cbtu' ),
			'all_items'          => esc_html__( 'Team', 'cbtu' ),
			'search_items'       => esc_html__( 'Search Team', 'cbtu' ),
			'parent_item_colon'  => esc_html__( 'Parent Team', 'cbtu' ),
			'not_found'          => esc_html__( 'No Team found', 'cbtu' ),
			'not_found_in_trash' => esc_html__( 'No Team found in Trash', 'cbtu' ),
			'name'               => esc_html__( 'Team', 'cbtu' ),
			'singular_name'      => esc_html__( 'Team', 'cbtu' ),
		],
		'public'              => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => true,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-users',
		'supports' => [
			'title',
			// 'editor',
			'thumbnail',
			'custom-fields',
			'revisions',
			// 'excerpt', // post excerpt
		],
		'rewrite' => true
	];

	register_post_type( 'team', $args );
}

/**
 * PLA's CPT
 */
add_action( 'init', 'pla_register_post_type' );
function pla_register_post_type() {
	$args = [
		'label'  => esc_html__( 'Pla', 'cbtu' ),
		'labels' => [
			'menu_name'          => esc_html__( 'PLA', 'cbtu' ),
			'name_admin_bar'     => esc_html__( 'PLA', 'cbtu' ),
			'add_new'            => esc_html__( 'Add PLA', 'cbtu' ),
			'add_new_item'       => esc_html__( 'Add new PLA', 'cbtu' ),
			'new_item'           => esc_html__( 'New PLA', 'cbtu' ),
			'edit_item'          => esc_html__( 'Edit PLA', 'cbtu' ),
			'view_item'          => esc_html__( 'View PLA', 'cbtu' ),
			'update_item'        => esc_html__( 'View PLA', 'cbtu' ),
			'all_items'          => esc_html__( 'PLA', 'cbtu' ),
			'search_items'       => esc_html__( 'Search PLA', 'cbtu' ),
			'parent_item_colon'  => esc_html__( 'Parent PLA', 'cbtu' ),
			'not_found'          => esc_html__( 'No PLA found', 'cbtu' ),
			'not_found_in_trash' => esc_html__( 'No PLA found in Trash', 'cbtu' ),
			'name'               => esc_html__( 'PLA', 'cbtu' ),
			'singular_name'      => esc_html__( 'PLA', 'cbtu' ),
		],
		'public'              => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => true,
		'has_archive'         => false,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-users',
		'supports' => [
			'title',
			// 'editor',
			'thumbnail',
			'custom-fields',
			'revisions',
			// 'excerpt', // post excerpt
		],
		'rewrite' => true
	];

	register_post_type( 'pla', $args );
}
function pla_taxonomies() {
    $labels = array(
        'name'              => _x( 'PLA Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'PLA Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Categories' ),
	);
	
	$args = array(
		'labels'                        => $labels,
		'show_admin_column'             => true,
		'show_in_rest'					=> true,
		'public'                        => true,
		'hierarchical'                  => true,
		'show_ui'                       => true,
		'show_in_nav_menus'             => true,
		'args'                          => array( 'orderby' => 'term_order' ),
		'query_var'                     => true
            
    );

    register_taxonomy( 'pla_categories', array( 'pla' ), $args );
}
add_action( 'init', 'pla_taxonomies', 0 );
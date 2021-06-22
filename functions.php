<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

foreach ( $understrap_includes as $file ) {
	$filepath = locate_template( 'inc' . $file );
	if ( ! $filepath ) {
		trigger_error( sprintf( 'Error locating /inc%s for inclusion', $file ), E_USER_ERROR );
	}
	require_once $filepath;
}

/* TODO: refactor this */

/* Publications post type 
function register_publications() {

	$labels = array(
		'name'          => _x( 'Publications', 'publications' ),
		'singular_name' => _x( 'Publication', 'publication' ),
		'add_new'       => _x( 'Add New', 'publications' ),
		'add_new_item'  => _x( 'Add New Publication', 'publications' ),
		'edit_item'     => _x( 'Edit Publication', 'publications' ),
		'new_item'      => _x( 'New Publication', 'publications' ),
		'view_item'     => _x( 'View Publication', 'publications' ),
		'search_items'  => _x( 'Search Publications', 'publications' ),
		'not_found'     => _x( 'No publications found', 'publications' ),
		'not_found_in_trash' => _x( 'No publications found in Trash', 'publications' ),
		'parent_item_colon'  => _x( 'Research publication:', 'publications' ),
		'menu_name'     => _x( 'Publications', 'publications' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,

		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'page-attributes' ),
		'taxonomies' => array( 'post_tag', 'publication-types' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-book',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array(
			'slug' => '/about/publication',
			'with_front' => false
		),
		'capability_type' => 'post'
	);

	register_post_type( 'publications', $args );

	register_taxonomy(
		'publication-types',
		'publications',
		array(
			'labels' => array(
				'name' => 'Publication Categories',
				'add_new_item' => 'Add Publication Category',
				'new_item_name' => "New Publication Type"
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true
		)
	);
} */

/* Quotes post type 
function register_quotes() {

	$labels = array(
		'name' => _x( 'Quotes', 'quotes' ),
		'singular_name' => _x( 'Quote', 'quotes' ),
		'add_new' => _x( 'Add New', 'quotes' ),
		'add_new_item' => _x( 'Add New Quote', 'quotes' ),
		'edit_item' => _x( 'Edit Quote', 'quotes' ),
		'new_item' => _x( 'New Quote', 'quotes' ),
		'view_item' => _x( 'View Quote', 'quotes' ),
		'search_items' => _x( 'Search Quotes', 'quotes' ),
		'not_found' => _x( 'No quotes found', 'quotes' ),
		'not_found_in_trash' => _x( 'No quotes found in Trash', 'quotes' ),
		'parent_item_colon' => _x( 'Research Quotes:', 'quotes' ),
		'menu_name' => _x( 'Quotes', 'quotes' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,

		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'page-attributes' ),
		'taxonomies' => array( 'post_tag', 'publication-types' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-format-quote',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array(
			'slug' => '/take-action/quotes',
			'with_front' => false
		),
		'capability_type' => 'page'
	);

	register_post_type( 'quotes', $args );

	register_taxonomy(
		'quotes-types',
		'quotes',
		array(
			'labels' => array(
				'name' => 'Quote Categories',
				'add_new_item' => 'Add Quote Category',
				'new_item_name' => "New Quote Type"
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true
		)
	);
} */

/* Campaigns post type 
function register_campaigns() {

	$labels = array(
		'name' => _x( 'Campaigns', 'campaigns' ),
		'singular_name' => _x( 'Campaign', 'campaigns' ),
		'add_new' => _x( 'Add New', 'campaigns' ),
		'add_new_item' => _x( 'Add New Campaign', 'campaigns' ),
		'edit_item' => _x( 'Edit Campaign', 'campaigns' ),
		'new_item' => _x( 'New Campaign', 'campaigns' ),
		'view_item' => _x( 'View Campaign', 'campaigns' ),
		'search_items' => _x( 'Search Campaign', 'campaigns' ),
		'not_found' => _x( 'No campaigns found', 'campaigns' ),
		'not_found_in_trash' => _x( 'No campaigns found in Trash', 'campaigns' ),
		'parent_item_colon' => _x( 'Campaigns:', 'campaigns' ),
		'menu_name' => _x( 'Campaigns', 'campaigns' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,

		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'page-attributes' ),
		'taxonomies' => array( 'post_tag', 'publication-types' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-megaphone',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array(
			'slug' => '/take-action/campaigns',
			'with_front' => false
		),
		'capability_type' => 'post'
	);

	register_post_type( 'campaigns', $args );

	register_taxonomy(
		'campaign-types',
		'campaigns',
		array(
			'labels' => array(
				'name' => 'Campaign Categories',
				'add_new_item' => 'Add Campaign Category',
				'new_item_name' => "New Campaign Type"
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true
		)
	);
} */

/* People post type 
function register_people() {

	$labels = array(
		'name' => _x( 'People', 'people' ),
		'singular_name' => _x( 'Person', 'people' ),
		'add_new' => _x( 'Add New', 'people' ),
		'add_new_item' => _x( 'Add New Person', 'people' ),
		'edit_item' => _x( 'Edit Person', 'people' ),
		'new_item' => _x( 'New Person', 'people' ),
		'view_item' => _x( 'View Person', 'people' ),
		'search_items' => _x( 'Search People', 'people' ),
		'not_found' => _x( 'No People found', 'people' ),
		'not_found_in_trash' => _x( 'No People found in Trash', 'people' ),
		'parent_item_colon' => _x( 'People:', 'people' ),
		'menu_name' => _x( 'People', 'people' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,

		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'page-attributes' ),
		'taxonomies' => array( 'post_tag', 'people-types' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 10,
		'menu_icon' => 'dashicons-groups',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array(
			'slug' => '/people',
			'with_front' => false
		),
		'capability_type' => 'page'
	);

	register_post_type( 'people', $args );

	register_taxonomy(
		'people-types',
		'people',
		array(
			'labels' => array(
				'name' => 'People Categories',
				'add_new_item' => 'Add Person Category',
				'new_item_name' => "New Person Type"
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true
		)
	);
} */

/* Events post type 
function register_events() {

	$labels = array(
		'name' => _x( 'Events', 'events' ),
		'singular_name' => _x( 'Event', 'events' ),
		'add_new' => _x( 'Add New', 'events' ),
		'add_new_item' => _x( 'Add New Event', 'events' ),
		'edit_item' => _x( 'Edit Event', 'events' ),
		'new_item' => _x( 'New Event', 'events' ),
		'view_item' => _x( 'View Event', 'events' ),
		'search_items' => _x( 'Search events', 'events' ),
		'not_found' => _x( 'No events found', 'events' ),
		'not_found_in_trash' => _x( 'No events found in Trash', 'events' ),
		'parent_item_colon' => _x( 'events:', 'events' ),
		'menu_name' => _x( 'Events', 'events' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,

		'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'page-attributes' ),
		'taxonomies' => array( 'post_tag', 'events-types' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-calendar-alt',
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'has_archive' => true,
		'query_var' => true,
		'can_export' => true,
		'rewrite' => array(
			'slug' => '/events',
			'with_front' => false
		),
		'capability_type' => 'page'
	);

	register_post_type( 'events', $args );

	register_taxonomy(
		'events-types',
		'events',
		array(
			'labels' => array(
				'name' => 'events Categories',
				'add_new_item' => 'Add Event Category',
				'new_item_name' => "New Event Type"
			),
			'show_ui' => true,
			'show_tagcloud' => false,
			'hierarchical' => true
		)
	);
} */

/* add_action( 'init', 'register_publications' );
add_action( 'init', 'register_quotes' );
add_action( 'init', 'register_campaigns' );
add_action( 'init', 'register_events' );
add_action( 'init', 'register_people' ); */

function cdpc_search_form( $html ) {
  $html = str_replace( 'placeholder="Search ', 'placeholder="Search', $html );
  return $html;
}
add_filter( 'get_search_form', 'cdpc_search_form' );

add_filter( 'excerpt_length', function($length) {
    return 27;
} );

function cdpc_add_custom_gutenberg_color_palette() {
	add_theme_support(
		'editor-color-palette',
		[
			[
				'name'  => esc_html__( 'Dark Green', 'cddc' ),
				'slug'  => 'dark-green',
				'color' => '#225b54',
			],
			[
				'name'  => esc_html__( 'Light Green', 'cddc' ),
				'slug'  => 'light-green',
				'color' => '#2fadaa',
			],
			[
				'name'  => esc_html__( 'Black', 'cddc' ),
				'slug'  => 'black',
				'color' => '#212529',
			],
			[
				'name'  => esc_html__( 'Soft Grey', 'cddc' ),
				'slug'  => 'soft-grey',
				'color' => '#727375',
			],
			[
				'name'  => esc_html__( 'Mid-Neutral', 'cddc' ),
				'slug'  => 'mid-neutral',
				'color' => '#ccccbf',
			],
			[
				'name'  => esc_html__( 'White', 'cddc' ),
				'slug'  => 'white',
				'color' => '#f2f0e7',
			],
		]
	);
}
add_action( 'after_setup_theme', 'cdpc_add_custom_gutenberg_color_palette' );

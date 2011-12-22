<?php
add_action('init', 'Automobile_listing', 0);
add_action('init', 'Salesrep');
add_action('init', 'photoslideshow');
function Automobile_listing() {
	$args = array(
		'description' => 'Automobile Listing Post Type',
		'show_ui' => true,
		'menu_position' => 4,
		'labels' => array(
			'name'=> 'Automobile Listings',
			'singular_name' => 'Automobile Listing',
			'add_new' => 'Add New Listing',
			'add_new_item' => 'Add New Listing',
			'edit' => 'Edit Listings',
			'edit_item' => 'Edit Listing',
			'new-item' => 'New Listing',
			'view' => 'View Listing',
			'view_item' => 'View Listing',
			'search_items' => 'Search Listings',
			'not_found' => 'No Listings Found',
			'not_found_in_trash' => 'No Listings Found in Trash',
			'parent' => 'Parent Listing'
		),
		'public' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array( 'slug' => 'listing', 'with_front' => false ),
		'supports' => array('title', 'editor', 'thumbnail')
	);
	register_post_type( 'listing' , $args );
}


function Salesrep() {
	$args = array(
		'description' => 'Sales Rep Post Type',
		'show_ui' => true,
		'menu_position' => 4,
		'exclude_from_search' => true,
		'labels' => array(
			'name'=> 'Sales Rep',
			'singular_name' => 'Sales Reps',
			'add_new' => 'Add New Sales Rep',
			'add_new_item' => 'Add New Sales Rep',
			'edit' => 'Edit Sales Rep',
			'edit_item' => 'Edit Sales Rep',
			'new-item' => 'New Sales Rep',
			'view' => 'View Sales Rep',
			'view_item' => 'View Sales Rep',
			'search_items' => 'Search Sales Reps',
			'not_found' => 'No Sales Reps Found',
			'not_found_in_trash' => 'No Sales Reps Found in Trash',
			'parent' => 'Parent Sales Rep'
			
		),
		'public' => true,
		//'taxonomies' => array('propertytype'),
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => false,
		'supports' => array('title', 'editor')
	);

	register_post_type( 'salesrep' , $args );
}

function photoslideshow() {
	$args = array(
		'description' => 'Photo Slideshow Post Type',
		'show_ui' => true,
		'menu_position' => 4,
		'exclude_from_search' => true,
		'labels' => array(
			'name'=> 'Slideshow Photos',
			'singular_name' => 'Slideshow Photo',
			'add_new' => 'And New Slideshow Photo',
			'add_new_item' => 'Add New Slideshow Photo',
			'edit' => 'Edit Slideshow Photo',
			'edit_item' => 'Edit Slideshow Photo',
			'new-item' => 'New Slideshow Photo',
			'view' => 'View Slideshow Photo',
			'view_item' => 'View Slideshow Photo',
			'search_items' => 'Search Slideshow Photos',
			'not_found' => 'No Slideshow Photos Found',
			'not_found_in_trash' => 'No Slideshow Photos Found in Trash',
			'parent' => 'Parent Slideshow Photo'
			
		),
		'public' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,
		'supports' => array('title', 'editor')
		
	);

	register_post_type( 'photoslideshow' , $args );
}

/*
add_action('init', 'Sales_Rep');
function Sales_Rep() {
	$args = array(
		'description' => 'Sales Rep Post Type',
		'show_ui' => true,
		'menu_position' => 2,
		'exclude_from_search' => true,
		'labels' => array(
			'name'=> 'Sales Reps',
			'singular_name' => 'Sales Rep',
			'add_new' => '<strong style="color: black;">Add New Sales Rep</strong>',
			'add_new_item' => 'Add New Sales Rep',
			'edit' => 'Edit Sales Reps',
			'edit_item' => 'Edit Sales Reps',
			'new-item' => 'New Sales Rep',
			'view' => 'View Sales Rep',
			'view_item' => 'View Sales Rep',
			'search_items' => 'Search Sales Reps',
			'not_found' => 'No Sales Reps Found',
			'not_found_in_trash' => 'No Sales Reps Found in Trash',
			'parent' => 'Parent Sales Rep'
		),
		'public' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => true,
		'supports' => array('title', 'editor', 'thumbnail')
	);
	register_post_type( 'salesrep' , $args );
}
*/


// custom taxonomies

add_action('init', 'automobile_features_taxonomies', 1);
function automobile_features_taxonomies() {
	register_taxonomy('features',
			'listing',
			array (
			'labels' => array (
					'name' => 'Features',
					'singluar_name' => 'Features',
					'search_items' => 'Search Features',
					'popular_items' => 'Popular Features',
					'all_items' => 'All Features',
					'parent_item' => 'Parent Features',
					'parent_item_colon' => 'Parent Features:',
					'edit_item' => 'Edit Features',
					'update_item' => 'Update Features',
					'add_new_item' => 'Add New Features',
					'new_item_name' => 'New Features',
			),
					'hierarchical' =>true,
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => array( 'slug' => 'features'),
					'query_var' => 'features',
					'public'=>true)
			);
}

add_action('init', 'automobile_manufacturer_taxonomies', 1);
function automobile_manufacturer_taxonomies() {
	register_taxonomy('manufacturer',
			'listing',
			array (
			'labels' => array (
					'name' => 'Manufacturer',
					'singluar_name' => 'Manufacturer',
					'search_items' => 'Search Manufacturers',
					'popular_items' => 'Popular Manufacturers',
					'all_items' => 'All Manufacturers',
					'parent_item' => 'Parent Manufacturer',
					'parent_item_colon' => 'Parent Manufacturer:',
					'edit_item' => 'Edit Manufacturer',
					'update_item' => 'Update Manufacturer',
					'add_new_item' => 'Add New Manufacturer',
					'new_item_name' => 'New Manufacturer',
			),
					'hierarchical' =>true,
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => array( 'slug' => 'manufacturer'),
					'query_var' => 'manufacturer',
					'public'=>true)
			);
}



add_action('init', 'automobile_enginesize_taxonomies', 1);
function automobile_enginesize_taxonomies() {
	register_taxonomy('enginesize',
			'listing',
			array (
			'labels' => array (
					'name' => 'Engine Size',
					'singluar_name' => 'Engine Size',
					'search_items' => 'Search Engine Sizes',
					'popular_items' => 'Popular Engine Sizes',
					'all_items' => 'All Engine Sizes',
					'parent_item' => 'Parent Engine Size',
					'parent_item_colon' => 'Parent Engine Size:',
					'edit_item' => 'Edit Engine Size',
					'update_item' => 'Update Engine Size',
					'add_new_item' => 'Add New Engine Size',
					'new_item_name' => 'New Engine Size',
			),
					'hierarchical' =>true,
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => array( 'slug' => 'enginesize'),
					'query_var' => 'enginesize',
					'public'=>true)
			);
}





add_action('init', 'automobile_transmission_taxonomies', 1);
function automobile_transmission_taxonomies() {
	register_taxonomy('transmission',
			'listing',
			array (
			'labels' => array (
					'name' => 'Transmission',
					'singluar_name' => 'Transmission',
					'search_items' => 'Search Transmissions',
					'popular_items' => 'Popular Transmissions',
					'all_items' => 'All Transmissions',
					'parent_item' => 'Parent Transmission',
					'parent_item_colon' => 'Parent Transmission:',
					'edit_item' => 'Edit Transmission',
					'update_item' => 'Update Transmission',
					'add_new_item' => 'Add New Transmission',
					'new_item_name' => 'New Transmission',
			),
					'hierarchical' =>true,
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => array( 'slug' => 'transmission'),
					'query_var' => 'transmission',
					'public'=>true)
			);
}

add_action('init', 'automobile_pricerange_taxonomies', 1);
function automobile_pricerange_taxonomies() {
	register_taxonomy('pricerange',
			'listing',
			array (
			'labels' => array (
					'name' => 'Price Range',
					'singluar_name' => 'Price Range',
					'search_items' => 'Search Price Range',
					'popular_items' => 'Popular Price Ranges',
					'all_items' => 'All Price Ranges',
					'parent_item' => 'Parent Price Range',
					'parent_item_colon' => 'Parent Price Range:',
					'edit_item' => 'Edit Price Range',
					'update_item' => 'Update Price Range',
					'add_new_item' => 'Add New Price Range',
					'new_item_name' => 'New Price Range',
			),
					'hierarchical' =>true,
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => array( 'slug' => 'pricerange'),
					'query_var' => 'pricerange',
					'public'=>true)
			);
}

add_action('init', 'automobile_bodytype_taxonomies', 1);
function automobile_bodytype_taxonomies() {
	register_taxonomy('bodytype',
			'listing',
			array (
			'labels' => array (
					'name' => 'Body Type',
					'singluar_name' => 'Body Type',
					'search_items' => 'Search Body Type',
					'popular_items' => 'Popular body Types',
					'all_items' => 'All Body Types',
					'parent_item' => 'Parent Body Type',
					'parent_item_colon' => 'Parent Body Types:',
					'edit_item' => 'Edit Body Types',
					'update_item' => 'Update Body Type',
					'add_new_item' => 'Add New Body Type',
					'new_item_name' => 'New Body Type',
			),
					'hierarchical' =>true,
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => array( 'slug' => 'bodytype'),
					'query_var' => 'bodytype',
					'public'=>true)
			);
}



add_action('init', 'automobile_modelyear_taxonomies', 1);
function automobile_modelyear_taxonomies() {
	register_taxonomy('modelyear',
			'listing',
			array (
			'labels' => array (
					'name' => 'Model Year',
					'singluar_name' => 'Model Year',
					'search_items' => 'Search Model Year',
					'popular_items' => 'Popular Model Years',
					'all_items' => 'All Model Years',
					'parent_item' => 'Parent Model Year',
					'parent_item_colon' => 'Parent Model Years:',
					'edit_item' => 'Edit Model Years',
					'update_item' => 'Update Model Year',
					'add_new_item' => 'Add New Model Year',
					'new_item_name' => 'New Model Year',
			),
					'hierarchical' =>true,
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => array( 'slug' => 'modelyear'),
					'query_var' => 'modelyear',
					'public'=>true)
			);
}


add_action('init', 'automobile_mileage_taxonomies', 1);
function automobile_mileage_taxonomies() {
	register_taxonomy('mileage',
			'listing',
			array (
			'labels' => array (
					'name' => 'Mileage',
					'singluar_name' => 'Mileage',
					'search_items' => 'Search Mileage',
					'popular_items' => 'Popular Mileage',
					'all_items' => 'All Mileage',
					'parent_item' => 'Parent Mileage',
					'parent_item_colon' => 'Parent Mileage:',
					'edit_item' => 'Edit Mileage',
					'update_item' => 'Update Mileage',
					'add_new_item' => 'Add New Mileage',
					'new_item_name' => 'New Mileage',
			),
					'hierarchical' =>true,
					'show_ui' => true,
					'show_tagcloud' => true,
					'rewrite' => array( 'slug' => 'mileage'),
					'query_var' => 'mileage',
					'public'=>true)
			);
}





?>
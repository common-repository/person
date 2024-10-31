<?php
/**
 * @package Person
 */

/**
 * 
 * @since  		1.0.0
 * 
 * Create a custom taxonomy to add categorise occasion items
 * 
 */
function person_create_category_taxonomy() {

	$taxonomy 	= 'person_category';
	$labels 	= array();
	$args 		= array();

	// Set labels for the custom taxonomy
	$labels = array(
		'name'              => _x( 'Person Types', 'taxonomy general name' ),
		'singular_name'     => _x( 'Person Type', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Person Types' ),
		'all_items'         => __( 'All Person Types' ),
		'parent_item'       => __( 'Parent Person Type' ),
		'parent_item_colon' => __( 'Parent Person Type:' ),
		'edit_item'         => __( 'Edit Person Type' ),
		'update_item'       => __( 'Update Person Type' ),
		'add_new_item'      => __( 'Add New Person Type' ),
		'new_item_name'     => __( 'New Person Type Name' ),
		'menu_name'         => __( 'Person Types' )
	);

	// Set the arguements for the custom taxonomy
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => false
	);

	register_taxonomy( $taxonomy, array( 'person', 'person_testimony' ), $args );
}
add_action( 'init', 'person_create_category_taxonomy', 0 );
?>
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
function person_create_title_taxonomy() {

	$taxonomy 	= 'person_title';
	$labels 	= array();
	$args 		= array();

	// Set labels for the custom taxonomy
	$labels = array(
		'name'              => _x( 'Titles', 'taxonomy general name' ),
		'singular_name'     => _x( 'Title', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Titles' ),
		'all_items'         => __( 'All Titles' ),
		'parent_item'       => __( 'Parent Title' ),
		'parent_item_colon' => __( 'Parent Title:' ),
		'edit_item'         => __( 'Edit Title' ),
		'update_item'       => __( 'Update Title' ),
		'add_new_item'      => __( 'Add New Title' ),
		'new_item_name'     => __( 'New Title Name' ),
		'menu_name'         => __( 'Titles' )
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

	$terms = array(
		'Ms' 		=> array('description' => 'Ms'),
		'Miss' 		=> array('description' => 'Miss'),
		'Mrs' 		=> array('description' => 'Mrs'),
		'Mr' 		=> array('description' => 'Mr'),
		'Master' 	=> array('description' => 'Master'),
		'Dr' 		=> array('description' => 'Doctor'),
		'Cllr' 		=> array('description' => 'Councillor'),
		'Gov' 		=> array('description' => 'Governor'),
		'Rev' 		=> array('description' => 'Reverend'),
		'Fr' 		=> array('description' => 'Father')
	);

	foreach( $terms as $term=>$properties ) 
	{
		$parent_id		= 0;
		$slug 			= ( isset($properties['slug']) ) 			? $properties['slug'] 					: false;
		$parent 		= ( isset($properties['parent']) ) 			? esc_attr($properties['parent']) 		: 0;
		$description 	= ( isset($properties['description']) ) 	? esc_attr($properties['description']) 	: false;

		if( $parent !== 0 )
		{
			$parent_object = get_term_by('name', $parent, $taxonomy);

			if( is_object($parent_object) )
			{
				$parent_id = $parent_object->term_id;
			}
		}

		if ( !term_exists($term, $taxonomy) ) 
		{
			wp_insert_term( 
				$term, 
				$taxonomy, 
				array( 
					'slug' => $slug,
					'parent' => $parent_id,
					'description'=> $description
				)
			);
		}
	}
}
add_action( 'init', 'person_create_title_taxonomy', 0 );
?>
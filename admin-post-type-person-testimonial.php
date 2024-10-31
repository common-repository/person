<?php
/**
 * @package Person
 */

/**
 *
 * @since 		1.0.0
 *
 * Create a custom post type for the testimonials
 *
 */
function person_create_testimonial_post_type() {

	$labels 	= array();
	$args 		= array();

	// Set labels for the custom post type
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name' ),
		'singular_name'      => _x( 'Testimonial', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'testimonial' ),
		'add_new_item'       => __( 'Add New Testimonial' ),
		'edit_item'          => __( 'Edit Testimonial' ),
		'new_item'           => __( 'New Testimonial' ),
		'all_items'          => __( 'All Testimonials' ),
		'view_item'          => __( 'View Testimonials' ),
		'search_items'       => __( 'Search Testimonials' ),
		'not_found'          => __( 'No testimonials found' ),
		'not_found_in_trash' => __( 'No testimonials found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonials'
	);

	// Set the arguements for the custom post type
	$args = array(
		'rewrite' 				=> array( 'slug' => 'testimonials' ),
		'labels'				=> $labels,
		'description'			=> 'Testimonials',
		'public'				=> true,
		'has_archive'			=> true,
		'menu_position'			=> 20,
		'menu_icon'				=> 'dashicons-format-quote',
		'supports'				=> array(
									'title',
									'editor',
									'author',
									'thumbnail',
									'excerpt',
									'custom-fields',
									'revisions',
									'comments',
									'page-attributes'
									)
	);


	// Register the custom post type
	if( get_option('_person_show_testimonial_cpt') == 'show' )
	{
		register_post_type( 'person_testimony', $args );
	}

}
add_action( 'init', 'person_create_testimonial_post_type' );


/**
 *
 * @since 		1.2.0
 * @updated 	1.2.1
 *
 * Hide meta boxes by default
 *
 */
function person_testimony_change_default_hidden( $hidden, $screen ) {
	if ( 'person_testimony' == $screen->id ) {
		$hidden[] 	= 'postcustom';
		$hidden[] 	= 'trackbacksdiv';
		$hidden[] 	= 'commentstatusdiv';
		$hidden[] 	= 'commentsdiv';
		$hidden[] 	= 'slugdiv';
		$hidden[] 	= 'authordiv';
		$hidden[] 	= 'revisionsdiv';
		$hidden[]	= 'pageparentdiv';
	}
	return $hidden;
}
add_filter( 'default_hidden_meta_boxes', 'person_testimony_change_default_hidden', 10, 2 );


/**
 *
 * @since 		1.0.0
 *
 * Register post thumbnails
 *
 */
function person_register_testimonial_post_thumbnails()
{
	$post_thumbnails = get_theme_support( 'post-thumbnails' );
	$new_post_thumbnails = array();

	if( is_array( $post_thumbnails ) )
	{
		if( is_array( $post_thumbnails[0] ) )
		{
			foreach( $post_thumbnails[0] as $value )
			{
				array_push( $new_post_thumbnails, $value );
			}
		}
	}

	array_push( $new_post_thumbnails, 'person_testimony' );

	// Add support for post thumbnails to the theme
	add_theme_support( 'post-thumbnails', $new_post_thumbnails );

	// Add custom image sizes
	if( !in_array( 'square-75', get_intermediate_image_sizes() ) )
	{
		add_image_size( 'square-75', 75, 75, true );
	}

	if( !in_array( 'square-150', get_intermediate_image_sizes() ) )
	{
		add_image_size( 'square-150', 150, 150, true );
	}

	if( !in_array( 'square-300', get_intermediate_image_sizes() ) )
	{
		add_image_size( 'square-300', 300, 300, true );
	}

	if( !in_array( 'square-600', get_intermediate_image_sizes() ) )
	{
		add_image_size( 'square-600', 600, 600, true );
	}

	if( !in_array( 'square-1200', get_intermediate_image_sizes() ) )
	{
		add_image_size( 'square-1200', 1200, 1200, true );
	}
}
add_action( 'after_setup_theme', 'person_register_testimonial_post_thumbnails' );
?>
<?php
/**
 * @package Person
 */


/**
 * 
 * @since  		1.1.0
 * 
 * Render bootstrap testimonial list
 * 
 */
function person_testimonial_single_random_render_bootstrap( $args = array(), $version = '3' )
{
	// Future proofing, set the version of Bootstrap we wish to render
	// if( $version == '3' ){ // Render here }

	$defaults = array(
		'orderby'						=> 'rand',
		'posts_per_page'				=> 1,
	);
	$r = array_merge( $defaults, $args );

	person_testimonial_list_render_bootstrap( $r );
}



/** Legacy support **/

/**
 * 
 * @since  		1.1.2
 * 
 * Function was spelt wrong previous to this version. 
 * This function will call the old function if anybody is calling it.
 * 
 */
function person_testimonial_single_random_render_boostrap( $args = array(), $version = '3' )
{
	person_testimonial_single_random_render_bootstrap( $args, $version );
}
?>
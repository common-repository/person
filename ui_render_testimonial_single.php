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
function person_testimonial_single_render_bootstrap( $post_id, $args = array(), $version = '3' )
{
	// Future proofing, set the version of Bootstrap we wish to render
	// if( $version == '3' ){ // Render here }
	
	person_testimonial_single_render_bootstrap_3( $post_id, $args );
}


/**
 * 
 * @since  		1.1.0
 * 
 * Return Bootstrap render
 *
 * @param 		int 		$post_id 		the id of the post to render	
 * 
 */
function person_testimonial_single_render_bootstrap_3( $post_id , $args = array() ) 
{
	global $wp_query;
	$defaults = array(
		'attribute_as_link'				=> 'true',							// Set the attribute to be a link (will add cite too)
		'attribute_source'				=> 'title', 						// [ title | meta key ] - The text for the attribute
		'class_image'					=> '',								// The class for the image
		'class_list_item_wrapper'		=> '',								// The wrapper class for each object
		'class_list_wrapper'			=> '',								// The wrapper for the entire function class
		'class_media'					=> 'media',							// The media object class
		'class_media_body_wrapper'		=> 'media-body',					// The body wrapper class
		'class_media_content_wrapper'	=> '',								// The content wrapper class
		'class_media_heading'			=> 'media-heading',					// The heading class
		'class_media_image_wrapper' 	=> 'pull-left',						// The image wrapper class
		'content_source' 				=> 'excerpt', 						// [ content | excerpt | short ] - Choose where the testimonial comes from.
		'heading_as_link'				=> true,							// Set the heading to be a link
		'id'							=> 'testimonial_list',				// If you want to have multiple renders, you will want to change the id each time
		'image_as_link'					=> true,							// Set the image to be a link
		'image_size'					=> 'square-75',						// [ thumbnail | medium | large | full | custom ] choose the size of the thumbnail (be default we use a custom size)
		'post_type'						=> 'testimonial',					// [ post | page | custom post type | array() ]			
		'show_attribute'				=> true,							// [ true | false ] - show the block quote attribute
		'show_content'					=> true,							// [ true | false ] - show the content
		'show_heading'					=> false,							// [ true | false ] - show the headings
		'show_image'					=> true, 							// [ true | false ] - show images in the list
		'tag_media_heading'				=> 'h4',							// The tag to be used for the heading
		'tag_media_image_wrapper'		=> 'a',								// The tag to be used for the image wrapper (if its a link, it needs to be 'a')
		'title_source' 					=> 'title', 						// [ title | meta key ] 
		'wrap_content_in_blockquote'	=> true,							// [ true | false ] - show the content within a blockquote
	);
	$r = array_merge( $defaults, $args );
	$post = get_post( $post_id );

	if ( is_object( $post ) ) 
	{

		$person_link_type 							= get_post_meta( $post->ID, '_person_link_type', true );
		$person_related_internal_type 				= get_post_meta( $post->ID, '_person_related_internal_type', true );
		$person_related_internal 					= get_post_meta( $post->ID, '_person_related_internal', true );
		$person_related_external 					= get_post_meta( $post->ID, '_person_related_external', true );
		$person_related_opens_in_new_window 		= get_post_meta( $post->ID, '_person_related_opens_in_new_window', true );
		$person_link 								= null;

		if( !empty( $person_link_type ) && $r['use_related_link'] )
		{
			if( $person_link_type == 'internal' )
			{
				$person_link = get_permalink( $person_related_internal );
			}
			else if( $person_link_type == 'external' )
			{
				$person_link = $person_related_external;
			}
			else
			{
				$person_link = get_permalink( $post->ID );
			}
		}
		else
		{
			$person_link = get_permalink( $post->ID );
		}

		?>
		<div id="<?php echo $r['id']; ?>" class="<?php echo $r['class_list_wrapper']; ?>">
			<div class="<?php echo $r['class_list_item_wrapper']; ?>">
				<div class="<?php echo $r['class_media']; ?>">
					<<?php echo $r['tag_media_image_wrapper']; ?> class="<?php echo $r['class_media_image_wrapper']; ?>"<?php echo ( $r['image_as_link'] && $r['tag_media_image_wrapper'] == 'a' )? ' href="'. $person_link .'"' : ''; ?>>
						<?php echo get_the_post_thumbnail( $post->ID, $r['image_size'], array('class' => $r['class_image'] ) );?>
					</<?php echo $r['tag_media_image_wrapper']; ?>>
					<div class="<?php echo $r['class_media_body_wrapper']; ?>">
						<?php 
						if( $r['show_heading'] )
						{
							?>
								<<?php echo $r['tag_media_heading']; ?> class="<?php echo $r['class_media_heading']; ?>">
									<?php 

										if( $r['title_source'] == 'title' )
										{
											$title = $post->post_title;
										}
										else
										{
											$title = get_post_meta( $post->ID, $r['title_source'], true );
										}

										if( $r['heading_as_link'] )
										{
											?>
												<a href="<?php echo $person_link; ?>"><?php echo $title; ?></a>
											<?php
										}
										else
										{
											echo $title;
										}
									?>
								</<?php echo $r['tag_media_heading']; ?>>
							<?php
						} 
						if( $r['show_content'] )
						{
							?>
								<div class="<?php echo $r['class_media_content_wrapper']; ?>">
									<?php
										if( $r['wrap_content_in_blockquote'] )
										{
											?><blockquote><?php
										}

										if( $r['content_source'] == 'content' )
										{
											wpautop($post->post_content );
										}
										else if( $r['content_source'] == 'short' )
										{
											$person_testimonial_short = get_post_meta( $post->ID, '_person_testimonial_short', true );
											
											if( !empty( $person_testimonial_short ) )
											{
												echo $person_testimonial_short;
											}
											else
											{
												setup_postdata( $post ); 
												the_excerpt();
												wp_reset_postdata();
											}
										}
										else
										{
											setup_postdata( $post ); 
											the_excerpt();
											wp_reset_postdata();
										}

										if( $r['show_attribute'] )
										{
											if( $r['attribute_source'] == 'title' )
											{
												$attribute = $post->post_title;
											}
											else
											{
												$attribute = get_post_meta( $post->ID, $r['attribute_source'], true );
											}
											?>
											<footer>
												— 
												<?php

													if( $r['attribute_as_link'] )
													{
														?>
														<cite><a href="<?php echo $person_link; ?>"><?php echo $attribute; ?></a></cite>
														<?php
													}
													else
													{
														echo $attribute;
													} 
												?>
											</footer>
											<?php
										}

										if( $r['wrap_content_in_blockquote'] )
										{
											?></blockquote><?php
										}
									?>
								</div>
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	wp_reset_postdata();
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
function person_testimonial_single_render_boostrap( $post_id, $args = array(), $version = '3' )
{
	person_testimonial_single_render_bootstrap( $post_id, $args, $version );
}
?>
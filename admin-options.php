<?php
/**
 * @package Person
 */

/**
 * 
 * @since  		1.0.0
 * 
 * Register the options page
 * 
 */
function person_add_options_page() {

	add_options_page( 'Person', 'Person', 'manage_options', 'person-settings', 'person_render_options_page' );

	add_action( 'admin_init', 'person_register_settings' );
}
add_action('admin_menu', 'person_add_options_page');




/**
 * 
 * @since  		1.0.0
 * 
 * Register the options settings
 * 
 */
function person_register_settings() {

	$post_types = get_post_types( array('public' => true) );

	register_setting( 'person_group', '_person_show_cpt' );
	register_setting( 'person_group', '_person_show_testimonial_cpt' );
	register_setting( 'person_group', '_person_show_title' );
	register_setting( 'person_group', '_person_show_first_name' );
	register_setting( 'person_group', '_person_show_last_name' );
	register_setting( 'person_group', '_person_show_middle_names' );
	register_setting( 'person_group', '_person_show_post_nominal_letters' );
	register_setting( 'person_group', '_person_show_name' );
	register_setting( 'person_group', '_person_show_job_title' );
	register_setting( 'person_group', '_person_show_organisation' );
	register_setting( 'person_group', '_person_show_email' );
	register_setting( 'person_group', '_person_show_website' );
	register_setting( 'person_group', '_person_show_telephone' );
	register_setting( 'person_group', '_person_show_twitter' );
	register_setting( 'person_group', '_person_show_facebook' );
	register_setting( 'person_group', '_person_show_google' );
	register_setting( 'person_group', '_person_show_linkedin' );
	register_setting( 'person_group', '_person_show_address' );
	register_setting( 'person_group', '_person_show_post_code' );
	register_setting( 'person_group', '_person_show_link' );
	register_setting( 'person_group', '_person_show_gravatar' );

	foreach( $post_types as $post_type)
	{
		register_setting( 'person_group', '_person_show_on_' . $post_type );
		register_setting( 'person_group', '_person_testimonial_show_on_' . $post_type );
		register_setting( 'person_group', '_person_related_show_on_' . $post_type );
	}
}

/**
 * 
 * @since  		1.0.0
 * 
 * Render the options page
 * 
 */
function person_render_options_page()
{	
	$post_types 		= get_post_types( array('public' => true) );
	sort( $post_types );
	$screens 		= array();

	foreach( $post_types as $post_type)
	{
		if($post_type == 'person')
		{
			if( get_option('_person_show_on_' . $post_type ) === false )
			{
				add_option( '_person_show_on_' . $post_type, 'show' );
			}
		}

		if($post_type == 'person_testimony')
		{
			if( get_option('_person_show_on_' . $post_type ) === false )
			{
				add_option( '_person_show_on_' . $post_type, 'show' );
			}
		}

		if( get_option('_person_show_on_' . $post_type ) === 'show' )
		{
			array_push( $screens, $post_type );
		}
	}

	if( get_option('_person_show_cpt') === false)
	{
		add_option( '_person_show_cpt', 'show' );
	}

	if( get_option('_person_show_testimonial_cpt') === false)
	{
		add_option( '_person_show_testimonial_cpt', 'show' );
	}

	if( get_option('_person_show_title') === false)
	{
		add_option( '_person_show_title', 'true' );
	}

	if( get_option('_person_show_first_name') === false)
	{
		add_option( '_person_show_first_name', 'true' );
	}

	if( get_option('_person_show_last_name') === false)
	{
		add_option( '_person_show_last_name', 'true' );
	}

	if( get_option('_person_show_name') === false)
	{
		add_option( '_person_show_name', 'true' );
	}

	if( get_option('_person_show_job_title') === false)
	{
		add_option( '_person_show_job_title', 'true' );
	}

	if( get_option('_person_show_organisation') === false)
	{
		add_option( '_person_show_organisation', 'true' );
	}

	if( get_option('_person_show_email') === false)
	{
		add_option( '_person_show_email', 'true' );
	}

	if( get_option('_person_show_website') === false)
	{
		add_option( '_person_show_website', 'true' );
	}

	if( get_option('_person_show_telephone') === false)
	{
		add_option( '_person_show_telephone', 'true' );
	}

	if( get_option('_person_show_twitter') === false)
	{
		add_option( '_person_show_twitter', 'true' );
	}

	if( get_option('_person_show_facebook') === false)
	{
		add_option( '_person_show_facebook', 'true' );
	}

	if( get_option('_person_show_google') === false)
	{
		add_option( '_person_show_google', 'true' );
	}

	if( get_option('_person_show_address') === false)
	{
		add_option( '_person_show_address', 'true' );
	}

	if( get_option('_person_show_post_code') === false)
	{
		add_option( '_person_show_post_code', 'true' );
	}

	if( get_option('_person_show_link') === false)
	{
		add_option( '_person_show_link', 'true' );
	}

	if( get_option('_person_show_gravatar') === false)
	{
		add_option( '_person_show_gravatar', 'true' );
	}

	?>
		<div class="wrap person_options">
			<h2>Person</h2>
			<form method="post" action="options.php">
			<?php 
				settings_fields( 'person_group' );
				do_settings_sections( 'person_group' );
			?>
			<table class="form-table">

				<tr valign="top">
					<th scope="row"><label for="person_show_cpt">Show the 'Person' post type</label></th>
					<td><input type="checkbox" value="show" id="person_show_cpt" name="_person_show_cpt"<?php echo ( get_option('_person_show_cpt') == 'show' ) ? ' checked' : '';?>></td>
				</tr>
				<tr valign="top">
					<th scope="row">Show 'Person settings' custom meta on post type</th>
					<td>
						<?php
							foreach( $post_types as $post_type)
							{
								?>
									<span class="inline">
										<input type="checkbox" value="show" id="person_show_on_<?php echo $post_type;?>" name="_person_show_on_<?php echo $post_type;?>"<?php echo ( get_option('_person_show_on_' . $post_type ) == 'show' ) ? ' checked' : '';?>>
										<label for="person_show_on_<?php echo $post_type;?>">
										<?php
											
											$obj = get_post_type_object( $post_type );
											echo $obj->labels->singular_name;
										?>
										</label>
									</span>
								<?php
							}
						?>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Person settings fields</th>
					<td>
						<span class="inline">
							<input type="checkbox" value="true" id="person_show_title" name="_person_show_title"<?php echo ( get_option( '_person_show_title' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_title">
								Title
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_first_name" name="_person_show_first_name"<?php echo ( get_option( '_person_show_first_name' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_first_name">
								First name
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_last_name" name="_person_show_last_name"<?php echo ( get_option( '_person_show_last_name' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_last_name">
								Last name
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_middle_names" name="_person_show_middle_names"<?php echo ( get_option( '_person_show_middle_names' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_middle_names">
								Middle name(s)
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_post_nominal_letters" name="_person_show_post_nominal_letters"<?php echo ( get_option( '_person_show_post_nominal_letters' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_post_nominal_letters">
								Post nominal letters
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_name" name="_person_show_name"<?php echo ( get_option( '_person_show_name' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_name">
								Display name
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_job_title" name="_person_show_job_title"<?php echo ( get_option( '_person_show_job_title' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_job_title">
								Job title
							</label>
						</span>
						
						<span class="inline">
							<input type="checkbox" value="true" id="person_show_organisation" name="_person_show_organisation"<?php echo ( get_option( '_person_show_organisation' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_organisation">
								Organisation
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_email" name="_person_show_email"<?php echo ( get_option( '_person_show_email' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_email">
								Email
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_website" name="_person_show_website"<?php echo ( get_option( '_person_show_website' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_website">
								Website
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_telephone" name="_person_show_telephone"<?php echo ( get_option( '_person_show_telephone' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_telephone">
								Telephone
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_twitter" name="_person_show_twitter"<?php echo ( get_option( '_person_show_twitter' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_twitter">
								Twitter
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_facebook" name="_person_show_facebook"<?php echo ( get_option( '_person_show_facebook' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_facebook">
								Facebook
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_google" name="_person_show_google"<?php echo ( get_option( '_person_show_google' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_google">
								Facebook
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_linkedin" name="_person_show_linkedin"<?php echo ( get_option( '_person_show_linkedin' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_linkedin">
								LinkedIn
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_address" name="_person_show_address"<?php echo ( get_option( '_person_show_address' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_address">
								Address
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_post_code" name="_person_show_post_code"<?php echo ( get_option( '_person_show_post_code' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_post_code">
								Post code
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_link" name="_person_show_link"<?php echo ( get_option( '_person_show_link' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_link">
								Show related link
							</label>
						</span>

						<span class="inline">
							<input type="checkbox" value="true" id="person_show_gravatar" name="_person_show_gravatar"<?php echo ( get_option( '_person_show_gravatar' ) == 'true' ) ? ' checked' : '';?>>
							<label for="person_show_gravatar">
								Gravatar
							</label>
						</span>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><label for="person_show_testimonials_cpt">Show the 'Testimonial' post type</label></th>
					<td><input type="checkbox" value="show" id="person_show_testimonial_cpt" name="_person_show_testimonial_cpt"<?php echo ( get_option('_person_show_testimonial_cpt') == 'show' ) ? ' checked' : '';?>></td>
				</tr>
				<tr valign="top">
					<th scope="row">Show 'Testimonial (standalone)' custom meta on post type</th>
					<td>
						<?php
							foreach( $post_types as $post_type)
							{
								?>
									<span class="inline">
										<input type="checkbox" value="show" id="person_testimonial_show_on_<?php echo $post_type;?>" name="_person_testimonial_show_on_<?php echo $post_type;?>"<?php echo ( get_option('_person_testimonial_show_on_' . $post_type ) == 'show' ) ? ' checked' : '';?>>
										<label for="person_testimonial_show_on_<?php echo $post_type;?>">
										<?php
											
											$obj = get_post_type_object( $post_type );
											echo $obj->labels->singular_name;
										?>
										</label>
									</span>
								<?php
							}
						?>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row">Show 'Related person' custom meta on post type</th>
					<td>
						<?php
							foreach( $post_types as $post_type)
							{
								?>
									<span class="inline">
										<input type="checkbox" value="show" id="person_related_show_on_<?php echo $post_type;?>" name="_person_related_show_on_<?php echo $post_type;?>"<?php echo ( get_option('_person_related_show_on_' . $post_type ) == 'show' ) ? ' checked' : '';?>>
										<label for="person_related_show_on_<?php echo $post_type;?>">
										<?php
											
											$obj = get_post_type_object( $post_type );
											echo $obj->labels->singular_name;
										?>
										</label>
									</span>
								<?php
							}
						?>
					</td>
				</tr>
			</table>
			<?php submit_button(); ?>
			</form>
		</div>
	<?php
}

/**
 * Add "Settings" action on installed plugin list
 */
function person_add_plugin_actions( $links ) {
	array_unshift( $links, '<a href="options-general.php?page=person-settings">Settings</a>');
	return $links;
}
add_action( 'plugin_action_links_person/index.php', 'person_add_plugin_actions' );

/**
 * Add links on installed plugin list
 */
function person_add_plugin_links( $links, $file ) 
{
	if( $file == 'person/index.php' ) {
		$rate_url = 'http://wordpress.org/support/view/plugin-reviews/person?rate=5#postform';
		$links[] = '<a href="' . $rate_url . '" target="_blank" title="Rate and Review this Plugin on WordPress.org">Rate this plugin</a>';
	}
	
	return $links;
}
add_filter( 'plugin_row_meta', 'person_add_plugin_links' , 10, 2);
?>
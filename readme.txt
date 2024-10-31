=== Person ===
Contributors: mwtsn
Donate link: 
Tags: people, person, testimonial, testimonials, profile, contact, demographics
Requires at least: 3.3
Tested up to: 3.9
Stable tag: 1.2.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Custom post types for people and testimonials. Customise features, link the post types together, or link or use any meta data on any. 

== Description ==

Created by [Make Do](http://makedo.in/), this plugin will give you custom post types for people and for events. You can turn off and on as much as you need, link the two together, or link other post types to people, or enable meta data on other posts.

The plugin comes with functions that you can use to generate a loop to query the people and testimonials so you can make your own output, it also comes with a few functions that will generate Bootstrap 3 compatible lists for you.

Need to add more detailed location information to your person or testimonial? You can disable the built in address details, and use our [Position](http://wordpress.org/plugins/position/) plugin, and associate any post type with a location.

= Person features =

* Testimonials custom post type (can be disabled)
* People custom post type (can be disabled)
* Title custom taxomony
* Person type custom taxomony
* Person demographics meta box (can be enabled on any post type)
* Testimonials small meta box (off by default, but can be enabled on any post type)
* Related person meta box (off by default, but can be enabled on any post type)
* Several renderings that use bootstrap as the default (all classes can be overridden)
* Render person list
* Render testimonial list
* Render a random testimonial
* Render a single testimonial

View the FAQ section for usage instructions.

TODO:

* Add a size parameter to the gravatar

If you have any feature requests, please request them in the support section.

If you are using this plugin in your project [we would love to hear about it](mailto:hello@makedo.in).

== Installation ==

1. Backup your WordPress install
2. Upload the plugin folder to the `/wp-content/plugins/` directory
3. Activate the plugin through the 'Plugins' menu in WordPress

== Screenshots ==

1. The Bootstrap 3 compatible testimonial list, rendered using the person_testimonial_list_render_bootstrap() function
2. The Bootstrap 3 compatible person list, rendered using the person_list_render_bootstrap() function
3. A 'person' custom post type screen
4. A person view, rendered using the person_render_bootstrap() function
5. A 'testimonial' custom post type screen
6. The options screen

== Frequently asked questions ==

= If I want to grab the people in my loop, what is the default custom post type name? =

It is: 'person'

= If I want to grab the testimonials in my loop, what is the default custom post type name? =

It is: 'person_testimony'

= What are the names of all the meta information for the 'Person settings' meta box? =

Those are:

* '_person_title'
* '_person_first_name'
* '_person_last_name'
* '_person_middle_names'
* '_person_post_nominal_letters'
* '_person_name'
* '_person_job_title'
* '_person_organisation'
* '_person_email'
* '_person_gravatar_src'
* '_person_website'
* '_person_telephone'
* '_person_twitter'
* '_person_facebook'
* '_person_google'
* '_person_linkedin'
* '_person_address'
* '_person_post_code'
* '_person_link_type'
* '_person_related_internal_type'
* '_person_related_internal'
* '_person_related_external'
* '_person_related_opens_in_new_window'

= What are the names of all the meta information for the 'Testimonials' meta box? =

That is:

* '_person_testimonial_short'

= What are the names of all the meta information for the 'Related person' meta box? =

That is:

* '_person_related'

= What functions can I use? =

The functions provided by this plugin are:

* person_query_arguements()
* person_testimonials_query_arguements()
* person_list_render_bootstrap()
* person_testimonial_list_render_bootstrap()
* person_testimonial_single_render_bootstrap()
* person_testimonial_single_random_render_bootstrap()

Although you will get much better results if you create your own templates using the custom meta data provided, the plugin also provides the following functions that will generate views:

* person_render_bootstrap()
* person_testimonial_render_bootstrap()

All of these functions accept arguments.

= What does the person_query_arguements() function do? =

This function provides arguments for you to filter the people (or your own post types) creating a custom Loop. You can use it like so:

`get_posts( person_query_arguements( $args ) );`

It accepts the following arguments as an array (or you can leave the $args empty to use the defaults):

`
$defaults = array(
	'featured'					=> false, 							// [ true | false ] - Set to true to return posts that have the featured post custom meta data set to true
	'featured_post_meta_key' 	=> '_person_featured',				// The custom meta field that identifies the featured post, will also accept an array
	'order'						=> 'ASC',							// [ ASC | DESC ]
	'orderby'					=> 'date', 							// [ date | menu_order | title ]
	'posts_per_page'			=> 5,								// Set number of posts to return, -1 will return all
	'post_type'					=> 'person',						// [ post | page | custom post type | array() ]			
	'taxonomy_filter'			=> false,							// [ true | false ] - Set to true to filter by taxonomy
	'taxonomy_key'				=> 'person_category',				// The key of the taxonomy we wish to filter by
	'taxonomy_terms'			=> 'volunteer',						// The terms (uses slug), will accept a string or array
	'use_featured_image'		=> false 							// [ true | false ] - Set to true to only use posts with a featured image
);
get_posts( person_query_arguements( $defaults ) );
`

= What does the person_testimonials_query_arguements() function do? =

This function provides arguments for you to filter the testimonials (or your own post types) creating a custom Loop. You can use it like so:

`get_posts( person_testimonials_query_arguements( $args ) );`

It accepts the same arguments as the `person_query_arguements()` function, apart from the `post_type` is set to `person_testimony`.

= What does the person_list_render_bootstrap() function do? =

This function will render a Bootstrap 3 compatible list of people. You can use it like so: 

`person_list_render_bootstrap( $args );`

It accepts all the same arguments as the `person_query_arguements()` function, as well as the following arguments as an array (or you can leave the $args empty to use the defaults):

`
$defaults = array(
	'class_image'					=> '',								// The class for the image
	'class_list_item_wrapper'		=> '',								// The wrapper class for each object
	'class_list_wrapper'			=> '',								// The wrapper for the entire function class
	'class_media'					=> 'media',							// The media object class
	'class_media_body_wrapper'		=> 'media-body',					// The body wrapper class
	'class_media_content_wrapper'	=> '',								// The content wrapper class
	'class_media_heading'			=> 'media-heading',					// The heading class
	'class_media_image_wrapper' 	=> 'pull-left',						// The image wrapper class
	'class_pagination'				=> 'pager',							// The class of the pagination ul
	'content_source' 				=> 'excerpt', 						// [ content | excerpt | short ] - Choose where the testimonial comes from.
	'heading_as_link'				=> true,							// Set the heading to be a link
	'id'							=> 'person_list',					// If you want to have multiple renders, you will want to change the id each time
	'image_as_link'					=> true,							// Set the image to be a link
	'image_size'					=> 'square-75',						// [ thumbnail | medium | large | full | custom ] choose the size of the thumbnail (be default we use a custom size)
	'pagination_next_label'			=> 'Next »',						// The text for the 'next' pagination button
	'pagination_previous_label'		=> '« Previous',					// The text for the 'previous' pagination button
	'posts_per_page'				=> 5,								// The ammount of posts you want in the list (-1 will return all)
	'post_type'						=> 'person',						// [ post | page | custom post type | array() ]			
	'show_attribute'				=> true,							// [ true | false ] - show the block quote attribute
	'show_content'					=> true,							// [ true | false ] - show the content
	'show_heading'					=> true,							// [ true | false ] - show the headings
	'show_image'					=> true, 							// [ true | false ] - show images in the list
	'show_pagination' 				=> true,							// [ true | false ] - show pagination
	'tag_media_heading'				=> 'h4',							// The tag to be used for the heading
	'tag_media_image_wrapper'		=> 'a',								// The tag to be used for the image wrapper (if its a link, it needs to be 'a')
	'title_source' 					=> '_person_name', 					// [ title | meta key ] 
);
person_list_render_bootstrap( $defaults );
`

= What does the person_testimonial_list_render_bootstrap() function do? =

This function will render a Bootstrap 3 compatible list of people. You can use it like so: 

`person_testimonial_list_render_bootstrap( $args );`

It accepts all the same arguments as the `person_testimonial_query_arguements()` function, as well as the following arguments as an array (or you can leave the $args empty to use the defaults):

`
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
	'class_pagination'				=> 'pager',							// The class of the pagination ul
	'content_source' 				=> 'excerpt', 						// [ content | excerpt | short ] - Choose where the testimonial comes from.
	'heading_as_link'				=> true,							// Set the heading to be a link
	'id'							=> 'testimonial_list',				// If you want to have multiple renders, you will want to change the id each time
	'image_as_link'					=> true,							// Set the image to be a link
	'image_size'					=> 'square-75',						// [ thumbnail | medium | large | full | custom ] choose the size of the thumbnail (be default we use a custom size)
	'pagination_next_label'			=> 'Next »',						// The text for the 'next' pagination button
	'pagination_previous_label'		=> '« Previous',					// The text for the 'previous' pagination button
	'posts_per_page'				=> 5,								// The ammount of posts you want in the list (-1 will return all)
	'post_type'						=> 'person_testimony',				// [ post | page | custom post type | array() ]			
	'show_attribute'				=> true,							// [ true | false ] - show the block quote attribute
	'show_content'					=> true,							// [ true | false ] - show the content
	'show_heading'					=> false,							// [ true | false ] - show the headings
	'show_image'					=> true, 							// [ true | false ] - show images in the list
	'show_pagination' 				=> true,							// [ true | false ] - show pagination
	'tag_media_heading'				=> 'h4',							// The tag to be used for the heading
	'tag_media_image_wrapper'		=> 'a',								// The tag to be used for the image wrapper (if its a link, it needs to be 'a')
	'title_source' 					=> 'title', 						// [ title | meta key ] 
	'wrap_content_in_blockquote'	=> true,							// [ true | false ] - show the content within a blockquote
	'use_related_link'				=> false,							// [ true | false ] - Will use the related link as its link, if it is set
);
person_testimonial_list_render_bootstrap( $defaults );
`

= What does the person_testimonial_single_render_bootstrap() function do? =

It gets a single testimonial based on an ID, like so:

`person_testimonial_single_render_bootstrap( $post_id, $args)`

It accepts the same arguments as `person_testimonial_list_render_bootstrap()` for styling (arguments relating to querying posts will be ignored).

= What does the person_testimonial_single_random_render_bootstrap() function do? =

It displays a single random post, and can be used like so:

`person_testimonial_single_random_render_bootstrap( $args )`

It accepts the same arguments as the person_testimonial_list_render_bootstrap() function apart from the following overrides have been put in place:

`
$defaults = array(
	'orderby'						=> 'rand',
	'posts_per_page'				=> 1,
);
`

= What does the person_render_bootstrap() function do? =

This function provides a rendered view for a person. We recomend you build your own views with the meta data provided, but if you wish you can use it like so:

`person_render_bootstrap( $post_id, args )`

It needs the post ID of the person you wish to render, and it also accepts the following arguments as an array (or you can leave the $args empty to use the defaults):

`
$defaults = array(
	'class_address_wrapper'			=> '',						// The class of the address wrapper
	'class_content_wrapper' 		=> '',						// The class of the content wrapper
	'class_header'					=> '',						// The class of the header tag
	'class_image_wrapper' 			=> 'pull-right',			// The class of the image wrapper
	'class_link_wrapper' 			=> 'pull-right',			// The class of the map link wrapper
	'class_meta_label_wrapper'		=> 'col-md-2',				// The class of the label wrapper
	'class_wrapper'					=> 'location__wrapper',		// The class of the location wrapper
	'class_meta_row'				=> 'row',					// The class of the row
	'class_meta_value_wrapper'		=> 'col-md-10',				// The class of the value wrapper
	'class_map_wrapper'				=> 'location__map',			// The class of the map wrapper
	'class_title'					=> 'location__title',		// The class of the title
	'id'							=> 'person',				// If you want to have multiple renders, you will want to change the id each time
	'image-size'					=> 'medium',				// [ thumbnail | medium | large | full | custom ]
	'post_type'						=> 'position',				// [ post | page | custom post type | array() ]			
	'show_address'					=> true,					// [ true | false ] - show the address in the list
	'show_content'					=> true,					// [ true | false ] - show the post content in the list
	'show_email'					=> true,					// [ true | false ] - show the email in the list
	'show_facebook'					=> true,					// [ true | false ] - show facebook in the list
	'show_first_name'				=> true,					// [ true | false ] - show first name in the list
	'show_google'					=> true,					// [ true | false ] - show google+ in the list
	'show_gravatar'					=> true,					// [ true | false ] - show gravatar in the list
	'show_image'					=> true, 					// [ true | false ] - show images in the list
	'show_job_title'				=> true,					// [ true | false ] - show job title in the list
	'show_last_name'				=> true,					// [ true | false ] - show job last name in the list
	'show_link'						=> true,					// [ true | false ] - show the larger map link in the lsit
	'show_linkedin'					=> true,					// [ true | false ] - show linkedin in the list
	'show_middle_names'				=> true,					// [ true | false ] - show middle names in the list
	'show_name'						=> true,					// [ true | false ] - show the title
	'show_organisation'				=> true,					// [ true | false ] - show organisation in the list
	'show_post_code'				=> true,					// [ true | false ] - show the post code
	'show_post_nominal_letters'		=> true,					// [ true | false ] - show post nominal letters in the list
	'show_telephone'				=> true,					// [ true | false ] - show the telephone number
	'show_title'					=> true,					// [ true | false ] - show title in the list
	'show_twitter'					=> true,					// [ true | false ] - show twitter in the list
	'show_website'					=> true,					// [ true | false ] - show the website url in the list
	'tag_meta_label_wrapper_close' 	=> '</strong></p>',			// The tag(s) you wish to close the label with
	'tag_meta_label_wrapper_open' 	=> '<p><strong>',			// The tag(s) you wish to open the label with
	'tag_meta_value_wrapper_close' 	=> '</p>',					// The tag(s) you wish to close the value with
	'tag_meta_value_wrapper_open' 	=> '<p>',					// The tag(s) you wish to open the value with
	'title_format'					=> 'display',				// [ display | title ] - use the post type title, or the display name, by default the display will be used and will fall back to the title
);
person_render_bootstrap( $post_id, $defaults );
`

= What does the person_testimonial_render_bootstrap() function do? =

This function provides a rendered view for a testimonial. We recomend you build your own views with the meta data provided, but if you wish you can use it like so:

`person_testimonial_render_bootstrap( $post_id, args )`

It needs the post ID of the testimonial you wish to render, and it also accepts the following arguments as an array (or you can leave the $args empty to use the defaults):

`
$defaults = array(
	'class_address_wrapper'			=> '',						// The class of the address wrapper
	'class_content_wrapper' 		=> '',						// The class of the content wrapper
	'class_header'					=> '',						// The class of the header tag
	'class_image_wrapper' 			=> 'pull-right',			// The class of the image wrapper
	'class_link_wrapper' 			=> 'pull-right',			// The class of the map link wrapper
	'class_meta_label_wrapper'		=> 'col-md-2',				// The class of the label wrapper
	'class_wrapper'					=> 'location__wrapper',		// The class of the location wrapper
	'class_meta_row'				=> 'row',					// The class of the row
	'class_meta_value_wrapper'		=> 'col-md-10',				// The class of the value wrapper
	'class_map_wrapper'				=> 'location__map',			// The class of the map wrapper
	'class_title'					=> 'location__title',		// The class of the title
	'content_source'				=> 'content',				// [ content | excerpt | short ] - Choose where the testimonial comes from.
	'id'							=> 'testimonial',			// If you want to have multiple renders, you will want to change the id each time
	'image-size'					=> 'medium',				// [ thumbnail | medium | large | full | custom ]
	'post_type'						=> 'position',				// [ post | page | custom post type | array() ]			
	'show_address'					=> true,					// [ true | false ] - show the address in the list
	'show_content'					=> true,					// [ true | false ] - show the post content in the list
	'show_email'					=> true,					// [ true | false ] - show the email in the list
	'show_facebook'					=> true,					// [ true | false ] - show facebook in the list
	'show_first_name'				=> true,					// [ true | false ] - show first name in the list
	'show_google'					=> true,					// [ true | false ] - show google+ in the list
	'show_gravatar'					=> true,					// [ true | false ] - show gravatar in the list
	'show_image'					=> true, 					// [ true | false ] - show images in the list
	'show_job_title'				=> true,					// [ true | false ] - show job title in the list
	'show_last_name'				=> true,					// [ true | false ] - show job last name in the list
	'show_link'						=> true,					// [ true | false ] - show the larger map link in the lsit
	'show_linkedin'					=> true,					// [ true | false ] - show linkedin in the list
	'show_middle_names'				=> true,					// [ true | false ] - show middle names in the list
	'show_name'						=> true,					// [ true | false ] - show the title
	'show_organisation'				=> true,					// [ true | false ] - show organisation in the list
	'show_post_code'				=> true,					// [ true | false ] - show the post code
	'show_post_nominal_letters'		=> true,					// [ true | false ] - show post nominal letters in the list
	'show_telephone'				=> true,					// [ true | false ] - show the telephone number
	'show_title'					=> true,					// [ true | false ] - show title in the list
	'show_twitter'					=> true,					// [ true | false ] - show twitter in the list
	'show_website'					=> true,					// [ true | false ] - show the website url in the list
	'tag_meta_label_wrapper_close' 	=> '</strong></p>',			// The tag(s) you wish to close the label with
	'tag_meta_label_wrapper_open' 	=> '<p><strong>',			// The tag(s) you wish to open the label with
	'tag_meta_value_wrapper_close' 	=> '</p>',					// The tag(s) you wish to close the value with
	'tag_meta_value_wrapper_open' 	=> '<p>',					// The tag(s) you wish to open the value with
	'title_format'					=> 'title',					// [ display | title ] - use the post type title, or the display name, by default the display will be used and will fall back to the title
);
person_testimonial_render_bootstrap( $post_id, $defaults );
`

= I'm trying to use one of the functions that render lists on an archive page, but the paging doesn't work =

You can fix that by copying the following function into your functions.php:

If the archive is for people:

`
function person_list_pre_get_posts( $query ) {
	if ( !is_admin() && $query->is_post_type_archive('person') && $query->is_main_query() ) {
		$query->set( 'posts_per_page', 1 );
	}
}
add_action( 'pre_get_posts', 'person_list_pre_get_posts' );
`

If the archive is for testimonials:

`
function person_testimonial_list_pre_get_posts( $query ) {
	if ( !is_admin() && $query->is_post_type_archive('person_testimony') && $query->is_main_query() ) {
		$query->set( 'posts_per_page', 1 );
	}
}
add_action( 'pre_get_posts', 'person_testimonial_list_pre_get_posts' );
`

= I'm trying to use one of the functions that render lists on my home page, but the friendly URL paging doesn't work =

WordPress will not let you use the friendly paging on the home page because it confuses it with the standard post paging. 

Instead of using theses functions, you should use a pre_get_posts filter to change the post type of the home page posts.

You can however still page through the lists of these functions, as long as you use query strings (e.g. ?page=2), but the functions in this plugin don't do that for you.

= What custom image sizes are created by this plugin? =

The image sizes are:

* 'square-75' - 75 x 75
* 'square-150' - 150 x 150
* 'square-300' - 300 x 300
* 'square-600' - 600 x 600
* 'square-1200' - 1200 x 1200

= The custom image sizes dont seem to work, help! =

The image sizes will only take effect on images you have uploaded after this plugin has been installed, however there are other plugins out there (such as [WPThumb](http://wordpress.org/plugins/wp-thumb/)) that will fix this for you.

If it still isnt working, check that you have the 'GD' module installed in your PHP environment. If you havent, you can install it like so:

`apt-get install php5-gd`

= The bootstrap render isnt working, what do I need to do? =

The plugin will only render HTML, you will need to add Bootstrap CSS and JS to your theme.

= Can I contribute? =

Sure thing, the GitHub repository is right here: (https://github.com/mwtsn/person)

== Changelog ==

= 1.2.1 =
* Bug fix meta boxes

= 1.2.0 = 
* Hide meta boxes by default

= 1.1.4 =
* Minor ammendments

= 1.1.3 =
* Bug fix when using a 'featured' person 

= 1.1.2 =
* Fixed issue with Bootstrap in function names

= 1.1.1 =
* Added 'has_archive' to post types

= 1.1.0 =
* Added UI features

= 1.0.0 =
* Initial WordPress repository release

== Upgrade notice ==

Prior to version 1.1.2 functions with 'bootstrap' in the names were incorrectly spelled 'boostrap'. Legacy functions have been added to route the call, so the change shouldn't cause any issues. 
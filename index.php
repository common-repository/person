<?php
/**
 * @package Person
 * @version 1.2.1
 */

/*
Plugin Name:  Person
Plugin URI:   http://makedo.in/products/
Description:  Custom post types for people and testimonials. Customise features, link the post types together, or link or use any meta data on any. 
Author:       Make Do
Version:      1.2.1
Author URI:   http://makedo.in
Licence:      GPLv2 or later
License URI:  http://www.gnu.org/licenses/gpl-2.0.html


/////////  VERSION HISTORY

1.0.0	First development version
1.1.0	Added UI functions
1.1.1 	Added 'has_archive' to post types
1.1.2 	Fixed issue with Bootstrap in function names
1.1.3 	Bug fix when using a 'featured' person 
1.1.4 	Minor ammendments
1.2.0 	Hide meta boxes by default
1.2.1 	Bug fix meta boxes

/////////  CURRENT FUNCTIONALITY

1  - Create testimonials custom post type
2  - Create person custom post type
3  - Create person category taxonomy
4  - Create person title taxonomy
5  - Register scripts
6  - Create person settings meta box
7  - Register options page
8  - Testimonial small meta box
9  - Related person meta box
10 - Person query arguments
11 - Testimonial query arguments
12 - Render testimonial list
13 - Render person list
14 - Render person page
15 - Render testimonial page
16 - Render random testimonial
17 - Render single testimonial

*/


// 1  - Create testimonials custom post type
require_once 'admin-post-type-person-testimonial.php';

// 2  - Create person custom post type
require_once 'admin-post-type-person.php';

// 3  - Create person category taxonomy
require_once 'admin-taxonomy-person-category.php';

// 4  - Create person title taxonomy
require_once 'admin-taxonomy-person-title.php';

// 5  - Register scripts
require_once 'admin-scripts.php';

// 6  - Create person settings meta box
require_once 'admin-meta-box-person-settings.php';

// 7  - Register options page
require_once 'admin-options.php';

// 8  - Testimonial small meta box
require_once 'admin-meta-box-testimonial.php';

// 9  - Related person meta box
require_once 'admin-meta-box-related-person.php';

// 10 - Person query arguments
require_once 'ui-query-arguments-person.php';

// 11 - Testimonial query arguments
require_once 'ui-query-arguments-person-testimonials.php';

// 12 - Render testimonial list
require_once 'ui-render-testimonial-list.php';

// 13 - Render person list
require_once 'ui-render-person-list.php';

// 14 - Render person page
require_once 'ui-render-person.php';

// 15 - Render testimonial page
require_once 'ui-render-testimonial.php';

// 16 - Render random testimonial
require_once 'ui-render-testimonial-single-random.php';

// 17 - Render single testimonial
require_once 'ui-render-testimonial-single.php';
?>
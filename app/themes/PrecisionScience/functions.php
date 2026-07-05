<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
	'lib/settings.php',    					// Colors, other stuff
	'lib/dropdownwalker.php',				// Dropdown Walker
	'lib/navwalker.php',					// Nav Walker
	'lib/assets.php',    					// Scripts and stylesheets
	'lib/filters.php',    					// Custom functions
	'lib/setup.php',     					// Theme setup
	'lib/pagination.php',     				// Pagination for blog
	'lib/titles.php',    					// Page titles
	'lib/wrapper.php',   					// Theme wrapper class
	'lib/cleanup.php',   					// Clean up defaults
	'lib/papi.php',    						// WP-PAPI custom pages
	'lib/posttype.php',						// Custom Post Type Class
	'lib/search.php',    					// Disable search
	'lib/api/manifest.php',					// API - Manifest
	'lib/api/contact.php',					// API - Contact form
	'lib/api/subscribe.php',				// API - Subscribe
	'lib/api/team.php',						// API - Team
	'lib/sharecareers.php'					// Unique OG meta for Careers page
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}

unset($file, $filepath);


/*
 * INCLUDING FORM TEMPLATES
 * /lib/forms/event-share.php
 */
function load_template_part($template_name, $part_name=null){
	ob_start();
	get_template_part($template_name, $part_name);
	$var = ob_get_contents();
	ob_end_clean();
	return $var;
}

/////////////////////////////////////
// Is a blog page
/////////////////////////////////////
function is_blog() {
    return ( is_archive() || is_author() || is_category() || is_single() || is_tag()) && 'post' == get_post_type();
}


function get_tag_ids($post_id){
	
	$tags = wp_get_post_tags( $post_id );
	$tag_ids = array();
	
	foreach ( $tags as $tag ) {
		array_push($tag_ids, $tag->term_id );
	}
	
	return $tag_ids;
}

/////////////////////////////////////
// Upload Directories
/////////////////////////////////////
function posttype_upload_dir( $args ) {
	
	// Get the current post_id
	$id = ( isset( $_REQUEST['post_id'] ) ? $_REQUEST['post_id'] : '' );
	if( $id ) {    
	   // Set the new path depends on current post_type
	   $newdir = '/' . get_post_type( $id );
	}else{
		$newdir = '/';
	}
	
	$args['path']    = str_replace( $args['subdir'], '', $args['path'] ); //remove default subdir
	$args['url']     = str_replace( $args['subdir'], '', $args['url'] );      
	$args['subdir']  = $newdir;
	$args['path']   .= $newdir; 
	$args['url']    .= $newdir; 
	
	return $args;
}
add_filter( 'upload_dir', 'posttype_upload_dir' );

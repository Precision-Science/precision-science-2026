<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');


/**
 * Modify Youtube Oembed to include player parameters	
 */

function youtube_oembed( $html, $url, $args ) {
    // Only run this for YouTube embeds
    if ( !strstr($url, 'youtube.com') && !strstr($url, 'youtu.be') )
        return $html;

    // Get embed URL
    $url_string = parse_url($url);

    // Set default arguments
    $defaults = array(
	    'width' 	=> 500,
	    'height' 	=> 281,
        'showinfo' 	=> 0,
        'rel' 		=> 0,
        'modestbranding' => 0
    );

    // Merge args with defaults
    $args = wp_parse_args( $args, $defaults );
    
    //return $url_string;

    // Define variables
    extract( $args, EXTR_SKIP );

    return '<iframe width="' . intval($width) . '" height="' . intval($height) . '" src="'.$url_string['scheme'].'://youtube.com/embed'. $url_string['path'] . '?rel=' . intval($rel) . '&showinfo=' . intval($showinfo)  . '&modestbranding=' . intval($modestbranding) . '" frameborder="0" allowfullscreen></iframe>';

}
add_filter('oembed_result', __NAMESPACE__ . '\\youtube_oembed', 10, 3);

/**
 * Modify Vimeo Oembed to include player parameters	
 */

function vimeo_oembed( $html, $url, $args ) {
    // Only run this for YouTube embeds
    if ( !strstr($url, 'vimeo.com') )
        return $html;

    // Get embed URL
    $url_string = parse_url($url);

    // Set default arguments
    $defaults = array(
	    'width' 	=> 500,
	    'height' 	=> 281,
        'portrait' 	=> 0,
        'color' 	=> 'FFFFFF',
        'byline' 	=> 0,
        'title'		=> 0
    );

    // Merge args with defaults
    $args = wp_parse_args( $args, $defaults );
    
    //return $url_string;

    // Define variables
    extract( $args, EXTR_SKIP );

    return '<iframe width="' . intval($width) . '" height="' . intval($height) . '" src="'.$url_string['scheme'].'://player.vimeo.com/video'. $url_string['path'] . '?byline=' . intval($byline) . '&color=' . $color . '&title=' . intval($title)  . '&portrait=' . intval($portrait) . '" frameborder="0" allowfullscreen></iframe>';

}
add_filter('oembed_result', __NAMESPACE__ . '\\vimeo_oembed', 10, 3);

/**
 * capabilities_dropdown
 */
function capabilities_dropdown() { 
	global $post; 
	 
	$args = array(
		'child_of'	=> 44,
		'walker'    => '',
	);
	$childpages = wp_list_pages($args);
	 
	return $childpages;
}
add_filter('capabilities_dropdown', __NAMESPACE__ . '\\capabilities_dropdown', 10, 3);
add_shortcode('capabilities_dropdown', __NAMESPACE__ . '\\capabilities_dropdown');
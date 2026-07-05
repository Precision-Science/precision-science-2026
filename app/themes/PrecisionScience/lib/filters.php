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
  return ''; //' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

function excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', __NAMESPACE__ . '\\excerpt_length');

/**
 * Limit what Yoast adds to head
 * Documentation on how - https://stackoverflow.com/a/63097586 (Date effective June2022)
 */
function wpseo_frontend_presenters($presenters){

  /* return all WITHOUT Twitter meta output */
  if($matches = preg_grep('/Twitter/', $presenters)){
    return array_diff($presenters, $matches);
  }else{
    return $presenters;
  }
}
add_filter('wpseo_frontend_presenter_classes', __NAMESPACE__  . '\\wpseo_frontend_presenters', 10, 1);

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
 * Custom query string tracking
 */
function query_vars( $qvars ) {
  $qvars[] = 'utm';
  return $qvars;
}
add_filter( 'query_vars', __NAMESPACE__ . '\\query_vars' );


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
 * Modify Read More for excerpts
 */

function modify_read_more_link() {
    return ''; //'<a class="excerpt_link--morelink" href="' . get_permalink() . '">Read More</a>';
}
add_filter('the_content_more_link', __NAMESPACE__ . '\\modify_read_more_link', 10, 3);
add_filter('excerpt_more', __NAMESPACE__ . '\\modify_read_more_link', 10, 3);

/**
 * Post Excerpt Length
 */
function custom_excerpt_length( $length ) {
	return 24;
}
add_filter('excerpt_length', __NAMESPACE__ . '\\custom_excerpt_length', 999);
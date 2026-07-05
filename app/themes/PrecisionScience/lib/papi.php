<?php

/**
 * Set up WP-PAPI
**/

add_filter( 'papi/settings/directories', function (){
	return __DIR__ . '/page-types';
});


/**
 * Don't let Sage fuck up wp-json
 */
add_filter('sage/wrap_base', __NAMESPACE__ . '\\sage_wrap_base_json'); // Add our function to the sage_wrap_base filter

function sage_wrap_base_json($templates) {
    if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
       array_unshift($templates, 'wp-json'); // Shift the template to the front of the array
    }
    return $templates; // Return our modified array with base-json.php at the front of the queue
}
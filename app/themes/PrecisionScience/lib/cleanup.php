<?php

	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'rsd_link');
	
/**
 * Disable Image Resizing
 */
add_filter( 'intermediate_image_sizes', '__return_empty_array' );
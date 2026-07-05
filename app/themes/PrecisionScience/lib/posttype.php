<?php
	
add_action( 'init', 'register_team' );
function register_team() {
    register_post_type( 'team',
		array(
			'labels' => array(
				'name' => __( 'Team' ),
				'singular_name' => __( 'Person' )
			),
			'hierarchical' => true,
			'show_in_nav_menus' => false,
			'publicly_queryable' => false,
			//'rewrite' => array( 'slug' => 'team' ),
			'public' => true,
			'has_archive' => false,
			'supports' => array( 'title','thumbnail','editor','page-attributes' ),
		)
	);
}



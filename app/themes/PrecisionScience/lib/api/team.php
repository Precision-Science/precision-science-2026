<?php
	
	/*
	TEAM MEMBER API
	--
	OUTPUT
	{
		"id": number,
        "name": "string",
        "title": "string",
		"email": "string",
		"bio": "string",
		"headshot": {},
		"image": {},
    }
	*/
	add_action( 'rest_api_init', function () {
		register_rest_route( 'ps/v1', '/team/(?P<id>\d+)', array(
			'methods' => 'GET',
			'callback' => 'ps_team_member',
		) );
	} );

	function ps_team_member( $data ) {
		
		$id = $data['id'];
		$post = get_post($id);
		
		if ( empty( $post ) ) {
			return null;
		}
		
		
		//POST
		$output = array(
			'post_id'	=> $post->ID,
			'name'		=> $post->post_title,
			'title'		=> papi_get_field($id, 'title'),
			'email'		=> papi_get_field($id, 'email'),
			'bio'		=> papi_get_field($id, 'bio'),
			'headshot'	=> papi_get_field($id, 'headshot'),
			'image'		=> papi_get_field($id, 'image')
		);
		
		return $output;
	}

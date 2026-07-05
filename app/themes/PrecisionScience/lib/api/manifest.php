<?php
	
	
	
	/*
	MANIFEST API
	--
	OUTPUT
	{
        "path": "assets/",
         "manifest": [
            "image.png",
            {"src": "image2.png", "id":"image2"},
            {"src": "sub-manifest.json", "type":"manifest", "callback":"jsonCallback"}
        ]
    }
	*/
	add_action( 'rest_api_init', function () {
		register_rest_route( 'ps/v1', '/manifest/(?P<id>\d+)', array(
			'methods' => 'GET',
			'callback' => 'ps_media_manifest',
		) );
	} );

	function ps_media_manifest( $data ) {
		
		$media = get_attached_media( 'image', $data['id'] );
		
		if ( empty( $media ) ) {
			return null;
		}
		
		$output = array('path'=>CONTENT_DIR,'manifest'=>array());
		
		//MEDIA
		foreach($media as $file){
			$file_arr = array("src"=>'/app/'.wp_make_link_relative($file->guid),"id"=>$file->ID);
			array_push($output['manifest'], $file_arr);
		}
		
		//PAGE
		
		
		return $output;
	}

		
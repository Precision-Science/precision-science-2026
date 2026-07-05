<?php


class Landing_Page_Type extends Papi_Page_Type {

	public function meta() {
		return [
		  'name'        => 'Landing Page',
		  'description' => 'Landing page template. You will find options for customization of the background image and media types.',
		  'post_type'   => 'page',
		  'template'    => 'pages/landing-page.php'
		];
	}
	public function remove() {
		return ['editor', 'commentdiv', 'comments', 'thumbnail','authordiv','pageparentdiv'];
	}
	public function register() {
		
		//INTRO
		$this->box( 'Intro', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'intro_title',
				'title' => 'Title'
			] ),
			papi_property( [
			  'title'    => 'Text',
			  'slug'	 => 'intro_text',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Background Image',
				'slug'     => 'intro_background',
				'settings' => [
					'items' => array('Pig' 		=> 'pig.jpg',
									 'Chickens' => 'chickens.jpg',
									 'Dog' 		=> 'dog.jpg',
									 'Dog 2'	=> 'dog02.jpg',
									 'Puppy and kitten'	=> 'dog03.jpg',
									 'Horse'	=> 'horse.jpg',
									)
				]
			] )
		] );
		
		//Feature Type
		$this->box( 'Feature Type', [
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Select Feature Type',
				'slug'     => 'feature_type',
				'settings' => [
					'items' => array(
						'Select a feature' => '',
						'Video Feature' => 'video_feature',
						'Image Feature' => 'image_feature',
						'Text Feature'  => 'text_feature'
					)
				]
			] )
		] );
		
		//Video Feature
		$this->box( 'Feature', [
			papi_property( [
			    'type'  => 'string',
			    'title' => 'Video URL (mp4, youtube, vimeo)',
			    'slug'  => 'feature_video',
			    'rules' => [
			      [
			        'operator' => '=',
			        'value'    => 'video_feature',
			        'slug'     => 'feature_type'
			      ]
			    ]
			] ),
			papi_property( [
			    'type'  => 'image',
			    'title' => 'Image',
			    'slug'  => 'feature_image',
			    'rules' => [
			      [
			        'operator' => '=',
			        'value'    => 'image_feature',
			        'slug'     => 'feature_type'
			      ]
			    ]
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Subhead Color',
				'slug'     => 'subhead_color',
				'settings' => [
					'items' => array(
						'Blue' => 'darkblue',
						'Mint' => 'mint',
						'Brown'  => 'brown'
					)
				]
			] ),
			papi_property( [
			  'title'    => 'Text',
			  'slug'	 => 'text',
			  'type'  	 => 'editor',
			  'settings' => [
			    'allow_html' => true
			  ]
			] )
		] );
	}
};
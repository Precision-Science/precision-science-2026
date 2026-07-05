<?php

class Careers_Page_Type extends Papi_Page_Type {
	public function getColors(){
		global $ps_colors;
		return $ps_colors;
	}
	public function meta() {
		return [
		  'name'        => 'Careers',
		  'description' => 'A page with the needed fields for the Career opportunities',
		  'post_type'   => 'page',
		  'template'    => 'pages/careers-page.php'
		];
	}
	public function remove() {
		return ['editor', 'commentdiv', 'comments', 'thumbnail','authordiv','pageparentdiv'];
	}
	public function register() {
		//INTRO
		$this->box( 'Intro', [
			papi_property( [
			  'title'    => 'H1 headline',
			  'slug'	 => 'h1_title',
			  'type'  	 => 'string'
			] ),
			papi_property( [
			  'title'    => 'Title',
			  'slug'	 => 'intro_title',
			  'type'  	 => 'text'
			] ),
			papi_property( [
				'type'  => 'link',
				'slug'	=> 'intro_link',
				'title' => 'Destination'
			] ),
		] );
		//SOCIAL SHARING
		$this->box( 'Social Sharing', [
			papi_property( [
				'title' => 'Post title',
				'slug'	=> 'social_title',
				'type'  => 'string'
			] ),
			papi_property( [
				'title' => 'Post description',
				'slug'	=> 'social_desc',
				'type'  => 'string'
			] ),
			papi_property( [
				'title' => 'Link to share',
				'slug'	=> 'social_link',
				'type'  => 'string'
			] ),
			papi_property( [
				'title' => 'Social image 1',
				'slug'	=> 'social_image_1',
				'type'  => 'image'
			] ),
			papi_property( [
				'title' => 'Social image 2',
				'slug'	=> 'social_image_2',
				'type'  => 'image'
			] ),
			papi_property( [
				'title' => 'Social image 3',
				'slug'	=> 'social_image_3',
				'type'  => 'image'
			] )
		] );
		//SECTION 1
		$this->box( 'Section 1', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section1_title',
				'title' => 'Title'
			] ),
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section1_subtitle',
				'title' => 'Sub-title'
			] ),
			papi_property( [
			  'title'    => 'Video URL - mp4',
			  'slug'	 => 'section1_video_url_mp4',
			  'type'  	 => 'string'
			] ),
			papi_property( [
				'title'    => 'Video URL - webm',
				'slug'	 => 'section1_video_url_webm',
				'type'  	 => 'string'
			  ] ),
			papi_property( [
				'title' => 'Video placeholder',
				'slug'	=> 'section1_image',
				'type'  => 'image'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Color',
				'slug'     => 'section1_bgcolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] )
		] );
		//SECTION 2
		$this->box( 'Section 2', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section2_title',
				'title' => 'Title'
			] ),
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section2_subtitle',
				'title' => 'Sub-title'
			] ),
			papi_property( [
			  'title'    => 'Text',
			  'slug'	 => 'section2_text',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),
			papi_property( [
				'type'  => 'link',
				'slug'	=> 'section2_link',
				'title' => 'Destination'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Color',
				'slug'     => 'section2_bgcolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] )
		] );
	}

}

<?php

class Capabilities_Page_Type extends Papi_Page_Type {
	public function getColors(){
		global $ps_colors;
		return $ps_colors;
	}
	public function meta() {
		return [
		  'name'        => 'Capabilities',
		  'description' => 'A page with the needed fields for the landing page',
		  'post_type'   => 'page',
		  'template'    => 'pages/capabilities-page.php'
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
			] )
		] );
		//Section 1
		$this->box( 'Section 1', [
			papi_property( [
				'type'  => 'string',
				'title' => 'Title',
				'slug'  => 'section1_title'
			] ),
			papi_property( [
				'type'  => 'editor',
				'title' => 'Text',
				'slug'  => 'section1_text'
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
		//Section 2
		$this->box( 'Section 2', [
			papi_property( [
				'type'  => 'string',
				'title' => 'Title',
				'slug'  => 'section2_title'
			] ),
			papi_property( [
				'type'  => 'editor',
				'title' => 'Text',
				'slug'  => 'section2_text'
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
		//Section 3
		$this->box( 'Section 3', [
			papi_property( [
				'type'  => 'string',
				'title' => 'Title',
				'slug'  => 'section3_title'
			] ),
			papi_property( [
				'type'  => 'editor',
				'title' => 'Text',
				'slug'  => 'section3_text'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Color',
				'slug'     => 'section3_bgcolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] )
		] );
		//Gallery
		$this->box( 'Gallery', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'gallery_title',
				'title' => 'Title'
			] ),
			papi_property( [
			  'title'    => 'Text',
			  'slug'	 => 'gallery_text',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),
			papi_property( [
				'title'    => 'Image',
				'slug'     => 'image',
				'type'     => 'repeater',
				'settings' => [
					'items' => [
						papi_property( [
							'type'  => 'string',
							'title' => 'Title',
							'slug'  => 'image_title'
						] ),
						papi_property( [
							'type'  => 'text',
							'title' => 'Text',
							'slug'  => 'image_caption'
						] ),
						papi_property( [
							'type'  => 'image',
							'title' => 'Image',
							'slug'  => 'image'
						] )
					]
				]
			] )
		] );
	}

}

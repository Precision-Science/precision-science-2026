<?php

class Home_Page_Type extends Papi_Page_Type {
	public function getColors(){
		global $ps_colors;
		return $ps_colors;
	}
	public function meta() {
		return [
		  'name'        => 'Homepage',
		  'description' => 'A page with the needed fields for the landing page',
		  'post_type'   => 'page',
		  'template'    => 'pages/home-page.php'
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
			  'type'  	 => 'string',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),
			papi_property( [
			  'title'    => 'Title Part 1',
			  'slug'	 => 'intro_title',
			  'type'  	 => 'string',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),
			papi_property( [
				'title'    => 'Keywords',
				'slug'     => 'keywords',
				'type'     => 'repeater',
				'settings' => [
					'items' => [
						papi_property( [
							'type'  => 'string',
							'title' => 'Word',
							'slug'  => 'keyword'
						] )
					]
				]
			] ),
			papi_property( [
			  'title'    => 'Title Part2',
			  'slug'	 => 'intro_title2',
			  'type'  	 => 'string',
			  'settings' => [
			    'allow_html' => true
			  ]
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
			  'title'    => 'Text',
			  'slug'	 => 'section1_text',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),
			papi_property( [
				'type'  => 'link',
				'slug'	=> 'section1_link',
				'title' => 'Destination'
			] ),	
			papi_property( [
			  'title' => 'Image',
			  'slug'	=> 'section1_image',
			  'type'  => 'image'
			] ),
			papi_property( [
				'type'     => 'string',
				'title'    => 'Image Caption',
				'slug'     => 'section1_caption'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Caption Color',
				'slug'     => 'section1_captioncolor',
				'settings' => [
					'items' => $this->getColors()
				]
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
			  'title' => 'Image',
			  'slug'	=> 'section2_image',
			  'type'  => 'image'
			] ),
			papi_property( [
				'type'     => 'string',
				'title'    => 'Image Caption',
				'slug'     => 'section2_caption'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Caption Color',
				'slug'     => 'section2_captioncolor',
				'settings' => [
					'items' => $this->getColors()
				]
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
		//SECTION 3
		$this->box( 'Section 3', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section3_title',
				'title' => 'Title'
			] ),
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section3_subtitle',
				'title' => 'Sub-title'
			] ),
			papi_property( [
			  'title'    => 'Text',
			  'slug'	 => 'section3_text',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),
			papi_property( [
				'type'  => 'link',
				'slug'	=> 'section3_link',
				'title' => 'Destination'
			] ),	
			papi_property( [
			  'title' => 'Image',
			  'slug'	=> 'section3_image',
			  'type'  => 'image'
			] ),
			papi_property( [
				'type'     => 'string',
				'title'    => 'Image Caption',
				'slug'     => 'section3_caption'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Caption Color',
				'slug'     => 'section3_captioncolor',
				'settings' => [
					'items' => $this->getColors()
				]
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
		//SECTION 4
		$this->box( 'Section 4', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section4_title',
				'title' => 'Title'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Color',
				'slug'     => 'section4_bgcolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] ),
			papi_property( [
				'type'  => 'link',
				'slug'	=> 'section4_link',
				'title' => 'Destination'
			] ),
			papi_property( [
				'title'    => 'Slide',
				'slug'     => 'slide',
				'type'     => 'repeater',
				'settings' => [
					'items' => [
						papi_property( [
							'type'  => 'string',
							'slug'	=> 'section4_subtitle',
							'title' => 'Sub-title'
						] ),
						papi_property( [
						  'title'    => 'Text',
						  'slug'	 => 'section4_text',
						  'type'  	 => 'text',
						  'settings' => [
						    'allow_html' => true
						  ]
						] ),
						papi_property( [
						  'title' => 'Image',
						  'slug'	=> 'section4_image',
						  'type'  => 'image'
						] )
					]
				]
			] )
		] );	
	}

}

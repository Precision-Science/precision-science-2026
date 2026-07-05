<?php

class Successes_Type extends Papi_Page_Type {
	public function getColors(){
		global $ps_colors;
		return $ps_colors;
	}
	public function meta() {
		return [
		  'name'        => 'Our Successes',
		  'description' => 'A page with the needed fields for the successes page',
		  'post_type'   => 'page',
		  'template'    => 'pages/successes-page.php'
		];
	}
	public function remove() {
		return ['editor', 'commentdiv', 'comments', 'thumbnail','authordiv','pageparentdiv'];
	}
	public function register() {
		//INTRO
		$this->box( 'Intro', [
			papi_property( [
			  'title'    => 'Title',
			  'slug'	 => 'intro_title',
			  'type'  	 => 'string',
			  'settings' => [
			    'allow_html' => true
			  ]
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
		//TESTIMONIALS
		$this->box( 'Testimonials', [
			'title'    => 'Testimonial',
			'slug'     => 'testimonial',
			'type'     => 'repeater',
			'settings' => [
				'items' => [
					papi_property( [
					  'title'    => 'Author',
					  'slug'	 => 'author_title',
					  'type'  	 => 'string',
					  'settings' => [
					    'allow_html' => true
					  ]
					] ),
					papi_property( [
					  'title'    => 'Quote',
					  'slug'	 => 'quote_text',
					  'type'  	 => 'text',
					  'settings' => [
					    'allow_html' => true
					  ]
					] )
				]
			]
		] );
		//SECTION 1
		$this->box( 'Section 1', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section1_title',
				'title' => 'Title',
				'settings' => [
				    'allow_html' => true
				]
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
				'type'  => 'string',
				'slug'	=> 'section1_caption',
				'title' => 'Caption'
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
			  'title' => 'Photo',
			  'slug'	=> 'section1_photo',
			  'type'  => 'image'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Color',
				'slug'     => 'section1_bgcolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] ),
			papi_property( [
			  'title'    => 'Label (Do not change)',
			  'slug'	 => 'section1_label',
			  'type'  	 => 'string'
			] )
		] );
		//SECTION 1
		$this->box( 'Section 2', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section2_title',
				'title' => 'Title',
				'settings' => [
				    'allow_html' => true
				]
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
				'type'  => 'string',
				'slug'	=> 'section2_caption',
				'title' => 'Caption'
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
			  'title' => 'Photo',
			  'slug'	=> 'section2_photo',
			  'type'  => 'image'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Color',
				'slug'     => 'section2_bgcolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] ),
			papi_property( [
			  'title'    => 'Label (Do not change)',
			  'slug'	 => 'section2_label',
			  'type'  	 => 'string'
			] )
		] );
		//SECTION 3
		$this->box( 'Section 3', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section3_title',
				'title' => 'Title',
				'settings' => [
				    'allow_html' => true
				]
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
				'type'  => 'string',
				'slug'	=> 'section3_caption',
				'title' => 'Caption'
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
			  'title' => 'Photo',
			  'slug'	=> 'section3_photo',
			  'type'  => 'image'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Color',
				'slug'     => 'section3_bgcolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] ),
			papi_property( [
			  'title'    => 'Label (Do not change)',
			  'slug'	 => 'section3_label',
			  'type'  	 => 'string'
			] )
		] );
		//SECTION 4
		$this->box( 'Section 4', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section4_title',
				'title' => 'Title',
				'settings' => [
				    'allow_html' => true
				]
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
				'type'  => 'string',
				'slug'	=> 'section4_caption',
				'title' => 'Caption'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Caption Color',
				'slug'     => 'section4_captioncolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] ),
			papi_property( [
			  'title' => 'Photo',
			  'slug'	=> 'section4_photo',
			  'type'  => 'image'
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
			  'title'    => 'Label (Do not change)',
			  'slug'	 => 'section4_label',
			  'type'  	 => 'string'
			] )
		] );
		//SECTION 5
		$this->box( 'Section 5', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section5_title',
				'title' => 'Title',
				'settings' => [
				    'allow_html' => true
				]
			] ),
			papi_property( [
			  'title'    => 'Text',
			  'slug'	 => 'section5_text',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section5_caption',
				'title' => 'Caption'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Caption Color',
				'slug'     => 'section5_captioncolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] ),
			papi_property( [
			  'title' => 'Photo',
			  'slug'	=> 'section5_photo',
			  'type'  => 'image'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Color',
				'slug'     => 'section5_bgcolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] ),
			papi_property( [
			  'title'    => 'Label (Do not change)',
			  'slug'	 => 'section5_label',
			  'type'  	 => 'string'
			] )
		] );
		//SECTION 6
		$this->box( 'Section 6', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section6_title',
				'title' => 'Title',
				'settings' => [
				    'allow_html' => true
				]
			] ),
			papi_property( [
			  'title'    => 'Text',
			  'slug'	 => 'section6_text',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section6_caption',
				'title' => 'Caption'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Caption Color',
				'slug'     => 'section6_captioncolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] ),
			papi_property( [
			  'title' => 'Photo',
			  'slug'	=> 'section6_photo',
			  'type'  => 'image'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Color',
				'slug'     => 'section6_bgcolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] ),
			papi_property( [
			  'title'    => 'Label (Do not change)',
			  'slug'	 => 'section6_label',
			  'type'  	 => 'string'
			] )
		] );
		//SECTION 7
		$this->box( 'Section 7', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section7_title',
				'title' => 'Title',
				'settings' => [
				    'allow_html' => true
				]
			] ),
			papi_property( [
			  'title'    => 'Text',
			  'slug'	 => 'section7_text',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section7_caption',
				'title' => 'Caption'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Caption Color',
				'slug'     => 'section7_captioncolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] ),
			papi_property( [
			  'title' => 'Photo',
			  'slug'	=> 'section7_photo',
			  'type'  => 'image'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Color',
				'slug'     => 'section7_bgcolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] ),
			papi_property( [
			  'title'    => 'Label (Do not change)',
			  'slug'	 => 'section7_label',
			  'type'  	 => 'string'
			] )
		] );
		//SECTION 8
		$this->box( 'Section 8', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section8_title',
				'title' => 'Title',
				'settings' => [
				    'allow_html' => true
				]
			] ),
			papi_property( [
			  'title'    => 'Text',
			  'slug'	 => 'section8_text',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section8_caption',
				'title' => 'Caption'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Caption Color',
				'slug'     => 'section8_captioncolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] ),
			papi_property( [
			  'title' => 'Photo',
			  'slug'	=> 'section8_photo',
			  'type'  => 'image'
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Color',
				'slug'     => 'section8_bgcolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] ),
			papi_property( [
			  'title'    => 'Label (Do not change)',
			  'slug'	 => 'section8_label',
			  'type'  	 => 'string'
			] )
		] );
	}

}

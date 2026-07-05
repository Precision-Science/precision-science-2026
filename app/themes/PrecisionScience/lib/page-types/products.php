<?php

class Product_Type extends Papi_Page_Type {
	public function getColors(){
		global $ps_colors;
		return $ps_colors;
	}
	public function meta() {
		return [
		  'name'        => 'Product',
		  'description' => 'Product page template',
		  'post_type'   => 'page',
		  'template'    => 'pages/product-page.php'
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
			  'type'  	 => 'string',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),
			papi_property( [
			  'title'    => 'Body',
			  'slug'	 => 'intro_body',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),
			papi_property( [
				'title'  => 'CTA title',
				'slug'	 => 'intro_cta_text',
				'type'   => 'string'
			] ),
			papi_property( [
				'title'  => 'CTA',
				'slug'	 => 'intro_cta_link',
				'type'   => 'link'
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
        //SECTION 1
		$this->box( 'Section 1', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'section1_title',
				'title' => 'Title'
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
			  'title' => 'Image',
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
			  'title'    => 'Text',
			  'slug'	 => 'section2_text',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),	
			papi_property( [
			  'title' => 'Image',
			  'slug'	=> 'section2_image',
			  'type'  => 'image'
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
        //QUOTE
		$this->box( 'Quote', [
            papi_property( [
                'title'    => 'Title',
                'slug'	 => 'quote_title',
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
		] );
        //CHEWS
        $this->box( 'Circles', [	
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'chew_title',
				'title' => 'Title'
			] ),
			papi_property( [
				'title'    => 'Chew type',
				'slug'     => 'chew_item',
				'type'     => 'repeater',
				'settings' => [
					'items' => [
						papi_property( [
							'type'  => 'string',
							'title' => 'Abbreviation',
							'slug'  => 'abbr'
						] ),
						papi_property( [
							'type'  => 'string',
							'title' => 'Title',
							'slug'  => 'title'
						] ),
						papi_property( [
							'type'  => 'text',
							'title' => 'Long Description',
							'slug'  => 'long_desc'
						] ),
						papi_property( [
							'type'  => 'dropdown',
							'title' => 'Color',
							'slug'  => 'color',
							'settings' => [
								'items' => $this->getColors()
							]
						] )
					]
				]
			] )
		] );
		//STATS
		$this->box( 'Stats', [
			'title'    => 'Stat',
			'slug'     => 'stat',
			'type'     => 'repeater',
			'settings' => [
				'items' => [
					papi_property( [
					  'title'    => 'First Line',
					  'slug'	 => 'stat_first_line',
					  'type'  	 => 'string',
					  'settings' => [
					    'allow_html' => true
					  ]
					] ),
					papi_property( [
						'title' => 'Icon',
						'slug'	=> 'stat_icon',
						'type'  => 'string'
					  ] ),
					papi_property( [
					  'title'    => 'Last Line',
					  'slug'	 => 'stat_last_line',
					  'type'  	 => 'string',
					  'settings' => [
					    'allow_html' => true
					  ]
					] )
				]
			]
		] );
		//PACKAGING
		$this->box( 'Packaging', [
			papi_property( [
			  'title'    => 'Text',
			  'slug'	 => 'packaging',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] )
		]);
		//CERTIFED
		$this->box( 'Certified', [
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'certified_title',
				'title' => 'Title'
			] ),
			papi_property( [
			  'title'    => 'Text',
			  'slug'	 => 'certified_text',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),
			papi_property( [
				'type'     => 'dropdown',
				'title'    => 'Color',
				'slug'     => 'certified_bgcolor',
				'settings' => [
					'items' => $this->getColors()
				]
			] ),
			papi_property( [
			  'title' => 'Image',
			  'slug'	=> 'certified_image',
			  'type'  => 'image'
			] )
		] );
	}
}

<?php

class About_Page_Type extends Papi_Page_Type {

	public function meta() {
		return [
		  'name'        => 'About Us',
		  'description' => 'The About Page (Intro, Timeline, and bios from the Team Section)',
		  'post_type'   => 'page',
		  'template'    => 'pages/about-page.php'
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
		$this->box( 'Timeline', [	
			papi_property( [
				'title'    => 'Item',
				'slug'     => 'timeline_item',
				'type'     => 'repeater',
				'settings' => [
					'items' => [
						papi_property( [
							'type'  => 'string',
							'title' => 'Year',
							'slug'  => 'year'
						] ),
						papi_property( [
							'type'  => 'text',
							'title' => 'Text',
							'slug'  => 'text'
						] ),
						papi_property( [
							'type'  => 'text',
							'title' => 'Icon',
							'slug'  => 'icon'
						] )
					]
				]
			] )
		] );
	}

}

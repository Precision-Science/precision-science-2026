<?php

class Promise_Page_Type extends Papi_Page_Type {
	public function getColors(){
		global $ps_colors;
		return $ps_colors;
	}
	public function meta() {
		return [
		  'name'        => 'Our Promise',
		  'description' => 'The Promise Page (Intro, Processes)',
		  'post_type'   => 'page',
		  'template'    => 'pages/promise-page.php'
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
		$this->box( 'Promise', [
			papi_property( [
			  'title'    => 'Text',
			  'slug'	 => 'promise_text',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] )
		] );
		$this->box( 'Processes', [	
			papi_property( [
				'type'  => 'string',
				'slug'	=> 'processes_title',
				'title' => 'Title'
			] ),
			papi_property( [
			  'title'    => 'Text',
			  'slug'	 => 'processes_text',
			  'type'  	 => 'text',
			  'settings' => [
			    'allow_html' => true
			  ]
			] ),
			papi_property( [
				'title'    => 'Processes',
				'slug'     => 'process_item',
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
							'title' => 'Short Description',
							'slug'  => 'short_desc'
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
	}

}

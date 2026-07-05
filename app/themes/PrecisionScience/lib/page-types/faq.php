<?php

class Faq_Type extends Papi_Page_Type {

	public function meta() {
		return [
		  'name'        => 'FAQ',
		  'description' => 'FAQ page template',
		  'post_type'   => 'page',
		  'template'    => 'pages/faq-page.php'
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
		//QUESTIONS
		$this->box( 'Questions', [
            papi_property( [
				'title'    => 'Q & A',
				'slug'     => 'faq_item',
				'type'     => 'repeater',
				'settings' => [
					'items' => [
						papi_property( [
							'type'  => 'string',
							'title' => 'Question',
							'slug'  => 'question'
						] ),
						papi_property( [
							'type'  => 'text',
							'title' => 'Answer',
							'slug'  => 'answer'
						] )
					]
				]
			] )
		] );
	}
}

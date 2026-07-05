<?php while ( have_posts() ) : the_post(); ?>
<!-- MASTHEAD INTRO -->
<?php get_template_part('templates/page','header'); ?>
<!-- SECTIONS -->
<?php
		
	$slugs = papi_get_slugs();
	$exclude = ['Intro','Gallery'];
	$count = 0;
	foreach($slugs as $key => $fieldset){
		if( !in_array($key,$exclude) ):		
			get_template_part('templates/fragment','capabilities');
		endif;
	}
?>
<?php endwhile; ?>
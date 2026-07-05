<?php while ( have_posts() ) : the_post(); ?>
	<!-- MASTHEAD INTRO -->
	<style>
	#masthead{
		background-image:url(<?php echo '/app/themes/PrecisionScience/dist/img/'.papi_get_field('intro_background'); ?>);
	}	
	</style>
	<?php get_template_part('templates/page','header'); ?>
	<!-- FEATURE -->
	<?php if(papi_get_field('feature_type') == 'video_feature'): ?>
	
		<?php get_template_part('templates/fragment','landing-video'); ?>
	
	<?php elseif(papi_get_field('feature_type') == 'image_feature'): ?>
	
		<?php get_template_part('templates/fragment','landing-image'); ?>
	
	<?php else: ?>
	
		<?php get_template_part('templates/fragment','landing-text'); ?>
	
	<?php endif; ?>
<?php endwhile; ?>
<!-- END FEATURE -->
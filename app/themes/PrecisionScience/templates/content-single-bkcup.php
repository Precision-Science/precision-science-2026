<!-- MASTHEAD INTRO -->
<!-- <style>
#masthead{
	background-image:url(<?php echo '/app/themes/PrecisionScience/dist/img/page-landing/'.papi_get_field('intro_background'); ?>);
}	
</style> -->
<?php get_template_part('templates/page','header'); ?>
<!-- FEATURE -->

	<?php while (have_posts()) : the_post(); ?>
	<div class="row blog-controls collapse">
			<div class="column medium-6">
				<!--FILTERING PLACEHOLDER-->
				&nbsp;
			</div>
			<div class="column medium-6">
				<div class="post-pagination">
					<?php
					$prev_post = get_previous_post();
					$next_post = get_next_post();
					?>
					<?php if (!empty( $next_post )): ?>
					  <a class="prev-story" href="<?php echo $next_post->guid ?>"><span class="blog-btn--prev">&laquo;</span> Prev Story</a>
					<?php endif ?>
					<?php if (!empty( $prev_post )): ?>
					  <a class="next-story" href="<?php echo $prev_post->guid ?>">Next Story <span class="blog-btn--next">&raquo;</span></a>
					<?php endif ?>
				</div>
			</div>
		</div>
	  <article <?php post_class('row'); ?>>
		<div class="post-alt column medium-6">
			<div class="post-image padding-xso-bottom--md">
				<?php $feature_image = papi_get_field('feature_image'); ?>
				<img src="<?php echo $feature_image->url; ?>" alt="<?php echo $feature_image->alt; ?>" />
			</div>
			<div class="post-contact_form show-for-medium-up">
				<?php /*
				<div class="padding-xsu-top--md">
					<h2>Have a specific question? Email us.</h2>
					<div class="landingpage-contact row collapse">
					<?php
						set_query_var('landingpage_referrer', get_permalink());
						get_template_part('templates/form','landingpage');
					?>
					</div>
				</div>
				*/ ?>
			</div>
			<footer class="post-footer">
				<?php get_template_part('templates/post-share'); ?>
			</footer>
			<hr class="divide divide--mint"/>
			<?php get_template_part('templates/fragment-news','related'); ?>
		</div>
		<div class="post-content column medium-6">
			<header>
				<h1 class="post-title"><?php the_title(); ?></h1>
				<?php get_template_part('templates/post-meta'); ?>
			</header>
			<div class="post-summary">
				<?php the_content(); ?>
			</div>
		</div>
	</article>	  
	  
	<?php endwhile; ?>



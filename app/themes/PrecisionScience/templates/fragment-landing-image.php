<article id="image_feature" class="landing">
	<div class="grid-container upper">
		<section class="row row--fullwidth padding-xsu-gutters--sm padding-smu-gutters--sm padding-lgu-gutters--xs">
			<div class="column xsmall-12">
				<hr class="divide divide--mint" />
			</div>
		</section>
		<section class="row row--fullwidth padding-xsu-top--lg padding-xsu-gutters--sm padding-smu-gutters--sm padding-lgu-gutters--xs">
			<div class="column medium-6 medium-push-6 content-color--<?php the_papi_field('subhead_color'); ?>">
				<?php the_papi_field('text'); ?>
				<footer class="post-footer">
					<?php get_template_part('templates/post-share'); ?>
				</footer>
			</div>
			<div class="column medium-6 medium-pull-6">
				<div id="image_feature-embed" class="image-embed padding-xsu-top--md padding-mdu-top--xs">
					<?php $feature_image = papi_get_field('feature_image'); ?>

					<img src="<?php echo $feature_image->url; ?>" alt="<?php echo $feature_image->alt; ?>" />
							
				</div>
				<div class="padding-xsu-top--md">
					<h3>Have a specific question? Email us.</h3>
					<div class="landingpage-contact row collapse">
					<?php
						set_query_var('landingpage_referrer', get_permalink());
						get_template_part('templates/form','landingpage');
					?>
					</div>
				</div>
			</div>
		</section>
	</div>
</article>
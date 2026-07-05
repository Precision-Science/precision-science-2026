<?php while (have_posts()) : the_post(); ?>
	<!-- MASTHEAD INTRO -->
	<div class="bg grid-container">
		<?php get_template_part('templates/page','header'); ?>
		<!-- CONTENT -->
		<article>
			<div class="row">
				<div class="column xsmall-12">
					<?php the_papi_field('text'); ?>
				</div>
			</div>
		</article>
	</div>
<?php endwhile; ?>
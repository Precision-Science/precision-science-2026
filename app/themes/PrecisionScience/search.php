<section id="masthead" class="row">
	<div class="column xsmall-12">
		<h1>Search</h1>
	</div>
</section>
<?php if (!have_posts()) : ?>
	<div class="alert alert-warning">
		<?php _e('Sorry, no results were found.', 'sage'); ?>
	</div>
	<?php get_search_form(); ?>
<?php else: ?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="row">
			<?php get_template_part('templates/content', 'search'); ?>
		</div>
	<?php endwhile; ?>
	
	<?php the_posts_navigation(); ?>
<?php endif; ?>
<?php while ( have_posts() ) : the_post(); ?>
<!-- MASTHEAD INTRO -->
<div class="bg grid-container">
	<?php get_template_part('templates/page','header'); ?>
	<hr class="divide" />
	<!-- PROMISE -->
	<article id="promise" data-scroll-show data-scroll-slide="promise">
		<div class="row">
			<div class="column small-12">
				<h3 class="text-center">The Precision Science Promise</h3>
				<div class="row promises-columns">
					<div class="icon">
						<img alt="" src="<?php echo get_template_directory_uri();?>/dist/img/icon-quality.svg" height="90" width="90"/>
						<br/>
						Highest Quality Product
					</div>
					<div class="plus">
						<img alt="" src="<?php echo get_template_directory_uri();?>/dist/img/list-plus.svg" height="30" width="30"/>
					</div>
					<div class="icon">
						<img alt="" src="<?php echo get_template_directory_uri();?>/dist/img/icon-time.svg" height="90" width="90"/>
						<br/>
						On-time
					</div>
					<div class="plus">
						<img alt="" src="<?php echo get_template_directory_uri();?>/dist/img/list-plus.svg" height="30" width="30"/>
					</div>
					<div class="icon">
						<img alt="" src="<?php echo get_template_directory_uri();?>/dist/img/icon-price.svg" height="90" width="90"/>
						<br/>
					Best Price Point Possible
					</div>
				</div>
				<p class="text-center"><?php the_papi_field('promise_text'); ?></p>
			</div>
		</div>
	</article>
</div>
<hr class="divide" />
<!-- PROCESSES -->
<article id="elements-of-success" class="grid-container" data-scroll-show data-scroll-slide="elements-of-success">
	<header class="row">
		<div class="column xsmall-12">
			<h1><?php the_papi_field('processes_title'); ?></h1>
			<p><?php the_papi_field('processes_text'); ?></p>
		</div>	
	</header>
	<section class="row">
		<div class="column xsmall-12">
			<?php
				$process_arr = papi_get_field('process_item');
			?>
			<ul class="block-grid">
			<?php	
				foreach($process_arr as $item):
					get_template_part('templates/fragment','process');
				endforeach;
			?>
			</ul>
		</div>
	</section>
</article>
<?php endwhile; ?>
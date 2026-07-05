<header id="masthead" class="page-header grid-container" data-scroll-show data-scroll-class="masthead-reveal">
	<div class="row">
		<div class="column xsmall-12 padding-xso-bottom--lg">
			<?php if( is_page() || is_single() ): ?>
				<?php 
					$intro_title = papi_get_field('intro_title');
					if( strlen($intro_title) > 0 ):
				?>
					<h1><?php echo $intro_title; ?></h1>
				<?php endif; ?>
				<?php if( papi_get_field('intro_text') ): ?>
				<p><?php the_papi_field('intro_text'); ?></p>
				<?php endif; ?>
			<?php else: ?>
				<h1><?php the_title(); ?></h1>
			<?php endif; ?>
			<?php if( is_page_template('landing') || is_single() ): ?>
			<div class="row">
				<div class="column xsmall-12 medium-12">
					<div class="social-profiles"><span class="label">Follow us <span class="sr-only">on </span><a href="https://www.linkedin.com/company-beta/3623185/?pathWildcard=3623185" target="_blank" class="social-profile social-profile--linkedin">LinkedIn</a> <span class="sr-only">or </span><a href="https://www.youtube.com/channel/UCfhRsedvtEfmgGozf71EghQ" target="_blank" class="social-profile social-profile--youtube">YouTube</a></span></div>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>
</header>
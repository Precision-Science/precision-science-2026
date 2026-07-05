<article id="team" class="fragment-home fragment-home-team grid-container" data-scroll-show>
<!-- <article id="team" class="fragment-home fragment-home-team grid-container" data-scroll-show data-scroll-class="nada" data-scroll-func="home" data-scroll-funcname="scroll_team"> -->
	<div class="row">
		<header class="column xsmall-12 text">
			<h2><a title="About Us" href="/about/" data-id="46" data-slug="about">Our Team</a></h2>
			<h3>Your success is our success</h3>
		</header>
	</div>
	<div class="team-grid">
		<div class="grid-container">
			<div class="row collapse">
				<div class="column xsmall-12">
					<div class="team-members full gallery column xsmall-12">
					<?php
						
						$args = array(
							'post_type'      => 'team',
							'posts_per_page' => '-1',
							'order_by' 	     => 'menu_order',
							'order'			 => 'ASC'			
						);
						$team = new WP_Query($args);
						if ( $team->have_posts() ):
							while ( $team->have_posts() ):
								$team->the_post();
								get_template_part('templates/wrapper','team-member-about');
							endwhile;
						endif;
						wp_reset_postdata();
						
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>
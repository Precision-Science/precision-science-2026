<div id="full-bio">
	<div class="grid-container">
		<div class="close"><img src="<?php echo get_template_directory_uri();?>/dist/img/list-plus.svg" alt="" /> <span class="sr-only">Close</span></div>
		<div class="image"></div>
		<div class="row content">
			<div class="column medium-4 name"></div>
			<div class="column medium-8 bio"></div>
		</div>
		<div class="row team">
			<ul class="team-members block-grid small-block-grid-2 medium-block-grid-3">
				<?php
					if( !isset($team) ){
						$args = array(
							'post_type'      => 'team',
							'posts_per_page' => '-1',
							'order_by' 	     => 'menu_order',
							'order'			 => 'ASC'			
						);
						$team = new WP_Query($args);
					}
					if ( $team->have_posts() ):
						while ( $team->have_posts() ):
							$team->the_post();
							?>
							<li class="team-member" data-ref="<?php bloginfo('url'); ?>/wp-json/ps/v1/team/<?php echo $post->ID; ?>"><span class="name"><strong><?php the_title(); ?></strong><br/><?php the_papi_field('title'); ?></span></li>
							<?php
						endwhile;
					endif;
					wp_reset_postdata();
					
				?>
			</ul>
		</div>
	</div>
</div>
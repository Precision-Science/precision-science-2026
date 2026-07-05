<?php
	
	$post_id = $post->ID;
	$exclude_ids = array( $post_id );
	$include_tags = get_tag_ids( $post_id );

	$query_args = array(
		'post_type'  	=> 'post',
		'post-count' 	=> 3,
		'post__not_in' 	=> $exclude_ids,
		'tag__in' 		=> $include_tags
	);
	$the_query = new WP_Query( $query_args );
	if ( $the_query->have_posts() ): ?>
	<div class="post_related">
		<h2>You may also like</h2>
		<ul class="post_related-list">
		<?php while ( $the_query->have_posts() ):
				$the_query->the_post();
				?>
				<li class="row post_related-list-item padding-xso-bottom--md">
					<div class="column small-4 padding-xso-bottom--sm">
						<?php $feature_image = papi_get_field('feature_image'); ?>
						<a href="<?php the_permalink(); ?>"><img src="<?php echo $feature_image->url; ?>" alt="<?php echo $feature_image->alt; ?>" /></a>
					</div>
					<div class="column small-8">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					</div>
				</li>
		<?php endwhile; wp_reset_postdata(); ?>
		</ul>
	</div>
	<?php endif; ?>
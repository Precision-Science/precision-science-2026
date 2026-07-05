<?php
	global $fieldset;
	$feature_image = papi_get_field('feature_image');
?>



<article role="article" class="post_excerpt grid-container fadein" data-equalizer="" data-equalizer-mq="medium-up">
	<div class="row" style="position: static;">
		<div class="post-image column medium-6 <?php echo $fieldset['pos_left'] ?>" style="background-image:url(<?php echo $feature_image->url; ?>);" data-equalizer-watch>
		</div>
		<div class="post-content column medium-6 <?php echo $fieldset['pos_right'] ?>" data-equalizer-watch>
<!--
			<div class="table">
				<div class="cell">
-->
					<header>
						<h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php get_template_part('templates/post-meta'); ?>
					</header>
					<div class="post-summary">
						<p><?php echo get_the_excerpt(); ?>
					</div>
					<footer class="post-footer">
						<a class="btn btn-mint" href="<?php the_permalink(); ?>" target="_self">Read More</a>
						<br/><br/>
					</footer>
					
<!--
				</div>
			</div>
-->
		</div>
	</div>
</article>

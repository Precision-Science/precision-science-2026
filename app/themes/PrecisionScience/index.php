<?php get_template_part('templates/page-header','news'); ?>
<hr class="divide" />
<div class="blogroll grid-container">
	<?php
	
	//lr_order = handles push pull of post excerpt (image/text left/right)
	$lr_order = 0;
	  
	// The Loop
	if ( have_posts() ):
		?>
		<?php //if($wp_query->max_num_pages > 1): ?>
		<div class="row blog-controls collapse">
			<div class="column small-6 hide-for-xsmall-only">
				<!--FILTERING PLACEHOLDER-->
				&nbsp;
			</div>
			<div class="column small-6">
				<div class="blog-pagination">
				<?php
				if (function_exists("ps_pagination")) {
					ps_pagination($wp_query->max_num_pages,"",$wp_query->paged);
				}
				?>
				</div>
			</div>
		</div>
		<?php //endif; ?>
		<div class="posts">
		<?php
		while ( have_posts() ):
			the_post();
			
			$lr_order++;
			$fieldset['pos_left'] = ($lr_order % 2) ? 'medium-push-6' : '';
			$fieldset['pos_right'] = ($lr_order % 2) ? 'medium-pull-6' : '';
			
			get_template_part('templates/content','excerpt');
			
		endwhile;
		wp_reset_postdata();
		?>
		</div>
	<?php
	else:
		// no posts found
		_e('Sorry, no results were found.', 'sage');
	endif;
?>
</div>
<?php /*

<hr class="divide divide--mint"/>
<div class="row">
	<div class="column medium-6">
		<div class="padding-xsu-top--md">
			<div class="landingpage-contact row collapse">
			<?php
				set_query_var('landingpage_referrer', get_permalink());
				get_template_part('templates/form','landingpage');
			?>
			</div>
		</div>
	</div>
</div> 

*/ ?>
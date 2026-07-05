<?php
	
	global $fieldset;
	
	$img = papi_get_field($fieldset[2]);
?>
<hr class="divide" />
<article role="article" class="fragment-home fragment-home-row grid-container" style="background-color:<?php echo papi_get_field($fieldset[3]); ?>" data-equalizer data-equalizer-mq="small-up" data-scroll-show data-scroll-slide="fragment-home">
	<div class="row collapse">
		<div class="column small-6 image <?php echo $fieldset['pos_left'] ?>" data-equalizer-watch style="min-height:300px;background-image:url(<?php echo $img->url; ?>);background-size:cover;">
		</div>
		<div class="column small-6 text <?php echo $fieldset['pos_right'] ?>" data-equalizer-watch>
			<div class="table">
				<div class="cell">
					<h2 class="subheading"><?php echo papi_get_field($fieldset[0]); ?></h2>
					<?php echo papi_get_field($fieldset[1]); ?>
				</div>
			</div>
		</div>
	</div>
</article>
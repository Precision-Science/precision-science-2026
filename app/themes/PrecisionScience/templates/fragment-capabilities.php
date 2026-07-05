<?php
	global $fieldset;
?>
<hr class="divide" />
<article role="article" id="<?php echo strtolower( str_replace(' ','-', papi_get_field($fieldset[0])) ); ?>" class="grid-container fragment color-<?php echo str_replace('#','', papi_get_field($fieldset[2]) ); ?>" data-scroll-show data-scroll-slide="fragment-capabilities">
	<div class="row">
		<div class="column small-5" data-scroll-slide="capabilities">
			<h2><?php echo papi_get_field($fieldset[0]); ?></h2>
		</div>
		<div class="column small-7" data-scroll-slide="capabilities">
			<?php echo papi_get_field($fieldset[1]); ?>
		</div>
	</div>
</article>
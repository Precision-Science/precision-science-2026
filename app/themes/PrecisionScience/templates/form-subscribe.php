<?php
	
	if( is_home() && get_option( 'page_for_posts' ) ) { 
		$news_referrer = get_option( 'page_for_posts' ); 
	}else{
		$news_referrer = $post->ID;
	}	
	
?>
<form action="/wp-json/form/subscribe/add/simple" method="post" class="news_form" id="news_form">
	<input type="hidden" name="form" value="contact_form"/>
	<input type="hidden" name="contact_referrer" value="<?php echo get_permalink($news_referrer); ?>"/>
	<input type="hidden" name="autoreply" value="false"/>
	<div class="row">
		<div class="columns xsmall-12 output form-output"></div>
	</div>
	<div class="row">
		<div class="columns xsmall-6 small-5 contact_name">
			<label>Name&nbsp;<sup>*</sup>
				<input id="contact_name" class="field" name="contact_name" type="text" placeholder="Full Name">
			</label>
		</div>
		<div class="columns xsmall-6 small-4 contact_email_address">
			<label>Email Address&nbsp;<sup>*</sup>
				<input id="contact_email_address" class="field" name="contact_email_address" type="email" placeholder="Email Address" required>
			</label>
		</div>
		<div class="columns xsmall-12 small-3 submit">
			<label class="show-for-small-up">&nbsp;</label>
			<button id="news_form_recaptcha" class="g-recaptcha invisible-recaptcha btn">Subscribe</button>
	    </div>
    </div>
</form>
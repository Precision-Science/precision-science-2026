<form action="/wp-json/form/contact" method="post" class="landingpage_form" id="landing_form">
	<input type="hidden" name="form" value="contact_form"/>
	<input type="hidden" name="contact_referrer" value="<?php echo get_query_var('landingpage_referrer'); ?>"/>
	<input type="hidden" name="autoreply" value="true"/>
	<div class="row">
		<div class="columns xsmall-12 output output"></div>
	</div>
	<div class="row">
		<div class="columns xsmall-12 small-6 contact_first_name">
			<label>First Name&nbsp;<sup>*</sup>
				<input id="contact_first_name" class="field" name="contact_first_name" type="text" placeholder="First Name">
			</label>
		</div>
		<div class="columns xsmall-12 small-6 contact_last_name">
			<label>Last Name&nbsp;<sup>*</sup>
				<input id="contact_last_name" class="field" name="contact_last_name" type="text" placeholder="Last Name">
			</label>
		</div>
	</div>
	<div class="row">
		<div class="columns xsmall-12 small-6 contact_phone_number">
			<label>Phone Number&nbsp;<sup>*</sup>
				<input id="contact_phone_number" class="field" name="contact_phone_number" type="text" placeholder="Phone Number" required>
			</label>
		</div>
		<div class="columns xsmall-12 small-6 contact_email_address">
			<label>Email Address&nbsp;<sup>*</sup>
				<input id="contact_email_address" class="field" name="contact_email_address" type="email" placeholder="Email Address" required>
			</label>
		</div>
	</div>
	<div class="row">
		<div class="columns xsmall-12 small-6 contact_phone_number">
			<label>Company name&nbsp;<sup>*</sup>
			<input id="contact_company" class="field" name="contact_company" type="text" placeholder="Company name" required="">
			</label>
		</div>
		<div class="columns xsmall-12 small-6 contact_email_address">
			<label>URL&nbsp;<sup>*</sup>
				<input id="contact_url" class="field" name="contact_url" type="text" placeholder="Company website URL" required="">
			</label>
		</div>
	</div>
	
	<div class="row">
		<div class="columns xsmall-12 contact_comments">
			<label>How can we help?
				<textarea id="contact_comments" class="field" name="contact_comments" placeholder="Comments"></textarea>
			</label>
		</div>
	</div>
    <div class="row">
		<div class="columns xsmall-12 submit">
			<button id="landingpage_form_recaptcha" class="g-recaptcha invisible-recaptcha btn btn-mint">Submit</button>
<!--
	        <button class="g-recaptcha btn btn-mint"
				data-sitekey="<?php echo get_option('recaptcha_client_key'); ?>"
				data-badge="inline"
				data-callback="landingpage_form_submit">Submit
			</button>
-->
	    </div>
    </div>
</form>
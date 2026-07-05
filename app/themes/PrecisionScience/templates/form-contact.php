<style>
	#contact_form input,
	#contact_form textarea,
	#contact_form .checkmark{ 
		background:rgb(250,250,250);
	}
	#contact_form .checkbox{
		margin-bottom: 17px;
	}
	#contact_form select{
		border-color: #ccc;
		box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
	}
</style>
<form action="/wp-json/form/contact" method="post" id="contact_form" style="padding-bottom:32px;">
	<input type="hidden" name="contact_referrer" value="Website contact form"/>
	<input type="hidden" name="form" value="contact_form"/>
	<input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response">
    <input type="hidden" name="action" value="validate_captcha">
	<div class="row">
		<div class="columns xsmall-12 output"></div>
	</div>
	<div class="row">
		<div class="columns xsmall-12 medium-6 contact_first_name">
			<label>First Name&nbsp;<sup>*</sup>
				<input id="contact_first_name" class="field" name="contact_first_name" type="text" placeholder="Your first Name">
			</label>
		</div>
		<div class="columns xsmall-12 medium-6 contact_last_name">
			<label>Last Name&nbsp;<sup>*</sup>
				<input id="contact_last_name" class="field" name="contact_last_name" type="text" placeholder="Your last Name">
			</label>
		</div>
	</div>
	<div class="row">
		<div class="columns xsmall-12 medium-6 contact_phone_number">
			<label>Phone Number&nbsp;<sup>*</sup>
				<input id="contact_phone_number" class="field" name="contact_phone_number" type="text" placeholder="Your phone number" required>
			</label>
		</div>
		<div class="columns xsmall-12 medium-6 contact_email_address">
			<label>Email Address&nbsp;<sup>*</sup>
				<input id="contact_email_address" class="field" name="contact_email_address" type="email" placeholder="Your email address" required>
			</label>
		</div>
		<div class="columns xsmall-12 medium-6 contact_company">
			<label>Company&nbsp;<sup>*</sup>
				<input id="contact_company" class="field" name="contact_company" type="text" placeholder="Company name" required>
			</label>
		</div>
		<div class="columns xsmall-12 medium-6 contact_url">
			<label>URL&nbsp;<sup>*</sup>
				<input id="contact_url" class="field" name="contact_url" type="text" placeholder="Company website URL" required>
			</label>
		</div>
	</div>
	<div>
	<div class="row">
		<div class="columns xsmall-12">
			<p class="checkbox-group-label type-small">What are you making?</p>
			<div class="row">
				<div class="columns xsmall-12 small-6">
					<div class="row collapse">
						<div class="columns xsmall-12 small-6">
							<label class="checkbox" for="contact_soft_chews">
								<input type="checkbox" id="contact_soft_chews" name="contact_soft_chews" value="Soft chews">
								<span class="checkmark"></span>
								Soft Chews
							</label>
						</div>
						<div class="columns xsmall-12 small-6">
							<label class="checkbox" for="contact_powders">
								<input type="checkbox" id="contact_powders" name="contact_powders" value="Powders">
								<span class="checkmark"></span>
								Powders
							</label>
						</div>
					</div>
					<div class="row collapse">
						<div class="columns xsmall-12 small-6">
							<label class="checkbox" for="contact_pellets">
								<input type="checkbox" id="contact_pellets" name="contact_pellets" value="Pellets">
								<span class="checkmark"></span>
								Pellets
							</label>
						</div>
						<div class="columns xsmall-12 small-6">
							<label class="checkbox" for="contact_liqud">
								<input type="checkbox" id="contact_liqud" name="contact_liqud" value="Liquid">
								<span class="checkmark"></span>
								Liquids
							</label>
						</div>
					</div>
				</div>
				<div class="columns xsmall-12 small-6">
					<label>
						Other
						<input type="text" id="contact_other_desc" name="contact_other_desc" placeholder="Other">
					</label>
				</div>
			</div>
		</div>
	</div>	
	<div class="row">
		<div class="columns xsmall-12">
			<p class="dropdown-group-label type-small">Is your product Regulated?</p>
			<div>
				<label class="dropdown" for="contact_regulated">
					<select id="contact_regulated" class="field" name="contact_regulated">
						<option value="Pharmaceutical">Pharmaceutical (regulated)</option>
						<option value="Supplement">Supplement (non-regulated)</option>
					</select>
				</label>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="columns xsmall-12">
			<p class="dropdown-group-label type-small">Is this product new or existing?</p>
			<div>
				<label class="dropdown" for="contact_product">
					<select id="contact_product" class="field" name="contact_product">
						<option value="New Product">New Product</option>
						<option value="Transfer of Existing Product">Transfer of Existing Product</option>
					</select>
				</label>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="columns xsmall-12 medium-6 contact_quantity">
			<label>Initial Order Quantity
				<input id="contact_quantity" class="field" name="contact_quantity" type="text" placeholder="Initial order quantity">
			</label>
		</div>
		<div class="columns xsmall-12 medium-6 contact_volume">
			<label>Estimated Annual Volume
				<input id="contact_volume" class="field" name="contact_volume" type="text" placeholder="Estimated annual volume">
			</label>
		</div>
	</div>
	<div class="row">
		<div class="columns xsmall-12 contact_comments">
			<label>How can we help?
				<textarea id="contact_comments" class="field" name="contact_comments" placeholder="Comments" required></textarea>
			</label>
		</div>
	</div>
    <div class="row">
		<div class="columns xsmall-6 submit">
	        <button id="submitbtn" class="btn btn-mint">Submit</button>
	    </div>
    </div>
</form>
<?php global $post; ?>
<head profile="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content="text/html" http-equiv="Content-Type">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
    <?php if( strlen(get_option('google-site-verification')) > 0 ): ?>
    <meta name="google-site-verification" content="<?php echo get_option('google_site_verification') ?>" />
    <?php endif; ?>
    <script>
		var app_domain ="<?php echo get_site_url(); ?>";
		var site_title = "<?php echo get_bloginfo("name"); ?>";
		var thankyou_url = "<?php echo get_option("salesforce_returl"); ?>";
		var social_message = "<?php echo get_option("social_message"); ?>";
		var recaptcha_client_key = "<?php echo get_option("recaptcha_client_key"); ?>";
		var debug = "<?php print_r(WP_DEBUG); ?>";
	</script>
	<style>
		.block-grid{
			display: flex;
			justify-content: center;
			flex-wrap: wrap;
		}
		#content{padding-bottom:0;}
		#footer{margin-top:0;}
	</style>
</head>
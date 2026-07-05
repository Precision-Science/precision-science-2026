<?php 
	
	$contact_page_id = 110;	
	$args = array('page_id'=>	$contact_page_id);
	$contact = new WP_Query($args);
	if ( $contact->have_posts() ):
		while ( $contact->have_posts() ):
			$contact->the_post();
			$slugs = papi_get_slugs();
?>
<script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Manufacturer",
      "name": "<?php bloginfo('name'); ?>",
      "url": "<?php bloginfo('url'); ?>",
      "logo": "<?php echo esc_url( home_url( '/' ) );?>app/themes/PrecisionScience/dist/img/logo-color.svg",
      "address": {
	    "@type": "PostalAddress",
	    "streetAddress": "<?php the_papi_field('street'); ?>",
	    "addressLocality": "<?php the_papi_field('city'); ?>",
	    "addressRegion": "<?php the_papi_field('state'); ?>",
	    "postalCode": "<?php the_papi_field('zip'); ?>",
	    "addressCountry": "<?php the_papi_field('country'); ?>"
	  },
	  <?php
		  $phones = papi_get_field('phone_numbers');
		  foreach($phones as $key => $phone):
	  ?>
      "contactPoint" : [{
	    "@type" : "ContactPoint",
	    "areaServed": "<?php echo $phone['label']; ?>",
	    "telephone" : "<?php echo $phone['phone_number_func']; ?>",
	    "contactType" : "customer service"
	  }],
	  <?php endforeach; ?>
    }
</script>
<?php endwhile; endif; ?>
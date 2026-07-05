<header role="banner" id="banner">
	<div id="top">
		<div class="row">
			<div class="column xsmall-6 small-6" style="padding-right:0;">
				<p class="desc"><?php echo bloginfo('description');?></p>
			</div>
			<div class="column xsmall-6 small-6" style="padding-left:0;">
				<div class="contact text-right">
					<span class="careers">
						<a href="https://precisionscience.com/careers">Careers</a>
					</span>
					<span class="email">
						<button data-target="modal-contact"><img alt="" src="<?php echo get_template_directory_uri();?>/dist/img/icon-email.svg"/>Email Us</button>
					</span>
					<span class="call">
						<span><img alt="" src="<?php echo get_template_directory_uri();?>/dist/img/icon-phone.svg"/>Call Us</span>
						<div class="dropdown">
							<ul>
							<?php 	
							$contact_page_id = 110;	

								$phones = papi_get_field($contact_page_id,'phone_numbers');
								foreach($phones as $key => $phone):
							?>
								<li><a href="tel:<?php echo $phone['phone_number_func']; ?>"><span><?php echo $phone['label']; ?></span><span><?php echo $phone['phone_number_pretty']; ?></span></a>
							<?php endforeach; ?>
							</ul>
						</div>
					</span>
				</div>
			</div>
		</div>
	</div>
	<div id="header">
		<div class="row">
			<div class="column xsmall-12 small-6 medium-4">
				<a class="brand" title="Home" data-slug="page28" data-id="28" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="" src="<?php echo get_template_directory_uri();?>/dist/img/logo-color.svg?v=tm" alt="<?php bloginfo('name'); ?>"/></a>
			</div>
			<div class="column xsmall-12 small-6 medium-8">
				<nav id="navigation" role="">
					<?php
						if (has_nav_menu('primary_navigation')) :
							wp_nav_menu([
								'theme_location' => 'primary_navigation', 
								'container_class' => 'nav-container',
								'menu_class' => 'nav',
								'walker' => new wp_sage_navwalker()
							]);
						endif;
					?>
					<div class="breadcrumb">
						<span class="page"><?php 
							if( is_front_page() ){
								echo '';	
							}else if( is_404() ) {
								echo 'Error 404';
							}else if( is_blog() || is_home() ){
								echo 'News';
							}else{
								echo $post->post_title;
							}
						?></span></div>
					<div class="menu">
						<span class="icon">
							<img src="<?php echo get_template_directory_uri();?>/dist/img/menu-plus.svg" alt=""/>
						</span>
						<span class="labels">
							<span class="label closed">Menu</span>
							<span class="label opened">Close</span>
						</span>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>
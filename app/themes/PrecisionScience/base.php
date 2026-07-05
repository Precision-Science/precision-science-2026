<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

$blog_class = (is_blog()) ? 'blog' : '';
$news_class = (is_home()) ? 'news page261' : '';
/*
if( is_404() ) {
	$body_id = 'error404';
}else{
	$body_id = $post->post_name;
}
*/
if(is_home()){
	$id = get_option( 'page_for_posts' );
	$post = null;
	$post = get_post( $id );
	$body_id = 'page'.get_option( 'page_for_posts' );
}else{
	$body_id = 'page'.$post->ID;
}

?>

<!doctype html>
<html <?php language_attributes(); ?>>
	<?php get_template_part('templates/head'); ?>
	<body id="<?php echo $body_id; ?>" <?php body_class("initOut $news_class $blog_class"); ?> data-slug="page<?php echo $post->ID; ?>" data-title="<?php echo $post->post_title; ?>" data-id="<?php echo $post->ID; ?>">
		<?php wp_body_open(); ?>
		<!-- <?php echo get_page_template(); ?> -->
		<div id="page" class="">
			<?php
				do_action('get_header');
				get_template_part('templates/header');
		    ?>
			
			<hr class="divide" />
			
			<main id="content" role="main" class="">
				
				<?php include Wrapper\template_path(); ?>
				
			</main>
			
			<hr class="divide" />
			<?php
				get_template_part('templates/footer');	
			?>
		</div>
		<?php
			do_action('get_footer');
			wp_footer();
		?>
	</body>
</html>
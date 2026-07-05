<?php

namespace Roots\Sage\Setup;

use Roots\Sage\Assets;

/**
 * REQUIRE PLUGINS
 */
function theme_dependencies() {
	$plugins = ['disable-comments','backupwordpress','papi-3.0','papi-rest-api','roots-soil','wordpress-seo'];
	foreach($plugins as $plugin){
	  if( ! function_exists($plugin) )
	    echo '<div class="error"><p>' . __( 'Warning: The PrecisionScience theme needs Plugin X to function', $plugin ) . '</p></div>';
	}
}
//add_action( 'admin_notices', __NAMESPACE__ . '\\theme_dependencies' );
 
/**
 * Theme setup
 */
function setup() {
  // Enable features from Soil when plugin is activated
  // https://roots.io/plugins/soil/

  if (!is_admin()) add_theme_support('soil-clean-up');
  if (!is_admin()) add_theme_support('soil-relative-urls');

  // Make theme available for translation
  // Community translations can be found at https://github.com/roots/sage-translations
  load_theme_textdomain('sage', get_template_directory() . '/lang');

  // Enable plugins to manage the document title
  // http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
  add_theme_support('title-tag');

  // Register wp_nav_menu() menus
  // http://codex.wordpress.org/Function_Reference/register_nav_menus
  register_nav_menus([
    'primary_navigation' => __('Primary Navigation', 'sage'),
  ]);

  // Enable post thumbnails
  // http://codex.wordpress.org/Post_Thumbnails
  // http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
  // http://codex.wordpress.org/Function_Reference/add_image_size
  //add_theme_support('post-thumbnails');

  // Enable post formats
  // http://codex.wordpress.org/Post_Formats
  //add_theme_support('post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio']);

  // Enable HTML5 markup support
  // http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
  add_theme_support('html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form']);

  // Use main stylesheet for visual editor
  // To add custom styles edit /assets/styles/layouts/_tinymce.scss
  add_editor_style(Assets\asset_path('css/app.css'));
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register sidebars
 */
function widgets_init() {

  register_sidebar([
    'name'          => __('Footer', 'sage'),
    'id'            => 'contact-footer',
    'before_widget' => '<ul>',
    'after_widget'  => '</li></ul>',
    'before_title'  => '<li>',
    'after_title'   => ''
  ]);
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Determine which pages should NOT display the sidebar
 */
function display_sidebar() {
  static $display;

  isset($display) || $display = !in_array(true, [
    // The sidebar will NOT be displayed if ANY of the following return true.
    // @link https://codex.wordpress.org/Conditional_Tags
    is_404(),
    is_front_page()
  ]);

  return apply_filters('sage/display_sidebar', $display);
}

/**
 * Theme assets
 */
function assets() {
  $app_styles = (WP_ENV == '_dev') ? 'app.css' : 'app.min.css';
  wp_enqueue_style('sage/css', Assets\asset_path('css/' . $app_styles), false, '2.5', null);
  wp_enqueue_style('video/css', Assets\asset_path('css/video-js.min.css'), false, '7.19.2', null);

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
  
  wp_dequeue_script( 'wp_embed' );
  
  wp_enqueue_script('sage/jquery', Assets\asset_path('js/jquery.min.js'), false, '2.2.4', true);
  wp_enqueue_script('sage/preloaderjs', Assets\asset_path('js/preloadjs.min.js'), false,  '1.0.1', true);
  wp_enqueue_script('sage/plugins', Assets\asset_path('js/plugins.js'), false, '2.5', true);
  wp_enqueue_script('video/js', Assets\asset_path('js/video.min.js'), false, '7.19.2', true);
  wp_enqueue_script('sage/util', Assets\asset_path('js/util.js'), false, '2.6', true);
  wp_enqueue_script('sage/app', Assets\asset_path('js/app.js'), ['video/js', 'sage/util'], '2.6', true);
  wp_enqueue_script('sage/modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', false, null);
  wp_enqueue_script('sage/recaptcha', 'https://www.google.com/recaptcha/api.js?render='.get_option("recaptcha_client_key"), false, null, true);
   
  wp_enqueue_script('','');
 
  
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 80);


/** 
 * ASYNC JS
 */
function defer_js( $url ) {
    //if ( is_user_logged_in() ) return $url; //don't break WP Admin
    if ( FALSE === strpos( $url, '.js' ) ) return $url;
    if ( strpos( $url, 'recaptcha' ) ) return $url;
    return str_replace( ' src', ' async defer src', $url );
}
//if (!is_admin()) add_filter( 'script_loader_tag', __NAMESPACE__ . '\\defer_js', 10 );

/*
function rel_preload($html, $handle, $href, $media) {
    
    if (is_admin())
        return $html;

    $html = "<link rel='preload' as='style' onload=\"this.onload=null;this.rel='stylesheet'\" id='$handle' href='$href' type='text/css' media='all' />"
    return $html;
}
*/
//add_filter( 'style_loader_tag', __NAMESPACE__ . '\\rel_preload', 10, 4 );

/**
 * SEO Schema
 */
//add_action('wp_head', __NAMESPACE__ . '\\attach_schema',1);
function attach_schema(){
	get_template_part('templates/head','schema');
}

/**
 * ShareThis
 */
function share_this() { ?>

<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=<?php echo get_option('sharethis_id') ?>&product=sop' async='async'></script>

<?php }

/**
 * Google Analytics
 */
function google_analytics() {
  if(strlen( get_option('ga_id') ) > 0):
?>
<script>

	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');		
	
	ga('create', '<?php echo get_option('ga_id'); ?>', 'auto');
	ga('send', 'pageview');

</script>
<?php 
  endif;
}
//Removed and replaced with GTM
//add_action( 'wp_footer', __NAMESPACE__ . '\\google_analytics', 90);

/**
 * Google Tag Manager
 */
function google_tagmanager_header() {   
  if(strlen( get_option('gtm_id') ) > 0):
?>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','<?php echo get_option('gtm_id'); ?>');</script>
<!-- End Google Tag Manager -->
<?php 
  endif;
}
add_action( 'wp_head', __NAMESPACE__ . '\\google_tagmanager_header', 0);

function google_tagmanager_body() { 
  if(strlen( get_option('gtm_id') ) > 0):
?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PRQZ46N"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php 
  endif;
}
add_action( 'wp_body_open', __NAMESPACE__ . '\\google_tagmanager_body', 0 );

/**
 * Google Tag
 */
function google_tag_header() {   
  if(strlen( get_option('gtag_id') ) > 0):
?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo get_option('gtag_id'); ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', '<?php echo get_option('gtag_id'); ?>');
  </script>
<?php 
  endif;
}
//add_action( 'wp_head', __NAMESPACE__ . '\\google_tag_header', 1);

/**
 * FACEBOOK
 */
function share_routine() { ?>
<script>
(function(){$('.ctrl-share').on('click',function(event){
		event.preventDefault();
		shareRoutine( $(this) );
	});
})
</script>
	
<?php }
add_action( 'wp_footer', __NAMESPACE__ . '\\share_routine', 90);

/**
 * BrowserSync - DEV ONLY
 */

function browser_sync_client() { ?>

<script type='text/javascript' id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.2.11.0.js'><\/script>".replace("HOST", location.hostname));
//]]></script>

<?php }
//add_action( 'wp_footer', __NAMESPACE__ . '\\browser_sync_client', 100 );
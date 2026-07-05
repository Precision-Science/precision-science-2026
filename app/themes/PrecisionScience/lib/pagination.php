<?php
	
/**
 * Pagination
 */
function ps_pagination($numpages = '', $pagerange = '', $paged='') {

	if (empty($pagerange)) {
		$pagerange = 2;
	}
	
	
	global $paged;
	if (empty($paged)) {
		$paged = 1;
	}
	if ($numpages == '') {
		global $wp_query;
		$numpages = $wp_query->max_num_pages;
		if(!$numpages) {
		    $numpages = 1;
		}
	}
	
	$big = 999999999; // need an unlikely integer
	$translated = __( 'Page', 'mytextdomain' ); // Supply translatable string
	
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, $paged ),
		'prev_text'       => '<span class="blog-btn--prev">&laquo;</span>'.'<span class="sr-only">Previous</span>',
		'next_text'       => '<span class="sr-only">Next</span>'.'<span class="blog-btn--next">&raquo;</span>',
		'total' => $numpages,
	    'before_page_number' => '<span class="sr-only">'.$translated.' </span>'
	) );
	


}
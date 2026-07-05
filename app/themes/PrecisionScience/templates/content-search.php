<article <?php post_class('search-result column xsmall-12'); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>
  <div class="entry-summary">
     <?php
	    if (get_post_type() === 'team') { 
	    	get_template_part('templates/search-team');
	    }else if( get_post_type() === 'page' ){
		    get_template_part('templates/search-page');
	    }else{
		    get_template_part('templates/search-post');
	    }
	?>
  </div>
</article>

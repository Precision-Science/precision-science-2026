<?php while ( have_posts() ) : the_post(); ?>
<div class="row">
    <!-- TITLE -->
    <div class="column medium-5">
        <h1><?php the_papi_field('intro_title'); ?></h1>
        <p><?php the_papi_field('intro_text'); ?></p>
        <p><br/><a href="/contact" class="btn btn-mint">Contact us</a></p>
    </div>
    <!-- QUESTIONS -->
    <div class="column medium-7">
        <?php	
            $question_arr = papi_get_field('faq_item');
            foreach($question_arr as $key => $item):
                get_template_part('templates/fragment','faq-question');
            endforeach;
        ?>
    </div>
</div>
<?php endwhile; ?>
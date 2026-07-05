<?php

    function opengraph_default_title( $title ) {
        global $wp_query;
        global $post;

        if( isset($wp_query->query['utm']) ) {
            $img_obj = papi_get_field($post->ID, $wp_query->query['utm']);
            $title = $img_obj->description;
        }else{
            $title = papi_get_field($post->ID, 'social_title');
        } 
        return esc_attr( $title );
    }
    function opengraph_default_image( $image ) {
        global $wp_query;
        global $post;

        $share_id = isset($wp_query->query['utm']) ? $wp_query->query['utm'] : 'social_image_1';
        $img = papi_get_field($post->ID, $share_id);
        echo '<meta property="og:image" content="'.$img->url.'" />';
    }
    function opengraph_default_description( $description ) {
        global $wp_query;
        global $post;

        $share_id = isset($wp_query->query['utm']) ? $wp_query->query['utm'] : 'social_image_1';
        $desc= papi_get_field($post->ID, 'social_desc');
        return esc_attr( $desc );
    }
    function opengraph_default_url( $url ) {
        global $wp_query;
        global $post;

        $share_id = isset($wp_query->query['utm']) ? $wp_query->query['utm'] : 'social_image_1';
        $url= get_permalink($post->ID).'?utm='.$share_id;
        return esc_attr( $url );
    }
    function careershare_meta() {
        global $post;
        if($post->ID == 498){
            add_filter( 'wpseo_opengraph_title', __NAMESPACE__  . '\\opengraph_default_title', 1 );
            add_filter( 'wpseo_frontend_presenters', __NAMESPACE__  . '\\opengraph_default_image', 1 );
            add_filter( 'wpseo_opengraph_desc', __NAMESPACE__  . '\\opengraph_default_description', 1 );
            add_filter( 'wpseo_opengraph_url', __NAMESPACE__  . '\\opengraph_default_url', 1 );
        }
    }
    add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\careershare_meta');
?>
<?php

defined( 'ABSPATH' ) or die( "No script kiddies please!" );
if ( isset( $et_option[ 'et_post_excerpt' ] ) ) {
    $excerpt = $et_option[ 'et_post_excerpt' ];
}
if ( isset( $et_option[ 'et_post_number' ] ) ) {
    $post_number = $et_option[ 'et_post_number' ];
} else {
    $post_number = 4;
}

$order = 'DESC';
$order_by = 'date';
if ( isset( $et_option[ 'et_select_post_status' ] ) ) {
    $status = $et_option[ 'et_select_post_status' ];
} else {
    $status = 'publish';
}
if ( isset( $et_option[ 'et_date_format_post' ] ) ) {
    $date_format = $et_option[ 'et_date_format_post' ];
}
if ( isset( $et_option[ 'post_type' ] ) ) {
    $post_type = $et_option[ 'post_type' ];
}


/*
 * Condition for taxonomy
 */
if ( isset( $et_option[ 'et_show_taxonomy_query' ] ) && $et_option[ 'et_show_taxonomy_query' ] == '1' ) {
    $tax = $et_option[ 'select_post_taxonomy' ];
    if ( $et_option[ 'taxonomy_queries_type' ] == 'simple-taxonomy' ) {
        if ( $et_option[ 'simple_taxonomy_terms' ] == '' ) {
            $terms = get_terms( $tax, array( 'hide_empty' => false ) );
            $term_ids = wp_list_pluck( $terms, 'term_id' );
            $id = implode( ", ", array_keys( $term_ids ) );
            $tax_query = array( array(
                    'taxonomy' => $tax,
                    'field' => 'term_id',
                    'terms' => array( $id )
                ), );
        } else {
            $simple_term = $et_option[ 'simple_taxonomy_terms' ];
            $tax_query = array( array(
                    'taxonomy' => $tax,
                    'field' => 'term_id',
                    'terms' => $simple_term
                ), );
        }
    }
    /*
     * multiple taxonomy tax query
     */ else {
        $relation = $et_option[ 'et_multiple_tax_relation' ];
        $first_term_array = $et_option[ 'taxonomy_terms' ];
        $first_term_list = substr( implode( ", ", $first_term_array ), 0 );
        $blog_array = array( 'relation' => $relation );
        $blog_array[] = array(
            'taxonomy' => $tax,
            'field' => 'term_id',
            'terms' => array( $first_term_list ),
        );
        foreach ( $et_option[ 'et_blog' ] as $blog_key => $blog_detail ) {
            $tax = $et_option[ 'et_blog' ][ $blog_key ][ 'multiple_post_taxonomy' ];
            $operator = $et_option[ 'et_blog' ][ $blog_key ][ 'et_terms_operator' ];
            $term = $et_option[ 'et_blog' ][ $blog_key ][ 'multiple_taxonomy_terms' ];
            $term_collection = substr( implode( ", ", $term ), 0 );
            if ( isset( $et_option[ 'et_blog' ][ $blog_key ][ 'et_enable_operator' ] ) && $et_option[ 'et_blog' ][ $blog_key ][ 'et_enable_operator' ] == '1' ) {
                $blog_array[] = array(
                    'taxonomy' => $tax,
                    'field' => 'term_id',
                    'terms' => array( $term_collection ),
                    'operator' => $operator,
                );
            } else {
                $blog_array[] = array(
                    'taxonomy' => $tax,
                    'field' => 'term_id',
                    'terms' => array( $term_collection ),
                );
            }
        }

        $tax_query[] = $blog_array;
    }
}


$args = array(
    'post_type' => $post_type,
    'order' => $order,
    'orderby' => $order_by,
    'posts_per_page' => $post_number,
    'post_status' => $status
        //'paged' => $paged
);
if ( ! empty( $tax_query ) ) {
    $args[ 'tax_query' ] = $tax_query;
}


include(ETLAK_PATH . 'inc/frontend/et-template.php');

<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$query = new WP_Query( $args );
$rowCount = $query -> found_posts;
$class_layout = 'et-layout-' . $et_option[ 'timeline_layout' ] . '-section';

if ( $query -> have_posts() ) {
    $current_date = '';
    if ( isset( $et_option[ 'timeline_layout' ] ) && $et_option[ 'timeline_layout' ] == 'vertical' || $et_option[ 'timeline_layout' ] == 'one_side' ) {
        ?>
        <div class="et-clearfix et-blog-cover">
            <?php
            $toggle_number = 0;
            $id_array = array();
            $font_array = array();
            while ( $query -> have_posts() ) {
                $query -> the_post();
                $timeline_post_id=get_the_ID();
                $et_extra_option = get_post_meta( $timeline_post_id, 'et_extra_option', true );
                $timeline_date = get_the_date( 'Y' );
                $id_num = $this -> etlak_generate_random_string( 10 );
                $id = $id_array[] = 'et_' . $id_num;

                if ( $et_option[ 'timeline_layout' ] == 'vertical' ) {
                    include(ETLAK_PATH . 'inc/frontend/content/et-vertical.php');
                } else {
                    include(ETLAK_PATH . 'inc/frontend/content/et-one-side.php');
                    $toggle_number ++;
                }
            }
            ?>
        </div>
        <?php
    }
} else {
    _e( 'No post found', ETLAK_TD );
}
wp_reset_postdata();

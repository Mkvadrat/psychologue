<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$post_id = $atts[ 'id' ];
//global $post;
$et_option = get_post_meta( $post_id, 'et_option', true );
$random_num = rand( 111111111, 999999999 );
$class_layout = 'et-layout-' . $et_option[ 'timeline_layout' ] . '-section';
if ( isset( $et_option[ 'timeline_layout' ] ) && $et_option[ 'timeline_layout' ] == 'vertical' ) {
    $et_layout_class = 'et-vertical-timeline' . ' et-ver-timeline-' . $et_option[ 'timeline_vertical_template' ];
} else {
    $et_layout_class = 'et-' . $et_option[ 'timeline_oneside_position' ] . '-timeline' . ' et-one-side-' . $et_option[ 'timeline_one_side_template' ];
}
?>
<div class="et-post-outer-wrapper-<?php echo $random_num; ?>
     et-main-blog-wrapper <?php echo esc_attr( $et_layout_class ); ?>"

     data-id="et_<?php
     echo rand( 1111111, 9999999 );
     ?>">
    <div class="<?php echo esc_attr( $class_layout ); ?>">
        <?php
        include(ETLAK_PATH . 'inc/frontend/et-post/wp-post.php');
        ?>
    </div>
</div>




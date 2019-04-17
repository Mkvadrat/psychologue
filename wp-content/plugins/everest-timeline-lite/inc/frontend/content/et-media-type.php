<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$image = isset( $et_option[ 'et_image_size' ] ) ? esc_attr( $et_option[ 'et_image_size' ] ) : 'full';
$src = wp_get_attachment_image_src( get_post_thumbnail_id( $timeline_post_id ), 'full', false );
?>
<div class="et-image"><?php if ( has_post_thumbnail( $timeline_post_id ) ) {
    ?>
        <a href="<?php echo get_permalink( $timeline_post_id ); ?>" target="_blank"><?php echo get_the_post_thumbnail( $timeline_post_id, $image ); ?></a>

        <?php
    } else {
        ?>
        <img src="<?php echo ETLAK_IMG_DIR; ?>/no-image-available.png" alt="No image available">
        <?php
    }
    ?></div>

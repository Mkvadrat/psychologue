<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<html>
    <head>
        <title><?php _e( 'Preview Timeline', ETLAK_TD ); ?></title>
        <?php wp_head(); ?>
        <style>
            body:before{display:none !important;}
            body:after{display:none !important;}
            body{background:#F1F1F1 !important;}
        </style>
    </head>
    <body>
        <div class="et-preview-main-container">
            <div class="et-preview-title-wrap">
                <div class="et-preview-title"><?php _e( 'Preview Mode', ETLAK_TD ); ?></div>
            </div>
            <div class="et-preview-note"><?php _e( 'This is just the basic preview and it may look different when used in frontend as per your theme\'s styles.', ETLAK_TD ); ?></div>
            <div class="et-form-preview-wrap">
                <?php
                $blog_id = intval( sanitize_text_field( $_GET[ 'blog_id' ] ) );

                echo do_shortcode( '[et id="' . $blog_id . '"]' );
                ?>
            </div>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>


<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
global $post;
$post_id = $post -> ID;
$et_option = get_post_meta( $post_id, 'et_option', true );
?>
<div class="et-backend-outer-wrap">
    <div class="et-menu-wrapper">
        <ul class="et-menu-tab">
            <li data-menu="post-settings" class="et-tab-tigger et-active">
                <span class="dashicons dashicons-welcome-write-blog"></span>
                <?php _e( 'Post Settings', ETLAK_TD ) ?>
            </li>
            <li data-menu="layout-settings" class="et-tab-tigger">
                <span class="dashicons dashicons-layout"></span>
                <?php _e( 'Layout Settings', ETLAK_TD ) ?>
            </li>
            <li data-menu="general-settings" class="et-tab-tigger">
                <span class="dashicons dashicons-admin-generic"></span>
                <?php _e( 'General Settings', ETLAK_TD ) ?>
            </li>
            <li data-menu="social-share-settings" class="et-tab-tigger">
                <span class="dashicons dashicons-share"></span>
                <?php _e( 'Social Share Settings', ETLAK_TD ) ?>
            </li>

        </ul>
    </div>
    <div class ="et-settings-wrap et-active-container" data-menu-ref="post-settings">
        <?php include(ETLAK_PATH . 'inc/admin/settings/et-post.php'); ?>
    </div>
    <div class ="et-settings-wrap" data-menu-ref="layout-settings">
        <?php include(ETLAK_PATH . 'inc/admin/settings/et-layout.php'); ?>
    </div>
    <div class ="et-settings-wrap" data-menu-ref="general-settings">
        <?php include(ETLAK_PATH . 'inc/admin/settings/et-general.php'); ?>
    </div>
    <div class ="et-settings-wrap" data-menu-ref="social-share-settings">
        <?php include(ETLAK_PATH . 'inc/admin/settings/et-social.php'); ?>
    </div>

</div>




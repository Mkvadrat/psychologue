<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="et-layout-outer-wrap">
    <div class="et-timeline-setting-wrap">
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Timeline Layout', ETLAK_TD ); ?></label>
            <div class="et-post-field-wrap">
                <select name="et_option[timeline_layout]" class="et-timeline-layout">
                    <option value="vertical"  <?php if ( isset( $et_option[ 'timeline_layout' ] ) && $et_option[ 'timeline_layout' ] == 'vertical' ) echo 'selected=="selected"'; ?>><?php _e( 'Vertical Timeline Layout', ETLAK_TD ) ?></option>
                    <option value="one_side"  <?php if ( isset( $et_option[ 'timeline_layout' ] ) && $et_option[ 'timeline_layout' ] == 'one_side' ) echo 'selected=="selected"'; ?>><?php _e( 'One Side Timeline Layout', ETLAK_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class="et-vertical-wrap">
            <div class ="et-post-option-wrap">
                <label><?php _e( 'Vertical Template', ETLAK_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <select name="et_option[timeline_vertical_template]" class="et-vertical-template">
                        <?php for ( $k = 1; $k <= 2; $k ++ ) { ?>
                            <option value="template-<?php echo $k; ?>" <?php if ( ! empty( $et_option[ 'timeline_vertical_template' ] ) ) selected( $et_option[ 'timeline_vertical_template' ], 'template-' . $k ); ?>><?php _e( 'Template ', ETLAK_TD ) ?><?php echo $k; ?></option>
                        <?php } ?>    </select>
                    <div class="et-vertical-timeline-demo et-preview-image">
                        <?php
                        for ( $cnt = 1; $cnt <= 2; $cnt ++ ) {
                            if ( isset( $et_option[ 'timeline_vertical_template' ] ) ) {
                                $option_value = $et_option[ 'timeline_vertical_template' ];
                                $exploed_array = explode( '-', $option_value );
                                $cnt_num = $exploed_array[ 1 ];
                                if ( $cnt != $cnt_num ) {
                                    $style = "style='display:none;'";
                                } else {
                                    $style = '';
                                }
                            }
                            ?>
                            <div class="et-vertical-timeline-common" id="et-vertical-timeline-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                                <h4><?php _e( 'Template', ETLAK_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', ETLAK_TD ); ?></h4>
                                <img src="<?php echo ETLAK_IMG_DIR . '/demo/vertical/' . 'v' . $cnt . '.jpg' ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="et-one-side-wrap" style="display: none;">
            <div class ="et-post-option-wrap">
                <label><?php _e( 'One Side Template', ETLAK_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <select name="et_option[timeline_one_side_template]" class="et-one-side-template">
                        <?php for ( $k = 1; $k <= 2; $k ++ ) { ?>
                            <option value="template-<?php echo $k; ?>" <?php if ( ! empty( $et_option[ 'timeline_one_side_template' ] ) ) selected( $et_option[ 'timeline_one_side_template' ], 'template-' . $k ); ?>><?php _e( 'Template ', ETLAK_TD ) ?><?php echo $k; ?></option>
                        <?php } ?>    </select>
                    <div class="et-one-side-timeline-demo et-preview-image">
                        <?php
                        for ( $cnt = 1; $cnt <= 2; $cnt ++ ) {
                            if ( isset( $et_option[ 'timeline_one_side_template' ] ) ) {
                                $option_value = $et_option[ 'timeline_one_side_template' ];
                                $exploed_array = explode( '-', $option_value );
                                $cnt_num = $exploed_array[ 1 ];
                                if ( $cnt != $cnt_num ) {
                                    $style = "style='display:none;'";
                                } else {
                                    $style = '';
                                }
                            }
                            ?>
                            <div class="et-one-side-timeline-common" id="et-one-side-timeline-demo-<?php echo $cnt; ?>" <?php if ( isset( $style ) ) echo $style; ?>>
                                <h4><?php _e( 'Template', ETLAK_TD ); ?> <?php echo $cnt; ?> <?php _e( 'Preview', ETLAK_TD ); ?></h4>
                                <img src="<?php echo ETLAK_IMG_DIR . '/demo/one-side/' . 'o' . $cnt . '.jpg' ?>"/>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class ="et-post-option-wrap">
                <label><?php _e( 'Position', ETLAK_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <select name="et_option[timeline_oneside_position]" class="et-timeline-position">
                        <option value="left"  <?php if ( isset( $et_option[ 'timeline_oneside_position' ] ) && $et_option[ 'timeline_oneside_position' ] == 'left' ) echo 'selected=="selected"'; ?>><?php _e( 'Left', ETLAK_TD ) ?></option>
                        <option value="right"  <?php if ( isset( $et_option[ 'timeline_oneside_position' ] ) && $et_option[ 'timeline_oneside_position' ] == 'right' ) echo 'selected=="selected"'; ?>><?php _e( 'Right', ETLAK_TD ) ?></option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>


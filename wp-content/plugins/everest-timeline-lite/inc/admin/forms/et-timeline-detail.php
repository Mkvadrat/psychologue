<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$custom_prefix = "et_option[et_custom][$custom_key]";
$value_prefix = $et_option[ 'et_custom' ][ $custom_key ];
?>
<div class="et-each-meta-container-wrap">
    <div class = "et-post-option-wrap">
        <label><?php _e( 'Meta Keys', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap">
            <label><input type="radio" value="pre-available" name="<?php echo esc_attr( $custom_prefix . '[multiple_meta_key_type]' ); ?>"  <?php
                if ( isset( $value_prefix[ 'multiple_meta_key_type' ] ) ) {
                    checked( $value_prefix[ 'multiple_meta_key_type' ], 'pre-available' );
                }
                ?> class="et-multiple-meta-keys"/><?php _e( "Pre Available Meta Keys", ETLAK_TD ); ?></label>
            <label><input type="radio" value="other" name="<?php echo esc_attr( $custom_prefix . '[multiple_meta_key_type]' ); ?>" <?php
                if ( isset( $value_prefix[ 'multiple_meta_key_type' ] ) ) {
                    checked( $value_prefix[ 'multiple_meta_key_type' ], 'other' );
                }
                ?> class="et-multiple-meta-keys"/><?php _e( 'Other Meta Keys', ETLAK_TD ); ?></label>
            <div class ="et-pre-multiple-key-wrap" <?php if ( isset( $value_prefix[ 'multiple_meta_key_type' ] ) && $value_prefix[ 'multiple_meta_key_type' ] == 'other' ) { ?> style="display: none;" <?php } ?>>
                <?php
                $post_meta_table = $wpdb -> postmeta;
                $meta_keys = $wpdb -> get_results( "SELECT DISTINCT(meta_key) FROM $post_meta_table" );
                ?>
                <select class="et-pre-multiple-metakey" name="<?php echo esc_attr( $custom_prefix . '[et_pre_multiple_meta_key]' ); ?>">
                    <option value=""><?php _e( 'None' ); ?></option>
                    <?php
                    foreach ( $meta_keys as $meta_key ) {
                        ?>
                        <option value="<?php echo $meta_key -> meta_key; ?>"
                        <?php
                        if ( isset( $value_prefix[ 'et_pre_multiple_meta_key' ] ) && $value_prefix[ 'et_pre_multiple_meta_key' ] == $meta_key -> meta_key )
                            echo 'selected == "selected"';
                        ?>><?php echo $meta_key -> meta_key; ?></option>
                                <?php
                            }
                            ?>
                </select>
            </div>
            <div class="et-multiple-other-key-wrap" <?php if ( isset( $value_prefix[ 'multiple_meta_key_type' ] ) && $value_prefix[ 'multiple_meta_key_type' ] == 'pre-available' ) { ?> style="display: none;" <?php } ?>>
                <input type="text" class="et-multiple-other-key"  name="<?php echo esc_attr( $custom_prefix . '[et_multiple_other_key]' ); ?>"  value="<?php
                if ( isset( $value_prefix[ 'et_multiple_other_key' ] ) ) {
                    echo esc_attr( $value_prefix[ 'et_multiple_other_key' ] );
                }
                ?>"/>
            </div>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Meta Value', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap">
            <input type="text" class="et-multiple-meta-value"  name="<?php echo esc_attr( $custom_prefix . '[et_multiple_meta_value]' ); ?>"  value="
            <?php
            if ( isset( $value_prefix[ 'et_multiple_meta_value' ] ) ) {
                echo esc_attr( $value_prefix[ 'et_multiple_meta_value' ] );
            }
            ?>"/>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Compare', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="<?php echo esc_attr( $custom_prefix . '[et_compare_operator]' ); ?>" class="et-compare-post">
                <option value="=" <?php if ( isset( $value_prefix[ 'et_compare_operator' ] ) && $value_prefix[ 'et_compare_operator' ] == '=' ) echo 'selected=="selected"'; ?>><?php _e( 'Equal To', ETLAK_TD ) ?></option>
                <option value="!=" <?php if ( isset( $value_prefix[ 'et_compare_operator' ] ) && $value_prefix[ 'et_compare_operator' ] == '!=' ) echo 'selected=="selected"'; ?>><?php _e( 'Not Equal To', ETLAK_TD ) ?></option>
                <option value=">" <?php if ( isset( $value_prefix[ 'et_compare_operator' ] ) && $value_prefix[ 'et_compare_operator' ] == '>' ) echo 'selected=="selected"'; ?>><?php _e( 'Greater Than', ETLAK_TD ) ?></option>
                <option value=">=" <?php if ( isset( $value_prefix[ 'et_compare_operator' ] ) && $value_prefix[ 'et_compare_operator' ] == '>=' ) echo 'selected=="selected"'; ?>><?php _e( 'Greater Than Equal To', ETLAK_TD ) ?></option>
                <option value="<" <?php if ( isset( $value_prefix[ 'et_compare_operator' ] ) && $value_prefix[ 'et_compare_operator' ] == '<' ) echo 'selected=="selected"'; ?>><?php _e( 'Smaller Than', ETLAK_TD ) ?></option>
                <option value="<=" <?php if ( isset( $value_prefix[ 'et_compare_operator' ] ) && $value_prefix[ 'et_compare_operator' ] == '<=' ) echo 'selected=="selected"'; ?>><?php _e( 'Smaller Than Equal To', ETLAK_TD ) ?></option>
                <option value="LIKE" <?php if ( isset( $value_prefix[ 'et_compare_operator' ] ) && $value_prefix[ 'et_compare_operator' ] == 'LIKE' ) echo 'selected=="selected"'; ?>><?php _e( 'Like', ETLAK_TD ) ?></option>
                <option value="NOT LIKE" <?php if ( isset( $value_prefix[ 'et_compare_operator' ] ) && $value_prefix[ 'et_compare_operator' ] == 'NOT LIKE' ) echo 'selected=="selected"'; ?>><?php _e( 'Not Like', ETLAK_TD ) ?></option>
                <option value="IN" <?php if ( isset( $value_prefix[ 'et_compare_operator' ] ) && $value_prefix[ 'et_compare_operator' ] == 'IN' ) echo 'selected=="selected"'; ?>><?php _e( 'In', ETLAK_TD ) ?></option>
                <option value="NOT IN" <?php if ( isset( $value_prefix[ 'et_compare_operator' ] ) && $value_prefix[ 'et_compare_operator' ] == 'NOT IN' ) echo 'selected=="selected"'; ?>><?php _e( 'Not In', ETLAK_TD ) ?></option>
                <option value="BETWEEN" <?php if ( isset( $value_prefix[ 'et_compare_operator' ] ) && $value_prefix[ 'et_compare_operator' ] == 'BETWEEN' ) echo 'selected=="selected"'; ?>><?php _e( 'Between', ETLAK_TD ) ?></option>
                <option value="NOT BETWEEN" <?php if ( isset( $value_prefix[ 'et_compare_operator' ] ) && $value_prefix[ 'et_compare_operator' ] == 'NOT BETWEEN' ) echo 'selected=="selected"'; ?>><?php _e( 'Not Between', ETLAK_TD ) ?></option>
                <option value="EXISTS" <?php if ( isset( $value_prefix[ 'et_compare_operator' ] ) && $value_prefix[ 'et_compare_operator' ] == 'EXISTS' ) echo 'selected=="selected"'; ?>><?php _e( 'Exists', ETLAK_TD ) ?></option>
                <option value="NOT EXISTS" <?php if ( isset( $value_prefix[ 'et_compare_operator' ] ) && $value_prefix[ 'et_compare_operator' ] == 'NOT EXISTS' ) echo 'selected=="selected"'; ?>><?php _e( 'Not Exists', ETLAK_TD ) ?></option>
            </select>
        </div>
    </div>
    <div class="et-custom-type-main-wrap">
        <div class ="et-post-option-wrap">
            <label for="et-show-type-check" class="et-show-type">
                <?php _e( 'Type', ETLAK_TD ); ?>
            </label>
            <div class="et-post-field-wrap">
                <label class="et-switch">
                    <input type="checkbox" class="et-show-type-filter et-checkbox" value="<?php
                    if ( isset( $value_prefix[ 'et_show_type_filter' ] ) ) {
                        echo esc_attr( $value_prefix[ 'et_show_type_filter' ] );
                    } else {
                        echo '0';
                    }
                    ?>" name="<?php echo esc_attr( $custom_prefix . '[et_show_type_filter]' ); ?>" <?php if ( isset( $value_prefix[ 'et_show_type_filter' ] ) && $value_prefix[ 'et_show_type_filter' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                    <div class="et-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to filter logo by custom field type', ETLAK_TD ) ?></p>
                <div class="et-type-filter-wrap" <?php if ( isset( $value_prefix[ 'et_show_type_filter' ] ) && $value_prefix[ 'et_show_type_filter' ] == '1' ) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>
                    <select name="<?php echo esc_attr( $custom_prefix . '[et_field_compare_type]' ); ?>" class="et-field-compare-type">
                        <option value="NUMERIC" <?php if ( isset( $value_prefix[ 'et_field_compare_type' ] ) && $value_prefix[ 'et_field_compare_type' ] == 'NUMERIC' ) echo 'selected=="selected"'; ?>><?php _e( 'Numeric', ETLAK_TD ) ?></option>
                        <option value="BINARY" <?php if ( isset( $value_prefix[ 'et_field_compare_type' ] ) && $value_prefix[ 'et_field_compare_type' ] == 'BINARY' ) echo 'selected=="selected"'; ?>><?php _e( 'Binary', ETLAK_TD ) ?></option>
                        <option value="CHAR"  <?php if ( isset( $value_prefix[ 'et_field_compare_type' ] ) && $value_prefix[ 'et_field_compare_type' ] == 'CHAR' ) echo 'selected=="selected"'; ?>><?php _e( 'Char', ETLAK_TD ) ?></option>
                        <option value="DATETIME" <?php if ( isset( $value_prefix[ 'et_field_compare_type' ] ) && $value_prefix[ 'et_field_compare_type' ] == 'DATETIME' ) echo 'selected=="selected"'; ?>><?php _e( 'Date Time', ETLAK_TD ) ?></option>
                        <option value="DECIMAL" <?php if ( isset( $value_prefix[ 'et_field_compare_type' ] ) && $value_prefix[ 'et_field_compare_type' ] == 'DECIMAL' ) echo 'selected=="selected"'; ?> ><?php _e( 'Decimal', ETLAK_TD ) ?></option>
                        <option value="SIGNED" <?php if ( isset( $value_prefix[ 'et_field_compare_type' ] ) && $value_prefix[ 'et_field_compare_type' ] == 'SIGNED' ) echo 'selected=="selected"'; ?>><?php _e( 'Signed', ETLAK_TD ) ?></option>
                        <option value="TIME" <?php if ( isset( $value_prefix[ 'et_field_compare_type' ] ) && $value_prefix[ 'et_field_compare_type' ] == 'TIME' ) echo 'selected=="selected"'; ?>><?php _e( 'Time', ETLAK_TD ) ?></option>
                        <option value="UNSIGNED"<?php if ( isset( $value_prefix[ 'et_field_compare_type' ] ) && $value_prefix[ 'et_field_compare_type' ] == 'UNSIGNED' ) echo 'selected=="selected"'; ?> ><?php _e( 'Unsigned', ETLAK_TD ) ?></option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>
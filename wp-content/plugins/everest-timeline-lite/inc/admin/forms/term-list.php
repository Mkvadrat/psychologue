<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$name_prefix = "et_option[et_blog][$blog_key]";
$value_prefix = $et_option[ 'et_blog' ][ $blog_key ];
?>
<div class="et-each-taxonomy-wrap">
    <div class="et-delete-query">
        <span class="dashicons dashicons-trash"></span>
    </div>
    <div class="et-post-option-wrap">
        <label><?php _e( 'Taxonomy/Category', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="<?php echo esc_attr( $name_prefix . '[multiple_post_taxonomy]' ); ?>" class="et-multiple-taxonomy">
                <option value="select" <?php if ( isset( $value_prefix[ 'multiple_post_taxonomy' ] ) && $value_prefix[ 'multiple_post_taxonomy' ] == 'select' ) echo 'selected=="selected"'; ?>><?php echo _e( 'Choose Taxonomy', ETLAK_TD ); ?></option>
                <?php
                $post_type = $et_option[ 'post_type' ];
                $taxonomies = get_object_taxonomies( $post_type, 'objects' );
                if ( $post_type == 'post' ) {
                    $exclude = array( 'post_format' );
                    // Filter out all unwanted post types
                    foreach ( $taxonomies as $key => $value ) {
                        if ( in_array( $key, $exclude ) ) {
                            unset( $taxonomies[ $key ] );
                        }
                    }
                    if ( is_array( $taxonomies ) ) {
                        foreach ( $taxonomies as $tax ) {
                            $value = $tax -> name;
                            $label = $tax -> label;
                            ?>
                            <option value="<?php echo $value; ?>" <?php if ( isset( $value_prefix[ 'multiple_post_taxonomy' ] ) && $value_prefix[ 'multiple_post_taxonomy' ] == $value ) echo 'selected=="selected"'; ?>><?php echo $label; ?></option>
                            <?php
                        }
                    }
                }
                else {
                    foreach ( $taxonomies as $tax ) {
                        $value = $tax -> name;
                        $label = $tax -> label;
                        ?>
                        <option value="<?php echo $value; ?>" <?php if ( isset( $value_prefix[ 'multiple_post_taxonomy' ] ) && $value_prefix[ 'multiple_post_taxonomy' ] == $value ) echo 'selected=="selected"'; ?>><?php echo $label; ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <p class="description"><?php _e( 'Please select the post type first', ETLAK_TD ); ?></p>
        </div>
    </div>
    <div class="et-post-option-wrap">
        <label><?php _e( 'Terms', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap et-multiple-select">
            <select name="<?php echo esc_attr( $name_prefix . '[multiple_taxonomy_terms][]' ); ?>" multiple="multiple" class="et-hierarchy-taxonomy-term">
                <option value=""><?php echo 'Choose Terms'; ?></option>
                <?php
                $select_tax = $value_prefix[ 'multiple_post_taxonomy' ];
                if ( isset( $value_prefix[ 'multiple_post_taxonomy' ] ) ) {
                    echo $this -> etlak_fetch_category_list( $select_tax, $value_prefix[ 'multiple_taxonomy_terms' ] );
                }
                ?>
            </select>
        </div>
    </div>
    <div class="et-post-option-wrap">
        <label for="et-enable-operator" class="et-enable-operator">
            <?php _e( 'Operator', ETLAK_TD ); ?>
        </label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-operator et-checkbox" value="<?php
                if ( isset( $value_prefix[ 'et_enable_operator' ] ) ) {
                    echo esc_attr( $value_prefix[ 'et_enable_operator' ] );
                } else {
                    echo '0';
                }
                ?>" name="<?php echo esc_attr( $name_prefix . '[et_enable_operator]' ); ?>" <?php if ( isset( $value_prefix[ 'et_enable_operator' ] ) && $value_prefix[ 'et_enable_operator' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable operator to test and filter the post', ETLAK_TD ) ?></p>
            <div class="et-operator-inner-wrap" <?php if ( isset( $value_prefix[ 'et_enable_operator' ] ) && $value_prefix[ 'et_enable_operator' ] == '1' ) { ?> style="display: block;" <?php } else { ?> style="display: none;" <?php } ?>>
                <select name="<?php echo esc_attr( $name_prefix . '[et_terms_operator]' ); ?>" class="et-terms-operator">
                    <option value="IN" <?php if ( isset( $value_prefix[ 'et_terms_operator' ] ) && $value_prefix[ 'et_terms_operator' ] == 'IN' ) echo 'selected=="selected"'; ?>><?php _e( 'IN', ETLAK_TD ) ?></option>
                    <option value="NOT IN" <?php if ( isset( $value_prefix[ 'et_terms_operator' ] ) && $value_prefix[ 'et_terms_operator' ] == 'NOT IN' ) echo 'selected=="selected"'; ?>><?php _e( 'NOT IN', ETLAK_TD ) ?></option>
                    <option value="AND" <?php if ( isset( $value_prefix[ 'et_terms_operator' ] ) && $value_prefix[ 'et_terms_operator' ] == 'AND' ) echo 'selected=="selected"'; ?>><?php _e( 'AND', ETLAK_TD ) ?></option>
                    <option value="EXISTS" <?php if ( isset( $value_prefix[ 'et_terms_operator' ] ) && $value_prefix[ 'et_terms_operator' ] == 'EXISTS' ) echo 'selected=="selected"'; ?>><?php _e( 'EXISTS', ETLAK_TD ) ?></option>
                    <option value="NOT EXISTS" <?php if ( isset( $value_prefix[ 'et_terms_operator' ] ) && $value_prefix[ 'et_terms_operator' ] == 'NOT EXISTS' ) echo 'selected=="selected"'; ?>><?php _e( 'NOT EXISTS', ETLAK_TD ) ?></option>
                </select>
            </div>
        </div>
    </div>
</div>
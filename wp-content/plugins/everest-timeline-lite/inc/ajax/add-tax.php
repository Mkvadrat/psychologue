<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
$post_type = sanitize_text_field( $_POST[ 'post_type' ] );
$key = $this -> etlak_generate_random_string( 15 );
$blog_key = 'blog_' . $key;
$blog_prefix = "et_option[et_blog][$blog_key]";
?>
<div class="et-each-taxonomy-wrap">
    <div class="et-delete-query">
        <span class="dashicons dashicons-trash"></span>
    </div>
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Post Taxonomy', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="<?php echo esc_attr( $blog_prefix . '[multiple_post_taxonomy]' ); ?>" class="et-multiple-taxonomy">
                <option value="select" ><?php echo _e( 'Choose Taxonomy', ETLAK_TD ); ?></option>
                <?php
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
                            <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                            <?php
                        }
                    }
                } else {
                    foreach ( $taxonomies as $tax ) {
                        $value = $tax -> name;
                        $label = $tax -> label;
                        ?>
                        <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                        <?php
                    }
                }
                ?>
            </select>
            <p class="description"><?php _e( 'Please select the post type first', ETLAK_TD ); ?></p>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Terms', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap et-multiple-select">
            <select name="<?php echo esc_attr( $blog_prefix . '[multiple_taxonomy_terms][]' ); ?>" multiple="multiple" class="et-hierarchy-taxonomy-term">
                <option value="" ><?php echo _e( 'Select Taxonomy First', ETLAK_TD ); ?></option>
            </select>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label for="et-enable-operator" class="et-enable-operator">
            <?php _e( 'Operator', ETLAK_TD ); ?>
        </label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-operator et-checkbox" value="0" name="<?php echo esc_attr( $blog_prefix . '[et_enable_operator]' ); ?>"/>
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable operator to test and filter the post', ETLAK_TD ) ?></p>
            <div class="et-operator-inner-wrap" style="display: none;">
                <select name="<?php echo esc_attr( $blog_prefix . '[et_terms_operator]' ); ?>" class="et-terms-operator">
                    <option value="IN"><?php _e( 'IN', ETLAK_TD ) ?></option>
                    <option value="NOT IN"><?php _e( 'NOT IN', ETLAK_TD ) ?></option>
                    <option value="AND"><?php _e( 'AND', ETLAK_TD ) ?></option>
                    <option value="EXISTS"><?php _e( 'EXISTS', ETLAK_TD ) ?></option>
                    <option value="NOT EXISTS"><?php _e( 'NOT EXISTS', ETLAK_TD ) ?></option>
                </select>
            </div>
        </div>
    </div>
</div>
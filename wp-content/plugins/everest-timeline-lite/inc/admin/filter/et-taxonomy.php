<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class ="et-post-option-wrap">
    <label for="et-show-taxonomy-query" class="et-taxonomy-relation">
        <?php _e( 'Filter Taxonomies/Categories Post', ETLAK_TD ); ?>
    </label>
    <div class="et-post-field-wrap">
        <label class="et-switch">
            <input type="checkbox" class="et-show-taxonomy-relation et-checkbox" value="<?php
        if ( isset( $et_option[ 'et_show_taxonomy_query' ] ) ) {
            echo esc_attr( $et_option[ 'et_show_taxonomy_query' ] );
        } else {
            echo '0';
        }
        ?>" name="et_option[et_show_taxonomy_query]" <?php if ( isset( $et_option[ 'et_show_taxonomy_query' ] ) && $et_option[ 'et_show_taxonomy_query' ] == '1' ) { ?>checked="checked"<?php } ?>/>
            <div class="et-slider round"></div>
        </label>
        <p class="description"> <?php _e( 'Enable to show posts associated with certain taxonomy/category.', ETLAK_TD ) ?></p>
    </div>
</div>
<div class="et-taxonomy-main-wrap"
<?php if ( isset( $et_option[ 'et_show_taxonomy_query' ] ) && $et_option[ 'et_show_taxonomy_query' ] == '1' ) { ?>
         style="display: block;" <?php } else {
    ?>
         style="display: none;" <?php } ?>>
    <div class = "et-post-option-wrap">
        <label><?php _e( 'Taxonomy/Category Queries Type', ETLAK_TD ); ?></label>
        <div class="et-tooltip-icon">
            <span class="dashicons dashicons-info"></span>
            <span class="et-tooltip-info"><?php _e( 'Choose Simple Taxonomy/Category Query to display post from a single taxonomy or category with single term.For example display posts tagged with bob, under people custom taxonomy.Choose Multiple Taxonomy/Category Handling to display posts from several custom taxonomies or categories.', ETLAK_TD ); ?></span>
        </div>
        <div class="et-post-field-wrap">
            <div class="et-info-wrap">
                <select name="et_option[taxonomy_queries_type]" class="et-taxonomy-queries-type">
                    <option value="simple-taxonomy"  <?php if ( isset( $et_option[ 'taxonomy_queries_type' ] ) && $et_option[ 'taxonomy_queries_type' ] == 'simple-taxonomy' ) echo 'selected=="selected"'; ?>><?php _e( 'Simple Taxonomy/Category Query', ETLAK_TD ) ?></option>
                    <option value="multiple-taxonomy"  <?php if ( isset( $et_option[ 'taxonomy_queries_type' ] ) && $et_option[ 'taxonomy_queries_type' ] == 'multiple-taxonomy' ) echo 'selected=="selected"'; ?>><?php _e( 'Multiple Taxonomy/Category Handling', ETLAK_TD ) ?></option>
                </select>
            </div>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label><?php _e( 'Taxonomy/Category', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="et_option[select_post_taxonomy]" class="et-select-taxonomy">
                <option value="select" <?php if ( isset( $et_option[ 'select_post_taxonomy' ] ) && $et_option[ 'select_post_taxonomy' ] == 'select' ) echo 'selected=="selected"'; ?>><?php echo _e( 'Choose Taxonomy', ETLAK_TD ); ?></option>
                <?php
                $taxonomies = get_object_taxonomies( 'post', 'objects' );
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
                        <option value="<?php echo $value;
                ?>" <?php if ( isset( $et_option[ 'select_post_taxonomy' ] ) && $et_option[ 'select_post_taxonomy' ] == $value ) echo 'selected=="selected"'; ?>><?php echo $label; ?></option>
                                <?php
                            }
                        }
                        ?>
            </select>
            <p class="description"><?php _e( 'Please select the post type first', ETLAK_TD ); ?></p>
        </div>
    </div>
    <div class="et-simple-terms-wrap" style="display: none;">
        <div class="et-post-option-wrap">
            <label><?php _e( 'Term', ETLAK_TD ); ?></label>
            <div class="et-tooltip-icon">
                <span class="dashicons dashicons-info"></span>
                <span class="et-tooltip-info"><?php _e( 'Terms refers to the items in a taxonomy.
For example, a website has categories books, politics, and blogging in it. While category itself is a taxonomy the items inside it are called terms.', ETLAK_TD ); ?></span>
            </div>
            <div class="et-post-field-wrap">
                <div class="et-info-wrap">
                    <select name="et_option[simple_taxonomy_terms]" class="et-simple-taxonomy-term">
                        <option value=""><?php echo _e( 'Choose Term', ETLAK_TD ); ?></option>
                        <?php
                        if ( ! empty( $et_option[ 'simple_taxonomy_terms' ] ) ) {
                            echo $this -> etlak_fetch_category_list( $et_option[ 'select_post_taxonomy' ], $et_option[ 'simple_taxonomy_terms' ] );
                        }
                        ?>
                    </select>
                    <p class="description"><?php _e( 'Please select taxonomy first.', ETLAK_TD ); ?></p>
                </div>

            </div>
        </div>
    </div>
    <div class ="et-multiple-terms-wrap" style= "display: none;">
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Terms', ETLAK_TD );
                        ?></label>
            <div class="et-tooltip-icon">
                <span class="dashicons dashicons-info"></span>
                <span class="et-tooltip-info"><?php _e( 'Terms refers to the items in a taxonomy.
For example, a website has categories books, politics, and blogging in it. While category itself is a taxonomy the items inside it are called terms.', ETLAK_TD ); ?></span>
            </div>
            <div class ="et-post-field-wrap">
                <div class="et-info-wrap et-multiple-select">
                    <select name="et_option[taxonomy_terms][]" multiple="multiple" class="et-multiple-taxonomy-term">
                        <option value=""><?php echo _e( 'Choose Terms', ETLAK_TD ); ?></option>
                        <?php
                        if ( isset( $et_option[ 'taxonomy_terms' ] ) ) {
                            echo $this -> etlak_fetch_category_list( $et_option[ 'select_post_taxonomy' ], $et_option[ 'taxonomy_terms' ] );
                        }
                        ?>
                    </select>
                    <p class="description"><?php _e( 'Please select taxonomy first.', ETLAK_TD ); ?></p>
                </div>

            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label><?php _e( 'Relation', ETLAK_TD ); ?></label>
            <div class="et-post-field-wrap">
                <select name="et_option[et_multiple_tax_relation]" class="et-multiple-tax-relation">
                    <option value="AND"  <?php if ( isset( $et_option[ 'et_multiple_tax_relation' ] ) && $et_option[ 'et_multiple_tax_relation' ] == 'AND' ) echo 'selected=="selected"'; ?>><?php _e( 'AND', ETLAK_TD ) ?></option>
                    <option value="OR"  <?php if ( isset( $et_option[ 'et_multiple_tax_relation' ] ) && $et_option[ 'et_multiple_tax_relation' ] == 'OR' ) echo 'selected=="selected"'; ?>><?php _e( 'OR', ETLAK_TD ) ?></option>
                </select>
            </div>
        </div>
        <div class="et-tax-inner-wrap">
            <?php
            if ( isset( $et_option[ 'et_blog' ] ) && is_array( $et_option[ 'et_blog' ] ) ) {

                $et_blog_count = count( $et_option[ 'et_blog' ] );
            } else {
                $et_blog_count = 0;
            }
            if ( $et_blog_count > 0 ) {

                foreach ( $et_option[ 'et_blog' ] as $blog_key => $blog_detail ) {
                    include(ETLAK_PATH . 'inc/admin/forms/term-list.php');
                }
            }
            ?>
        </div>
        <div class="et-taxonomy-button">
            <input type="button" class="button-primary et-add-tax-condition" value="<?php _e( 'Add New Taxonomy Condition', ETLAK_TD ); ?>">
        </div>
    </div>
</div>
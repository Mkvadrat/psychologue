<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="et-general-outer-wrap">
    <div class = "et-post-option-wrap">
        <label><?php _e( 'Post Content', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap">
            <label><input type="radio" value="full-text" name="et_option[post_content]" <?php
if ( isset( $et_option[ 'post_content' ] ) ) {
    checked( $et_option[ 'post_content' ], 'full-text' );
}
?> class="et-post-content"/><?php _e( "Full Text", ETLAK_TD ); ?></label>
            <label><input type="radio" value="excerpt" name="et_option[post_content]" <?php
                if ( isset( $et_option[ 'post_content' ] ) ) {
                    checked( $et_option[ 'post_content' ], 'excerpt' );
                }
?>  class="et-post-content"/><?php _e( 'Excerpt Text', ETLAK_TD ); ?></label>
            <div class="et-excerpt-wrap" <?php if ( isset( $et_option[ 'post_content' ] ) && $et_option[ 'post_content' ] == 'excerpt' ) { ?> style="display:block;" <?php } else {
                          ?>
                     style = "display:none;"
                     <?php
                 }
                 ?> >
                <input type="number" class="et-post-excerpt" min="10" name="et_option[et_post_excerpt]"  value="<?php
                 if ( isset( $et_option[ 'et_post_excerpt' ] ) ) {
                     echo $et_option[ 'et_post_excerpt' ];
                 } else {
                     echo '15';
                 }
                 ?>"/>
                <p class="description"><?php _e( 'Enter the length of post content', ETLAK_TD ) ?></p>
            </div>
        </div>
    </div>
    <div class="et-post-option-wrap">
        <label><?php _e( 'Number of Post', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap">
            <input type="number" class="et-post-number" min="1" name="et_option[et_post_number]"  value="<?php
                       if ( isset( $et_option[ 'et_post_number' ] ) ) {
                           echo $et_option[ 'et_post_number' ];
                       } else {
                           echo '5';
                       }
                 ?>"/>
            <p class="description"><?php _e( 'Enter the excerpt length for post content', ETLAK_TD ) ?></p>
        </div>
    </div>

    <div class ="et-post-option-wrap">
        <label for="et-category-view-check" class="et-category-view">
            <?php _e( 'Display Post Category', ETLAK_TD ); ?>
        </label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-category et-checkbox" value="<?php
            if ( isset( $et_option[ 'et_show_category' ] ) ) {
                echo esc_attr( $et_option[ 'et_show_category' ] );
            } else {
                echo '0';
            }
            ?>" name="et_option[et_show_category]" <?php if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="et-slider round"></div>
            </label>
            <p class="description"><?php _e( 'Enable to show category', ETLAK_TD ) ?></p>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label for="et-tag-view-check" class="et-tag-view"><?php _e( 'Display Post Tag', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-tag et-checkbox" value="<?php
                if ( isset( $et_option[ 'et_show_tag' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_tag' ] );
                } else {
                    echo '0';
                }
            ?>" name="et_option[et_show_tag]" <?php if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post tag', ETLAK_TD ) ?></p>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label for="et-author-view-check" class="et-author-view"><?php _e( 'Display Post Author', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-author et-checkbox"  value="<?php
                if ( isset( $et_option[ 'et_show_author' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_author' ] );
                } else {
                    echo '0';
                }
            ?>" name="et_option[et_show_author]" <?php if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post author', ETLAK_TD ) ?></p>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label for="et-comment-view-check" class="et-comment-view"><?php _e( 'Display Post Comment Count', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-comment et-checkbox"  value="<?php
                if ( isset( $et_option[ 'et_show_comment' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_comment' ] );
                } else {
                    echo '0';
                }
            ?>" name="et_option[et_show_comment]" <?php if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post comment count', ETLAK_TD ) ?></p>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label for="et-date-view-check" class="et-date-view"><?php _e( 'Display Post Date', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-date et-checkbox"  value="<?php
                if ( isset( $et_option[ 'et_show_date' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_date' ] );
                } else {
                    echo '0';
                }
            ?>" name="et_option[et_show_date]" <?php if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show post date', ETLAK_TD ) ?></p>
        </div>
    </div>
    <div class="et-date-wrapper et-post-option-wrap" <?php if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) { ?> style="display:block;" <?php } else { ?> style="display: none;" <?php } ?>>
        <label><?php _e( 'Date Format', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="et_option[et_date_format_post]" class="et-select-date-format">
                <option value="F j, Y g:i a"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'F j, Y g:i a' ) echo 'selected=="selected"'; ?>><?php _e( 'March 6, 2017 12:50 am', ETLAK_TD ) ?></option>
                <option value="F j, Y"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'F j, Y' ) echo 'selected=="selected"'; ?>><?php _e( 'March 6, 2017', ETLAK_TD ) ?></option>
                <option value="F, Y"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'F, Y' ) echo 'selected=="selected"'; ?>><?php _e( 'March, 2017', ETLAK_TD ) ?></option>
                <option value="j F  Y"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'j F  Y' ) echo 'selected=="selected"'; ?>><?php _e( '6 March 2017', ETLAK_TD ) ?></option>
                <option value="g:i a"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'g:i a' ) echo 'selected=="selected"'; ?>><?php _e( '12:50 am', ETLAK_TD ) ?></option>
                <option value="g:i:s a"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'g:i:s a' ) echo 'selected=="selected"'; ?>><?php _e( '12:50:48 am', ETLAK_TD ) ?></option>
                <option value="l, F jS, Y"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'l, F jS, Y' ) echo 'selected=="selected"'; ?>><?php _e( 'Saturday, March 6th, 2017', ETLAK_TD ) ?></option>
                <option value="M j, Y @ G:i"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'M j, Y @ G:i' ) echo 'selected=="selected"'; ?>><?php _e( 'Nov 6, 2010 @ 0:50', ETLAK_TD ) ?></option>
                <option value="Y/m/d \a\t g:i A"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'Y/m/d \a\t g:i A' ) echo 'selected=="selected"'; ?>><?php _e( '2010/11/06 at 12:50 AM', ETLAK_TD ) ?></option>
                <option value="Y/m/d \a\t g:ia"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'Y/m/d \a\t g:ia' ) echo 'selected=="selected"'; ?>><?php _e( ' 2010/11/06 at 12:50am', ETLAK_TD ) ?></option>
                <option value="Y/m/d g:i:s A"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'Y/m/d g:i:s A' ) echo 'selected=="selected"'; ?>><?php _e( '2010/11/06 12:50:48 AM', ETLAK_TD ) ?></option>
                <option value="Y/m/d"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'Y/m/d' ) echo 'selected=="selected"'; ?>><?php _e( '2010/11/06', ETLAK_TD ) ?></option>
                <option value="d.m.Y"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'd.m.Y' ) echo 'selected=="selected"'; ?>><?php _e( '11.1.2017', ETLAK_TD ) ?></option>
                <option value="d-m-Y"  <?php if ( isset( $et_option[ 'et_date_format_post' ] ) && $et_option[ 'et_date_format_post' ] == 'd-m-Y' ) echo 'selected=="selected"'; ?>><?php _e( '11-1-2017', ETLAK_TD ) ?></option>
            </select>
            <p class="description"><?php echo _e( 'Note: The date format is only applicable for inner date.' ); ?></p>
        </div>
    </div>
    <div class ="et-post-option-wrap">
        <label for="et-read-more-check" class="et-read-more-view"><?php _e( 'Display Read More Link', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-read-more et-checkbox" name="et_option[et_show_read_more]"  value="<?php
                if ( isset( $et_option[ 'et_show_read_more' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_read_more' ] );
                } else {
                    echo '0';
                }
            ?>" <?php if ( isset( $et_option[ 'et_show_read_more' ] ) && $et_option[ 'et_show_read_more' ] == '1' ) { ?>checked="checked"<?php } ?> />
                <div class="et-slider round"></div>
            </label>
            <p class="description"> <?php _e( 'Enable to show read more post link', ETLAK_TD ) ?></p>
        </div>
    </div>
    <div class="et-read-more-wrap" <?php if ( isset( $et_option[ 'et_show_read_more' ] ) && $et_option[ 'et_show_read_more' ] == '1' ) {
                    ?> style="display:block;" <?php } else { ?> style="display:none;" <?php }
            ?>>
        <div class ="et-post-option-wrap">
            <label for="read-more-text" class="et-read-more-text"><?php _e( 'Read More Text', ETLAK_TD ); ?></label>
            <div class="et-post-field-wrap">
                <input type="text" class="et-post-link-text" placeholder="Read More" name="et_option[et_post_link_text]" value="<?php
         if ( isset( $et_option[ 'et_post_link_text' ] ) ) {
             echo esc_attr( $et_option[ 'et_post_link_text' ] );
         }
            ?>">
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label for="et-post-link" class="et-post-label"><?php _e( 'Post Link', ETLAK_TD ); ?></label>
            <div class="et-post-field-wrap">
                <label><input type="radio" value="post_link" name="et_option[post_url]" <?php
                if ( isset( $et_option[ 'post_url' ] ) ) {
                    checked( $et_option[ 'post_url' ], 'post_link' );
                }
            ?> class="et-post-link"/><?php _e( "Post Link", ETLAK_TD ); ?></label>
                <label><input type="radio" value="custom_link" name="et_option[post_url]" <?php
                    if ( isset( $et_option[ 'post_url' ] ) ) {
                        checked( $et_option[ 'post_url' ], 'custom_link' );
                    }
            ?>  class="et-post-link"/><?php _e( 'Custom Link', ETLAK_TD ); ?></label>
            </div>
        </div>
        <div class="et-custom-link-wrap"  <?php if ( isset( $et_option[ 'post_url' ] ) && $et_option[ 'post_url' ] == 'post_link' ) {
                        ?> style="display:none;" <?php }
            ?>>
            <div class ="et-post-option-wrap">
                <label for="custom-link-url" class="et-custom-url"><?php _e( 'Custom Link URL', ETLAK_TD ); ?></label>
                <div class="et-post-field-wrap">
                    <input type="text" class="et-custom-link" placeholder="www.example.com" name="et_option[et_custom_url]" value="<?php
             if ( isset( $et_option[ 'et_custom_url' ] ) ) {
                 echo esc_attr( $et_option[ 'et_custom_url' ] );
             }
            ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="et-post-option-wrap">
        <label><?php _e( 'Image Size', ETLAK_TD ); ?></label>
        <div class="et-post-field-wrap">
            <select name="et_option[et_image_size]" class="et-select-image-size">
                <option value="full"  <?php if ( isset( $et_option[ 'et_image_size' ] ) && $et_option[ 'et_image_size' ] == 'full' ) echo 'selected=="selected"'; ?>><?php _e( 'Original', ETLAK_TD ) ?></option>
                <option value="large"  <?php if ( isset( $et_option[ 'et_image_size' ] ) && $et_option[ 'et_image_size' ] == 'large' ) echo 'selected=="selected"'; ?>><?php _e( 'Large', ETLAK_TD ) ?></option>
                <option value="medium"  <?php if ( isset( $et_option[ 'et_image_size' ] ) && $et_option[ 'et_image_size' ] == 'medium' ) echo 'selected=="selected"'; ?>><?php _e( 'Medium', ETLAK_TD ) ?></option>
                <option value="thumbnail"  <?php if ( isset( $et_option[ 'et_image_size' ] ) && $et_option[ 'et_image_size' ] == 'thumbnail' ) echo 'selected=="selected"'; ?>><?php _e( 'Thumbnail', ETLAK_TD ) ?></option>
            </select>
        </div>
    </div>
</div>
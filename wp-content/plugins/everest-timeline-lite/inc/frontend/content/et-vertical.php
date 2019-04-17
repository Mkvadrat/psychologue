<?php
defined( 'ABSPATH' ) or die( "No script kiddies please!" );
if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-1' ) {

    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date et-clearfix">
            <span>
                <?php echo get_the_date( 'Y' ); ?>
            </span>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item">
        <div class="et-timeline-circle"></div>
        <div class="et-all-contain-here">
            <div class="et-image-container">
                <?php
                include(ETLAK_PATH . 'inc/frontend/content/et-media-type.php');
                /*
                 * Show Category
                 */
                if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                    ?>
                    <div class="et-category-wrap">
                        <?php
                        $categories = get_the_category();
                        $separator = ' ';
                        $output = '';
                        if ( ! empty( $categories ) ) {
                            foreach ( $categories as $category ) {
                                $output .= '<a href="' . esc_url( get_category_link( $category -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ETLAK_TD ), $category -> name ) ) . '">' . esc_html( $category -> name ) . '</a>' . $separator;
                            }
                            ?>
                            <div class="et-category-list">
                                <?php
                                echo trim( $output, $separator );
                                ?>
                            </div>
                        <?php }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="et-inner-content">
                <div class="et-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?></a>
                </div>
                <div class="et-meta-wrap">
                    <?php
                    /*
                     * Show Author
                     */
                    if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                        ?>
                        <div class="et-author-name">
                            <?php
                            the_author_posts_link();
                            ?>
                        </div>
                        <?php
                    }
                    /*
                     * Date
                     */

                    if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                        ?>
                        <div class="et-date"><?php echo get_the_date( $date_format ); ?></div>
                        <?php
                    }
                    /*
                     * Display comment count
                     */
                    if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                        ?>
                        <div class="et-comment-wrap">
                            <?php
                            echo comments_number();
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="et-content"><?php
                    if ( isset( $et_option[ 'post_content' ] ) && $et_option[ 'post_content' ] == 'full-text' ) {
                        the_content();
                    } else {
                        echo wp_trim_words( get_the_content(), $excerpt, '...' );
                    }
                    ?></div>
                <?php
                /*
                 * Read More
                 */
                if ( isset( $et_option[ 'et_show_read_more' ] ) && $et_option[ 'et_show_read_more' ] == '1' ) {
                    if ( isset( $et_option[ 'post_url' ] ) && $et_option[ 'post_url' ] == 'post_link' ) {
                        ?>
                        <div class="et-link-button">
                            <a href="<?php echo get_permalink( $timeline_post_id ); ?>"><?php echo esc_attr( $et_option[ 'et_post_link_text' ] ); ?></a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="et-link-button">
                            <a href="<?php echo esc_url( $et_option[ 'et_custom_url' ] ); ?>"><?php echo esc_attr( $et_option[ 'et_post_link_text' ] ); ?></a>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="et-content-outer-wrap et-clearfix">
                    <?php
                    /*
                     * Show Tag
                     */
                    if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                        global $post;
                        $tags = get_the_tags();
                        $separator = '  ';
                        $output = '';
                        if ( ! empty( $tags ) ) {
                            foreach ( $tags as $tag ) {
                                $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ETLAK_TD ), $tag -> name ) ) . '">' . "#" . esc_html( $tag -> name ) . '</a>' . $separator;
                            }
                            ?>
                            <div class="et-tag-list">
                                <?php
                                echo trim( $output, $separator );
                                ?>
                            </div>
                            <?php
                        }
                    }
                    if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                        ?>
                        <div class="et-share-wrap">
                            <div class="et-share-wrap-contain">
                                <?php if ( isset( $et_option[ 'et_show_facebook_share' ] ) && $et_option[ 'et_show_facebook_share' ] == '1' ) { ?>
                                    <a href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink( $timeline_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                <?php } ?>
                                <?php if ( isset( $et_option[ 'et_show_twitter_share' ] ) && $et_option[ 'et_show_twitter_share' ] == '1' ) { ?>
                                    <a href="http://twitter.com/share?text=<?php echo the_title(); ?>&url=<?php echo get_permalink( $timeline_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                <?php } ?>
                                <?php if ( isset( $et_option[ 'et_show_google_share' ] ) && $et_option[ 'et_show_google_share' ] == '1' ) { ?>
                                    <a href="https://plus.google.com/share?url=<?php echo get_permalink( $timeline_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                                    </a>
                                <?php } ?>
                                <?php if ( isset( $et_option[ 'et_show_linkedin_share' ] ) && $et_option[ 'et_show_linkedin_share' ] == '1' ) { ?>
                                    <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink( $timeline_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                <?php } ?>
                                <?php if ( isset( $et_option[ 'et_show_mail_share' ] ) && $et_option[ 'et_show_mail_share' ] == '1' ) { ?>
                                    <a href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $timeline_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    </a>
                                <?php } ?>
                                <?php if ( isset( $et_option[ 'et_show_pinterest_share' ] ) && $et_option[ 'et_show_pinterest_share' ] == '1' ) { ?>
                                    <a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink( $timeline_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fa fa-pinterest" aria-hidden="true"></i>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $et_option[ 'timeline_vertical_template' ] ) && $et_option[ 'timeline_vertical_template' ] == 'template-2' ) {

    if ( $timeline_date != $current_date ) {
        ?>
        <div class="et-timeline-line"></div>
        <div class="et-timeline-date">
            <span><?php echo get_the_date( 'Y' ); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="et-timeline-item">
        <div class="et-timeline-circle"></div>
        <div class="et-all-contain-here">
            <div class="et-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?></a>
            </div>
            <div class="et-contain-main">
                <?php
                include(ETLAK_PATH . 'inc/frontend/content/et-media-type.php');
                ?>
                <div class="et-inner-content">
                    <div class="et-meta-wrap">
                        <?php
                        /*
                         * Show Category
                         */
                        if ( isset( $et_option[ 'et_show_category' ] ) && $et_option[ 'et_show_category' ] == '1' ) {
                            ?>
                            <div class="et-category-wrap">
                                <?php
                                $categories = get_the_category();
                                $separator = ' ';
                                $output = '';
                                if ( ! empty( $categories ) ) {
                                    foreach ( $categories as $category ) {
                                        $output .= '<a href="' . esc_url( get_category_link( $category -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ETLAK_TD ), $category -> name ) ) . '">' . esc_html( $category -> name ) . '</a>' . $separator;
                                    }
                                    ?>
                                    <div class="et-category-list">
                                        <?php
                                        echo trim( $output, $separator );
                                        ?>
                                    </div>
                                <?php }
                                ?>
                            </div>
                            <?php
                        }
                        /*
                         * Date
                         */
                        if ( isset( $et_option[ 'et_show_date' ] ) && $et_option[ 'et_show_date' ] == '1' ) {
                            ?>
                            <div class="et-date"><?php echo get_the_date( $date_format ); ?></div>
                            <?php
                        }
                        /*
                         * Display comment count
                         */
                        if ( isset( $et_option[ 'et_show_comment' ] ) && $et_option[ 'et_show_comment' ] == '1' ) {
                            ?>
                            <div class="et-comment-wrap">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                <?php
                                echo comments_number();
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="et-content"><?php
                        if ( isset( $et_option[ 'post_content' ] ) && $et_option[ 'post_content' ] == 'full-text' ) {
                            the_content();
                        } else {
                            echo wp_trim_words( get_the_content(), $excerpt, '...' );
                        }
                        ?></div>
                    <?php
                    /*
                     * Read More
                     */
                    if ( isset( $et_option[ 'et_show_read_more' ] ) && $et_option[ 'et_show_read_more' ] == '1' ) {
                        if ( isset( $et_option[ 'post_url' ] ) && $et_option[ 'post_url' ] == 'post_link' ) {
                            ?>
                            <div class="et-link-button">
                                <a href="<?php echo get_permalink( $timeline_post_id ); ?>"><?php echo esc_attr( $et_option[ 'et_post_link_text' ] ); ?></a>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="et-link-button">
                                <a href="<?php echo esc_url( $et_option[ 'et_custom_url' ] ); ?>"><?php echo esc_attr( $et_option[ 'et_post_link_text' ] ); ?></a>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="et-meta-wrap-1">
                        <?php
                        /*
                         * Show Author
                         */
                        if ( isset( $et_option[ 'et_show_author' ] ) && $et_option[ 'et_show_author' ] == '1' ) {
                            ?>
                            <div class="et-author-name">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <?php
                                the_author_posts_link();
                                ?>
                            </div>
                            <?php
                        }
                        /*
                         * Show Tag
                         */
                        if ( isset( $et_option[ 'et_show_tag' ] ) && $et_option[ 'et_show_tag' ] == '1' ) {
                            global $post;
                            $tags = get_the_tags();
                            $separator = '  ';
                            $output = '';
                            if ( ! empty( $tags ) ) {
                                foreach ( $tags as $tag ) {
                                    $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', ETLAK_TD ), $tag -> name ) ) . '">' . esc_html( $tag -> name ) . '</a>' . $separator;
                                }
                                ?>
                                <div class="et-tag-list">
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php
                                    echo trim( $output, $separator );
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
                            ?>
                            <div class="et-share-wrap">
                                <div class="et-share-wrap-contain">
                                    <?php if ( isset( $et_option[ 'et_show_facebook_share' ] ) && $et_option[ 'et_show_facebook_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink( $timeline_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                            <div class="et-social-tooltip">
                                                <?php _e( 'Facebook', ETLAK_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
                                    <?php if ( isset( $et_option[ 'et_show_twitter_share' ] ) && $et_option[ 'et_show_twitter_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="http://twitter.com/share?text=<?php echo the_title(); ?>&url=<?php echo get_permalink( $timeline_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                            <div class="et-social-tooltip">
                                                <?php _e( 'Twitter', ETLAK_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
                                    <?php if ( isset( $et_option[ 'et_show_google_share' ] ) && $et_option[ 'et_show_google_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="https://plus.google.com/share?url=<?php echo get_permalink( $timeline_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                                            </a>
                                            <div class="et-social-tooltip">
                                                <?php _e( 'Google +', ETLAK_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
                                    <?php if ( isset( $et_option[ 'et_show_linkedin_share' ] ) && $et_option[ 'et_show_linkedin_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink( $timeline_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                                            </a>
                                            <div class="et-social-tooltip">
                                                <?php _e( 'Linkedin', ETLAK_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
                                    <?php if ( isset( $et_option[ 'et_show_mail_share' ] ) && $et_option[ 'et_show_mail_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $timeline_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            </a>
                                            <div class="et-social-tooltip">
                                                <?php _e( 'Email', ETLAK_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
                                    <?php if ( isset( $et_option[ 'et_show_pinterest_share' ] ) && $et_option[ 'et_show_pinterest_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink( $timeline_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-pinterest" aria-hidden="true"></i>
                                            </a>
                                            <div class="et-social-tooltip">
                                                <?php _e( 'Pinterest', ETLAK_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
$current_date = $timeline_date;

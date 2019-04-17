<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div class="et-social-outer-wrap">
    <div class ="et-post-option-wrap">
        <label for="et-social-share-check" class="et-social-share">
            <?php _e( 'Social Share', ETLAK_TD ); ?>
        </label>
        <div class="et-post-field-wrap">
            <label class="et-switch">
                <input type="checkbox" class="et-show-social-share et-checkbox" value="<?php
            if ( isset( $et_option[ 'et_show_social_share' ] ) ) {
                echo esc_attr( $et_option[ 'et_show_social_share' ] );
            } else {
                echo '0';
            }
            ?>" name="et_option[et_show_social_share]" <?php if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                <div class="et-slider round"></div>
            </label>
            <p class="description"><?php _e( 'Enable to show social share link', ETLAK_TD ) ?></p>
        </div>
    </div>
    <div class="et-social-container"
    <?php if ( isset( $et_option[ 'et_show_social_share' ] ) && $et_option[ 'et_show_social_share' ] == '1' ) {
        ?> style="display: block;"
             <?php
         } else {
             ?>
             style="display: none;"
             <?php
         }
         ?>>
        <div class ="et-post-option-wrap">
            <label for="et-facebook-share-check" class="et-facebook-share">
                <?php _e( 'Facebook Share Link', ETLAK_TD ); ?>
            </label>
            <div class="et-post-field-wrap">
                <label class="et-switch">
                    <input type="checkbox" class="et-show-facebook-share et-checkbox" value="<?php
                if ( isset( $et_option[ 'et_show_facebook_share' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_facebook_share' ] );
                } else {
                    echo '0';
                }
                ?>" name="et_option[et_show_facebook_share]" <?php if ( isset( $et_option[ 'et_show_facebook_share' ] ) && $et_option[ 'et_show_facebook_share' ] == '1' ) { ?>checked="checked"<?php } ?>/>
                    <div class="et-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show facebook share link', ETLAK_TD ) ?></p>
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label for="et-twitter-share-check" class="et-twitter-share">
                <?php _e( 'Twitter Share Link', ETLAK_TD ); ?>
            </label>
            <div class="et-post-field-wrap">
                <label class="et-switch">
                    <input type="checkbox" class="et-show-twitter-share et-checkbox" value="<?php
                if ( isset( $et_option[ 'et_show_twitter_share' ] ) ) {
                    echo esc_attr( $et_option[ 'et_show_twitter_share' ] );
                } else {
                    echo '0';
                }
                ?>" name="et_option[et_show_twitter_share]" <?php if ( isset( $et_option[ 'et_show_twitter_share' ] ) && $et_option[ 'et_show_twitter_share' ] == '1' ) { ?>checked="checked"<?php } ?> />
                    <div class="et-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show twitter share link', ETLAK_TD ) ?></p>
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label for="et-google-share-check" class="et-google-share"><?php _e( 'Google Plus Share Link', ETLAK_TD ); ?></label>
            <div class="et-post-field-wrap">
                <label class="et-switch">
                    <input type="checkbox" class="et-show-google-share et-checkbox" value="<?php
                    if ( isset( $et_option[ 'et_show_google_share' ] ) ) {
                        echo esc_attr( $et_option[ 'et_show_google_share' ] );
                    } else {
                        echo '0';
                    }
                ?>" name="et_option[et_show_google_share]" <?php if ( isset( $et_option[ 'et_show_google_share' ] ) && $et_option[ 'et_show_google_share' ] == '1' ) { ?>checked="checked"<?php } ?> />
                    <div class="et-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show google plus share link', ETLAK_TD ) ?></p>
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label for="et-linkedin-share-check" class="et-linkedin-share"><?php _e( 'Linkedin Share Link', ETLAK_TD ); ?></label>
            <div class="et-post-field-wrap">
                <label class="et-switch">
                    <input type="checkbox" class="et-show-linkedin-share et-checkbox" value="<?php
                    if ( isset( $et_option[ 'et_show_linkedin_share' ] ) ) {
                        echo esc_attr( $et_option[ 'et_show_linkedin_share' ] );
                    } else {
                        echo '0';
                    }
                ?>" name="et_option[et_show_linkedin_share]" <?php if ( isset( $et_option[ 'et_show_linkedin_share' ] ) && $et_option[ 'et_show_linkedin_share' ] == '1' ) { ?>checked="checked"<?php } ?> />
                    <div class="et-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show linkedin share link', ETLAK_TD ) ?></p>
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label for="et-mail-share-check" class="et-mail-share"><?php _e( 'Share Via Email', ETLAK_TD ); ?></label>
            <div class="et-post-field-wrap">
                <label class="et-switch">
                    <input type="checkbox" class="et-show-mail-share et-checkbox" value="<?php
                    if ( isset( $et_option[ 'et_show_mail_share' ] ) ) {
                        echo esc_attr( $et_option[ 'et_show_mail_share' ] );
                    } else {
                        echo '0';
                    }
                ?>" name="et_option[et_show_mail_share]" <?php if ( isset( $et_option[ 'et_show_mail_share' ] ) && $et_option[ 'et_show_mail_share' ] == '1' ) { ?>checked="checked"<?php } ?> />
                    <div class="et-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show share via email', ETLAK_TD ) ?></p>
            </div>
        </div>
        <div class ="et-post-option-wrap">
            <label for="et-pinterest-share-check" class="et-pinterest-share"><?php _e( 'Pinterest Share Link', ETLAK_TD ); ?></label>
            <div class="et-post-field-wrap">
                <label class="et-switch">
                    <input type="checkbox" class="et-show-pinterest-share et-checkbox" value="<?php
                    if ( isset( $et_option[ 'et_show_pinterest_share' ] ) ) {
                        echo esc_attr( $et_option[ 'et_show_pinterest_share' ] );
                    } else {
                        echo '0';
                    }
                ?>" name="et_option[et_show_pinterest_share]" <?php if ( isset( $et_option[ 'et_show_pinterest_share' ] ) && $et_option[ 'et_show_pinterest_share' ] == '1' ) { ?>checked="checked"<?php } ?> />
                    <div class="et-slider round"></div>
                </label>
                <p class="description"> <?php _e( 'Enable to show pinterest share link', ETLAK_TD ) ?></p>
            </div>
        </div>
    </div>
</div>
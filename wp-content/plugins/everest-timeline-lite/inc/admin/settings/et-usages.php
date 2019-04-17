<?php defined( 'ABSPATH' ) or die( "No script kiddies please!" ); ?>
<div  class="et-shortcode-usage-wrapper">
    <ul class="et-usage-tab-wrap">
        <li data-usage="tab-1" class="et-usage-trigger et-usage-active">
            <?php _e( 'Shortcode', ETLAK_TD ); ?>
        </li>
        <li data-usage="tab-2" class="et-usage-trigger">
            <?php _e( 'Template Include', ETLAK_TD ); ?>
        </li>
    </ul>
    <div class="et-usage-post" data-usage-ref="tab-1">
        <p class="description"><?php _e( 'Copy and paste the shortcode directly into any WordPress post or page.', ETLAK_TD ) ?></p>
        <div class="et-shortcode-page-wrap">
            <input type='text' value='[et id="<?php echo $post -> ID; ?>"]' readonly="readonly">
        </div>
    </div>
    <div class="et-usage-post" data-usage-ref="tab-2" style="display: none;">
        <p class="description"><?php
            _e( 'Copy and paste this code into a template file to include the Everest Timeline within your theme.', ETLAK_TD );
            ?></p>
        <div class = "et-shortcode-theme-wrap">
            &lt;?php echo do_shortcode("[et id='<?php echo $post -> ID; ?>']");
            ?&gt;
        </div>
    </div>
</div>

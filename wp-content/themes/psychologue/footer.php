<?php
/*
Theme Name: Psychologue
Theme URI: https://mkvadrat.com/
Author: mkvadrat
Author URI: https://mkvadrat.com/
Description: Тема Psychologue
Version: 1.0
*/
?>
        
        <footer>

            <div class="container">
                <div class="row">
                    <div class="col-md-12 mob-padding">
                        <div class="owl-carousel tax-slider">
                        <?php
                            global $nggdb;
                            $gallery_id = getNextGallery(15, 'psifest_banner_main_page');
                            $gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
                            if($gallery_image){
                                foreach($gallery_image as $image) {
                                 
                            ?>
                               <div class="slide">
                                   <div class="text">
                                       <p class="title"><?php echo htmlspecialchars_decode($image->alttext, ENT_QUOTES); ?></p>
                                       <?php echo htmlspecialchars_decode($image->description, ENT_QUOTES); ?>
                                   </div>
                                   <div class="img">
                                       <img src="<?php echo nextgen_esc_url($image->imageURL); ?>" alt="">
                                   </div>
                               </div>
                            <?php
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                        <?php
                            if (has_nav_menu('footer_menu')){
                                wp_nav_menu( array(
                                    'theme_location'  => 'footer_menu',
                                    'menu'            => '',
                                    'container'       => false,
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => '',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul class="menu">%3$s</ul>',
                                    'depth'           => 1,
                                ) );
                            }
                        ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo getMeta('contact_inf_e_main_page'); ?>
                            <a href="#callback" class="light-button">Записаться на консультацию</a>
                        </div>
                        <div class="col-md-6">
                            <?php echo getMeta('contact_inf_f_main_page'); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <?php echo getMeta('contact_inf_g_main_page'); ?>
                        </div>
                        <div class="col-md-6">
                            <?php echo getMeta('contact_inf_h_main_page'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div id="toTop"></div>
        <nav id="menu">
            <?php
                wp_nav_menu( array(
                    'theme_location'  => 'header_menu',
                    'menu'            => '',
                    'container'       => false,
                    'container_class' => '',
                    'container_id'    => '',
                    'menu_class'      => '',
                    'menu_id'         => '',
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'before'          => '',
                    'after'           => '',
                    'link_before'     => '',
                    'link_after'      => '',
                    'items_wrap'      => '<ul>%3$s</ul>',
                    'depth'           => 3,
                    'walker'          => new header_menu(),
                ) );
            ?>
        </nav>
        <div id="callback" style="display:none;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 index-page-form">
                        <div class="form">
                            <?php
                                $forms_a = getMeta('contacts_a_form_main_page');
                                if($forms_a){
                                    echo do_shortcode('[contact-form-7 id=" ' . $forms_a . ' "]'); 
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php wp_footer(); ?>
    
    <script>
        (function(w,d,u){
                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn.bitrix24.ru/b8682007/crm/site_button/loader_1_yfm63e.js');
    </script>
<?php if(function_exists('the_ratings')) { the_ratings(); } ?>
</body>
</html>
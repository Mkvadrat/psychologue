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
        </footer>
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
    
</body>
</html>

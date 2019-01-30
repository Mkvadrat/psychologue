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

<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo psy_wp_title('','|', true, 'right'); ?></title>
    
    <?php wp_head(); ?>
</head>
<body>
    <div class="page">
        <header>
            <div class="container">
                <div class="top-line row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <p><?php echo getMeta('contact_inf_a_main_page'); ?></p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <p class="ralign"><?php echo getMeta('contact_inf_b_main_page'); ?></p>
                    </div>
                </div>
                <div class="central row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php header_image(); ?>" alt="Зезюлинская Инна Алексеевна" />
                            <p><?php echo getMeta('slogan_main_page'); ?></p>
                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <p class="calign call-cunsult">
                            <a href="#callback" class="light-button">Записаться на консультацию</a>
                        </p>
                        <p class="phones ralign mobile"><?php echo getMeta('contact_inf_c_main_page'); ?></p>
                        <p class="phones ralign mobile"><?php echo getMeta('contact_inf_d_main_page'); ?></p>
                    </div>
                    <div class="col-md-4 col-sm-12 sm-hidden">
                        <p class="phones ralign"><?php echo getMeta('contact_inf_c_main_page'); ?></p>
                        <p class="phones ralign"><?php echo getMeta('contact_inf_d_main_page'); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            if (has_nav_menu('header_menu')){
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
                                    'items_wrap'      => '<ul class="menu">%3$s</ul>',
                                    'depth'           => 3,
                                    'walker'          => new header_menu(),
                                ) );
                            }
                        ?>
                        <div class="menu mobile">
                            <a href="#menu">Открыть меню</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
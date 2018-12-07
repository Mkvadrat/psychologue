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
    <title><?php echo psy_wp_title('','', true, 'right'); ?></title>

    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/normalize.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/jquery.mmenu.all.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/media.css">
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.mmenu.all.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.fancybox.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/owl.carousel.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/custom.js"></script>
    
    <?php wp_head(); ?>
</head>
<body>
    <div class="page">
        <header>
            <div class="container">
                <div class="top-line row">
                    <div class="col-md-6">
                        <p><?php echo getMeta('contact_inf_a_main_page'); ?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="ralign"><?php echo getMeta('contact_inf_b_main_page'); ?></p>
                    </div>
                </div>
                <div class="central row">
                    <div class="col-md-4">
                        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <img src="<?php header_image(); ?>" alt="Зезюлинская Инна Алексеевна" />
                            <p><?php echo getMeta('slogan_main_page'); ?></p>
                        </a>
                    </div>
                    <div class="col-md-4">
                        <p class="calign call-cunsult">
                            <a href="#callback" class="light-button">Записаться на консультацию</a>
                        </p>
                    </div>
                    <div class="col-md-4">
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
                    </div>
                </div>
            </div>
        </header>
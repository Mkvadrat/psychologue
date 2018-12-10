<?php
/*
Theme Name: Psychologue
Theme URI: https://mkvadrat.com/
Author: mkvadrat
Author URI: https://mkvadrat.com/
Description: Тема Psychologue
Version: 1.0
*/

get_header(); 
?>
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
                </div>
            </div>
            <?php
                $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'terms' => getCurrentCatID()
                        )
                    ),
                    'post_type'   => 'post',
                    'orderby'     => 'date',
                    'order'       => 'DESC',
                    'posts_per_page' => $GLOBALS['wp_query']->query_vars['posts_per_page'],
                    'paged'          => $current_page,
                );
    
                $post_lists = get_posts( $args );
            ?>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="news-page">
                        <p class="title">
                            <?php
                                $category = get_the_category(); 
                                echo $category[0]->cat_name; //вывод названия категории на экран
                            ?>
                        </p>
                        <div class="news-list">
                            <?php if($post_lists){ ?>
                            <?php foreach($post_lists as $list){ ?>
                            <?php
                                $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($list->ID), 'full');
                                $descr = wp_trim_words( $list->post_content, 30, '...' );
                                $link = get_permalink($list->ID);
                            ?>
                            <div class="item">
                                <a class="img" href="<?php echo $link; ?>">
                                    <?php if(!empty($image_url)){ ?>
                                        <img src="<?php echo $image_url[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($list->ID), '_wp_attachment_image_alt', true ); ?>">
                                    <?php }else{ ?>
                                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/article-img@2x.jpg">
                                    <?php } ?>
                                </a>
                                <div class="text">
                                    <a href="<?php echo $link; ?>" class="name"><?php echo $list->post_title; ?></a>
                                    <p><?php echo $descr; ?></p>
                                    <div class="bottomed">
                                        <a href="<?php echo $link; ?>" class="light-button">Подробнее</a>
                                        <span class="date"><?php echo get_the_date( 'd.m.y', $list->ID ); ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php wp_reset_postdata(); ?>
                            <?php }else{ ?>
                            <li>В данной категории новостей не найдено!</li>
                            <?php } ?>
                        </div>
                        
                        <?php
                            $defaults = array(
                                'type' => 'array',
                                'prev_next'    => True,
                                'prev_text'    => __(''),
                                'next_text'    => __(''),
                            );
        
                            $pagination = paginate_links($defaults);
                            
                        if($pagination){
                        ?>
                        <ul class="paggination">
                            <?php foreach ($pagination as $pag){ ?>
                                <li><?php echo $pag; ?></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<?php get_footer(); ?>
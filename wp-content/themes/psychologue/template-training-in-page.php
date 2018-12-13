<?php
/*
Template name: Training in page
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
            <div class="row">
                <div class="col-md-8">
                    <div class="article-page">
                        <p class="title"><?php the_title(); ?></p>
                        <?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?>
						<?php if($image_url[0]){ ?>
						<img src="<?php echo $image_url[0]; ?>" class="article-img">
						<?php } ?>
                        
                        <div class="article-text">
                            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                                <?php the_content(); ?>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                </div>
                <?php
                    $args = array(
                       'sort_order'   => 'ASC',
                       'sort_column'  => 'post_title',
                       'hierarchical' => 1,
                       'exclude'      => '',
                       'include'      => '',
                       'meta_key'     => '',
                       'meta_value'   => '',
                       'authors'      => '',
                       'child_of'     => 0,
                       'parent'       => 569,
                       'exclude_tree' => '',
                       'post_type'    => 'page',
                       'post_status'  => 'publish',
                    ); 
                
                    $pages = get_pages($args);
                    if($pages){
                ?>
                <div class="col-md-4">
                    <aside class="article-side">
                        <div class="side-list">
                            <p class="title"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/artcl-side-icon@2x.png" alt="">Услуги</p>
                            <ul>
                                <?php foreach($pages as $page){ ?>
                                 <li><a href="<?php echo get_permalink($page->ID); ?>"><?php echo $page->post_title; ?></a></li>
                                 <?php wp_reset_postdata(); ?>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="side-baner">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/article-side@2x.jpg" alt="">
                            <div>
                                <a href="#single" class="light-button">Записаться на обучение</a>
                            </div>
                        </div>
                        <div id="single" style="display:none;">
                            <div class="container">
                             <div class="row">
                               <div class="col-md-12 index-page-form">
                                 <div class="form">
                                   <?php
                                       $forms_a = getMeta('additional_description_training_page');;
                                       if($forms_a){
                                         echo do_shortcode('[contact-form-7 id=" ' . $forms_a . ' "]'); 
                                       }
                                   ?>
                                 </div>
                               </div>
                             </div>
                           </div>
                        </div>
                    </aside>
                </div>
                <?php } ?>
            </div>
            
        <?php if(!empty(get_post_meta( get_the_ID(), 'additional_description_training_in_page', $single = true ))){ ?>
        <div class="row">
           <div class="col-md-12">
                <div class="services-seotext">
                   <?php echo wpautop(get_post_meta( get_the_ID(), 'additional_description_training_in_page', $single = true )); ?>
                </div>
           </div>
        </div>
        <?php } ?>
        </div>
    </section>
   
    
<?php get_footer(); ?>
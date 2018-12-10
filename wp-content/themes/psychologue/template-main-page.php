<?php
/*
Template name: Main page
*/

get_header(); 
?>

   <section>
      <div class="container">
         <?php if(get_post_meta( get_the_ID(), 'enable_block_a_section_main_page', $single = true ) == 'yes'){ ?>
         <div class="row">
              <div class="col-md-12">
               
                  <div class="owl-carousel top-slider">
                     <?php
                         global $nggdb;
                         $gallery_id = getNextGallery(get_the_ID(), 'banner_main_page');
                         $gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
                         if($gallery_image){
                             foreach($gallery_image as $image) {
                              
                         ?>
                           <div class="slide">
                              <img src="<?php echo nextgen_esc_url($image->imageURL); ?>" alt="">
                              <div class="text">
                                    <p class="title"><?php echo $image->alttext; ?></p>
                                    <?php echo htmlspecialchars_decode($image->description, ENT_QUOTES); ?>
                              </div>
                           </div>
                         <?php
                             }
                         }
                     ?>
                  </div>
               </div>
         </div>
         <?php } ?>
          
         <?php if(get_post_meta( get_the_ID(), 'enable_block_b_section_main_page', $single = true ) == 'yes'){ ?>
         <?php $block_a = get_field('block_a_textarea_main_page'); ?>
         <div class="row help-icons">
            <div class="col-md-3">
                <div class="icons">
                  <?php echo $block_a['textarea_a_main_page']; ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="icons">
                  <?php echo $block_a['textarea_b_main_page']; ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="icons">
                  <?php echo $block_a['textarea_c_main_page']; ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="icons">
                  <?php echo $block_a['textarea_d_main_page']; ?>
                </div>
            </div>
         </div>
         <?php } ?>
          
         <?php if(get_post_meta( get_the_ID(), 'enable_block_c_section_main_page', $single = true ) == 'yes'){ ?>
         <?php $block_b = get_field('block_b_textarea_main_page'); ?>
         <div class="row events">
              <div class="col-md-4">
                  <a class="event" href="<?php echo $block_b['link_text_a_main_page']; ?>">
                      <p class="head"><?php echo $block_b['title_text_a_main_page']; ?></p>
                      <div class="adds">
                          <p><?php echo $block_b['description_text_a_main_page']; ?></p>
                      </div>
                  </a>
              </div>
              <div class="col-md-4">
                  <a class="event" href="<?php echo $block_b['link_text_b_main_page']; ?>">
                      <p class="head"><?php echo $block_b['title_text_b_main_page']; ?></p>
                      <div class="adds">
                          <p><?php echo $block_b['description_text_b_main_page']; ?></p>
                      </div>
                  </a>
              </div>
              <div class="col-md-4">
                  <a class="event" href="<?php echo $block_b['link_text_c_main_page']; ?>">
                      <p class="head"><?php echo $block_b['title_text_c_main_page']; ?></p>
                      <div class="adds">
                          <p><?php echo $block_b['description_text_c_main_page']; ?></p>
                      </div>
                  </a>
              </div>
         </div>
         <?php } ?>
          
         <?php if(get_post_meta( get_the_ID(), 'enable_block_d_section_main_page', $single = true ) == 'yes'){ ?>
         <?php $block_c = get_field('block_c_textarea_main_page'); ?>
         <div class="row unic-seotext calign">
              <div class="col-md-8 col-md-offset-2">
                  <h1 class="title"><?php echo $block_c['title_text_a_main_page']; ?></h1>
                  <?php echo wpautop($block_c['description_text_a_main_page']); ?>
                </div>
         </div>
         <div class="row">
              <div class="col-md-12 learning">
                  <div class="col-md-4 text">
                     <p class="title"><?php echo $block_c['title_text_b_main_page']; ?></p>
                     <?php echo wpautop($block_c['description_text_b_main_page']); ?>
                  </div>
                  <div class="col-md-8 img">
                     <img src="<?php echo $block_c['image_block_main_page']['url']; ?>" alt="<?php echo $block_c['image_block_main_page']['alt']; ?>">
                  </div>
              </div>
         </div>
         <?php } ?>
         
         <?php if(get_post_meta( get_the_ID(), 'enable_block_e_section_main_page', $single = true ) == 'yes'){ ?>
         <?php $block_d = get_field('block_d_textarea_main_page'); ?>
         <div class="row">
              <div class="col-md-12">
                  <div class="strong-sides">
                      <div class="col-md-4">
                          <img src="<?php echo $block_d['image_block_a_main_page']['url']; ?>" alt="<?php echo $block_d['image_block_a_main_page']['alt']; ?>">
                          <p><?php echo $block_d['title_text_a_main_page']; ?></p>
                      </div>
                      <div class="col-md-4">
                          <img src="<?php echo $block_d['image_block_b_main_page']['url']; ?>" alt="<?php echo $block_d['image_block_b_main_page']['alt']; ?>">
                          <p><?php echo $block_d['title_text_b_main_page']; ?></p>
                      </div>
                      <div class="col-md-4">
                          <img src="<?php echo $block_d['image_block_c_main_page']['url']; ?>" alt="<?php echo $block_d['image_block_c_main_page']['alt']; ?>">
                          <p><?php echo $block_d['title_text_c_main_page']; ?></p>
                      </div>
                  </div>
              </div>
         </div>
         <?php } ?>
         
         <?php if(get_post_meta( get_the_ID(), 'enable_block_e_section_main_page', $single = true ) == 'yes'){ ?>
         <?php $block_e = get_field('block_e_textarea_main_page'); ?>
         <div class="row">
              <div class="col-md-12">
                  <div class="seotext">
                     <h2 class="title"><?php echo $block_e['title_text_a_main_page']; ?></h2>
                     <?php echo wpautop($block_e['description_text_a_main_page']); ?>
                  </div>
              </div>
         </div>
         <?php } ?>
         
         <?php if(get_post_meta( get_the_ID(), 'enable_block_g_section_main_page', $single = true ) == 'yes'){ ?>
         <div class="row">
              <div class="col-md-12 tax-review">
                  <p class="title"><?php echo get_post_meta( get_the_ID(), 'title_reviews_text_main_page', $single = true ); ?></p>
                  <?php
                       $args = array(
                           'status' => 'approve',
                           'number' => 1,
                           'post_id' => 351,
                       );
                   
                       $comments = get_comments( $args );
                   
                       if($comments){
                   ?>
                   <?php
                     foreach ($comments as $comment) {
                         $author = $comment->comment_author;
                         $descr = mb_substr( strip_tags( $comment->comment_content ), 0, 152 );
                  ?>
                  <div class="item">
                     <p class="name"><?php echo $author; ?></p>
                     <span class="date"><?php comment_date( 'd.m.y', $comment->comment_ID ); ?></span>
                     <p><?php echo $descr; ?></p>
                     <a href="<?php echo get_permalink( 351 ); ?>" class="light-button">Читать все отзывы</a>
                  </div>
                  <?php wp_reset_postdata(); ?>
                  <?php } ?>
                  <?php } ?>
              </div>
         </div>
         <?php } ?>
         
         <div class="row">
            <div class="col-md-12 tax-news">
                <p class="title">Новости и статьи</p>
                <?php 
						$args = array(
							'numberposts' => 3,
							'orderby'     => 'date',
							'order'       => 'DESC',
							'post_type'   => 'post',
							'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
						);

						$posts = get_posts( $args );

						foreach($posts as $post){ setup_postdata($post);
						$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full');
					?>
                <div class="item">
                    <a class="img" href="<?php echo get_permalink($post->ID); ?>">
                        <?php if(!empty($image_url)){ ?>
                           <img src="<?php echo $image_url[0]; ?>" alt="<?php echo get_post_meta( get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true ); ?>">
                        <?php }else{ ?>
                           <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/news@2x.jpg" alt="">
                        <?php } ?>
                    </a>
                    <div class="text">
                        <a href="<?php echo get_permalink($post->ID); ?>" class="name"><?php echo wp_trim_words( $post->post_title, 15, '...' ); ?></a>
                        <p><?php echo wp_trim_words( $post->post_content, 20, '...' ); ?></p>
                        <div class="bottomed">
                            <a href="<?php echo get_permalink($post->ID); ?>" class="light-button">Подробнее</a>
                            <span class="date"><?php echo get_the_date( 'd.m.y', $post->ID ); ?></span>
                        </div>
                    </div>
                </div>
               <?php
							
						}

						wp_reset_postdata();
					?>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12 tax-services">
                <p class="title">Новые товары в магазине</p>
                <div class="items">
                    <div class="item">
                        <a href="#" class="img">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/new-services-1@2x.jpg" alt="">
                        </a>
                        <p>
                            <a href="#">Тестовый Товар</a>
                        </p>
                        <p class="price">5500р.</p>
                    </div>
                    <div class="item">
                        <a href="#" class="img">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/new-services-2@2x.jpg" alt="">
                        </a>
                        <p>
                            <a href="#">Тестовый Товар</a>
                        </p>
                        <p class="price">5500р.</p>
                    </div>
                    <div class="item">
                        <a href="#" class="img">
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/new-services-3@2x.jpg" alt="">
                        </a>
                        <p>
                            <a href="#">Тестовый Товар</a>
                        </p>
                        <p class="price">5500р.</p>
                    </div>
                </div>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12 index-page-form">
                <div class="form">
                    <form action="">
                        <div class="form-head">
                            <div>
                                <p class="title">Записаться на консультацию</p>
                            </div>
                            <div>
                                <p>Оставьте Ваши контактные данные и я с Вами обязательно свяжусь</p>
                            </div>
                        </div>
                        <div class="form-body">
                            <div>
                                <input type="text" placeholder="Ваше имя*">
                                <input type="text" placeholder="Номер телефона*">
                                <input type="text" placeholder="Город">
                            </div>
                            <div>
                                <input type="text" placeholder="Ваш e-mail">
                                <textarea placeholder="Вопрос" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-bottomed">
                            <div>
                                <label><input type="checkbox" checked="false">я согласен (согласна) с политикой
                                    конфиденциальности</label>
                            </div>
                            <div>
                                <button type="submit" class="light-button">Отправить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
         </div>
      </div>
   </section>
    
<?php get_footer(); ?>
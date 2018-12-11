<?php
/*
Template name: Contacts page
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
                  <div class="contact-page">
                      <p class="title"><?php echo get_post_meta( get_the_ID(), 'title_block_contacts_page', $single = true ); ?></p>
                      <div class="contact-text">
                          <div class="first-half">
                              <div class="img">
                                 <?php $image_a = get_field('main_image_contacts_page'); ?>
                                 <img src="<?php echo $image_a['url']; ?>" alt="<?php echo $image_a['alt']; ?>">
                              </div>
                              <div class="contacts">
                                 <div class="garmony">
                                      <?php $image_b = get_field('logo_image_contacts_page'); ?>
                                      <img src="<?php echo $image_b['url']; ?>" alt="<?php echo $image_b['alt']; ?>">
                                      <div>
                                         <?php echo wpautop(get_post_meta( get_the_ID(), 'name_company_contacts_page', $single = true )); ?>
                                      </div>
                                 </div>
                                 <?php echo wpautop(get_post_meta( get_the_ID(), 'address_company_contacts_page', $single = true )); ?>
                                 <div class="socials">
                                    <?php echo wpautop(get_post_meta( get_the_ID(), 'social_links_block_contacts_page', $single = true )); ?>
                                 </div>
                                 <?php echo wpautop(get_post_meta( get_the_ID(), 'viber_company_contacts_page', $single = true )); ?>
                              </div>
                          </div>
                          <div class="second-half">
                              <?php $image_c = get_field('short_image_contacts_page'); ?>
                              <img src="<?php echo $image_c['url']; ?>" alt="<?php echo $image_c['alt']; ?>">
                              <?php echo wpautop(get_post_meta( get_the_ID(), 'address_map_company_contacts_page', $single = true )); ?>
                              <div class="map">
                                 <div>
                                    <?php echo get_post_meta( get_the_ID(), 'maps_block_contacts_page', $single = true ); ?>
                                 </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <aside class="contact-side">
                      <div class="side-form">
                          <?php
                            $forms_a = get_post_meta( get_the_ID(), 'contacts_form_a_contacts_page', $single = true );
                            if($forms_a){
                              echo do_shortcode('[contact-form-7 id=" ' . $forms_a . ' "]'); 
                            }
                          ?>
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
                                  $forms_b = get_post_meta( get_the_ID(), 'contacts_form_b_contacts_page', $single = true );
                                  if($forms_b){
                                    echo do_shortcode('[contact-form-7 id=" ' . $forms_b . ' "]'); 
                                  }
                                ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </aside>
              </div>
          </div>
      </div>
  </section>
   
<?php get_footer(); ?>
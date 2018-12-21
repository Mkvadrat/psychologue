<?php
/*
Template name: Services page
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
                  <div class="services-page">
                     <p class="title"><?php the_title(); ?></p>
                     <?php
                        if(get_the_ID() == '523'){
                           //$th_cat_pages = getChildPagesData('525,527,529,531');
                        ?>
                        <div class="services-list">
                           <?php echo get_post_meta( get_the_ID(), 'category_second_level_services_page', $single = true ); ?>
                        </div>
                        <?php
                        }else{
                           $th_cat_args = array(
                              'sort_order'   => 'ASC',
                              'sort_column'  => 'post_title',
                              'hierarchical' => 1,
                              'exclude'      => '',
                              'include'      => '',
                              'meta_key'     => '',
                              'meta_value'   => '',
                              'authors'      => '',
                              'child_of'     => get_the_ID(),
                              'parent'       => -1,
                              'exclude_tree' => '',
                              'post_type'    => 'page',
                              'post_status'  => 'publish',
                           );
                           
                           $th_cat_pages = get_pages($th_cat_args);
                        
                           if($th_cat_pages){
                     ?>
                     <div class="services-list">
                        <?php foreach($th_cat_pages as $th_cat){ ?>
                        <a class="item" href="<?php echo get_permalink($th_cat->ID); ?>">
                           <?php $image = get_field('thumb_block_services_in_page', $th_cat->ID); ?>
                           <img src="<?php echo $image['url'] ? $image['url'] : ''; ?>" alt="<?php echo $image['alt'] ? $image['alt'] : ''; ?>">
                           <p><?php echo $th_cat->post_title; ?></p>
                        </a>
                        <?php wp_reset_postdata(); ?>
                        <?php } ?>
                     </div>
                     <?php } ?>
                     <?php } ?>
                     
                     <div class="text">
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
                     'parent'       => 523,
                     'exclude_tree' => '',
                     'post_type'    => 'page',
                     'post_status'  => 'publish',
                  ); 
              
                  $pages = get_pages($args);
                  if($pages){
               ?>
               <div class="col-md-4">
                  <aside class="services-side">
                        <div class="side-list">
                           <p class="title"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/edu-side-icon@2x.png" alt="">Услуги</p>
  
                           <ul>
                              <?php foreach($pages as $page){ ?>
                                 <li><a href="<?php echo get_permalink($page->ID); ?>"><?php echo $page->post_title; ?></a></li>
                                 <?php wp_reset_postdata(); ?>
                              <?php } ?>
                           </ul>
                        </div>
                        <div class="side-baner">
                           <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/edu-baner@2x.jpg" alt="">
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
                                       $forms_a = getMeta('contacts_form_services_page');;
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
         </div>
         <?php } ?>
         
         <?php if(!empty(get_post_meta( get_the_ID(), 'additional_description_services_page', $single = true ))){ ?>
         <div class="row">
            <div class="col-md-12">
                  <div class="services-seotext">
                     <?php echo wpautop(get_post_meta( get_the_ID(), 'additional_description_services_page', $single = true )); ?>
                  </div>
            </div>
         </div>
         <?php } ?>
      </div>
      
   </section>
   
    
<?php get_footer(); ?>
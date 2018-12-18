<?php
/*
Template name: About page
*/

get_header(); 
?>

   <section>
      <div class="container">
         <?php if(get_post_meta( get_the_ID(), 'enable_block_a_section_about_page', $single = true ) == 'yes'){ ?>
         <?php $block_a = get_field('block_a_textarea_about_page'); ?>
         <div class="row">
               <div class="col-md-12 learning">
                  <div class="col-md-4 text">
                     <?php echo $block_a['textarea_a_about_page']; ?>
                  </div>
                  <div class="col-md-8 img">
                     <img src="<?php echo $block_a['image_block_about_page']['url']; ?>" alt="<?php echo $block_c['image_block_about_page']['alt']; ?>">
                  </div>
               </div>
          </div>
         <?php } ?>
         
         <?php if(get_post_meta( get_the_ID(), 'enable_block_b_section_about_page', $single = true ) == 'yes'){ ?>
         <?php $block_b = get_field('block_b_textarea_about_page'); ?>
         <div class="row unic-seotext calign">
            <div class="col-md-8 col-md-offset-2">
               <?php echo get_post_meta( get_the_ID(), 'text_methods_block_about_page', $single = true ); ?>
            </div>
         </div>
         <div class="row">
            <div class="col-md-12">
               <div class="strong-sides">
                  <div class="col-md-4">
                     <img src="<?php echo $block_b['image_block_a_about_page']['url']; ?>" alt="<?php echo $block_b['image_block_a_about_page']['alt']; ?>">
                     <p><?php echo $block_b['title_text_a_about_page']; ?></p>
                  </div>
                  <div class="col-md-4">
                     <img src="<?php echo $block_b['image_block_b_about_page']['url']; ?>" alt="<?php echo $block_b['image_block_b_about_page']['alt']; ?>">
                     <p><?php echo $block_b['title_text_b_about_page']; ?></p>
                  </div>
                  <div class="col-md-4">
                     <img src="<?php echo $block_b['image_block_c_about_page']['url']; ?>" alt="<?php echo $block_b['image_block_c_about_page']['alt']; ?>">
                     <p><?php echo $block_b['title_text_c_about_page']; ?></p>
                  </div>
               </div>
            </div>
         </div>
         <?php } ?>
          
         <?php if(get_post_meta( get_the_ID(), 'enable_block_c_section_about_page', $single = true ) == 'yes'){ ?>
         <?php $block_c = get_field('block_b_textarea_about_page'); ?>
         <div class="row">
            <div class="col-md-12">
               <div class="seotext">
                  <?php echo get_post_meta( get_the_ID(), 'text_identity_block_about_page', $single = true ); ?>
               </div>
            </div>
         </div>
         <?php } ?>
         
         <?php if(get_post_meta( get_the_ID(), 'enable_block_d_section_about_page', $single = true ) == 'yes'){ ?>
         <div class="row">
            <div class="col-md-12 tax-gallery">
               <p class="title">Мои сертификаты:</p>
               <div class="items">
                  <?php
                     global $nggdb;
                     $gallery_id = getNextGallery(get_the_ID(), 'gallery_mycertificates_block_about_page');
                     $gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
                     $i = 0; 
                     if($gallery_image){
                        foreach($gallery_image as $image) {
                           if(!$image->exclude == 1){
                              $i++;
                              if($i > 6)  break;
                     ?>
                        <a href="<?php echo nextgen_esc_url($image->imageURL); ?>" data-fancybox="gallery" class="img">
                           <img src="<?php echo nextgen_esc_url($image->thumbnailURL); ?>" alt="<?php echo esc_attr($image->alttext); ?>">
                        </a>
                     <?php  
                           }
                        }
                     }
                 ?>
               </div>
               <?php echo get_post_meta( get_the_ID(), 'text_mycertificates_block_about_page', $single = true ); ?>
            </div>
         </div>
         <?php } ?>
         
         <?php if(get_post_meta( get_the_ID(), 'enable_block_e_section_about_page', $single = true ) == 'yes'){ ?>
         <div class="row">
              <div class="col-md-12 tax-review">
                  <p class="title"><?php echo get_post_meta( get_the_ID(), 'title_reviews_text_about_page', $single = true ); ?></p>
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
 
         <?php if(get_post_meta( get_the_ID(), 'enable_block_f_section_about_page', $single = true ) == 'yes'){ ?>
         <?php
            $args = array(
                'numberposts' => 3,
                'post_type'   => 'shops',
                'orderby'     => 'date',
                'order'       => 'DESC',
            );
    
            $shops_list = get_posts( $args );
            
            if($shops_list){
         ?>
         <div class="row">
            <div class="col-md-12 tax-services">
                <p class="title"><?php echo get_post_meta( get_the_ID(), 'title_shops_text_about_page', $single = true ); ?></p>
                <div class="items">
                     <?php foreach($shops_list as $list){ ?>
                     <?php
                        $image_url = wp_get_attachment_image_src( get_post_thumbnail_id($list->ID), 'full');
                        $title = stripcslashes( wp_trim_words( $list->post_title, 10, '...' ) );
                        $link = get_permalink($list->ID);
                        $price = get_post_meta( $list->ID, 'price_product_shops_page', $single = true )
                     ?>
                        <div class="item">
                            <a href="<?php echo $link; ?>" class="img">
                              <?php if(!empty($image_url)){ ?>
                                  <img src="<?php echo $image_url[0]; ?>" alt="">
                              <?php }else{ ?>
                                 <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/new-services-1@2x.jpg" alt="">
                              <?php } ?>
                            </a>
                            <p>
                                <a href="<?php echo $link; ?>"><?php echo $title; ?></a>
                            </p>
                            <p class="price"><?php echo $price; ?></p>
                        </div>
                     <?php wp_reset_postdata(); ?>
                     <?php } ?>
                </div>
            </div>
         </div>
         <?php } ?>
         <?php } ?>
         
         <?php if(get_post_meta( get_the_ID(), 'enable_block_g_section_about_page', $single = true ) == 'yes'){ ?>
         <div class="row">
            <div class="col-md-12 index-page-form mob-padding">
                <div class="form">
                  <?php
                     $forms_a = get_post_meta( get_the_ID(), 'contacts_a_form_about_page', $single = true );

                     if($forms_a){
                         echo do_shortcode('[contact-form-7 id=" ' . $forms_a . ' "]'); 
                     }
                  ?>
                </div>
            </div>
         </div>
         <?php } ?>
      </div>
   </section>
    
<?php get_footer(); ?>
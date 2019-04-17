<?php
/*
Template name: Timeline page
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
                <div class="col-md-12">
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
            </div>
            
        <?php if(!empty(get_post_meta( get_the_ID(), 'additional_description_timeline_page', $single = true ))){ ?>
        <div class="row">
           <div class="col-md-12">
                <div class="services-seotext">
                   <?php echo wpautop(get_post_meta( get_the_ID(), 'additional_description_timeline_page', $single = true )); ?>
                </div>
           </div>
        </div>
        <?php } ?>
        </div>
    </section>
   
<?php get_footer(); ?>
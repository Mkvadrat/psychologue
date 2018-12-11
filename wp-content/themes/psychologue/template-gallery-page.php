<?php
/*
Template name: Gallery page
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
                    <div class="gallery-page">
                        <p class="title"><?php the_title(); ?></p>
                        <div class="gallery-list">
                            <?php echo do_shortcode(get_post_meta( get_the_ID(), 'albums_block_gallery_page', $single = true )); ?>
                        </div>
                        <div class="gallery-text">
                            <?php echo get_post_meta( get_the_ID(), 'seo_text_block_gallery_page', $single = true ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<?php get_footer(); ?>
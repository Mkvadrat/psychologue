<?php
/*
Template name: Gallery in page
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
                            <?php
								global $nggdb;
								$gallery_id = getNextGallery(get_the_ID(), 'gallery_block_gallery_in_page');
								$gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
								if($gallery_image){
									foreach($gallery_image as $image) {
										if(!$image->exclude == 1){
								?>
									<a class="item" href="<?php echo nextgen_esc_url($image->imageURL); ?>" data-fancybox="gallery">
										<div class="img">
											<img src="<?php echo nextgen_esc_url($image->thumbnailURL); ?>" alt="<?php echo esc_attr($image->alttext); ?>">
										</div>
									</a>
								<?php
										}
									}
								}
							?>
                        </div>
                        <div class="gallery-text">
                            <?php if (have_posts()): while (have_posts()): the_post(); ?>
                                <?php the_content(); ?>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<?php get_footer(); ?>
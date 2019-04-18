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
		<?php $cat = get_the_category(get_the_ID()); ?>
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
				<div class="col-md-4">
					<aside class="article-side">
						<div class="side-list">
							<p class="title"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/artcl-side-icon@2x.png" alt=""><?php echo $cat[0]->cat_name; ?></p>
							<?php 
								$args_input = array(
									'numberposts' => 8,
									'category'    => $cat[0]->term_id,
									'orderby'     => 'date',
									'order'       => 'DESC',
									'post_type'   => 'post',
									'suppress_filters' => true, 
								);

								$articles_line = get_posts( $args_input );

								if($articles_line){
							?>
							<ul>
								<?php
									foreach($articles_line as $post){ setup_postdata($post);
								?>
									<li><a href="<?php echo get_permalink($post->ID); ?>"><?php echo wp_trim_words( $post->post_title, 15, '...' ); ?></a></li>
								<?php		
									}
						
									wp_reset_postdata();
								?>
							</ul>
							<?php } ?>
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
												$forms_b = getTermMeta(7, 'contacts_a_form_rubriq_page');
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

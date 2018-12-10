<?php
/*
Theme Name: Mkvadrat
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://mkvadrat.com/
Version: 1.0
*/

get_header();
?>

	<section>
		<?php $cat = wp_get_post_terms(get_the_ID(), 'shops-list'); ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="shop-page">
						<p class="title"><?php the_title(); ?></p>
						<?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full'); ?>
						<?php if($image_url[0]){ ?>
						<img src="<?php echo $image_url[0]; ?>" class="article-img">
						<?php } ?>
						<div class="shop-text">
							<div class="options">
								<?php echo get_post_meta( get_the_ID(), 'options_single_shops_page', $single = true ); ?>
							</div>
							<p class="subtitle">Описание:</p>
							
							<?php if (have_posts()): while (have_posts()): the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<aside class="shop-side">
						<div class="side-list">
							<p class="title"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/shop-cart@2x.png" alt="">Магазин</p>
							<?php 
								$terms = get_terms("shops-list", 'orderby=count&hide_empty=0');
								$count = count($terms);
								if ($count > 0) {
									foreach ($terms as $term) {
										$term_link = get_term_link($term->term_taxonomy_id, 'shops-list');
							?>
									<ul>
										<li><a href="<?php echo $term_link; ?>"><?php echo $term->name; ?></a></li>
									</ul>
							<?php
									}
								}
							?>
						</div>
					</aside>
				</div>
			</div>
			
			<?php $forms_c = get_post_meta( get_the_ID(), 'contacts_a_form_shops_page', $single = true ); ?>
			<?php if($forms_c){ ?>
			<div class="row">
				<div class="col-md-12 page-form shop-page-form">
					<div class="form">
						<?php
							echo do_shortcode('[contact-form-7 id=" ' . $forms_c . ' "]'); 	
						?>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</section>

<?php get_footer(); ?>

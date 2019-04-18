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
		<?php $cat = wp_get_post_terms(get_the_ID(), 'articles-list'); ?>
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
							<p class="title"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/artcl-side-icon@2x.png" alt="">Мероприятия</p>
							<ul>
								<?php
									$childrens = get_children( array( 
										'post_parent' => 1877,
										'post_type'   => 'page', 
										'numberposts' => -1,
										'post_status' => 'public',
										'order'       => 'ASC',
									) );
									
									if( $childrens ){
										foreach( $childrens as $children ){
								?>
									<li><a href="<?php echo get_permalink( $children->ID ); ?>"><?php echo $children->post_title; ?></a></li>
								<?php
										}
									}
								?>
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
                                       $forms_a = getTermMeta(21, 'contacts_a_form_activities_page');
									   
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
			
			<?php if(!empty(get_post_meta( get_the_ID(), 'additional_description_activities_page', $single = true ))){ ?>
			<div class="row">
				<div class="col-md-12">
					<div class="article-seotext">
						<?php echo wpautop(get_post_meta( get_the_ID(), 'additional_description_activities_page', $single = true )); ?>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</section>

<?php get_footer(); ?>

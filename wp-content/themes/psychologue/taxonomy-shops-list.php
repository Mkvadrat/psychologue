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
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="gallery-page">
						<?php
							$term = get_queried_object();
						?>
						<p class="title"><?php echo $term->name?></p>
						<?php
							$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$args = array(
								'tax_query' => array(
									array(
										'taxonomy' => 'shops-list',
										'field' => 'id',
										'terms' => array( get_queried_object()->term_id )
									)
								),
									'post_type' => 'shops',
									'posts_per_page' => $GLOBALS['wp_query']->query_vars['posts_per_page'],
									'paged'          => $current_page
							);
				
							$shops_list = get_posts( $args );
						?>
						<div class="gallery-list">
							<?php if($shops_list){ ?>
							<?php foreach($shops_list as $shops){ ?>
							<?php
								$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($shops->ID), 'full');
								$descr = wp_trim_words( $shops->post_content, 15, '...' );
								$link = get_permalink($shops->ID);
								$price = get_post_meta( $shops->ID, 'price_product_shops_page', $single = true );
							?>
							
								<a class="item" href="<?php echo $link; ?>">
									<div class="img">
										<img src="<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/images/new-services-3@2x.jpg'; ?>" alt="">
									</div>
									<p><?php echo $descr; ?></p>
									<p><?php echo $price; ?></p>
								</a>

							<?php } ?>
						</div>
						<?php wp_reset_postdata(); ?>
						<?php }else{ ?>
							<div class="gallery-list">В данной категории товаров не найдено!</div>
						<?php } ?>
						
						<?php
							$defaults = array(
								'type' => 'array',
								'prev_next'    => True,
								'prev_text'    => __('В начало'),
								'next_text'    => __('В конец'),
							);
		
							$pagination = paginate_links($defaults);
						?>
						
						<?php
                            $defaults = array(
                                'type' => 'array',
                                'prev_next'    => True,
                                'prev_text'    => __(''),
                                'next_text'    => __(''),
                            );
        
                            $pagination = paginate_links($defaults);
                            
                        if($pagination){
                        ?>
                        <ul class="paggination">
                            <?php foreach ($pagination as $pag){ ?>
                                <li><?php echo $pag; ?></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
					
						<div class="gallery-text">
							<?php echo wpautop($term->description); ?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<aside class="shop-side">
						<div class="side-list">
							<p class="title"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/shop-cart@2x.png" alt="">Магазин</p>
							<ul>
							<?php 
								$terms = get_terms("shops-list", 'orderby=count&hide_empty=0&child_of=14');
								$count = count($terms);
								if ($count > 0) {
									foreach ($terms as $term) {
										$term_link = get_term_link($term->term_taxonomy_id, 'shops-list');
							?>
								<li><a href="<?php echo $term_link; ?>"><?php echo $term->name; ?></a></li>
							<?php
									}
								}
							?>
							</ul>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</section>
	
<?php get_footer(); ?>

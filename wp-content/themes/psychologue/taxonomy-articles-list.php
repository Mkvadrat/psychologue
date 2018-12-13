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
					<div class="activities-page">
						<?php
							$term = get_queried_object();
						?>
						<p class="title"><?php echo $term->name?></p>
						
						<?php
							$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$args = array(
								'tax_query' => array(
									array(
										'taxonomy' => 'articles-list',
										'field' => 'id',
										'terms' => array( get_queried_object()->term_id )
									)
								),
									'post_type' => 'articles',
									'posts_per_page' => $GLOBALS['wp_query']->query_vars['posts_per_page'],
									'paged'          => $current_page
							);
				
							$articles_list = get_posts( $args );
						?>
						<div class="activity-list">
							<?php if($articles_list){ ?>
							<?php foreach($articles_list as $articles){ ?>
							<?php
								$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($articles->ID), 'full');
								$descr = wp_trim_words( $articles->post_content, 15, '...' );
								$link = get_permalink($articles->ID);
							?>
							<div class="item">
								<a class="img" href="<?php echo $link; ?>">
									<img src="<?php echo $image_url[0] ? $image_url[0] : esc_url( get_template_directory_uri() ) . '/images/article-img@2x.jpg'; ?>" alt="">
								</a>
								<div class="text">
									<a href="<?php echo $link; ?>" class="name"><?php echo $articles->post_title; ?></a>
									<div class="bottomed">
										<a href="<?php echo $link; ?>" class="light-button">Подробнее</a>
										<span class="date"><?php echo get_the_date( 'd.m.y', $articles->ID ); ?></span>
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
						<?php wp_reset_postdata(); ?>
						<?php } ?>
						
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
					<aside class="article-side">
						<div class="side-list">
							<p class="title"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/artcl-side-icon@2x.png" alt="">Мероприятия</p>

							<ul>
								<?php 
									$terms = get_terms("articles-list", 'orderby=count&hide_empty=0&child_of=21');
									$count = count($terms);
									if ($count > 0) {
										foreach ($terms as $term) {
											$term_link = get_term_link($term->term_taxonomy_id, 'articles-list');
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

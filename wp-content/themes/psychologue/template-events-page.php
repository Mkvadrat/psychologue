<?php
/*
Template name: Events page
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
						<?php if($term->term_id){ ?>
						<p class="title"><?php echo $term->name; ?></p>
						<?php }elseif($term->query_var == 'tribe_events'){ ?>
						<p class="title"><?php echo $term->label; ?></p>
						<?php }else{ ?>
						<p class="title"><?php echo $term->post_title; ?></p>
						<?php } ?>
						
						<div class="activity-list">
							<?php tribe_get_view(); ?>
							
							<?php if(is_singular('tribe_events')){ ?>
							<?php tribe_get_template_part( 'modules/meta' ); ?>
							<?php } ?>
						</div>
					
						<div class="gallery-text">
							<?php
								$first_descr = get_option('tribe_events_calendar_options');								
								if($term->term_id){
									echo wpautop($term->description);
								}elseif(!is_singular('tribe_events')){
									echo stripcslashes(wpautop($first_descr['tribeEventsAfterHTML']));
								}
							?>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<aside class="article-side">
						<div class="side-list">
							<p class="title"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/artcl-side-icon@2x.png" alt="">Мероприятия</p>

							<ul>
								<?php
									$args = array(
										'orderby'            => 'name',
										'order'              => 'ASC',
										'style'              => 'list',
										'show_count'         => 0,
										'hide_empty'         => 0,
										'use_desc_for_title' => 1,
										'child_of'           => 0,
										'hierarchical'       => true,
										'title_li'           => __( '' ),
										'number'             => NULL,
										'echo'               => 1,
										'depth'              => 0,
										'current_category'   => 0,
										'pad_counts'         => 0,
										'taxonomy'           => 'tribe_events_cat',
									);
	
									echo '<ul>';
										wp_list_categories( $args );
									echo '</ul>';
								?>
							</ul>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</section>
	
<?php get_footer(); ?>
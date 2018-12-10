<?php
/*
Theme Name: Psychologue
Theme URI: https://mkvadrat.com/
Author: mkvadrat
Author URI: https://mkvadrat.com/
Description: Тема Psychologue
Version: 1.0
*/

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
****************************************************************************НАСТРОЙКИ ТЕМЫ*****************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Регистрируем название сайта
function psy_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	$title .= get_bloginfo( 'name', 'display' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'ug' ), max( $paged, $page ) );
	}

	if ( is_404() ) {
        $title = '404';
    }

	return $title;
}
add_filter( 'wp_title', 'psy_wp_title', 10, 2 );

//Изображение в шапке сайта
$args = array(
  'default-image' => get_template_directory_uri() . '/images/logo@2x.png',
  'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

//Регистрируем меню
if(function_exists('register_nav_menus')){
	register_nav_menus(
		array(
		  'header_menu' => 'Меню в шапке',
		  'footer_menu' => 'Меню в подвале',
		)
	);
}

//Вывод id категории
function getCurrentCatID(){
	global $wp_query;
	if(is_category()){
		$cat_ID = get_query_var('cat');
	}
	return $cat_ID;
}

//Добавление в тему миниатюры записи и страницы
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

//Отключить редактор
add_filter('use_block_editor_for_post', '__return_false');

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
****************************************************************************МЕНЮ САЙТА*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
// Добавляем свой класс для пунктов меню:
class header_menu extends Walker_Nav_Menu {
	// Добавляем классы к вложенным ul
	function start_lvl( &$output, $depth ) {
		// Глубина вложенных ul
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'',
			( $display_depth % 2  ? '' : '' ),
			( $display_depth >=2 ? '' : '' ),
			''
			);
		$class_names = implode( ' ', $classes );
		// build html
		if($depth == 0){
			$output .= "\n" . $indent . '<ul class="submenu">' . "\n";
		}else if($depth == 1){
			$output .= "\n" . $indent . '<ul class="subsubmenu">' . "\n";
		}else if($depth >= 2){
			$output .= "\n" . $indent . '<ul class="subsubsubmenu">' . "\n";
		}
	}

	// Добавляем классы к вложенным li
	function start_el( &$output, $item, $depth, $args ) {
		global $wpdb;
		global $wp_query;
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		// depth dependent classes
		$depth_classes = array(
			( $depth == 0 ? 'has-sub' : '' ),
			( $depth >=2 ? '' : '' ),
			( $depth % 2 ? '' : '' ),
			'menu-item-depth-' . $depth
		);

		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		// passed classes
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$mycurrent = ( $item->current == 1 ) ? ' active' : '';

		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		$output .= $indent . '<li>';

		// Добавляем атрибуты и классы к элементу a (ссылки)
		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : ''; 
		$attributes .= ' class="menu-link ' . ( $depth == 0 ? 'parent' : '' ) . ( $depth == 1 ? 'child' : '' ) . ( $depth >= 2 ? 'sub-child' : '' ) . '"';

		if($depth == 0){
			$has_children = $wpdb->get_results( $wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = %s AND meta_key = '_menu_item_menu_item_parent'", $item->ID), ARRAY_A);

			$link  =  $item->url;

			$title = apply_filters( 'the_title', $item->title, $item->ID );

			if(!empty($has_children)){
				$item_output = '<a href="'. $link .'">' . $title .' </a>';
			}else{
				$item_output = '<a href="'. $link .'">' . $title .'</a>';
			}
		}else if($depth == 1){
			$has_children = $wpdb->get_results( $wpdb->prepare("SELECT post_id FROM $wpdb->postmeta WHERE meta_value = %s AND meta_key = '_menu_item_menu_item_parent'", $item->ID), ARRAY_A);

			$link  =  $item->url;

			$title = apply_filters( 'the_title', $item->title, $item->ID );

			if(!empty($has_children)){
				$item_output = '<a href="'. $link .'">' . $title .' </a>';
			}else{
				$item_output = '<a href="'. $link .'">' . $title .'</a>';
			}
		}else if($depth >= 2){
			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			);
		}
		// build html

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************************РАБОТА С METAПОЛЯМИ*******************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод данных из произвольных полей для всех страниц сайта
function getMeta($meta_key){
	global $wpdb;
	
	$value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_id DESC LIMIT 1", $meta_key) );
	
	return $value;
}

function getTermMeta($meta_key){
	global $wpdb;
	
	$value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->termmeta WHERE meta_key = %s ORDER BY meta_id DESC LIMIT 1", $meta_key) );
	
	return $value;
}

//Вывод изображения для плагина nextgen-gallery
function getNextGallery($post_id, $meta_key){
	global $wpdb;
	
	$value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta AS pm JOIN $wpdb->posts AS p ON (pm.post_id = p.ID) AND (pm.post_id = %s) AND meta_key = %s ORDER BY pm.post_id DESC LIMIT 1", $post_id, $meta_key) );
	
	$unserialize_value = unserialize($value);
	
	return $unserialize_value;	
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*******************************************************************SEO PATH FOR IMAGE**********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
function getAltImage($meta_key){
	global $wpdb;

	$post_id = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_id DESC LIMIT 1" , $meta_key));

	$attachment = get_post( $post_id );

	return get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
}

function getTitleImage($meta_key){
	global $wpdb;

	$post_id = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_id DESC LIMIT 1" , $meta_key));

	$attachment = get_post( $post_id );

	return $attachment->post_title;
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************КОММЕНТАРИИ*************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Ajax функция добавления комментариев
function true_add_ajax_comment(){
	global $wpdb;
	$comment_post_ID = isset($_POST['comment_post_ID']) ? (int) $_POST['comment_post_ID'] : 0;

	$post = get_post($comment_post_ID);

	if ( empty($post->comment_status) ) {
		do_action('comment_id_not_found', $comment_post_ID);
		exit;
	}

	$status = get_post_status($post);

	$status_obj = get_post_status_object($status);

	/*
	 * различные проверки комментария
	 */
	if ( !comments_open($comment_post_ID) ) {
		do_action('comment_closed', $comment_post_ID);
		wp_die( __('Sorry, comments are closed for this item.') );
	} elseif ( 'trash' == $status ) {
		do_action('comment_on_trash', $comment_post_ID);
		exit;
	} elseif ( !$status_obj->public && !$status_obj->private ) {
		do_action('comment_on_draft', $comment_post_ID);
		exit;
	} elseif ( post_password_required($comment_post_ID) ) {
		do_action('comment_on_password_protected', $comment_post_ID);
		exit;
	} else {
		do_action('pre_comment_on_post', $comment_post_ID);
	}

	$comment_author       = ( isset($_POST['author']) )  ? trim(strip_tags($_POST['author'])) : null;
	$comment_author_email = ( isset($_POST['email']) )   ? trim($_POST['email']) : null;
	$comment_phone      = ( isset($_POST['phone']) ) ? trim($_POST['phone']) : null;
	$comment_city      = ( isset($_POST['city']) ) ? trim($_POST['city']) : null;
	$comment_content      = ( isset($_POST['comment']) ) ? trim($_POST['comment']) : null;

	/*
	 * проверяем, залогинен ли пользователь
	 */
	$error_comment = array();

	$user = wp_get_current_user();
	if ( $user->exists() ) {
		if ( empty( $user->display_name ) )
		$user->display_name=$user->user_login;
		$comment_author       = $wpdb->escape($user->display_name);
		$comment_author_email = $wpdb->escape($user->user_email);
		
		$user_ID = get_current_user_id();
		if ( current_user_can('unfiltered_html') ) {
			if ( wp_create_nonce('unfiltered-html-comment_' . $comment_post_ID) != $_POST['_wp_unfiltered_html_comment'] ) {
				kses_remove_filters(); // start with a clean slate
				kses_init_filters(); // set up the filters
			}
		}
	} else {
		if ( get_option('comment_registration') || 'private' == $status )
			$error_comment['error'] = wp_die( 'Ошибка: Вы должны зарегистрироваться или войти, чтобы оставлять комментарии.' );
	}

	$comment_type = '';

	/*
	 * проверяем, заполнил ли пользователь все необходимые поля
 	 */
	if ( get_option('require_name_email') && !$user->exists() ) {
		if ( 6 > strlen($comment_author_email) || '' == $comment_author ){
			$error_comment['error'] = wp_die( 'Ошибка: заполните необходимые поля (Имя, Email).' );
		}elseif ( !is_email($comment_author_email)){
			$error_comment['error'] = wp_die( 'Ошибка: введенный вами email некорректный.' );
		}
	}
	
	if ( '' == trim($comment_phone) ||  '<p><br></p>' == $comment_phone ){
		$error_comment['error'] = wp_die( 'Ошибка: заполните необходимые поля (Телефон).' );
	}
	
	if ( '' == trim($comment_content) ||  '<p><br></p>' == $comment_content ){
		$error_comment['error'] = wp_die( 'Ошибка: Вы забыли про комментарий.' );
	}

	wp_json_encode($error_comment);

	/*
	 * добавляем новый коммент и сразу же обращаемся к нему
	 */
	$comment_parent = isset($_POST['comment_parent']) ? absint($_POST['comment_parent']) : 0;
	$commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'comment_parent', 'user_ID');
	$comment_id = wp_new_comment( $commentdata );
	$comment = get_comment($comment_id);

	die();
}
add_action('wp_ajax_ajaxcomments', 'true_add_ajax_comment'); // wp_ajax_{значение параметра action}
add_action('wp_ajax_nopriv_ajaxcomments', 'true_add_ajax_comment'); // wp_ajax_nopriv_{значение параметра action}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
********************************************************************ХЛЕБНЫЕ КРОШКИ*************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
function dimox_breadcrumbs() {
	/* === ОПЦИИ === */
	$text['home'] = 'Главная'; // текст ссылки "Главная"
	$text['category'] = '%s'; // текст для страницы рубрики
	$text['search'] = 'Результаты поиска по запросу "%s"'; // текст для страницы с результатами поиска
	$text['tag'] = 'Записи с тегом "%s"'; // текст для страницы тега
	$text['author'] = 'Статьи автора %s'; // текст для страницы автора
	$text['404'] = 'Ошибка 404'; // текст для страницы 404
	$text['page'] = 'Страница %s'; // текст 'Страница N'
	$text['cpage'] = 'Страница комментариев %s'; // текст 'Страница комментариев N'
  
	$wrap_before = '<ul class="breadcrumbs">'; // открывающий тег обертки
	$wrap_after = '</ul>'; // закрывающий тег обертки
	$sep = ''; // разделитель между "крошками"
	$sep_before = ''; // тег перед разделителем
	$sep_after = ''; // тег после разделителя
	$show_home_link = 1; // 1 - показывать ссылку "Главная", 0 - не показывать
	$show_on_home = 0; // 1 - показывать "хлебные крошки" на главной странице, 0 - не показывать
	$show_current = 1; // 1 - показывать название текущей страницы, 0 - не показывать
	$before = '<li><span>'; // тег перед текущей "крошкой"
	$after = '</span></li>'; // тег после текущей "крошки"
	/* === КОНЕЦ ОПЦИЙ === */
  
	global $post;
	$home_url = home_url('/');
	$link_before = '';
	$link_after = '';
	$link_attr = '';
	$link_in_before = '';
	$link_in_after = '';
	$link = $link_before . '<li><a href="%1$s"' . $link_attr . '>' . $link_in_before . '%2$s' . $link_in_after . '</a></li>' . $link_after;
	$frontpage_id = get_option('page_on_front');
	$parent_id = ($post) ? $post->post_parent : '';
	$sep = ' ' . $sep_before . $sep . $sep_after . ' ';
	$home_link = $link_before . '<li><a href="' . $home_url . '"' . $link_attr . '>' . $link_in_before . $text['home'] . $link_in_after . '</a></li>' . $link_after;
  
	if (is_home() || is_front_page()) {
	
		if ($show_on_home) echo $wrap_before . $home_link . $wrap_after;
	
	} else {
	
		echo $wrap_before;
		if ($show_home_link) echo $home_link;
		
		if ( is_category() ) {
			$cat = get_category(get_query_var('cat'), false);
			if ($cat->parent != 0) {
				$cats = get_category_parents($cat->parent, TRUE, $sep);
				$cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				if ($show_home_link) echo $sep;
				echo $cats;
			}
			if ( get_query_var('paged') ) {
				$cat = $cat->cat_ID;
				echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo $sep . $before . sprintf($text['category'], single_cat_title('', false)) . $after;
			}
	  
		} elseif ( is_search() ) {
			if (have_posts()) {
				if ($show_home_link && $show_current) echo $sep;
				if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
			} else {
				if ($show_home_link) echo $sep;
				echo $before . sprintf($text['search'], get_search_query()) . $after;
			}
		} elseif ( is_day() ) {
			if ($show_home_link) echo $sep;
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
			echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
			if ($show_current) echo $sep . $before . get_the_time('d') . $after;
		} elseif ( is_month() ) {
			if ($show_home_link) echo $sep;
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
			if ($show_current) echo $sep . $before . get_the_time('F') . $after;
		} elseif ( is_year() ) {
			if ($show_home_link && $show_current) echo $sep;
			if ($show_current) echo $before . get_the_time('Y') . $after;
		} elseif ( is_single() && !is_attachment() ) {
			//Категории (для single.php)
			if ($show_home_link) echo $sep;
			if ( get_post_type() != 'post' ) {
				if( get_post_type() == 'appliances'){
					$page = get_post('755');
					
					$term = get_the_terms(get_the_ID(), 'appliances-list');
					
					echo '<li><a href="'.get_page_link($page->ID).'">' . $page->post_title . '</a></li>' . $after . $sep . $before .'<li><a href="'.get_term_link($term[0]->term_id, 'appliances-list').'">' . $term[0]->name . '</a></li>' ;
					
					if ($show_current) echo $sep . $before . get_the_title() . $after;
				}else{
					$post_type = get_post_type_object(get_post_type());
					$slug = $post_type->rewrite;
					printf($link, $home_url . $slug['slug'] . '/', $post_type->labels->singular_name);
					if ($show_current) echo $sep . $before . get_the_title() . $after;
				}
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $sep);
				if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
					$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<li><a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a></li>' . $link_after, $cats);
				echo $cats;
				if ( get_query_var('cpage') ) {
					echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
				} else {
					if ($show_current) echo $before . get_the_title() . $after;
				}
			}
			// custom post type
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			//Категории (для category.php)
			$term_name = get_term( get_queried_object()->term_id, 'appliances-list' );
			
			if(get_post_type() == 'appliances' || $term_name->taxonomy == 'appliances-list'){
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				
				$page = get_post('755');
				
				echo $sep . '<li><a href="'.get_page_link($page->ID).'">' . $page->post_title . '</a></li>' . $after ;

				if ($show_current) echo $sep . $before . $term->name . $after;
			}else{
				$post_type = get_post_type_object(get_post_type());	  
				if ( get_query_var('paged') ) {
					echo $sep . sprintf($link, get_page_link( $post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
				} else {
					if ($show_current) echo $sep . $before . $post_type->label . $after;
				}
			}
	
		} elseif ( is_attachment() ) {
			if ($show_home_link) echo $sep;
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			if ($cat) {
				$cats = get_category_parents($cat, TRUE, $sep);
				$cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .'>' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
				echo $cats;
			}
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current) echo $sep . $before . get_the_title() . $after;
		} elseif ( is_page() && !$parent_id ) {
				if ($show_current) echo $sep . $before . get_the_title() . $after;
		} elseif ( is_page() && $parent_id ) {
			if ($show_home_link) echo $sep;
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
				  $page = get_page($parent_id);
				  if ($parent_id != $frontpage_id) {
					  $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
				  }
				  $parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					  echo $breadcrumbs[$i];
					  if ($i != count($breadcrumbs)-1) echo $sep;
				}
			}
			if ($show_current) echo $sep . $before . get_the_title() . $after;
		} elseif ( is_tag() ) {
			if ( get_query_var('paged') ) {
				$tag_id = get_queried_object_id();
				$tag = get_tag($tag_id);
				echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
			}
		} elseif ( is_author() ) {
			global $author;
			$author = get_userdata($author);
			if ( get_query_var('paged') ) {
				if ($show_home_link) echo $sep;
				echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
			} else {
				if ($show_home_link && $show_current) echo $sep;
				if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
			}
		} elseif ( is_404() ) {
			if ($show_home_link && $show_current) echo $sep;
			if ($show_current) echo $before . $text['404'] . $after;
	
		} elseif ( has_post_format() && !is_singular() ) {
			if ($show_home_link) echo $sep;
			echo get_post_format_string( get_post_format() );
		}
	
		echo $wrap_after;
	}
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
********************************************************************РАЗДЕЛ "МАГАЗИН" В АДМИНКЕ*************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод в админке раздела
function register_post_type_shops() {
	$labels = array(
	 'name' => 'Товары',
	 'singular_name' => 'Товары',
	 'add_new' => 'Добавить товар',
	 'add_new_item' => 'Добавить новый товар',
	 'edit_item' => 'Редактировать товар',
	 'new_item' => 'Новые товары',
	 'all_items' => 'Все товары',
	 'view_item' => 'Просмотр товара на сайте',
	 'search_items' => 'Искать товар',
	 'not_found' => 'Товар не найдена.',
	 'not_found_in_trash' => 'В корзине нет товаров.',
	 'menu_name' => 'Товары'
	 );
	$args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-building',
		'menu_position' => 8,
		'supports' => array( 'title','editor', 'thumbnail' ),
	);
 	register_post_type('shops', $args);
}
add_action( 'init', 'register_post_type_shops' );

function true_post_type_shops( $shops ) {
	global $post, $post_ID;

	$shops['shops'] = array(
			0 => '',
			1 => sprintf( 'Статьи обновлены. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			2 => 'Статья обновлёна.',
			3 => 'Статья удалёна.',
			4 => 'Статья обновлена.',
			5 => isset($_GET['revision']) ? sprintf( 'Статья восстановлена из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => sprintf( 'Статья опубликована на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			7 => 'Статья сохранена.',
			8 => sprintf( 'Отправлена на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			9 => sprintf( 'Запланирована на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	return $shops;
}
add_filter( 'post_updated_messages', 'true_post_type_shops' );
	
function create_taxonomies_shops(){
    // Cats Categories
    register_taxonomy('shops-list',array('shops'),array(
        'hierarchical' => true,
        'label' => 'Рубрики',
        'singular_name' => 'Рубрика',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'shops-list' )
    ));
}
add_action( 'init', 'create_taxonomies_shops', 0 );
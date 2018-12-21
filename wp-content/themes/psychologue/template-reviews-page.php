<?php
/*
Template name: Reviews page
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
                <div class="col-md-12 mob-padding">
                    <div class="reviews-page">
                        <p class="title"><?php the_title(); ?></p>
                        <div class="reviews-list">
                            <?php 
                            
                                define( 'DEFAULT_COMMENTS_PER_PAGE', $GLOBALS['wp_query']->query_vars['comments_per_page']);
                            
                                $page = (get_query_var('page')) ? get_query_var('page') : 1;
                            
                                $limit = DEFAULT_COMMENTS_PER_PAGE;
                            
                                $offset = ($page * $limit) - $limit;
                            
                                $param = array(
                                    'status'	=> 'approve',
                                    'offset'	=> $offset,
                                    'number'	=> $limit
                                );
                            
                                $total_comments = get_comments(array(
                                    'orderby' => 'comment_date',
                                    'order'   => 'ASC',
                                    'status'  => 'approve',
                                    'parent'  => 0
                            
                                ));
                            
                                $pages = ceil(count($total_comments)/DEFAULT_COMMENTS_PER_PAGE);
                            
                                $comments = get_comments( $param );
                            
                                $args = array(
                                    'base'         => @add_query_arg('page','%#%'),
                                    'format'       => '?page=%#%',
                                    'total'        => $pages,
                                    'current'      => $page,
                                    'show_all'     => false,
                                    'mid_size'     => 4,
                                    'prev_next'    => false,
                                    'prev_text'    => __('&laquo; В начало'),
                                    'next_text'    => __('В конец &raquo;'),
                                    //'type'         => 'comment'
                                    'type' => 'array'
                                );
                                
                                if($comments){
                                foreach($comments as $comment){
                                    $author = $comment->comment_author;
                                    $descr = strip_tags( $comment->comment_content );
                                    global $cnum;
                            
                                    // определяем первый номер, если включено разделение на страницы
                            
                                    $per_page = $limit;
                            
                                    if( $per_page && !isset($cnum) ){
                                        $com_page = $page;
                                        if($com_page>1)
                                            $cnum = ($com_page-1)*(int)$per_page;
                                    }
                                    // считаем
                                    $cnum = isset($cnum) ? $cnum+1 : 1;
                            ?>
                            <div class="item">
                                <p class="name"><?php echo $author; ?></p>
                                <span class="date"><?php comment_date( 'd.m.y', $comment->comment_ID ); ?></span>
                                <p><?php echo $descr; ?></p>
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>

                        <?php $pagination = paginate_links($args);
                            
                        if($pagination){
                        ?>
                        <ul class="paggination">
                            <?php foreach ($pagination as $pag){ ?>
                                <li><?php echo $pag; ?></li>
                            <?php } ?>
                        </ul>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 page-form mob-padding">
                    <div class="form">
                        <form id="commentform">
                            <div class="form-head">
                                <div>
                                    <p class="title">Оставить отзыв</p>
                                </div>
                            </div>
                            <div class="form-body">
                                <div>
                                    <input type="text" name="author" id="author" placeholder="Ваше имя*">
                                    <input type="text" name="phone" id="phone" placeholder="Номер телефона">
                                    <input type="text" name="city" id="city" placeholder="Город">
                                </div>
                                <div>
                                    <input type="text" name="email" id="email" placeholder="Ваш e-mail*">
                                    <textarea name="comment" id="comment" placeholder="Отзыв" rows="4"></textarea>
                                </div>
                            </div>
                            <?php echo comment_id_fields(); ?>
                            <div class="respond"></div>
                        </form>
                        <div class="form-bottomed">
                            <div>
                                <label><input type="checkbox" checked="false">я согласен (согласна) с политикой
                                    конфиденциальности</label>
                            </div>
                            <div>
                                <button type="submit" onclick="submit();" class="light-button" disabled="disabled">Отправить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script language="javascript">
        function submit(){
            $("#commentform").submit();
        }
    </script>
  
<?php get_footer(); ?>
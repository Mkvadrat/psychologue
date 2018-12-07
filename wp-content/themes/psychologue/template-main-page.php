<?php
/*
Template name: Main page
*/

get_header(); 
?>

   <section>
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="owl-carousel top-slider">
                     <?php
                         global $nggdb;
                         $gallery_id = getNextGallery(get_the_ID(), 'banner_main_page');
                         $gallery_image = $nggdb->get_gallery($gallery_id[0]["ngg_id"], 'sortorder', 'ASC', false, 0, 0);
                         if($gallery_image){
                             foreach($gallery_image as $image) {
                              
                         ?>
                           <div class="slide">
                              <img src="<?php echo nextgen_esc_url($image->imageURL); ?>" alt="">
                              <div class="text">
                                    <p class="title"><?php echo $image->alttext; ?></p>
                                    <?php echo htmlspecialchars_decode($image->description, ENT_QUOTES);; ?>
                              </div>
                           </div>
                         <?php
                             }
                         }
                     ?>
                  </div>
              </div>
          </div>
          <div class="row help-icons">
              <div class="col-md-3">
                  <div class="icons">
                      <a class="head" href="#">
                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/help-icon-1@2x.png" alt="Помощь Взрослым">
                          <p>Помощь<br>Взрослым</p>
                      </a>
                      <ul>
                          <li><a href="#">Дополнительная информация</a></li>
                          <li><a href="#">о данном разделе</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="icons">
                      <a class="head" href="#">
                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/help-icon-2@2x.png" alt="Помощь Взрослым">
                          <p>Помощь<br>Семьям</p>
                      </a>
                      <ul>
                          <li><a href="#">Дополнительная информация</a></li>
                          <li><a href="#">о данном разделе</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="icons">
                      <a class="head" href="#">
                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/help-icon-3@2x.png" alt="Помощь Взрослым">
                          <p>Детский<br>психолог</p>
                      </a>
                      <ul>
                          <li><a href="#">Дополнительная информация</a></li>
                          <li><a href="#">о данном разделе</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-md-3">
                  <div class="icons">
                      <a class="head" href="#">
                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/help-icon-4@2x.png" alt="Помощь Взрослым">
                          <p>Отношения<br>в паре</p>
                      </a>
                      <ul>
                          <li><a href="#">Дополнительная информация</a></li>
                          <li><a href="#">о данном разделе</a></li>
                      </ul>
                  </div>
              </div>
          </div>
          <div class="row events">
              <div class="col-md-4">
                  <a class="event" href="#">
                      <p class="head">Вебинары</p>
                      <div class="adds">
                          <p>Дополнительная информация о данном разделе</p>
                      </div>
                  </a>
              </div>
              <div class="col-md-4">
                  <a class="event" href="#">
                      <p class="head">Псифест<br>Море жизни</p>
                      <div class="adds">
                          <p>Дополнительная информация о данном разделе</p>
                      </div>
                  </a>
              </div>
              <div class="col-md-4">
                  <a class="event" href="#">
                      <p class="head">КРО ОППЛ</p>
                      <div class="adds">
                          <p>Дополнительная информация о данном разделе</p>
                      </div>
                  </a>
              </div>
          </div>
          <div class="row unic-seotext calign">
              <div class="col-md-8 col-md-offset-2">
                  <h1 class="title">Заголовок</h1>
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime possimus labore exercitationem reiciendis saepe a vel laborum eius velit earum quae magni nihil aperiam modi tenetur, nesciunt optio, placeat sunt!</p>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 learning">
                  <div class="col-md-4 text">
                      <p class="title">Обучение</p>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi aperiam recusandae fugit rerum voluptate a vero ipsam officiis quo, odio ratione accusamus, aut veritatis nesciunt itaque. Ratione blanditiis ipsa ipsum?</p>
                      <p><a href="#" class="light-button">Подробнее</a></p>
                  </div>
                  <div class="col-md-8 img">
                      <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/learning@2x.jpg" alt="Обучение">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="strong-sides">
                      <div class="col-md-4">
                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/quality-icon-1@2x.png" alt="Сильное качестов">
                          <p>Тут нужно<br>Сильное качестов</p>
                      </div>
                      <div class="col-md-4">
                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/quality-icon-2@2x.png" alt="Сильное качестов">
                          <p>Тут нужно<br>Сильное качестов</p>
                      </div>
                      <div class="col-md-4">
                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/quality-icon-3@2x.png" alt="Сильное качестов">
                          <p>Тут нужно<br>Сильное качестов</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="seotext">
                      <h2 class="title">Кому будут полезны консультации психолога?</h2>
                      <p>Высокий темп жизни мегаполиса способствует накоплению негативных эмоций, мыслей и в результате может привести к повышенной тревожности, подавленному душевному состоянию. Если такое состояние продолжается длительное время, оно может привести к депрессии – психическому расстройству, для которого характерны три признака:</p>
                      <ul>
                          <li>Снижение настроения</li>
                          <li>Утрачена способность переживать радость и выражено негативное мышление</li>
                          <li>Двигательная заторможенность</li>
                      </ul>
                      <p>Основные симптомы <a href="#">депрессии</a>, при которых рекомендуется помощь психолога – сниженная самооценка, потеря интереса к жизни и привычной деятельности и в запущенных случаях – злоупотребление алкоголем или психотропными препаратами.</p>
                      <p class="bordered">Консультация психолога или психотерапевта в Москве помогут преодолеть кризис в жизни или в отношениях, вернуть уверенность в себе и радость от жизни.</p>
                      <p class="subtitle">Психолог, психотерапевт или психоаналитик. К кому из них лучше обратиться?</p>
                      <p><strong>Хороший психолог</strong> в Москве полезен в случаях, когда необходима консультация или прохождение теста. К психологу обращаются здоровые люди и этот специалист не имеет права назначать медицинские препараты.</p>
                      <p><strong>Психотерапевт</strong> исследует эмоции и его задача – снять напряжение и болезненность у клиента по отношению к ситуации. Психотерапевт специализируется на неврозах, последствиях горя, утраты, стресса. Когда психологические проблемы вызваны внешним фактором, на который клиент повлиять не может. Услуги психотерапевта необходимы, если нужно поднять самооценку, выговорить то, что наболело, успокоиться после эмоционального потрясения.</p>
                      <p><strong>Психоаналитик</strong> работает с различными фобиями, навязчивыми состояниями. Необходимо обратиться к психоаналитику за помощью, если психика человека становится неуправляемой. Методы психоанализа позволяют восстановить утраченную связь с бессознательным и вернуть человеку контроль над собой.</p>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 tax-review">
                  <p class="title">Отзывы клиентов</p>
                  <div class="item">
                      <p class="name">Анастасия</p>
                      <span class="date">15.11.18</span>
                      <p>Чаще всего родители обращаются к психологу в случае изменений в поведении и состоянии ребенка. То есть тогда, когда уже существует определенная проблема.</p>
                      <p>Гораздо реже бывает так, что родители обращаются за консультацией, для того, чтобы по возможности предупредить возникновение трудностей в поведении ребенка. Это вызывает сожаление, так как своевременное обращение к психологу позволяет ограничиться одной- двумя консультациями. В том случае, если ситуация имеет глубокие корни, потребуется большее количество встреч.</p>
                      <a href="#" class="light-button">Читать все отзывы</a>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 tax-news">
                  <p class="title">Новости и статьи</p>
                  <div class="item">
                      <a class="img" href="#">
                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/news@2x.jpg" alt="">
                      </a>
                      <div class="text">
                          <a href="#" class="name">Что чаще всего является поводом обращения к детскому психологу?</a>
                          <p>Чаще всего родители обращаются к психологу в случае изменений в поведении и состоянии ребенка. То есть тогда, когда уже существует определенная проблема. То есть тогда, когда уже существует определенная проблема.</p>
                          <div class="bottomed">
                              <a href="#" class="light-button">Подробнее</a>
                              <span class="date">15.11.18</span>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <a class="img" href="#">
                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/news@2x.jpg" alt="">
                      </a>
                      <div class="text">
                          <a href="#" class="name">Что чаще всего является поводом обращения к детскому психологу?</a>
                          <p>Чаще всего родители обращаются к психологу в случае изменений в поведении и состоянии ребенка. То есть тогда, когда уже существует определенная проблема.</p>
                          <div class="bottomed">
                              <a href="#" class="light-button">Подробнее</a>
                              <span class="date">15.11.18</span>
                          </div>
                      </div>
                  </div>
                  <div class="item">
                      <a class="img" href="#">
                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/news@2x.jpg" alt="">
                      </a>
                      <div class="text">
                          <a href="#" class="name">Что чаще всего является поводом обращения к детскому психологу?</a>
                          <p>Чаще всего родители обращаются к психологу в случае изменений в поведении и состоянии ребенка. То есть тогда, когда уже существует определенная проблема.</p>
                          <div class="bottomed">
                              <a href="#" class="light-button">Подробнее</a>
                              <span class="date">15.11.18</span>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 owl-carousel tax-slider">
                  <div class="slide">
                      <div class="text">
                          <p class="title">Псифест<br>в “Апартаменты Херсонес”</p>
                          <p>практикующий психолог, семейный психотерапевт, арт-терапевт, аккредитованный супервизор, обучающий личный психотерапевт,</p>
                          <a href="#" class="light-button">Подробнее</a>
                      </div>
                      <div class="img">
                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/psyfest@2x.jpg" alt="">
                      </div>
                  </div>
                  <div class="slide">
                      <div class="text">
                          <p class="title">Псифест<br>в “Апартаменты Херсонес”</p>
                          <p>практикующий психолог, семейный психотерапевт, арт-терапевт, аккредитованный супервизор, обучающий личный психотерапевт,</p>
                          <a href="#" class="light-button">Подробнее</a>
                      </div>
                      <div class="img">
                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/psyfest@2x.jpg" alt="">
                      </div>
                  </div>
                  <div class="slide">
                      <div class="text">
                          <p class="title">Псифест<br>в “Апартаменты Херсонес”</p>
                          <p>практикующий психолог, семейный психотерапевт, арт-терапевт, аккредитованный супервизор, обучающий личный психотерапевт,</p>
                          <a href="#" class="light-button">Подробнее</a>
                      </div>
                      <div class="img">
                          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/psyfest@2x.jpg" alt="">
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 tax-services">
                  <p class="title">Новые товары в магазине</p>
                  <div class="items">
                      <div class="item">
                          <a href="#" class="img">
                              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/new-services-1@2x.jpg" alt="">
                          </a>
                          <p>
                              <a href="#">Тестовый Товар</a>
                          </p>
                          <p class="price">5500р.</p>
                      </div>
                      <div class="item">
                          <a href="#" class="img">
                              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/new-services-2@2x.jpg" alt="">
                          </a>
                          <p>
                              <a href="#">Тестовый Товар</a>
                          </p>
                          <p class="price">5500р.</p>
                      </div>
                      <div class="item">
                          <a href="#" class="img">
                              <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/new-services-3@2x.jpg" alt="">
                          </a>
                          <p>
                              <a href="#">Тестовый Товар</a>
                          </p>
                          <p class="price">5500р.</p>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-12 index-page-form">
                  <div class="form">
                      <form action="">
                          <div class="form-head">
                              <div>
                                  <p class="title">Записаться на консультацию</p>
                              </div>
                              <div>
                                  <p>Оставьте Ваши контактные данные и я с Вами обязательно свяжусь</p>
                              </div>
                          </div>
                          <div class="form-body">
                              <div>
                                  <input type="text" placeholder="Ваше имя*">
                                  <input type="text" placeholder="Номер телефона*">
                                  <input type="text" placeholder="Город">
                              </div>
                              <div>
                                  <input type="text" placeholder="Ваш e-mail">
                                  <textarea placeholder="Вопрос" rows="4"></textarea>
                              </div>
                          </div>
                          <div class="form-bottomed">
                              <div>
                                  <label><input type="checkbox" checked="false">я согласен (согласна) с политикой конфиденциальности</label>
                              </div>
                              <div>
                                  <button type="submit" class="light-button" disabled="disabled">Отправить</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
   </section>
    
<?php get_footer(); ?>
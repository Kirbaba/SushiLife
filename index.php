<?php get_header(); ?>
				<div class="main__carousel">
					<div class="main__carousel--item">
						<img src="<?php bloginfo('template_directory'); ?>/img/Layer-13.jpg" alt="">
						<div class="main__carousel--item--content">
							<h2><span>специальное предложение</span></h2>
							<div class="main__carousel--item--content_bord"></div>
							<h3>Сет вегетерианский</h3>
							<p class="sushi--title">Ямайка</p>
							<p class="sushi--title">Калифорния с креветкой</p>
							<p class="sushi--title">Каппа маки</p>
							<p class="sushi--title">Маки с копченным лососем Суши </p>
							<p class="sushi--title">сяке ( 2 шт.)</p>
							<p class="sushi--title">Тамаго суши ( 2шт.)</p>
							<a href="#" class="go-to-more">Узнать подробнее</a>
						</div>

					</div>
					<div class="main__carousel--item">
						<img src="<?php bloginfo('template_directory'); ?>/img/bg1.jpg" alt="">
					</div>
					<div class="main__carousel--item">
						<img src="<?php bloginfo('template_directory'); ?>/img/sushi-ryba-ikra-file-assorti.jpg" alt="">
					</div>
				</div>
				<section class="advantages">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="advantages__icon">
							<img src="<?php bloginfo('template_directory'); ?>/img/fish-128.png" alt="">
						</div>
						<div class="advantages__title">
							<h4>FreshMade</h4>
						</div>
						<div class="advantages__desc">
							<p>Мы не подвергаем продукты хранению, 
							не используем полуфабрикаты и  усилители вкуса</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="advantages__icon">
							<img src="<?php bloginfo('template_directory'); ?>/img/rolls-128.png" alt="">
						</div>
						<div class="advantages__title">
							<h4>Оригинальные рецепты</h4>
						</div>
						<div class="advantages__desc">
							<p>Шеф-повар Sushi-Life постоянно совершенствует рецептуру и ассортимент, предлагая новые и интересные сочетания продуктов</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="advantages__icon">							
							<img src="<?php bloginfo('template_directory'); ?>/img/chef_cook_4-128.png" alt="">
						</div>
						<div class="advantages__title">
							<h4>Профессиональные повара</h4>
						</div>
						<div class="advantages__desc">
							<p>Роллы и суши делаются профессиональными поварами, которые постоянно подтверждают и улучшают свою квалификацию</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="advantages__icon">
							
							<img src="<?php bloginfo('template_directory'); ?>/img/aami17-04-128.png" alt="">
						</div>
						<div class="advantages__title">
							<h4>Качественные ингредиенты</h4>
						</div>
						<div class="advantages__desc">
							<p>Все продукты в Sushi-Life закупаются у сертифицированных
								производителей и
								поставщиков</p>
						</div>
					</div>
				</section>

				<section class="social-media">
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<h3>Следите за нами в соцсетях</h3>
					</div>
					<div class="col-lg-3 col-lg-offset-6 col-md-4 col-md-offset-4 col-sm-6 col-xs-12">
						<div class="social-media--icon-wrap">
							<a href="<?php echo get_theme_mod('vk_textbox'); ?>"><i class="fa fa-vk"></i></a>
							<a href="<?php echo get_theme_mod('fb_textbox'); ?>"><i class="fa fa-facebook"></i></a>
							<a href="<?php echo get_theme_mod('inst_textbox'); ?>"><i class="fa fa-instagram"></i></a>
						</div>
					</div>
				</section>

				<section class="reviews">
					<div class="col-lg-12">
						<h1>Отзывы</h1>
						<div class="reviews__carousel">
							<?= do_shortcode('[reviews]'); ?>
							<!--<div class="reviews__carousel__item">
								<div class="reviews__carousel__item--img">
									<img src="<?php bloginfo('template_directory'); ?>/img/Layer-8.png" alt="">
								</div>
								<h3>Максим Дикий</h3>
								<p>Очень все классно и вкусно,я заказал много Роллы (6 шт.) обошлось приличненько,как и полагается с акцией выше 400 грн дали в подарок ролл Аляска. Доставка быстрая,за один час все сделали и доставили,все очень понравилось Спасибо вам Большое,очень вкусно!)</p>
								<small>17.08.2015</small>
							</div>
							<div class="reviews__carousel__item">
								<div class="reviews__carousel__item--img">
									<img src="<?php bloginfo('template_directory'); ?>/img/Layer-10.png" alt="">
								</div>
								<h3>Елена Минина</h3>
								<p>очень вкусно!!!, быстро готовят, доброжелательный и внимательный персонал!! советую всем своим друзьям!</p>
								<small>7.08.2015</small>
							</div>
							<div class="reviews__carousel__item">
								<div class="reviews__carousel__item--img">
									<img src="<?php bloginfo('template_directory'); ?>/img/Layer-8.png" alt="">
								</div>
								<h3>Максим</h3>
								<p>нам понравились все ролы какие мы пробовали у вас!))....можно сказать что даже в некотором роде лучше чем в Рапонги или Дели, так что вы на высоте,так держать!...посоветовали попробовать ролл Кокаин!!...вы же не ложите туда наркотик?)))))</p>
								<small></small>
							</div>
							<div class="reviews__carousel__item">
								<div class="reviews__carousel__item--img">
									<img src="<?php bloginfo('template_directory'); ?>/img/Layer-10.png" alt="">
								</div>
								<h3>Максим Дикий</h3>
								<p>Очень все классно и вкусно,я заказал много Роллы (6 шт.) обошлось приличненько,как и полагается с акцией выше 400 грн дали в подарок ролл Аляска. Доставка быстрая,за один час все сделали и доставили,все очень понравилось Спасибо вам Большое,очень вкусно!)</p>
								<small>17.08.2015</small>
							</div>
							<div class="reviews__carousel__item">
								<div class="reviews__carousel__item--img">
									<img src="<?php bloginfo('template_directory'); ?>/img/Layer-8.png" alt="">
								</div>
								<h3>Дикий</h3>
								<p>очень вкусно!!!, быстро готовят, доброжелательный и внимательный персонал!! советую всем своим друзьям!</p>
								<small>17.08.2015</small>
							</div>-->
						</div>
					</div>
					<div class="reviews__all">
						<a href="#">Все отзывы</a>
					</div>
				</section>

				<section class="cookathome">
					<div class="col-lg-4 col-md-5 col-sm-6 col-xs-12">
						<h3>Как приготовить суши в домашних условиях?</h3>
					</div>
					<div class="col-lg-1 col-md-1 col-sm-3 col-xs-12">
						<a href="#" class="cookathome--link"><i class="fa fa-arrow-right"></i></a>
					</div>
				</section>

				<section class="sitedescription">
					<div class="col-lg-8 col-lg-offset-2 col-md-8 col-lg-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">					
						<div class="sitedescription--desc" id="demo">
							<article>
								<h2><?php echo get_the_title(374); ?></h2>
								<?php echo apply_filters('the_content', get_post_field('post_content', 374)); ?>
							</article>
						</div>							
					</div>
				</section>

<?php get_footer(); ?>


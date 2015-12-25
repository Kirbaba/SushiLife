<?php get_header(); ?>

	<div class="container-fluid">
		<div class="row">
			<div class="main__wrapper">
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
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<h3>Следите за нами в соцсетях</h3>
					</div>
					<div class="col-lg-3 col-lg-offset-6 col-md-3 col-md-offset-6 col-sm-6 col-xs-12">
						<div class="social-media--icon-wrap">
							<a href="#"><i class="fa fa-vk"></i></a>
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-instagram"></i></a>
						</div>
					</div>
				</section>
			</div>
			<?php get_sidebar(); ?>	
			
		</div>
	</div>
<?php wp_footer(); ?>
</body>
</html>
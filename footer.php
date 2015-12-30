				<footer class="footer">
					<div class="">
						<div class="col-lg-12">
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
								<p>Меню</p>
								<?php
								wp_nav_menu( array(
									'theme_location'    => 'footer_menu',
									'menu_class'        => 'footer__menu'
								));
								?>
								<!--<ul class="footer__menu">
									<li><a href="#">Роллы</a></li>
									<li><a href="#">Сеты</a></li>
									<li><a href="#">Суши</a></li>
									<li><a href="#">Салаты</a></li>
									<li><a href="#">Горячая кухня</a></li>
									<li><a href="#">Напитки</a></li>
								</ul>-->
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
								<p>Для клиента</p>
								<?php
								wp_nav_menu( array(
									'theme_location'    => 'footer_client',
									'menu_class'        => 'footer__menu'
								));
								?>
								<!--<ul class="footer__menu">
									<li><a href="#">Акции и новости</a></li>
									<li><a href="#">Отзывы</a></li>
									<li><a href="#">Оплата и доставка</a></li>
								</ul>-->
							</div>
							<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
								<p>Про «Sushi-Life»</p>
								<?php
								wp_nav_menu( array(
									'theme_location'    => 'footer_about',
									'menu_class'        => 'footer__menu'
								));
								?>
								<!--<ul class="footer__menu">
									<li><a href="#">О компании</a></li>
									<li><a href="#">Контакты</a></li>
									<li><a href="#">Партнерам</a></li>
									<li><a href="#">Вакансии</a></li>
								</ul>-->
							</div>
						</div>
					</div>					
					<div class="col-lg-12">
						<div class="footer__copyright">
							<p>© 2014. Доставка суши “Sushi-Life”</p>
						</div>
					</div>				
				</footer>
			</div>
			<?php get_sidebar(); ?>				
		</div>
	</div>
<?php wp_footer(); ?>
<script type="text/javascript">
	addLoadEvent = function(func){if(typeof jQuery!="undefined")jQuery(document).ready(func);else if(typeof wpOnload!='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};
	var ajaxurl = '/wp-admin/admin-ajax.php',
		pagenow = 'toplevel_page_mainpage',
		typenow = '',
		adminpage = 'toplevel_page_mainpage',
		thousandsSeparator = ' ',
		decimalPoint = ',',
		isRtl = 0;
</script>
</body>
</html>
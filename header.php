<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
   	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/wp-content/uploads/2015/03/657068.ico" type="image/x-icon" />
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaOWKyamSxMTXclSDFmJ2N4Am20PCTD6I&sensor=FALSE">
    </script>
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head> 
<body>
	<nav class="navbar navbar-default navbar-fixed-top navigation" role="navigation">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pr-0">
					<div class="navigation--logo">
						<a href="/">
							<img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="">
						</a>
					</div>
					<div class="navigation--box">
						<div class="navigation--box--topline">
							<div class="navigation--box--contacts">
								<div class="content--row">
									<h4><?php echo get_theme_mod('phone_textbox'); ?></h4>
									<a href="<?php echo get_permalink(372); ?>"><i class="fa fa-repeat"></i><span>обратный звонок</span></a>	
								</div>
								<div class="content--row">
									<p><?php echo get_theme_mod('works_textbox'); ?></p>
									<p><?php echo get_theme_mod('weekend_textbox'); ?></p>
									<p class="navigation--box--contacts--city">Николаев</p>	
								</div>						
							</div>
							<div class="navigation--box--delivery">
								<h3>бесплатная</h3>
								<p>Доставка суши в Николаеве</p>
							</div>
							<div class="navigation--box--onlinecam">
								<a href="#"><i class="fa fa-video-camera"></i>On-line камера</a>
							</div>							
						</div>
						<div class="navigation--box--menutoggle">
							<a href="#" class="menutoggle--but"><i class="fa fa-bars"></i>Меню</a>
						</div>
						<div class="navigation--box--showbasket">
							<a href="#" class="showbasket--but"><i class="fa fa-shopping-cart"></i>Заказ</a>
						</div>
						<?php
						wp_nav_menu( array(
								'theme_location'    => 'primary',
								'menu_class'        => '',
								'container'         => 'div',
								'container_class'   => 'navigation--navline',
						));
						?>
						<!--<div class="navigation--navline">
							<ul>
								<li><a href="#">Роллы</a></li>
								<li><a href="#">Сеты</a></li>
								<li><a href="#">СУши</a></li>
								<li><a href="#">Салаты</a></li>
								<li><a href="#">Горячая кухня</a></li>
								<li><a href="#">Напитки</a></li>
							</ul>
						</div>-->
					</div>
				</div>
			</div>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="main__wrapper">
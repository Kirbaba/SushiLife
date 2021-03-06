<div class="col-md-3 col-md-push-9 col-sm-4 col-sm-push-8 col-sm-4 col-sm-push-8 basket--width">
	<aside class="basket">
		<div class="basket__head">
			<h3>Ваш заказ<sup class="total__count"></sup></h3>
			<a href="#" class="basket__head--clear">Очистить заказ</a>
		</div>
		<div class="basket__content orderBody">
			<div class="basket__content__order--standart">
				<a href="#" class="return">Изменить заказ</a>
				<input type="text" name="order-phone" class="order-phone" placeholder="Телефон: 063 123 45 67">
				<button class="add-address-btn">Добавить адрес доставки</button>
				<span class="not-required">Вы можете не указывать адрес, с вами свяжется менеджер для уточнения заказа</span>
			</div>
			<div class="basket__content__order--advanced">
				<div class="row">
					<span class="basket__content__order--advanced--addresstitle">Адрес доставки</span><button class="basket__content__order--advanced--closeaddress"><i class="fa fa-times"></i></button>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<span class="basket__content__order--advanced--label">Улица</span>
						<input type="text" name="order-address">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<span class="basket__content__order--advanced--label">№ дома</span>
						<input type="text" name="order-homenum">
					</div>
					<div class="col-xs-4 p0">
						<span class="basket__content__order--advanced--label">№ подъезда</span>
						<input type="text" name="order-porchnum">
					</div>
					<div class="col-xs-4 ">
						<span class="basket__content__order--advanced--label">корпус</span>
						<input type="text" name="order-housing" >
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 ">
						<span class="basket__content__order--advanced--label">№ квартиры</span>
						<input type="text" name="order-aptnum" >
					</div>
					<div class="col-xs-6 ">
						<span class="basket__content__order--advanced--label">этаж</span>
						<input type="text" name="order-floor">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<span class="basket__content__order--advanced--label">комментарий</span>
						<textarea name="order-comment" rows="5" placeholder="Тут можете указать сумму с которой нужна сдача и тип палочек (учебные или обычные)"></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="basket__content cartBody">
			
			 <!--<div class="basket__content--item">
				<a href="#" class="basket__content--item--title">Калифорния с угрем</a>
				<span class="basket__content--item--weight">210 гр.</span>
				<span class="basket__content--item--qt">6 шт.</span>
				<div class="basket__content--item--pricebox">
					<p class="basket__content--item--pricebox--price"><span class="cart_price">75</span> грн</p>
					<div class="basket__content--item--pricebox--counter">
						<a href="#" class="minus"><i class="fa fa-minus"></i></a>
						<p>10</p>
						<a href="#" class="plus"><i class="fa fa-plus"></i></a>
					</div>
					<a href="#" class="basket__content--item--clear"><i class="fa fa-times"></i></a>
				</div>
				<img src="<?php bloginfo('template_directory'); ?>/img/ZAG5d7hnJ5ItyQUNI3RKOMFRivSnXNep.jpg" alt="">
			</div> -->

		</div>
		<div class="thankBody">
			<h4>Ваш заказ: №<span class="orderNum"></span></h4>
			<p>Поздравляем, заказ оформлен</p>
			<p>В течении 10 минут мы вам позвоним для уточнения заказа</p>
			<p>Если с вами не связалист, пожалуйста, позвоните нам</p>
			<p><b><?php echo get_theme_mod('phone_textbox'); ?></b></p>
			<img src="<?php bloginfo('template_directory'); ?>/img/sushi-rolls-03-33.png" alt="">
			<p>Ваш заказ будет передан в работу только после телефонного подтверждения</p>
			<button class="basket__content--movenext">Продолжить покупки</button>
		</div>
		<div class="basket__foot--wrap--required">
			<p>Минимальный заказ 80 грн</p>
		</div>
		<div class="basket__foot" id="basket__foot">
			<aricle class="basket__foot--wrap">
				<h3>Итого <span class="basket__foot--price"><span class="total_price">308</span><span> грн</span></span></h3>
				<a href="#" class="basket__foot--order">Оформить заказ</a>
				<a href="#" class="basket__foot--order--success">Подтвердить заказ</a>
			</aricle>
		</div>
		<div class="basket--flipper">
			<img src="<?php bloginfo('template_directory'); ?>/img/sushi-rolls-03-32.png" alt="">
		</div>
	</aside>
</div>
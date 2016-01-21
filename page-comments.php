<?php get_header(); ?>
    <section class="page-coments-form">
        <div class="col-lg-4 col-lg-offset-4 col-md-4 col-lg-offset-4 col-sm-10 col-sm-offset-1 col-xs-12">
            <div class="page-coments-form__title">
                <h3>Оставить отзыв</h3>
            </div>
            <div class="page-coments-form__form">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <span>Имя </span><input type="text" name="reviewer-name" >
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <span>Телефон </span><input type="text" name="reviewer-phone" >
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <span>Email </span><input type="text" name="reviewer-mail">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <span>Рейтинг </span><ul class="c-rating"></ul>
                    <input type="hidden" name="reviewer-rating">
                </div>
                <div class="col-xs-12">
                    <span>Сообщение </span><textarea name="reviewer-message" cols="10" rows="5"></textarea>
                </div>
                <div class="col-xs-12">
                    <span>Изображение </span><input type="file" name="reviewer-photo">
                </div>
                <div class="col-xs-12">
                    <input type="submit" class="js-send-review" value="Отправить">

                </div>
                <div class="page-coments-form__form--alert"><p>Спасибо за отзыв!</p></div>
            </div>
        </div>
    </section>
	<section class="page-coments">
		<div class="col-lg-8 col-lg-offset-2 col-md-8 col-lg-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">

			<?= do_shortcode('[reviews page="1"]'); ?>
			<!--<div class="page-coments__item">
				<div class="page-coments--title">
					<h3>Александр</h3>
				</div>
				<div class="page-coments--text">
					<p>Не оставляю отзывы, но сейчас очень хочу поделиться. Доставили быстро. Очень вкусные вегетарианские роллы, баклажан дает эффект лосося, благодарим. Жена благодарит за бумажный пакет.)))</p>
				</div>
				<div class="page-coments--date">
					<small>24.12.2015</small>
				</div>
			</div>
			<div class="page-coments__item">
				<div class="page-coments--title">
					<h3>Александр</h3>
				</div>
				<div class="page-coments--text">
					<p>Не оставляю отзывы, но сейчас очень хочу поделиться. Доставили быстро. Очень вкусные вегетарианские роллы, баклажан дает эффект лосося, благодарим. Жена благодарит за бумажный пакет.)))</p>
				</div>
				<div class="page-coments--date">
					<small>24.12.2015</small>
				</div>
			</div>-->
		</div>
	</section>

    <section class="sitedescription">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-lg-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">                 
            <div class="sitedescription--desc" id="demo">
                <article>
                    <h2>Блюда японской кухни с доставкой</h2>
                    <p>Кухня Страны Восходящего Солнца давно перестала считаться чем-то экзотическим. Более того, она завоевала множество поклонников со всего света. Роллы, суши и другие блюда, пришедшие из Японии, сегодня пользуются огромной популярностью среди жителей Екатеринбурга.</p>
                
                    <p>Если вы хотите приобщиться к японской кухне, не выходя из дома, – вам поможет служба доставки роллов ресторана «Сушкоф». Осуществляя бесплатную доставку, мы готовим их сразу же после вашего заказа и привозим их исключительно свежими. Кроме того, ресторан «Сушкоф» осуществляет доставку роллов круглосуточно, ведь Екатеринбург – это тот город, который никогда не спит. Круглосуточная доставка суши, роллы позволит Вам наслаждаться великолепным вкусом любимых блюд в любое время ночи и дня.</p>
                
                    <p>Доставка роллов бесплатно в Екатеринбурге превратит даже самый обыденный день в настоящий праздник. Закажите роллы на дом в ресторане «Сушкоф» и вы будете в восторге от вкуснейшей японской кухни, приятного сервиса и оперативной доставки.</p>
                </article>
            </div>                          
        </div>
    </section>

<?php get_footer(); ?>
<?php get_header(); ?>
<div class="col-lg-12">
    <section class="navigationtabs">
        <div class="col-lg-12">
            <!--<h1 class="navigationtabs--title"><sup></sup></h1>
            <ul class="nav nav-pills navigationtabs--tabs">
                <li class="active"><a href="#">С угрем</a></li>
                <li><a href="#">Традиционные</a></li>
                <li><a href="#">Калифорнийские</a></li>
                <li><a href="#">Горячие</a></li>
                <li><a href="#">Филадельфия</a></li>
                <li><a href="#">Все</a></li>
            </ul>-->
            <?= do_shortcode('[terms id='.get_queried_object()->term_id.']'); ?>

        </div>
    </section>

    <section class="categoryitems">
        <?= do_shortcode('[tabsposts id='.get_queried_object()->term_id.']'); ?>


<!--    --><?//= do_shortcode('[termsposts id='.get_queried_object()->term_id.']'); ?>

    <!--<div class="categoryitems__item">
        <a href="#">Калифорния с угрем</a>
        <img src="<?php bloginfo('template_directory'); ?>/img/sushi-item.png" alt="">
        <div class="categoryitems__item--numbs">
            <span class="categoryitems__item--weight">210 гр.</span>
            <span class="categoryitems__item--qt">6 шт.</span>
        </div>
        <div class="categoryitems__item--price">
            <span class="categoryitems__item--price--num">75</span>
            <span>грн</span>
        </div>
        <button class="categoryitems__item--buybtn" data-id="">Заказать</button>
        <p class="categoryitems__item--composition">Рис, угорь, тобико красный, авокадо.</p>
    </div>

            <div class="categoryitems__item">
                <a href="#">Калифорния с угрем</a>
                <img src="<?php bloginfo('template_directory'); ?>/img/sushi-item.png" alt="">
                <div class="categoryitems__item--numbs">
                    <span class="categoryitems__item--weight">210 гр.</span>
                    <span class="categoryitems__item--qt">6 шт.</span>
                </div>
                <div class="categoryitems__item--price">
                    <span class="categoryitems__item--price--num">75</span>
                    <span>грн</span>
                </div>
                <button class="categoryitems__item--buybtn" data-id="">Заказать</button>
                <p class="categoryitems__item--composition">Рис, угорь, тобико красный, авокадо.</p>
            </div>-->
    </section>
</div>

    <section class="reviews">
        <div class="col-lg-12">
            <h1>Отзывы</h1>
            <div class="reviews__carousel">
                <?= do_shortcode('[reviews]'); ?>
                <div class="reviews__carousel__item">
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
                </div>
            </div>
        </div>
        <div class="reviews__all">
            <a href="#">Все отзывы</a>
        </div>
    </section>

    <section class="sitedescription">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-lg-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
            <div class="sitedescription--desc" id="demo">
                <article>
                    <h2><?php echo get_the_title(46); ?></h2>
                    <?php echo apply_filters('the_content', get_post_field('post_content', 46)); ?>
                  </article>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
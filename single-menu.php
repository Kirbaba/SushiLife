<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="col-lg-12">
    <section class="navigationtabs">
        <div class="col-lg-12">
            <?php $term = get_the_terms(get_the_ID(),'menu'); ?>

            <?= do_shortcode('[terms id='.$term[0]->parent.']'); ?>
            <!--<h1 class="navigationtabs--title">Сеты <sup>10</sup></h1>
            <ul class="nav nav-pills navigationtabs--tabs">
                <li class="active"><a href="#">С угрем</a></li>
                <li><a href="#">Традиционные</a></li>
                <li><a href="#">Калифорнийские</a></li>
                <li><a href="#">Горячие</a></li>
                <li><a href="#">Филадельфия</a></li>
                <li><a href="#">Все</a></li>
            </ul>-->
        </div>
    </section>

    <section class="product">
        <div class="col-lg-12">
            <h1><?php the_title(); ?></h1>
            <div class="product--item">
                <?php the_post_thumbnail('full',array('class' => "product--item__thumb")); ?>
                <div class="product--item--info">
                    <div class="product--item--info--numbs">
                        <span class="product--item--info--numbs__weight"><?php echo get_post_meta(get_the_ID(), "weight", 1); ?></span>
                        <span class="product--item--info--numbs__qt"><?php echo get_post_meta(get_the_ID(), "count", 1); ?></span>
                    </div>
                    <div class="product--item--info--price">
                        <span class="product--item--info--price__num"><?php echo get_post_meta(get_the_ID(), "price", 1); ?></span>
                        <span>грн</span>
                    </div>
                    <button class="product--item--info__buybtn" data-id="<?php get_the_ID(); ?>">Заказать</button>
                </div>
            </div>
            <div class="product--ingredients">
                <p><span>Ингредиенты</span></p>
                <?php

                $ingredients = get_the_terms($post->ID,'ingredients');
                foreach($ingredients as $key => $item){ ?>
                    <div class="product--ingredients--item">
                        <img src="<?php echo z_taxonomy_image_url($item->term_id); ?>" alt="">
                        <p><?= $item->name; ?></p>
                    </div>
                <?php }

                ?>
                <!--<div class="product--ingredients--item">
                    <img src="<?php bloginfo('template_directory'); ?>/img/cheese.png" alt="">
                    <p>Сыр Филадельфия</p>
                </div>
                <div class="product--ingredients--item">
                    <img src="<?php bloginfo('template_directory'); ?>/img/nori.png" alt="">
                    <p>Нори</p>
                </div>
                <div class="product--ingredients--item">
                    <img src="<?php bloginfo('template_directory'); ?>/img/masago.png" alt="">
                    <p>Масаго красная</p>
                </div>
                <div class="product--ingredients--item">
                    <img src="<?php bloginfo('template_directory'); ?>/img/cheese.png" alt="">
                    <p>Сыр Филадельфия</p>
                </div>
                <div class="product--ingredients--item">
                    <img src="<?php bloginfo('template_directory'); ?>/img/nori.png" alt="">
                    <p>Нори</p>
                </div>
                <div class="product--ingredients--item">
                    <img src="<?php bloginfo('template_directory'); ?>/img/masago.png" alt="">
                    <p>Масаго красная</p>
                </div>-->
            </div>
        </div>
    </section>
<?php endwhile; ?>
<?php  endif;?>
    <section class="recomend">
        <h1>Рекомендуем</h1>
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
        </div>
    </section>
</div>

    <section class="reviews">
        <div class="col-lg-12">
            <h1>Отзывы</h1>
            <div class="reviews__carousel">
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
                    <h2>Блюда японской кухни с доставкой</h2>
                    <p>Кухня Страны Восходящего Солнца давно перестала считаться чем-то экзотическим. Более того, она завоевала множество поклонников со всего света. Роллы, суши и другие блюда, пришедшие из Японии, сегодня пользуются огромной популярностью среди жителей Екатеринбурга.</p>
                
                    <p>Если вы хотите приобщиться к японской кухне, не выходя из дома, – вам поможет служба доставки роллов ресторана «Сушкоф». Осуществляя бесплатную доставку, мы готовим их сразу же после вашего заказа и привозим их исключительно свежими. Кроме того, ресторан «Сушкоф» осуществляет доставку роллов круглосуточно, ведь Екатеринбург – это тот город, который никогда не спит. Круглосуточная доставка суши, роллы позволит Вам наслаждаться великолепным вкусом любимых блюд в любое время ночи и дня.</p>
                
                    <p>Доставка роллов бесплатно в Екатеринбурге превратит даже самый обыденный день в настоящий праздник. Закажите роллы на дом в ресторане «Сушкоф» и вы будете в восторге от вкуснейшей японской кухни, приятного сервиса и оперативной доставки.</p>
                </article>
            </div>                          
        </div>
    </section>

<?php get_footer(); ?>
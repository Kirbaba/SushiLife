<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="col-lg-12">
    <section class="navigationtabs">
        <div class="col-lg-12">
            <?php $term = get_the_terms(get_the_ID(),'menu'); ?>

            <?= do_shortcode('[terms id='.$term[0]->term_id.' single="1"]'); ?>
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
                    <button class="product--item--info__buybtn" data-id="<?php echo get_the_ID(); ?>" data-price="<?php echo get_post_meta(get_the_ID(), "price", 1); ?>">Заказать</button>
                </div>
            </div>
            <div class="product--ingredients">
                <?php

                $ingredients = get_the_terms($post->ID,'ingredients');
                if(!empty($ingredients)){

                ?>
                <p><span>Ингредиенты</span></p>
                <?php

                foreach($ingredients as $key => $item){ ?>
                    <div class="product--ingredients--item">
                        <img src="<?php echo z_taxonomy_image_url($item->term_id); ?>" alt="">
                        <p><?= $item->name; ?></p>
                    </div>
                <?php }}
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

        <?php
           // prn($term);
            $myposts = get_posts(array(
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'menu',
                            'field' => 'id',
                            'terms' => $term[0]->term_id,
                    ))
            ));
            //prn($myposts);
        ?>

                <?php
                foreach($myposts as $item){?>
                    <div class="categoryitems__item">
                        <a href="<?= get_the_permalink($item->ID); ?>"><?= get_the_title($item->ID); ?></a>
                        <?= get_the_post_thumbnail($item->ID); ?>
                        <div class="categoryitems__item--numbs">
                            <span class="categoryitems__item--weight"><?php echo get_post_meta($item->ID, "weight", 1); ?></span>
                            <span class="categoryitems__item--qt"><?php echo get_post_meta($item->ID, "count", 1); ?></span>
                        </div>
                        <div class="categoryitems__item--price">
                            <span class="categoryitems__item--price--num"><?php echo get_post_meta($item->ID, "price", 1); ?></span>
                            <span>грн</span>
                        </div>
                        <button class="categoryitems__item--buybtn" data-id="<?= $item->ID ?>">Заказать</button>
                        <p class="categoryitems__item--composition">
                            <?php
                            $ingredients = get_the_terms($item->ID,'ingredients');
                            foreach($ingredients as $key => $value){
                                if($key == (count($ingredients) - 1)){
                                    echo $value->name.'. ';
                                }else{
                                    echo $value->name.', ';
                                }
                            }
                            ?>
                        </p>
                    </div>
                <?php } ?>
    </section>
</div>

    <section class="reviews">
        <div class="col-lg-12">
            <h1>Отзывы</h1>
            <div class="reviews__carousel">
                <?= do_shortcode('[reviews]'); ?>
            </div>
        </div>
        <div class="reviews__all">
            <a href="/comments">Все отзывы</a>
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
<?php get_header(); ?>
<section class="navigationtabs news-category__navs">
    <div class="col-lg-12">
        <h1 class="navigationtabs--title">Новости</h1>
        <ul class="nav nav-pills navigationtabs--tabs">
            <li><a href="#">Акции</a></li>
            <li><a href="#">Новости</a></li>
            <li><a href="#">Статьи</a></li>
            <li class="active"><a href="#">Все</a></li>
        </ul>
    </div>
</section>

<section class="news-category__wrap">
    <!-- Имеются ли посты для отображения? -->
    <?php if ( have_posts() ) : ?>
        <!-- Цикл вывода постов -->
    <?php while ( have_posts() ) : the_post(); ?>
    <a href="<? echo get_the_permalink(get_the_ID());?>" class="news-category__item">
        <?php if ( has_post_thumbnail() ): ?>
        <span class="news-category__item--thumb">
             <?php { echo get_the_post_thumbnail( $id, '100%', array('class' => 'alignleft') ); }?>
        </span>
        <?php endif; ?>
        <span class="news-category__item--desc">
            <h3><?php the_title(); ?></h3>
            <p> <?php content(20);?></p>
            <span class="news-category__item--desc--date"><? echo  the_time('j.m.Y');?></span>            
        </span>        
    </a>
    <?php endwhile; ?>
    <?php endif; ?>	
</section>
<?php get_footer(); ?>
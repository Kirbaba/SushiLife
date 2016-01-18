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
    <a href="#" class="news-category__item">
        <span class="news-category__item--thumb">
            <img src="<?php bloginfo('template_directory'); ?>/img/1223956.jpg" alt="">
        </span>
        <span class="news-category__item--desc">
            <h3>Lorem ipsum dolor sit amet.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, molestias.</p>
            <span class="news-category__item--desc--date">01.01.15</span>            
        </span>        
    </a>
	<a href="#" class="news-category__item">
		<span class="news-category__item--thumb">
			<img src="<?php bloginfo('template_directory'); ?>/img/3583.jpg" alt="">
        </span>
		<span class="news-category__item--desc">
            <h3>Lorem ipsum dolor sit amet.</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum, molestias.</p>
            <span class="news-category__item--desc--date">01.01.15</span>            
        </span>        
    </a>
</section>
<?php get_footer(); ?>